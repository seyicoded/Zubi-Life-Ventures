<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\TermiiSms;
use Illuminate\Support\Facades\DB;

class Categories extends Controller
{
    //
    public function create_view(){
        return view('admin.category.create');
    }

    public function create_now(Request $request){
        $cat_name = $request->cat_name;
        $route_name = $request->route_name;
        $icon_name = $request->icon_name;
        $mini_desc = $request->mini_desc;
        $file = $request->image;

        try {
            // move logic
            $image_fileName = time().".".$file->extension();

            if( !($file->move(public_path('auto_images/category'),$image_fileName)) ){
                //error
                return response()->json(['status'=>0, 'message'=>'error uploading image'],200);
            }

            // insert into db
            DB::insert('INSERT into category (route_name, category_name, icon_name, mini_desc, main_image) values (?, ?, ?, ?, ?)',
            [$route_name, $cat_name, $icon_name, $mini_desc, $image_fileName]);
        } catch (\Throwable $th) {
            //throw $th;
        }

        return redirect('admin/view-category');
    }

    public function view_all(){
        $db = DB::select('SELECT * from category ORDER BY c_id DESC', []);
        return view('admin.category.view')->with('data', ['data'=> $db]);
    }

    public function edit_view($c_id){
        $db = DB::select('SELECT * from category WHERE c_id = ? ORDER BY c_id DESC', [$c_id])[0];
        return view('admin.category.edit')->with('data', ['data'=> $db]);
    }
    public function edit_now($c_id, Request $request){
        $cat_name = $request->cat_name;
        $route_name = $request->route_name;
        $icon_name = $request->icon_name;
        $mini_desc = $request->mini_desc;
        $file = $request->image;

        if($file == ''){
            // no image updating
            DB::update('UPDATE category set route_name = ?, category_name = ?, icon_name = ?, mini_desc = ? where c_id = ?',
            [$route_name, $cat_name, $icon_name, $mini_desc, $c_id]);
        }else{
            // image updating
            // move logic
            $image_fileName = time().".".$file->extension();

            if( !($file->move(public_path('auto_images/category'),$image_fileName)) ){
                //error
                return response()->json(['status'=>0, 'message'=>'error uploading image'],200);
            }

            DB::update('UPDATE category set route_name = ?, category_name = ?, icon_name = ?, mini_desc = ?, main_image = ? where c_id = ?',
            [$route_name, $cat_name, $icon_name, $mini_desc, $image_fileName, $c_id]);

        }

        return redirect('/admin/view-category');
    }
}
