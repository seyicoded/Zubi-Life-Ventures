<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\TermiiSms\TermiiSms as TermiiSmsTermiiSms;

class Logic1 extends Controller
{
    public function view_categories($route_name){
        // echo $route_name;
        // get category information
        $cat_ = DB::select('SELECT * from category where route_name = ?', [$route_name]);
        if(count($cat_) == 0){
            return response('', 404);
        }
        $cat_dt = $cat_[0];
        $packages = DB::select('SELECT * from packages where c_id = ? AND status = 1', [$cat_dt->c_id]);
        return view('user.category')->with('data', ['cat' => $cat_dt, 'packages' => $packages]);
    }

    public function activate_subscription(Request $request){
        $p_id = $request->p_id;
        $user_data = TermiiSmsTermiiSms::getUser();
    }
}
