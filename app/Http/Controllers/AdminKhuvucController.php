<?php

namespace App\Http\Controllers;

use App\Models\Khuvuc;
use Illuminate\Http\Request;

class AdminKhuvucController extends Controller
{
    public function index()
    {
        $khuvuc = Khuvuc::all();
        return view('admin.khuvuc.index', compact('khuvuc'));
    }

    public function create()
    {
        return view('admin.khuvuc.create');
    }

    public function store(Request $request)
    {
        Khuvuc::create($request->all());
        return redirect()->route('admin.khuvuc.index')->with('success', 'Thêm khu vực thành công');
    }

    public function destroy($id)
    {
        Khuvuc::destroy($id);
        return redirect()->route('admin.khuvuc.index')->with('success', 'Xóa khu vực thành công');
    }
}
