<?php
class Redireccion{
    public static function redirigir($url){
        header('Location:'. $url, true, 301);
        die();
    }
    public static function control_cache(){
        header('Cache-Control: no cache');
        session_cache_limiter('private_no_expire');
        session_start();
        die();
    }
}

