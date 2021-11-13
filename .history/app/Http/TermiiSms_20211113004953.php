<?php
    namespace App\Http;

    use Illuminate\Support\Facades\DB;

    class TermiiSms{
        public static function getUser(){
            $id = base64_decode($_COOKIE[(sha1('user_id_in_zubi_venture'))]);
            return (DB::select('SELECT * from investors where i_id = ?', [$id]))[0];
        }

        public static function initial_pay($email, $amount, $tnx_ref){

        }
    }

