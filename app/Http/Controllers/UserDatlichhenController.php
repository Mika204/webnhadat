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

    // Cập nhật trạng thái (cho Chủ nhà)
    public function update(Request $request, $id)
    {
        $request->validate([
            'trangThai' => 'required|in:đã cọc,hoàn thành,hủy'
        ]);

        $lichhen = Datlichhen::with('batdongsan')->findOrFail($id);

        // Kiểm tra xem người dùng hiện tại có phải chủ nhà không
        if ($lichhen->batdongsan->iduser != Auth::id()) {
            abort(403);
        }

        $lichhen->update([
            'trangThai' => $request->trangThai
        ]);

        return redirect()->to(route('profile.index') . '#posts')->with('success', 'Cập nhật trạng thái lịch hẹn thành công!');
    }

    // Hủy lịch hẹn (cho Người mua)
    public function destroy($id)
    {
        $lichhen = Datlichhen::where('id_nguoi_mua', Auth::id()) 
            ->findOrFail($id);

        $lichhen->update([
            'trangThai' => 'hủy'
        ]);

        return redirect()->to(route('profile.index') . '#deposits') 
            ->with('success', 'Hủy lịch hẹn thành công!');
    }
}