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
            return view('guest.signin')->with('error', 'Account Not Found ');
        }
    }
}
