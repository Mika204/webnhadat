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
            'diaChi' => 'required|string|max:255',
            'moTa' => 'nullable|string',
            'idKv' => 'required|exists:khuvuc,idKv',
            'hinhanh.*' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $bds = Batdongsan::create([
            'tenBds' => $request->tenBds,
            'gia' => $request->gia,
            'diaChi' => $request->diaChi,
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

        if ($this->isLocked($bds)) {
            return redirect()->route('profile.index')->with('error', 'Bài đăng đã bị khóa do đang trong quá trình đặt cọc/hoàn thành!');
        }

        $khuvucs = Khuvuc::all();
        return view('users.profile.edit', compact('bds', 'khuvucs'));
    }

    // Cập nhật bất động sản
    public function update(Request $request, $id)
    {
        $bds = Batdongsan::findOrFail($id);

        if ($this->isLocked($bds)) {
            return redirect()->route('profile.index')->with('error', 'Không thể cập nhật bài đăng đã bị khóa!');
        }

        $request->validate([
            'tenBds' => 'required|string|max:255',
            'gia' => 'required|numeric',
            'diaChi' => 'required|string|max:255',
            'moTa' => 'nullable|string',
            'idKv' => 'required|exists:khuvuc,idKv',
            'hinhanh.*' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $bds->update([
            'tenBds' => $request->tenBds,
            'gia' => $request->gia,
            'diaChi' => $request->diaChi,
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

    public function destroy($id)
    {
        $bds = Batdongsan::where('iduser', Auth::id())->findOrFail($id);

        if ($this->isLocked($bds)) {
            return redirect()->route('profile.index')->with('error', 'Không thể xóa bài đăng đã bị khóa!');
        }
        $bds->hinhanhs()->delete();
        $bds->delete();
        return redirect()->route('profile.index')->with('success', 'Xóa bài đăng thành công!');
    }

    private function isLocked($bds)
    {
        return $bds->datlichhens()->whereIn('trangThai', ['đã cọc', 'hoàn thành'])->exists();
    }
}