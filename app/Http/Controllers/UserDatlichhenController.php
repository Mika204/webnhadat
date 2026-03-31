<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datlichhen;
use App\Models\Batdongsan;
use Illuminate\Support\Facades\Auth;

class UserDatlichhenController extends Controller
{
    // Hiển thị danh sách lịch hẹn của user
    public function index()
    {
        $userId = Auth::id();

        $lichhens = Datlichhen::with('batdongsan')
            ->where('id_nguoi_mua', $userId) 
            ->get();

        return view('users.datlichhen.index', compact('lichhens'));
    }

    
    // Hủy lịch hẹn
    public function destroy($id)
    {
        $lichhen = Datlichhen::where('id_nguoi_mua', Auth::id()) 
            ->findOrFail($id);

            $lichhen->update([
                'trangThai' => 'huỷ'
            ]);
        return redirect()->route('datlichhen.destroy') 
            ->with('success', 'Hủy lịch hẹn thành công!');
    }
}
