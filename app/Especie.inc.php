<?php
include_once 'app/Mascota.inc.php';

class Especie{
    public static function seleccionar_imagen($mascota){
        switch($mascota -> obtener_especie()){
            case 1:
                $imagen = RUTA_IMG.'dogo.gif';
            break;
            case 2:
                $imagen = RUTA_IMG.'cato.gif';
        }
        return $imagen;
    }
}