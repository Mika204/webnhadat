<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batdongsan;
use App\Models\Khuvuc;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $khuvucs = Khuvuc::all();
    
        $query = Batdongsan::with('hinhanhs')
            ->join('khuvuc','batdongsan.idKv','=','khuvuc.idKv')
            ->where('batdongsan.trangThai', 'đã duyệt') 
            ->whereDoesntHave('datlichhens', function($q) {
                $q->whereIn('trangThai', ['đã cọc', 'hoàn thành']);
            })
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
            ->whereDoesntHave('datlichhens', function($q) {
                $q->whereIn('trangThai', ['đã cọc', 'hoàn thành']);
            })
            ->findOrFail($id);

        return view('users.detail', compact('bds'));
    }
    public function search(Request $request)
    {
        $keyword = strtolower(trim($request->q));

        $batdongsans = collect();

        if ($keyword != '') {

            $batdongsans = Batdongsan::join('khuvuc','batdongsan.idKv','=','khuvuc.idKv')
                ->where('batdongsan.trangThai', 'đã duyệt')
                ->whereDoesntHave('datlichhens', function($q) {
                    $q->whereIn('trangThai', ['đã cọc', 'hoàn thành']);
                })
                ->where(function($query) use ($keyword){
                    $query->where(DB::raw('LOWER(tenBds)'), 'LIKE', "%$keyword%")
                          ->orWhere(DB::raw('LOWER(tenKv)'), 'LIKE', "%$keyword%");
                })
                ->select('batdongsan.*','khuvuc.tenKv')
                ->get();
        }

        return view('users.search', compact('batdongsans','keyword'));
    }
}