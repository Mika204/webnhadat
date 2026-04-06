<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Batdongsan;
use App\Models\User;
use App\Models\Datlichhen;
use App\Models\Khuvuc;
use Illuminate\Support\Facades\Auth;


class AdminAuthController extends Controller
{
    // Form login
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
    
        return view('admin.login');
    }

    // Xử lý đăng nhập admin
    public function login(Request $request)
    {
        $request->validate([
            'emailadmin' => 'required|email',
            'passwordadmin' => 'required|string'
        ]);

        $admin = Admin::where('emailadmin', $request->emailadmin)->first();
        


        // Kiểm tra admin tồn tại + password đúng
        if ($admin && $request->passwordadmin == $admin->passwordadmin){

            Auth::guard('admin')->login($admin);

            return redirect()->route('admin.dashboard')
                ->with('success', 'Đăng nhập thành công!');
        }

        return back()->with('error', 'Sai email hoặc mật khẩu!');
    }

    // Đăng xuất admin
    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login')
            ->with('success', 'Đã đăng xuất!');
    }

    // Trang dashboard admin
    public function dashboard()
    {
        $tongBds    = Batdongsan::count();
        $tongUser   = User::count();
        $tongLichhen = Datlichhen::count();
        $tongKhuvuc = Khuvuc::count();

        // Doanh thu theo tháng (tổng tiền cọc của lịch hẹn đã xác nhận)
        $doanhThuThang = [];
        $nhanThang = [];
        for ($i = 1; $i <= 12; $i++) {
            $nhanThang[] = 'Tháng ' . $i;
            $doanhThuThang[] = Datlichhen::whereMonth('ngayDat', $i)
                ->whereYear('ngayDat', date('Y'))
                ->where('trangThai', 'đã xác nhận')
                ->sum('tienCoc') ?? 0;
        }

        return view('admin.dashboard', compact(
            'tongBds', 'tongUser', 'tongLichhen', 'tongKhuvuc',
            'doanhThuThang', 'nhanThang'
        ));
    }
}
