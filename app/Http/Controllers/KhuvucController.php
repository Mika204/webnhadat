<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Khuvuc;

class KhuvucController extends Controller
{
    // Hiển thị danh sách khu vực
    public function index()
    {
        $khuvucs = Khuvuc::all();
        return view('admin.khuvuc.index', compact('khuvucs'));
    }

    // Form thêm mới khu vực
    public function create()
    {
        return view('admin.khuvuc.create');
    }

    // Lưu khu vực mới
    public function store(Request $request)
    {
        $request->validate([
            'tenKv' => 'required|string|max:100'
        ]);

        Khuvuc::create([
            'tenKv' => $request->tenKv
        ]);

        return redirect()->route('admin.khuvuc.index')->with('success', 'Thêm khu vực thành công!');
    }

    // Hiển thị chi tiết khu vực
    public function show($id)
    {
        $khuvuc = Khuvuc::findOrFail($id);
        return view('admin.khuvuc.show', compact('khuvuc'));
    }

    // Form chỉnh sửa khu vực
    public function edit($id)
    {
        $khuvuc = Khuvuc::findOrFail($id);
        return view('admin.khuvuc.edit', compact('khuvuc'));
    }

    // Cập nhật khu vực
    public function update(Request $request, $id)
    {
        $request->validate([
            'tenKv' => 'required|string|max:100'
        ]);

        $khuvuc = Khuvuc::findOrFail($id);
        $khuvuc->update([
            'tenKv' => $request->tenKv
        ]);

        return redirect()->route('admin.khuvuc.index')->with('success', 'Cập nhật khu vực thành công!');
    }

    // Xóa khu vực
    public function destroy($id)
    {
        $khuvuc = Khuvuc::findOrFail($id);
        $khuvuc->delete();

        return redirect()->route('admin.khuvuc.index')->with('success', 'Xóa khu vực thành công!');
    }
}
