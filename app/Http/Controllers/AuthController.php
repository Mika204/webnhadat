<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Hiển thị form
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('users.index', ['type' => 'login']);
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->with('msg', 'Email hoặc mật khẩu không đúng');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

        public function showRegister()
    {
        return view('users.index', ['type' => 'register']);
    }

    public function register(Request $request)
    {
        $request->validate([
            'hoten'    => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'sdt'      => 'nullable|string|max:20',
        ]);

        User::create([
            'hoten'    => $request->hoten,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'sdt'      => $request->sdt,
        ]);

        return redirect()->route('login')
            ->with('success','Đăng ký thành công!');
    }

}