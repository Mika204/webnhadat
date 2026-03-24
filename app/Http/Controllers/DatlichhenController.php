<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datlichhen;

class DatlichhenController extends Controller
{
    // Admin xem tất cả lịch hẹn
    public function index()
    {
        $lichhens = Datlichhen::with(['batdongsan', 'nguoiMua', 'nguoiBan'])
            ->get();

        return view('admin.datlichhen.index', compact('lichhens'));
    }

    // Admin cập nhật trạng thái
    public function update(Request $request, $id)
    {
        $request->validate([
            'trangThai' => 'required|in:chờ xác nhận,đã xác nhận,đã cọc,huỷ'
        ]);

        $lichhen = Datlichhen::findOrFail($id);

        $lichhen->update([
            'trangThai' => $request->trangThai
        ]);

        return redirect()->route('admin.datlichhen.index')
            ->with('success', 'Cập nhật trạng thái thành công!');
    }

    // Xóa lịch hẹn
    public function destroy($id)
    {
        $lichhen = Datlichhen::findOrFail($id);
        $lichhen->delete();

        return redirect()->route('admin.datlichhen.index')
            ->with('success', 'Xóa lịch hẹn thành công!');
    }
}
