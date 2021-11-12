<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Home extends Controller
{
    //
    public function home(){
        $cat = DB::select('SELECT * from category where status = ?', [1]);
        return view('welcome')->with('data', ['cat' => $cat]);
    }

    public function signin(){
        return view('welcome');
    }
}
