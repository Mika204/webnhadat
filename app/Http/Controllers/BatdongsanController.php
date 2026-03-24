<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batdongsan;
use App\Models\Hinhanh;
use App\Models\Khuvuc;

class BatdongsanController extends Controller
{
    // Hiển thị danh sách bất động sản
    public function index()
    {
        $batdongsans = Batdongsan::with('khuvuc', 'hinhanhs')->get();
        return view('admin.batdongsan.index', compact('batdongsans'));
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
            'iduser' => Auth::id()
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

        return redirect()->route('admin.batdongsan.index')->with('success', 'Thêm bất động sản thành công!');
    }

    // Hiển thị chi tiết bất động sản
    public function show($id)
    {
        $bds = Batdongsan::with('khuvuc', 'hinhanhs')->findOrFail($id);
        return view('batdongsan.show', compact('bds'));
    }


    // Xóa bất động sản
    public function destroy($id)
    {
        $bds = Batdongsan::findOrFail($id);
        $bds->hinhanhs()->delete(); // Xóa hình ảnh liên quan
        $bds->delete();

        return redirect()->route('admin.batdongsan.index')->with('success', 'Xóa bất động sản thành công!');
    }
}
