<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BatDongSan;

class HomeController extends Controller
{
    public function index()
    {
        $batdongsan = Batdongsan::all();
        return view('users.home', compact('batdongsan'));
    }

}

