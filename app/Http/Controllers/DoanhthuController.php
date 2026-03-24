<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datlichhen;
use Illuminate\Support\Facades\DB;

class DoanhthuController extends Controller
{
    // Hiển thị báo cáo doanh thu
    public function index()
    {
        // Tổng doanh thu từ các lịch hẹn đã xác nhận
        $tongDoanhThu = Datlichhen::where('trangThai', 'đã xác nhận')
            ->sum('tienCoc');

        // Doanh thu theo tháng
        $doanhThuTheoThang = Datlichhen::select(
                DB::raw('MONTH(ngayDat) as thang'),
                DB::raw('SUM(tienCoc) as tong')
            )
            ->where('trangThai', 'đã xác nhận')
            ->groupBy(DB::raw('MONTH(ngayDat)'))
            ->orderBy('thang')
            ->get();

        return view('admin.doanhthu.index', compact('tongDoanhThu', 'doanhThuTheoThang'));
    }
}
