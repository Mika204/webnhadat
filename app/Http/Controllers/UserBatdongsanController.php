<?php

namespace App\Http\Controllers;

use App\Models\Batdongsan;
use App\Models\Khuvuc;
use App\Models\Hinhanh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class UserBatdongsanController extends Controller
{
    public function search(Request $request)
    {
        $keyword = strtolower(trim($request->q));

        $batdongsans = collect();

        if ($keyword != '') {

            $batdongsans = Batdongsan::join('khuvuc','batdongsan.idKv','=','khuvuc.idKv')
                ->where(function($query) use ($keyword){
                    $query->where(DB::raw('LOWER(tenBds)'), 'LIKE', "%$keyword%")
                          ->orWhere(DB::raw('LOWER(tenKv)'), 'LIKE', "%$keyword%");
                })
                ->select('batdongsan.*','khuvuc.tenKv')
                ->get();
        }

        return view('users.search', compact('batdongsans','keyword'));
    }
    public function create()
    {
        $khuvucs = Khuvuc::all();
        return view('users.profile.create', compact('khuvucs'));
    }
    // Lưu bất động sản mới
    public function store(Request $request)
    {
        $request->validate([
            'tenBds' => 'required|string|max:255',
            'gia' => 'required|numeric',
            'moTa' => 'nullable|string',
            'idKv' => 'required|exists:khuvuc,idKv',
            'hinhanh.*' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $bds = Batdongsan::create([
            'tenBds' => $request->tenBds,
            'gia' => $request->gia,
            'moTa' => $request->moTa,
            'idKv' => $request->idKv,
            'iduser' => Auth::id(),
            'trangThai' => 'chờ duyệt'
        ]);
        // Lưu hình ảnh
        if ($request->hasFile('hinhanh')) {
            foreach ($request->file('hinhanh') as $file) {
                $path = $file->store('uploads', 'public');
                Hinhanh::create([
                    'idbds' => $bds->idbds,
                    'duong_dan_anh' => $path
                ]);
            }
        }

        return redirect()->route('profile.index')->with('success','Đăng tin thành công, chờ duyệt!');
    }
    // Form chỉnh sửa bất động sản
    public function edit($id)
    {
        $bds = Batdongsan::findOrFail($id);
        $khuvucs = Khuvuc::all();
        return view('users.profile.edit', compact('bds', 'khuvucs'));
    }

    // Cập nhật bất động sản
    public function update(Request $request, $id)
    {
        $request->validate([
            'tenBds' => 'required|string|max:255',
            'gia' => 'required|numeric',
            'moTa' => 'nullable|string',
            'idKv' => 'required|exists:khuvuc,idKv',
            'hinhanh.*' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $bds = Batdongsan::findOrFail($id);
        $bds->update([
            'tenBds' => $request->tenBds,
            'gia' => $request->gia,
            'moTa' => $request->moTa,
            'idKv' => $request->idKv
        ]);

        // Cập nhật hình ảnh mới (nếu có)
        if ($request->hasFile('hinhanh')) {
            foreach ($request->file('hinhanh') as $file) {
                $path = $file->store('uploads', 'public');
                Hinhanh::create([
                    'idbds' => $bds->idbds,
                    'duong_dan_anh' => $path
                ]);
            }
        }

        return redirect()->route('profile.index')->with('success', 'Cập nhật bất động sản thành công!');
    }
}
