<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datlichhen;

class DatlichhenController extends Controller
{
    public function index()
    {
        $lichhens = Datlichhen::with(['batdongsan.user', 'nguoiMua'])
            ->get();

        return view('admin.datlichhen.index', compact('lichhens'));
    }

    public function destroy($id)
    {
        $lichhen = Datlichhen::findOrFail($id);
        $lichhen->delete();

        return redirect()->route('admin.datlichhen.index')
            ->with('success', 'Xóa lịch hẹn thành công!');
    }
}