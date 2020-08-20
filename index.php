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
        } else if(count($partes_ruta) == 3){
            if($partes_ruta[1] == 'citas'){
                include_once 'app/Conexion.inc.php';
                include_once 'app/RepositorioMascota.inc.php';
                $nombre = str_replace('-',' ', $partes_ruta[2]);
                Conexion::abrir_conexion();
                $mascota = RepositorioMascota::obtener_mascota_individual(Conexion::obtener_conexion(), $nombre, $_SESSION['id_usuario']);
                Conexion::cerrar_conexion();
                if(isset($mascota) && $mascota !== null){
                    $ruta_elegida = "views/citas.php";
                } else{
                    $ruta_elegida = "views/404.php";
                }
            }
        }
    }
}
include_once $ruta_elegida;
