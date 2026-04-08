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
        $tongDoanhThu = Datlichhen::whereIn('trangThai', ['đã cọc', 'hoàn thành'])
            ->sum('tienCoc');

        // Doanh thu theo tháng để vẽ biểu đồ (12 tháng)
        $doanhThuThang = [];
        $nhanThang = [];
        for ($i = 1; $i <= 12; $i++) {
            $nhanThang[] = 'Tháng ' . $i;
            $doanhThuThang[] = Datlichhen::whereMonth('ngayDat', $i)
                ->whereYear('ngayDat', date('Y'))
                ->whereIn('trangThai', ['đã cọc', 'hoàn thành'])
                ->sum('tienCoc') ?? 0;
        }

        // Dữ liệu bảng (lọc các tháng có doanh thu > 0)
        $doanhThuTheoThang = Datlichhen::select(
                DB::raw('MONTH(ngayDat) as thang'),
                DB::raw('SUM(tienCoc) as tong')
            )
            ->whereIn('trangThai', ['đã cọc', 'hoàn thành'])
            ->whereYear('ngayDat', date('Y'))
            ->groupBy(DB::raw('MONTH(ngayDat)'))
            ->orderBy('thang')
            ->get();

        return view('admin.doanhthu.index', compact(
            'tongDoanhThu', 
            'doanhThuTheoThang', 
            'doanhThuThang', 
            'nhanThang'
        ));
    }
}