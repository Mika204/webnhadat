<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Giohang;
use App\Models\Batdongsan;
use Illuminate\Support\Facades\Auth;

class GiohangController extends Controller
{
    // Hiển thị giỏ hàng của user
    public function index()
    {
        $userId = Auth::id(); // lấy id user đang đăng nhập
        $giohang = Giohang::with('batdongsan')->where('iduser', $userId)->get();

        return view('users.giohang.index', compact('giohang'));
    }

    // Thêm bất động sản vào giỏ hàng
    public function add($idbds)
    {
        $userId = Auth::id();

        // kiểm tra nếu đã có trong giỏ thì không thêm nữa
        $exists = Giohang::where('iduser', $userId)->where('idbds', $idbds)->exists();
        if ($exists) {
            return redirect()->route('giohang.index')->with('info', 'Bất động sản đã có trong giỏ hàng!');
        }

        Giohang::create([
            'iduser' => $userId,
            'idbds' => $idbds
        ]);

        return redirect()->route('giohang.index')->with('success', 'Đã thêm vào giỏ hàng!');
    }

    // Xóa bất động sản khỏi giỏ hàng
    public function remove($idbds)
    {
        $userId = Auth::id();
        $giohang = Giohang::where('iduser', $userId)->where('idbds', $idbds)->firstOrFail();
        $giohang->delete();

        return redirect()->route('giohang.index')->with('success', 'Đã xóa khỏi giỏ hàng!');
    }
}
