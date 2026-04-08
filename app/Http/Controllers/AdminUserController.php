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
        $bdsChoDuyet = Batdongsan::with(['user', 'hinhanhs'])
            ->where('trangThai','chờ duyệt')
            ->get();

        return view('admin.user.index', compact('user','bdsChoDuyet'));
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('admin.user.index')->with('success', 'Xóa người dùng thành công');
    }

    public function duyetBai($id)
    {
        $bds = Batdongsan::findOrFail($id);

        $bds->trangThai = 'đã duyệt';
        $bds->save();

        return back()->with('success', 'Đã duyệt bài!');
    }
    public function tuChoiBai($id)
    {
        $bds = Batdongsan::findOrFail($id);
        $bds->trangThai = 'từ chối';
        $bds->save();

        return back()->with('error','Đã từ chối!');
    }

}