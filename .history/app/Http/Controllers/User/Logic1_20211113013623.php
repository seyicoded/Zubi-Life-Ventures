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
        if(!($paystack_returned->status)){
            die($paystack_returned->message);
        }

        $url_to_pay = $paystack_returned->data->authorization_url;

        // store info in database
        if( !(DB::insert('INSERT into investors_packages_linker (i_id, p_id, duration_count, tnx_ref, amount_to_pay, email)
        values (?, ?, ?, ?, ?, ?)', [$i_id, $p_id, $p_data->duration, $tnx_ref, $p_data->amount_one, $email])) ){
            die('an error occurred');
        }
        // return url
        return redirect($url_to_pay);
    }

    public function validate_payment(Request $request){
        $trxref = $request->trxref;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$trxref",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer ".env('PAYSTACK_SECRET'),
            "Cache-Control: no-cache",
            ),
        ));

        $result = curl_exec($curl);
        $result = json_decode($result);
        // return $result->status;

        if($result->status){
            if($result->data->status == 'success'){
                // get investor email
                // get card info to update record then set status to 1: on-going,
                $authorize = $result->data->authorization;
                DB::update('UPDATE investors_packages_linker set last_four_card_numb = ?, reusable = ?, auth_code = ?, status = ? where tnx_ref = ?',
                [$authorize->last4, $authorize->reusable, $authorize->authorization_code, 1, $trxref]);

                return redirect('/my-transaction');
            }
        }else{
            die($result->message);
        }
    }

    public function my_transaction(){

    }
}
