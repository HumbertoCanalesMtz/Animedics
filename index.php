<?php
$componentes_url = parse_url($_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]);
$ruta = $componentes_url['path'];
$partes_ruta = explode('/', $ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);

/*$ruta_elegida = "views/404.php";

if($partes_ruta[0] == '34.230.52.161'){
    if(count($partes_ruta) == 1){
        $ruta_elegida = "views/home.php";
    } else if(count($partes_ruta) == 2){
        switch($partes_ruta[1]){    
            case '/index':
                $ruta_elegida = "views/home.php";
                break;
            case '/login':
                $ruta_elegida = "views/home.php";
                break;
            case '/logout':
                $ruta_elegida = "views/logout.php";
                break;
            case '/registro':
                $ruta_elegida = "views/registro.php";
                break;
            case '/cita':
                $ruta_elegida = "views/cita.php";
                break;
            case '/mascotas':
                $ruta_elegida = "views/mascotas.php";
                break;
            case '/perfil':
                $ruta_elegida = "views/perfil.php";
                break;    
        }
    }
}
include_once $ruta_elegida;*/

//Versión ayúdanos diosito

switch ($partes_ruta[0]) {
        case '34.230.52.161':
            $ruta_elegida = "views/home.php";
            break;
        case '34.230.52.161/login':
            $ruta_elegida = "views/home.php";
            break;
        case '34.230.52.161/logout':
            $ruta_elegida = "views/logout.php";
            break;
        case '34.230.52.161/registro':
            $ruta_elegida = "views/registro.php";
            break;
        case '34.230.52.161/cita':
            $ruta_elegida = "views/cita.php";
            break;
        case '34.230.52.161/mascotas':
            $ruta_elegida = "views/mascotas.php";
            break;
        case '34.230.52.161/perfil':
            $ruta_elegida = "views/perfil.php";
            break;    
        default:
            $ruta_elegida = "views/404.php";
            break;
}