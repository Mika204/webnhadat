<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datlichhen;
use Illuminate\Support\Facades\DB;

class DoanhthuController extends Controller
{
    // Hiển thị báo cáo doanh thu tổng hợp
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

        // Doanh thu theo khu vực
        $doanhThuTheoKhuvuc = Datlichhen::join('batdongsan', 'datlichhen.idbds', '=', 'batdongsan.idbds')
            ->join('khuvuc', 'batdongsan.idKv', '=', 'khuvuc.idKv')
            ->select('khuvuc.tenKv', DB::raw('SUM(datlichhen.tienCoc) as tong'))
            ->where('datlichhen.trangThai', 'đã xác nhận')
            ->groupBy('khuvuc.tenKv')
            ->get();

        return view('doanhthu.index', compact('tongDoanhThu', 'doanhThuTheoThang', 'doanhThuTheoKhuvuc'));
    }
}
