<?php
    namespace App\Http\TermiiSms;

    class TermiiSms{
        public static function getUser(){
            $id = base64_decode($_COOKIE[(sha1('user_id_in_zubi_venture'))]);
        }
    }
?>
