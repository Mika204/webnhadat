<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    // Form login
    public function showLogin()
    {
        if (Session::has('admin_id')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    // Xử lý login
    public function login(Request $request)
    {
        $request->validate([
            'emailadmin' => 'required|email',
            'passwordadmin' => 'required'
        ]);

        $admin = Admin::where('emailadmin', $request->emailadmin)->first();

        if ($admin && $admin->passwordadmin == $request->passwordadmin) {

            Session::put('admin_id', $admin->idadmin);
            Session::put('admin_email', $admin->emailadmin);

            return redirect()->route('admin.dashboard');
        }

        return back()->with('error','Sai email hoặc mật khẩu');
    }

    // Dashboard
    public function dashboard()
    {
        if (!Session::has('admin_id')) {
            return redirect()->route('admin.login');
        }

        return view('admin.dashboard');
    }

    // Logout
    public function logout()
    {
        Session::forget(['admin_id','admin_email']);

        return redirect()->route('admin.login');
    }
}
