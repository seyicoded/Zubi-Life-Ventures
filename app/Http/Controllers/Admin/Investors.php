<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Investors extends Controller
{
    //
    public function create_investor(Request $request){
        $a_id = base64_decode($_COOKIE[sha1('zn_admin_id')]);
        return view('admin.investor.create')->with('data',['a_id' => $a_id]);
    }

    public function create_investor_now(Request $request){
        $a_id = base64_decode($_COOKIE[sha1('zn_admin_id')]);
        $name = $request->name;
        $phone = $request->phone;
        $email = strtolower($request->email);
        $password = strtolower($request->password);
    }
}
