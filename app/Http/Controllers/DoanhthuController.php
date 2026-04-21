<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datlichhen;
use Illuminate\Support\Facades\DB;

class DoanhthuController extends Controller
{
    public function index()
    {
        $tongDoanhThu = Datlichhen::whereIn('trangThai', ['đã cọc', 'hoàn thành'])
            ->sum('tienCoc');

        $doanhThuThang = [];
        $nhanThang = [];
        for ($i = 1; $i <= 12; $i++) {
            $nhanThang[] = 'Tháng ' . $i;
            $doanhThuThang[] = Datlichhen::whereMonth('ngayDat', $i)
                ->whereYear('ngayDat', date('Y'))
                ->whereIn('trangThai', ['đã cọc', 'hoàn thành'])
                ->sum('tienCoc') ?? 0;
        }

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