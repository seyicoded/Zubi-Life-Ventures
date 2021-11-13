<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\TermiiSms;

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
        $user_data = TermiiSms::getUser();
        $i_id = $user_data->i_id;
        $tnx_ref = strtotime('now').'-'.rand(0, 10).rand(0, 10);
        // get package info
        $p_data = DB::select('SELECT * from packages where p_id = ?', [$p_id])[0];
        // try to get link for payment
        $email = $user_data->i_email;
        $amount = $p_data->amount_one;
        $paystack_returned = TermiiSms::initial_pay($email, $amount, $tnx_ref);
    }
}
