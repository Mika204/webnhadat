<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BatDongSan;

class HomeController extends Controller
{
    public function index()
    {
        $list = BatDongSan::paginate(6);
        return view('users.home', compact('list'));
    }

}

