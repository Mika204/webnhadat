<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Khuvuc;

class KhuvucController extends Controller
{
    
    public function index()
    {
        $khuvucs = Khuvuc::all();
        return view('admin.khuvuc.index', compact('khuvucs'));
    }

    
    public function create()
    {
        return view('admin.khuvuc.create');
    }

    
    public function store(Request $request)
    {
        $ten = trim($request->tenKv);

       
        if ($ten == '') {
            return back()->with('error','Vui lòng nhập tên khu vực.');
        }

        
        $exists = Khuvuc::where('tenKv',$ten)->first();

        if($exists){
            return back()->with('error',"Khu vực '$ten' đã tồn tại!");
        }

        
        Khuvuc::create([
            'tenKv'=>$ten
        ]);

        return redirect()->route('admin.khuvuc.index')
            ->with('success',"Thêm khu vực '$ten' thành công!");
    }

    
    public function show($id)
    {
        $khuvuc = Khuvuc::findOrFail($id);
        return view('admin.khuvuc.show', compact('khuvuc'));
    }

    
    public function edit($id)
{
    $khuvuc = Khuvuc::find($id);

    if(!$khuvuc){
        return redirect()->route('admin.khuvuc.index')
            ->with('error','Không tìm thấy khu vực.');
    }

    return view('admin.khuvuc.edit', compact('khuvuc'));
}
    
    public function update(Request $request, $id)
    {
        $ten = trim($request->tenKv);

        if ($ten == '') {
            return back()->with('error','Tên khu vực không được để trống.');
        }

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

    public function destroy($id)
    {
        $khuvuc = Khuvuc::findOrFail($id);
        $khuvuc->delete();

        return redirect()->route('admin.khuvuc.index')
            ->with('success','Xóa khu vực thành công!');
    }
}
