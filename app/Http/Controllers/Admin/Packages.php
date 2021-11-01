<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\TermiiSms;
use Illuminate\Support\Facades\DB;

class Packages extends Controller
{
    //
    public function create_view(){
        $cat = DB::select('SELECT * from category where status = ?', [1]);
        return view('admin.package.create')->with('data', ['cat' => $cat]);
    }

    public function create_now(Request $request){
        $cat = $request->cat;
        $p_name = $request->p_name;
        $route_name = $request->route_name;
        $duration = $request->duration;
        $amount = $request->amount;
        $mini_desc = $request->mini_desc;
        $image = $request->image;
        $other_image = $request->other_image;

        $amount_type = 1;
        $second_amount = 0;
        $currency = 'NGN';

        // confirm image upload for main

        try {
            // move logic
            $image_fileName = time().".".$image->extension();

            if( !($image->move(public_path('auto_images/packages'),$image_fileName)) ){
                //error
                return response()->json(['status'=>0, 'message'=>'error uploading image'],200);
            }

            // insert into db
            if(!(DB::insert('INSERT into packages (c_id, p_name, p_route_name, p_desc, p_image, duration, amount_type, amount_one, amount_two, currency) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
            [$cat, $p_name, $route_name, $mini_desc, $image_fileName, $duration, $amount_type, $amount, $second_amount, $currency]))){

            }else{
                // get uploaded package id
                $p_id = (DB::select('SELECT * from packages where p_name = ? && p_image = ?', [$p_name, $image_fileName]))[0]->p_id;
                // randomly add sub images
                if(is_array($other_image)){
                    foreach ($other_image as $dt) {
                        // add image to server then add to dB record
                        // move logic for sub
                        $image_fileName_sub = time().".".$dt->extension();

                        if( !($dt->move(public_path('auto_images/packages_other'),$image_fileName_sub)) ){
                            //error
                            return response()->json(['status'=>0, 'message'=>'error uploading image'],200);
                        }

                        DB::insert('INSERT into package_other_images (p_id, images) values (?, ?)', [$p_id, $image_fileName_sub]);
                    }
                }else{
                    // die($other_image);
                    if(is_file($other_image)){
                        $image_fileName_sub = time().".".$other_image->extension();

                        if( !($other_image->move(public_path('auto_images/packages_other'),$image_fileName_sub)) ){
                            //error
                            return response()->json(['status'=>0, 'message'=>'error uploading image'],200);
                        }

                        DB::insert('INSERT into package_other_images (p_id, images) values (?, ?)', [$p_id, $image_fileName_sub]);
                    }
                }
            }

        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }

        return redirect('admin/view-packages');
    }

    public function view_packages(){
        $data = DB::select('SELECT * from packages AS a INNER JOIN category AS b ON a.c_id=b.c_id ORDER BY a.c_id ASC', []);
        return view('admin.package.view')->with('data', ['data'=> $data]);
    }

    public function edit_view($p_id){
        $cat = DB::select('SELECT * from category where status = ?', [1]);
        $data = DB::select('SELECT * from packages WHERE p_id = ?', [$p_id])[0];
        $data_other = DB::select('SELECT * from package_other_images WHERE p_id = ?', [$p_id]);
        return view('admin.package.edit')->with('data', ['data'=> $data, 'others' => $data_other, 'cat' => $cat]);
    }

    public function edit_now($p_id, Request $request){
        $cat = $request->cat;
        $p_name = $request->p_name;
        $route_name = $request->route_name;
        $duration = $request->duration;
        $amount = $request->amount;
        $mini_desc = $request->mini_desc;
        $image = $request->image;
        $other_image = $request->other_image;

        $amount_type = 1;
        $second_amount = 0;
        $currency = 'NGN';

        // logic for update
        if($image == ''){
            // image not being changed
            DB::update('UPDATE packages SET c_id = ?, p_name = ?, p_route_name = ?, p_desc = ?, duration = ?, amount_type = ?, amount_one = ?, amount_two = ?, currency = ? WHERE p_id = ?',
            [$cat, $p_name, $route_name, $mini_desc, $duration, $amount_type, $amount, $second_amount, $currency, $p_id]);
        }else{
            // image being changed
            // move logic
            $image_fileName = time().".".$image->extension();

            if( !($image->move(public_path('auto_images/packages'),$image_fileName)) ){
                //error
                return response()->json(['status'=>0, 'message'=>'error uploading image'],200);
            }

            DB::update('UPDATE packages SET c_id = ?, p_name = ?, p_route_name = ?, p_desc = ?, duration = ?, amount_type = ?, amount_one = ?, amount_two = ?, currency = ?, p_image = ? WHERE p_id = ?',
            [$cat, $p_name, $route_name, $mini_desc, $duration, $amount_type, $amount, $second_amount, $currency, $image_fileName, $p_id]);

        }

        // logic for add more image
        // randomly add sub images
        if(is_array($other_image)){
            foreach ($other_image as $dt) {
                // add image to server then add to dB record
                // move logic for sub
                $image_fileName_sub = time().".".$dt->extension();

                if( !($dt->move(public_path('auto_images/packages_other'),$image_fileName_sub)) ){
                    //error
                    return response()->json(['status'=>0, 'message'=>'error uploading image'],200);
                }

                DB::insert('INSERT into package_other_images (p_id, images) values (?, ?)', [$p_id, $image_fileName_sub]);
            }
        }else{
            // die($other_image);
            if(is_file($other_image)){
                $image_fileName_sub = time().".".$other_image->extension();

                if( !($other_image->move(public_path('auto_images/packages_other'),$image_fileName_sub)) ){
                    //error
                    return response()->json(['status'=>0, 'message'=>'error uploading image'],200);
                }

                DB::insert('INSERT into package_other_images (p_id, images) values (?, ?)', [$p_id, $image_fileName_sub]);
            }
        }

        return redirect('admin/view-packages');
    }

    public function delete_po_now($po_id){
        DB::delete('DELETE FROM package_other_images where po_id = ?', [$po_id]);
        return back();
    }
}
