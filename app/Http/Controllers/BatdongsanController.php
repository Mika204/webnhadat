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
