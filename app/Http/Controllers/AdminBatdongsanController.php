<?php

namespace App\Http\Controllers;

use App\Models\Batdongsan;
use Illuminate\Http\Request;

class AdminBatdongsanController extends Controller
{
    public function index()
    {
        $batdongsan = Batdongsan::all();
        return view('admin.batdongsan.index', compact('batdongsan'));
    }

    public function create()
    {
        return view('admin.batdongsan.create');
    }

    public function store(Request $request)
    {
        Batdongsan::create($request->all());
        return redirect()->route('admin.batdongsan.index')->with('success', 'Thêm bất động sản thành công');
    }

    public function edit($id)
    {
        $bds = Batdongsan::findOrFail($id);
        return view('admin.batdongsan.edit', compact('bds'));
    }

    public function update(Request $request, $id)
    {
        $bds = Batdongsan::findOrFail($id);
        $bds->update($request->all());
        return redirect()->route('admin.batdongsan.index')->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        Batdongsan::destroy($id);
        return redirect()->route('admin.batdongsan.index')->with('success', 'Xóa thành công');
    }
}
