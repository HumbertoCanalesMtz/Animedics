<?php
include_once 'app/Sesion.inc.php';
$componentes_url = parse_url($_SERVER["REQUEST_URI"]);
$ruta = $componentes_url['path'];
$partes_ruta = explode('/', $ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);

$ruta_elegida = "views/404.php";

if($partes_ruta[0] == 'Animedics'){
    //Rutas de los administradores
    if(Sesion::sesion_iniciada()){
    if($_SESSION['rol'] == '1'){
        if(count($partes_ruta) == 1){
            $ruta_elegida = "views_admin/home.php";
        } else if(count($partes_ruta) == 2){
            switch($partes_ruta[1]){    
                case 'index':
                    $ruta_elegida = "views_admin/home.php";
                    break;
                case 'logout':
                    $ruta_elegida = "views/logout.php";
                    break;
                case 'administracion':
                    $ruta_elegida = "views_admin/administracion.php";
                    break;
                case 'verusuarios':
                    $ruta_elegida = "views_admin/usuarios.php";
                    break;
                case 'registrar':
                    $ruta_elegida = "views_admin/registrar.php";
                    break;    
                case 'perfil':
                    $ruta_elegida = "views_admin/perfil.php";
                    break;
                case 'citas':
                    $ruta_elegida = "views_admin/home.php";
                    break;
                case 'ver-cita':
                    $ruta_elegida = "views_admin/ver_cita.php";
                    break;
                case 'registro':
                    $ruta_elegida = "views_admin/registro.php";
                    break;
                case 'agendar-cita':
                    $ruta_elegida = "views_admin/agendar_cita_admin.php";
                    break;    
            }
        }
    //Rutas de los veterinarios
    } else if ($_SESSION['rol'] == '2'){
        if(count($partes_ruta) == 1){
            $ruta_elegida = "views_vet/home.php";
        } else if(count($partes_ruta) == 2){
            switch($partes_ruta[1]){    
                case 'index':
                    $ruta_elegida = "views_vet/home.php";
                    break;
                case 'logout':
                    $ruta_elegida = "views/logout.php";
                    break;
                case 'citas':
                    $ruta_elegida = "views_vet/home.php";
                    break;
                case 'perfil':
                    $ruta_elegida = "views_vet/perfil.php";
                    break;
                case 'ver-cita':
                    $ruta_elegida = "views_vet/ver_cita.php";
                    break;
                case 'agendar-cita':
                    $ruta_elegida = "views_vet/agendar_cita_vet.php";
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
                case 'agendar-cita':
                    $ruta_elegida = "views/agendar_cita.php";
                    break;
                case 'mascotas':
                    $ruta_elegida = "views/mascotas.php";
                    break;
                case 'perfil':
                    $ruta_elegida = "views/perfil.php";
                    break;
                case 'buscar-cita':
                    $ruta_elegida = "views/buscar_cita.php";
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
    //Rutas de los invitados
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
                $ruta_elegida = "views/home.php";
                break;
            case 'agendar-cita':
                $ruta_elegida = "views/agendar_cita_inv.php";
                break;    
            case 'buscar-cita':
                $ruta_elegida = "views/buscar_cita.php";
                break;
            case 'mascotas':
                $ruta_elegida = "views/home.php";
                break;
            case 'perfil':
                $ruta_elegida = "views/home.php";
                break;    
        }
    } 
}
}
include_once $ruta_elegida;