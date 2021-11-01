<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\TermiiSms;
use Illuminate\Support\Facades\DB;

class Workers extends Controller
{
    //
    public function create_worker(){
        return view('admin.worker.create');
    }

    public function create_worker_now(Request $request){
        $worker_name = $request->worker_name;
        $username = strtolower($request->username);
        $password = strtolower($request->password);
        $phone = $request->phone;
        $role = 2;

        DB::insert('INSERT into admins (a_name, a_username, a_password, role, a_phone, a_status) values (?, ?, ?, ?, ?, ?)',
        [$worker_name, $username, sha1($password), $role, $phone, 1]);

        return redirect('admin/view-workers');
    }

    public function view_workers(){
        $list = DB::select('SELECT * from admins where role = ?', [2]);
        return view('admin.worker.view')->with('data', ['data' => $list]);
    }

    public function edit_view($a_id){
        $list = DB::select('SELECT * from admins where role = ? AND a_id = ?', [2, $a_id])[0];
        return view('admin.worker.edit')->with('data', ['data' => $list]);
    }

    public function edit_now($a_id, Request $request){
        $worker_name = $request->worker_name;
        $username = strtolower($request->username);
        $password = strtolower($request->password);
        $phone = $request->phone;

        if($password == ''){
            // ignore password change
            DB::update('UPDATE admins set a_name = ?, a_username = ?, a_phone = ? where a_id = ?', [$worker_name, $username, $phone, $a_id]);
        }else{
            DB::update('UPDATE admins set a_name = ?, a_username = ?, a_phone = ?, a_password = ? where a_id = ?', [$worker_name, $username, $phone, sha1($password),$a_id]);
        }

        // DB::insert('INSERT into admins (a_name, a_username, a_password, role, a_phone, a_status) values (?, ?, ?, ?, ?, ?)',
        // [$worker_name, $username, sha1($password), $role, $phone, 1]);

        return redirect('admin/view-workers');
    }
}
