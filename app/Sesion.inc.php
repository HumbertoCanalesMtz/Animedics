<?php
//Esta clase se utiliza para controlar las sesiones del navegador. Se encarga de iniciar, cerrar y recuperar sesiones iniciadas.
class Sesion{
    public static function iniciar_sesion($id_usuario, $nombre_usuario, $rol){
        if(session_id() == ''){
            session_start();
        }
        $_SESSION['id_usuario'] = $id_usuario;
        $_SESSION['nombre_usuario'] = $nombre_usuario;
        $_SESSION['rol'] = $rol;
    }
    public static function cerrar_sesion(){
        if(session_id() == ''){
            session_start();
        }
        if(isset($_SESSION['id_usuario'])){
            unset($_SESSION['id_usuario']);
        }
        if(isset($_SESSION['nombre_usuario'])){
            unset($_SESSION['nombre_usuario']);
        }
        if(isset($_SESSION['rol'])){
            unset($_SESSION['rol']);
        }
        session_destroy();
    }
    public static function sesion_iniciada(){
        if(session_id() == ''){
            session_start();
        }
        if(isset($_SESSION['id_usuario']) && isset($_SESSION['nombre_usuario']) && isset($_SESSION['rol'])){
            return true;
        } else{
            return false;
        }
    }
}