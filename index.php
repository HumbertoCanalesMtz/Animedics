<?php
$componentes_url = parse_url($_SERVER["REQUEST_URI"]);
$ruta = $componentes_url['path'];
$partes_ruta = explode('/', $ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);

$ruta_elegida = "views/404.php";

if($partes_ruta[0] == 'Animedics'){
    if(count($partes_ruta) == 1){
        $ruta_elegida = "views/home.php";
    } else if(count($partes_ruta) == 2){
        switch($partes_ruta[1]){
            case 'login':
                $ruta_elegida = "views/login.php";
                break;
            case 'logout':
                $ruta_elegida = "views/logout.php";
                break;
            case 'registro':
                $ruta_elegida = "views/registro.php";
                break;
            case 'mascotas':
                $ruta_elegida = "views/mascotas.php";
                break;
            case 'perfil':
                $ruta_elegida = "views/perfil.php";
                break;    
        }
    }
}
include_once $ruta_elegida;