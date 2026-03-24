<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Giohang;
use App\Models\Datlichhen;
use App\Models\Batdongsan;

class CheckoutController extends Controller
{
    // Hiển thị form checkout
    public function index()
    {
        $userId = Auth::id();

        if (!$userId) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập!');
        }

        $giohang = Giohang::with('batdongsan')
            ->where('iduser', $userId)
            ->get();

        $totalCoc = 0;
        foreach($giohang as $item){
            $totalCoc += $item->batdongsan->gia * 0.05;
        }

        return view('users.checkout.index', compact('giohang', 'totalCoc'));
    }

    // Xử lý thanh toán + tạo lịch hẹn
    public function pay(Request $request)
    {
        $userId = Auth::id();

        if (!$userId) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập!');
        }

        $request->validate([
            'ngayhen' => 'required|date|after_or_equal:today',
            'pttt' => 'required|in:tiền mặt,chuyển khoản'
        ]);

        $giohang = Giohang::with('batdongsan')
            ->where('iduser', $userId)
            ->get();

        if($giohang->isEmpty()){
            return redirect()->route('giohang.index')->with('error', 'Giỏ hàng trống!');
        }

        foreach($giohang as $item){
            Datlichhen::create([
                'id_nguoi_mua' => $userId,
                'idbds'        => $item->batdongsan->idbds,
                'ngayDat'      => $request->ngayhen,
                'tienCoc'      => $item->batdongsan->gia * 0.05,
                'pttt'         => $request->pttt,
                'trangThai'    => 'chờ xác nhận'
            ]);
        }

        Giohang::where('iduser', $userId)->delete();

        return redirect()->route('home')
            ->with('success', 'Thanh toán thành công!');
    }

}
