<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batdongsan;
use App\Models\Khuvuc;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $khuvucs = Khuvuc::all();
    
        $query = Batdongsan::with('hinhanhs')
            ->join('khuvuc','batdongsan.idKv','=','khuvuc.idKv')
            ->where('batdongsan.trangThai', 'đã duyệt') 
            ->select('batdongsan.*','khuvuc.tenKv');
    
        // lọc theo khu vực
        if ($request->idKv) {
            $query->where('batdongsan.idKv', $request->idKv);
        }
    
        // paginate
        $batdongsan = $query->orderBy('idbds','desc')
            ->paginate(6)
            ->withQueryString();
    
        return view('users.home', compact('batdongsan','khuvucs'));
    }

    public function show($id)
    {
        $bds = Batdongsan::with(['hinhanhs','khuvuc'])
            ->where('trangThai','đã duyệt') 
            ->findOrFail($id);

        return view('users.detail', compact('bds'));
    }
}
