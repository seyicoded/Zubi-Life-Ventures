<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\TermiiSms;
use Illuminate\Support\Facades\DB;

class Auth extends Controller
{
    //
    public function login_admin(Request $request){
        if($request->email == ""){
            return response()->json(["status"=> 0, "message"=>"email is required"], 200);
        }

        if($request->password == ""){
            return response()->json(["status"=> 0, "message"=>"password is required"], 200);
        }

        $username = $request->email;
        $password = $request->password;
        $password = sha1($password);
        //run checker
        $res_data = DB::select('SELECT * from admins where a_username = ? && a_password = ?', [$username, $password]);
        if(count($res_data) != 0){
            //found process info to cookies
            //$_COOKIE[sha1('is_admin_signed_in_medoncall')]
            //login user for a year'
            if(intval($res_data[0]->a_status) == 1){
                setcookie(sha1('is_admin_signed_in_zubi_venture'),sha1('admin_signed_in'), (time() + (86400 * 365) ),"/");
                setcookie(sha1('zn_admin_id'),base64_encode($res_data[0]->a_id), (time() + (86400 * 365) ),"/");
                return redirect(url('/admin'));
            }else{
                return view('screens.unauth.login')->with('error', 'Account Suspended');
                // return response()->json(["status"=> 2, "message"=>"Account Suspended"], 200);
            }

        }else{
            return view('screens.unauth.login')->with('error', 'account not found on server');
            // return response()->json(["status"=> 0, "message"=>"account not found on server"], 200);
        }
    }

    public function logout_now(){
        setcookie(sha1('is_admin_signed_in_zubi_venture'),'', (time() - (86400 * 765) ),"/");
        setcookie(sha1('zn_admin_id'),'', (time() - (86400 * 765) ),"/");
        return redirect(url('/admin'));
    }
}
