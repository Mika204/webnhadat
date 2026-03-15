<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datlichhen;
use App\Models\Batdongsan;
use Illuminate\Support\Facades\Auth;

class DatlichhenController extends Controller
{
    // Hiển thị danh sách lịch hẹn của user
    public function index()
    {
        $userId = Auth::id();
        $lichhens = Datlichhen::with('batdongsan')
            ->where('iduser', $userId)
            ->get();

        return view('admin.datlichhen.index', compact('lichhens'));
    }

    // Form đặt lịch hẹn
    public function create($idbds)
    {
        $bds = Batdongsan::findOrFail($idbds);
        return view('datlichhen.create', compact('bds'));
    }

    // Lưu lịch hẹn mới
    public function store(Request $request, $idbds)
    {
        $request->validate([
            'ngayDat' => 'required|date|after_or_equal:today',
            'tienCoc' => 'nullable|numeric|min:0',
            'pttt' => 'required|in:tiền mặt,chuyển khoản'
        ]);

        Datlichhen::create([
            'iduser' => Auth::id(),
            'idbds' => $idbds,
            'ngayDat' => $request->ngayDat,
            'tienCoc' => $request->tienCoc,
            'pttt' => $request->pttt,
            'trangThai' => 'chờ xác nhận'
        ]);

        return redirect()->route('admin.datlichhen.index')->with('success', 'Đặt lịch hẹn thành công!');
    }

    // Admin xác nhận hoặc hủy lịch hẹn
    public function update(Request $request, $id)
    {
        $request->validate([
            'trangThai' => 'required|in:chờ xác nhận,đã xác nhận,huỷ'
        ]);

        $lichhen = Datlichhen::findOrFail($id);
        $lichhen->update([
            'trangThai' => $request->trangThai
        ]);

        return redirect()->route('admin.datlichhen.index')->with('success', 'Cập nhật trạng thái thành công!');
    }

    // Xóa lịch hẹn
    public function destroy($id)
    {
        $lichhen = Datlichhen::findOrFail($id);
        $lichhen->delete();

        return redirect()->route('admin.datlichhen.index')->with('success', 'Xóa lịch hẹn thành công!');
    }
}
