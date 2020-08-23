<?php
//Esta clase se utiliza para controlar las sesiones del navegador. Se encarga de iniciar, cerrar y recuperar sesiones iniciadas.
class Sesion{
    public static function iniciar_sesion($id_usuario, $nombre_usuario, $rol){
        include_once 'RepositorioUsuario.inc.php';
        include_once 'Conexion.inc.php';
        if(session_id() == ''){
            header('Cache-Control: no-cache');
            session_cache_limiter('private, must-revalidate');
            session_start();
        }
        $_SESSION['id_usuario'] = $id_usuario;
        $_SESSION['nombre_usuario'] = $nombre_usuario;
        Conexion::abrir_conexion();
        $_SESSION['id_persona'] = RepositorioUsuario::obtener_id_persona(Conexion::obtener_conexion(), $id_usuario);
        Conexion::cerrar_conexion();
        $_SESSION['rol'] = $rol;
    }
    public static function cerrar_sesion(){
        if(session_id() == ''){
            header('Cache-Control: no-cache');
            session_cache_limiter('private, must-revalidate');
            session_start();
        }
        if(isset($_SESSION['id_usuario'])){
            unset($_SESSION['id_usuario']);
        }
        if(isset($_SESSION['nombre_usuario'])){
            unset($_SESSION['nombre_usuario']);
        }
        if(isset($_SESSION['id_persona'])){
            unset($_SESSION['id_persona']);
        }
        if(isset($_SESSION['rol'])){
            unset($_SESSION['rol']);
        }
        session_destroy();
    }
    public static function sesion_iniciada(){
        if(session_id() == ''){
            header('Cache-Control: no-cache');
            session_cache_limiter('private, must-revalidate');
            session_start();
        }
        if(isset($_SESSION['id_usuario']) && isset($_SESSION['nombre_usuario']) && isset($_SESSION['id_persona']) && isset($_SESSION['rol'])){
            return true;
        } else{
            return false;
        }
    }
}