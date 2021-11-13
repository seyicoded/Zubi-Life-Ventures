<?php
namespace App\Http;

use Illuminate\Support\Facades\DB;

class TermiiSms{
    public static function getUser(){
        $id = base64_decode($_COOKIE[(sha1('user_id_in_zubi_venture'))]);
        return (DB::select('SELECT * from investors where i_id = ?', [$id]))[0];
    }

    public static function cal($amount){
        $amount = intval($amount);
        $onefivepercent = (($amount) * 1.5) / 100;
        if($amount >1499){
            $amount = $amount + $onefivepercent + 100;
        }else{
            $amount = $amount + $onefivepercent;
        }

        return $amount;
    }

    public static function initial_pay($email, $amount, $tnx_ref){
        $amount = TermiiSms::cal($amount);
        // START PAYMENT PROCESS
        $url = "https://api.paystack.co/transaction/initialize";
        $fields = [
            'email' => $email,
            'amount' => $amount."00",
            'reference' => $tnx_ref,
            'callback_url' => url('callback1')
        ];
        $fields_string = http_build_query($fields);
        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer ".env('PAYSTACK_SECRET'),
            "Cache-Control: no-cache",
        ));

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

        //execute post
        $result = curl_exec($ch);
        $result = json_decode($result);
        // return $result->status;

        return $result;
        // END PAYMENT PROCESS
    }

    public static function auto_charge_now_logic($ip_id){
        $data = DB::select('SELECT * from investors_packages_linker where ip_id = ?', [$ip_id])[0];

        // charge card now
        $amount = $data->amount_to_pay;
        $amount = TermiiSms::cal($amount);
        $url = "https://api.paystack.co/transaction/charge_authorization";
        $fields = [
            'email' => $data->email,
            'amount' => $amount."00",
            "authorization_code" => $data->auth_code
        ];
        $fields_string = http_build_query($fields);
        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer SECRET_KEY",
            "Cache-Control: no-cache",
        ));

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

        //execute post
        $result = curl_exec($ch);
    }
}

