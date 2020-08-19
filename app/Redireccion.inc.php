<?php
//Esta clase contiene un único método que se utiliza para redireccionar al usuario a páginas diferentes.
class Redireccion{
    public static function redirigir($url){
        header('Location:'. $url, true, 301);
        die();
    }
}

