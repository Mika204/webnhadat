<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('admin.users.index')->with('success', 'Xóa người dùng thành công');
    }
}
