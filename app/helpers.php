<?php

if (!function_exists('assets')){
    function assets($path){
        $base_path = 'http://localhost/Sites/panel/';
        return $base_path.$path;
    }
}