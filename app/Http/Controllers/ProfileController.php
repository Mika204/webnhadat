<?php

namespace App\Http\Controllers;

use App\Models\Datlichhen;
use App\Models\Batdongsan;
use App\Models\Khuvuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $datlichhen = Datlichhen::where('id_nguoi_mua', $user->iduser)->get();

        $posts = Batdongsan::with(['hinhanhs','khuvuc', 'datlichhens.nguoiMua'])
            ->where('iduser', $user->iduser)
            ->orderBy('idbds','desc')
            ->get();

        $khuvucs = Khuvuc::all();

        return view('users.profile.index', compact(
            'user',
            'datlichhen',
            'posts',
            'khuvucs'
        ));
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