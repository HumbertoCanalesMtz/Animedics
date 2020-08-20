<?php
$componentes_url = parse_url($_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
$ruta = $componentes_url['path'];
$partes_ruta = explode('/', $ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);

$ruta_elegida = "views/404.php";

if($partes_ruta[0] == '34.205.215.192'){
    //Rutas de los administradores
    if($_SESSION['rol'] == 1){
        if(count($partes_ruta) == 1){
            $ruta_elegida = "views/home.php";
        } else if(count($partes_ruta) == 2){
            switch($partes_ruta[1]){    
                case 'index':
                    $ruta_elegida = "views/home.php";
                    break;
                case 'login':
                    $ruta_elegida = "views/home.php";
                    break;
                case 'logout':
                    $ruta_elegida = "views/logout.php";
                    break;
                case 'registro':
                    $ruta_elegida = "views/registro.php";
                    break;
                case 'citas':
                    $ruta_elegida = "views/citas.php";
                    break;
                case 'citasfolio':
                    $ruta_elegida = "views/citasfolio.php";
                    break;
                case 'mascotas':
                    $ruta_elegida = "views/mascotas.php";
                    break;
                case 'perfil':
                    $ruta_elegida = "views/perfil.php";
                    break;    
            }
        }
    //Rutas de los veterinarios
    } else if ($_SESSION['rol'] == 2){
        if(count($partes_ruta) == 1){
            $ruta_elegida = "views/home.php";
        } else if(count($partes_ruta) == 2){
            switch($partes_ruta[1]){    
                case 'index':
                    $ruta_elegida = "views/home.php";
                    break;
                case 'login':
                    $ruta_elegida = "views/home.php";
                    break;
                case 'logout':
                    $ruta_elegida = "views/logout.php";
                    break;
                case 'registro':
                    $ruta_elegida = "views/registro.php";
                    break;
                case 'citas':
                    $ruta_elegida = "views/citas.php";
                    break;
                case 'mascotas':
                    $ruta_elegida = "views/mascotas.php";
                    break;
                case 'perfil':
                    $ruta_elegida = "views/perfil.php";
                    break;    
            }
        }
    //Rutas de los clientes
    } else{
        if(count($partes_ruta) == 1){
            $ruta_elegida = "views/home.php";
        } else if(count($partes_ruta) == 2){
            switch($partes_ruta[1]){    
                case 'index':
                    $ruta_elegida = "views/home.php";
                    break;
                case 'login':
                    $ruta_elegida = "views/home.php";
                    break;
                case 'logout':
                    $ruta_elegida = "views/logout.php";
                    break;
                case 'registro':
                    $ruta_elegida = "views/registro.php";
                    break;
                case 'citas':
                    $ruta_elegida = "views/citas.php";
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
}
include_once $ruta_elegida;
