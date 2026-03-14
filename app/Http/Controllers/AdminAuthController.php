<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;


class AdminAuthController extends Controller
{
    // Form đăng nhập admin
    public function showLogin()
    {
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

            Session::put('admin_id', $admin->idadmin);
            Session::put('admin_email', $admin->emailadmin);

            return redirect()->route('admin.dashboard')
                ->with('success', 'Đăng nhập thành công!');
        }

        return back()->with('error', 'Sai email hoặc mật khẩu!');
    }

    // Đăng xuất admin
    public function logout()
    {
        Session::forget(['admin_id', 'admin_email']);

        return redirect()->route('admin.login')
            ->with('success', 'Đã đăng xuất!');
    }

    // Trang dashboard admin
    public function dashboard()
    {
        // kiểm tra nếu chưa login
        if (!Session::has('admin_id')) {
            return redirect()->route('admin.login');
        }

        return view('admin.dashboard');
    }
}
