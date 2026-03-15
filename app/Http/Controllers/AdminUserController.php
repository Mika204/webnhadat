<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Batdongsan;

class AdminUserController extends Controller
{
    public function index()
    {
        $user = User::all();
        $bdsChoDuyet = Batdongsan::whereNotNull('iduser')->get();

        return view('admin.user.index', compact('user','bdsChoDuyet'));
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('admin.user.index')->with('success', 'Xóa người dùng thành công');
    }

    public function duyetBai($id)
{
    $approved = Session::get('approved_bds', []);

    if (!in_array($id, $approved)) {
        $approved[] = $id;
    }

    Session::put('approved_bds', $approved);

    return back()->with('success', 'Đã duyệt bài!');
}
}
