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
        return view('guest.signin');
    }

    public function signin_now(Request $request){
        $email = $request->email;
        $password = $request->password;

        if($email == ''){
            return view('guest.signin')->with('error', 'E-mail is required');
        }
        if($password == ''){
            return view('guest.signin')->with('error', 'Password is required');
        }

        $db = DB::select('SELECT * from investors where i_email = ? AND i_password = ?', [strtolower($email), sha1(strtolower($password))]);
        if( count($db) == 0 ){
            return view('guest.signin')->with('error', 'Account Not Found');
        }

        if( intval($db[0]->i_status) != 1 ){
            return view('guest.signin')->with('error', 'Account has been suspended, Contact Admin for inquiries');
        }



        // store info into cookie then re-direct
        setcookie(sha1('is_user_signed_in_zubi_venture'),sha1('truly_signed_in'), (time() + (86400 * 365) ),"/");
        setcookie(sha1('user_id_in_zubi_venture'),base64_encode($db[0]->i_id), (time() + (86400 * 365) ),"/");
        setcookie(sha1('user_code_in_zubi_venture'),base64_encode($db[0]->code), (time() + (86400 * 365) ),"/");
        setcookie(sha1('user_name_in_zubi_venture'),base64_encode($db[0]->i_name), (time() + (86400 * 365) ),"/");
        setcookie(sha1('user_email_in_zubi_venture'),base64_encode($db[0]->i_email), (time() + (86400 * 365) ),"/");
    }
}
