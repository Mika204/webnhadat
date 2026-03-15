<?php

namespace App\Http\Controllers;
use App\Models\DatLichHen;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $datlichhen = DatLichHen::where('iduser', $user->iduser)->get();

        return view('users.profile.index', compact('user','datlichhen'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'hoten' => 'required|string|max:255',
            'sdt' => 'nullable|string|max:20',
            'diachi' => 'nullable|string|max:255',
        ]);

        $user->hoten = $request->hoten;
        $user->sdt = $request->sdt;
        $user->diachi = $request->diachi;

        if ($request->password) {
            if ($request->password != $request->confirm) {
                return back()->with('error','Mật khẩu xác nhận không khớp!');
            }

            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success','Cập nhật thông tin thành công!');
    }
}
