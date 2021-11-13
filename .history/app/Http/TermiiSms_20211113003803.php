<?php
    namespace App\Http\TermiiSms;

    use Illuminate\Support\Facades\DB;

    class TermiiSms{
        public static function getUser(){
            $id = base64_decode($_COOKIE[(sha1('user_id_in_zubi_venture'))]);
            return (DB::select('SELECT * from investors where i_id = ?', [$id]))[0];
        }
    }
?>
