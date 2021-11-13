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
        $password = sha1(strtolower($request->password));

        DB::insert('INSERT into investors (a_id, i_name, i_email, i_password, i_phone, code) values (?, ?, ?, ?, ?, ?)',
        [$a_id, $name, $email, $password, $phone, strtotime('now')]);

        return redirect('admin/view-investors');
    }

    public function view_investors(){
        $a_id = base64_decode($_COOKIE[sha1('zn_admin_id')]);
        $admin_data = DB::select('SELECT * from admins where a_id = ?', [$a_id])[0];
        $role = intval($admin_data->role);

        $data = [];
        if($role == 1){
            $data = DB::select('SELECT * from investors where i_status = ? ORDER BY i_id DESC', [1]);
        }else{
            $data = DB::select('SELECT * from investors where i_status = ? AND a_id = ? ORDER BY i_id DESC', [1, $a_id]);
        }

        return view('admin.investor.view')->with('data',['a_id' => $a_id, 'data' => $data]);
    }

    public function view_investors_under($a_id){
        $data = DB::select('SELECT * from investors where i_status = ? AND a_id = ? ORDER BY i_id DESC', [1, $a_id]);
        return view('admin.investor.view')->with('data',['a_id' => $a_id, 'data' => $data]);
    }

    public function edit_investor($i_id){
        $data = DB::select('SELECT * from investors where i_id = ?', [$i_id])[0];
        return view('admin.investor.edit')->with('data',['data' => $data]);
    }

    public function edit_investor_now($i_id, Request $request){
        $a_id = base64_decode($_COOKIE[sha1('zn_admin_id')]);
        $name = $request->name;
        $phone = $request->phone;
        $email = strtolower($request->email);
        $password = sha1(strtolower($request->password));

        if($password == ''){
            // password not sent
            DB::update('UPDATE investors set i_name = ?, i_email = ?, i_phone = ? where i_id = ?',
            [$name, $email, $phone, $i_id]);
        }else{
            // password sent
            DB::update('UPDATE investors set i_name = ?, i_email = ?, i_password = ?, i_phone = ? where i_id = ?',
            [$name, $email, $password, $phone, $i_id]);
        }

        return redirect('admin/view-investors');
    }

    public function view_subscription($i_id){
        $db = DB::select('SELECT * from investors_packages_linker where i_id = ?', [$i_id]);
        return view('admin.subscription.view')->with('data',['db' => $db]);
    }

    public function cancel_subscription($tnx_ref){
        DB::update('UPDATE investors_packages_linker set status = 3 where tnx_ref = ?', [$tnx_ref]);
        return back();
    }
}
