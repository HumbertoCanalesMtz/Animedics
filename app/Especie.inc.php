<?php
//Esta clase sólo fue una solución rápida a las imagenes de cada especie.
include_once 'app/config.inc.php';
include_once 'app/Mascota.inc.php';

class Especie{
    public static function seleccionar_imagen($mascota){
        switch($mascota -> obtener_especie()){
            case 1:
                echo RUTA_IMG.'/dogo.gif';
            break;
            case 2:
                echo RUTA_IMG.'/cato.gif';
        }
    }
}