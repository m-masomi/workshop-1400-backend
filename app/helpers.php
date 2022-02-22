<?php

if (!function_exists('assets')){
    function assets($path){
        $base_path = 'http://localhost/Sites/workshop/';
        return $base_path.$path;
    }
}

if (!function_exists('str_random')){
    function str_random($length = 10){
        $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $char_len = strlen($chars);
        $random_str = '';
        for ($i = 0; $i < $length; $i++){
            $random_str .= $chars[rand(0, $char_len-1)];
        }

        return $random_str;
    }
}