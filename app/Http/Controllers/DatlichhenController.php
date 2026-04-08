<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datlichhen;

class DatlichhenController extends Controller
{
    // Admin xem tất cả lịch hẹn
    public function index()
    {
        $lichhens = Datlichhen::with(['batdongsan.user', 'nguoiMua'])
            ->get();

        return view('admin.datlichhen.index', compact('lichhens'));
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