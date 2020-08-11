<?php

class Sesion{
    public static function iniciar_sesion($id_usuario, $nombre_usuario, $usuario){
        if(session_id() == ''){
            session_start();
        }
        $_SESSION['id_usuario'] = $id_usuario;
        $_SESSION['nombre_usuario'] = $nombre_usuario;
        $_SESSION['nombres'] = $usuario ->  obtener_nombres();
        $_SESSION['ap_paterno'] = $usuario -> obtener_ap_paterno();
        $_SESSION['ap_materno'] = $usuario -> obtener_ap_materno();
        $_SESSION['correo'] = $usuario -> obtener_correo();
        $_SESSION['telefono'] = $usuario -> obtener_telefono();
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
        session_destroy();
    }
    public static function sesion_iniciada(){
        if(session_id() == ''){
            session_start();
        }
        if(isset($_SESSION['id_usuario']) && isset($_SESSION['nombre_usuario'])){
            return true;
        } else{
            return false;
        }
    }
}