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
        $ten = trim($request->tenKv);

        // kiểm tra rỗng
        if ($ten == '') {
            return back()->with('error','Vui lòng nhập tên khu vực.');
        }

        // kiểm tra trùng
        $exists = Khuvuc::where('tenKv',$ten)->first();

        if($exists){
            return back()->with('error',"Khu vực '$ten' đã tồn tại!");
        }

        // thêm khu vực
        Khuvuc::create([
            'tenKv'=>$ten
        ]);

        return redirect()->route('admin.khuvuc.index')
            ->with('success',"Thêm khu vực '$ten' thành công!");
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
    $khuvuc = Khuvuc::find($id);

    if(!$khuvuc){
        return redirect()->route('admin.khuvuc.index')
            ->with('error','Không tìm thấy khu vực.');
    }

    return view('admin.khuvuc.edit', compact('khuvuc'));
}
    // Cập nhật khu vực
    public function update(Request $request, $id)
    {
        $ten = trim($request->tenKv);

        if ($ten == '') {
            return back()->with('error','Tên khu vực không được để trống.');
        }

        // kiểm tra trùng (trừ chính nó)
        $exists = Khuvuc::where('tenKv',$ten)
            ->where('idKv','!=',$id)
            ->first();

        if($exists){
            return back()->with('error',"Khu vực '$ten' đã tồn tại!");
        }

        $khuvuc = Khuvuc::findOrFail($id);

        $khuvuc->update([
            'tenKv'=>$ten
        ]);

        return redirect()->route('admin.khuvuc.index')
            ->with('success','Cập nhật khu vực thành công!');
    }

    // Xóa khu vực
    public function destroy($id)
    {
        $khuvuc = Khuvuc::findOrFail($id);
        $khuvuc->delete();

        return redirect()->route('admin.khuvuc.index')
            ->with('success','Xóa khu vực thành công!');
    }
}
