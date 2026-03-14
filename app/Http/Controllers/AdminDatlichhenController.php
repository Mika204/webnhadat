<?php

namespace App\Http\Controllers;

use App\Models\Datlichhen;
use Illuminate\Http\Request;

class AdminDatlichhenController extends Controller
{
    public function index()
    {
        $lichhen = Datlichhen::all();
        return view('admin.datlichhen.index', compact('lichhen'));
    }

    public function destroy($id)
    {
        Datlichhen::destroy($id);
        return redirect()->route('admin.datlichhen.index')->with('success', 'Xóa lịch hẹn thành công');
    }
}
