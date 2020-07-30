<?php

class Usuario {
    private $id_usuario;
    private $nombres;
    private $ap_paterno;
    private $ap_materno;
    private $correo;
    private $clave;
    private $nombre_usuario;
    private $telefono;
    private $rol;
    private $fecha_registro;

    public function __construct($id_usuario, $nombres, $ap_paterno, $ap_materno, $correo, $clave, $nombre_usuario, $telefono, $rol, $fecha_registro){
        $this -> id_usuario = $id_usuario;
        $this -> nombres = $nombres;
        $this -> ap_paterno = $ap_paterno;
        $this -> ap_materno = $ap_materno;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> nombre_usuario = $nombre_usuario;
        $this -> telefono = $telefono;
        $this -> rol = $rol;
        $this -> fecha_registro = $fecha_registro;
    }
    public function obtener_id_usuario() {
        return $this -> id_usuario;
    }  
    public function obtener_nombres() {
        return $this -> nombres;
    }
    public function obtener_ap_paterno(){
        return $this -> ap_paterno;
    }
    public function obtener_ap_materno(){
        return $this -> ap_materno;
    }
    public function obtener_correo(){
        return $this -> correo;
    }
    public function obtener_clave(){
        return $this -> clave;
    }
    public function obtener_nombre_usuario() {
        return $this -> nombre_usuario;
    }
    public function obtener_telefono(){
        return $this -> telefono;
    }  
    public function obtener_rol() {
        return $this -> rol;
    }
    public function obtener_fecha_registro() {
        return $this -> fecha_registro;
    }

    public function cambiar_nombres($nombres){
        $this -> nombres = $nombres;
    }
    public function cambiar_ap_paterno($ap_paterno){
        $this -> ap_paterno = $ap_paterno;
    }
    public function cambiar_ap_materno($ap_materno){
        $this -> ap_materno = $ap_materno;
    }           
    public function cambiar_correo($correo){
        $this -> correo = $correo;
    }   
    public function cambiar_clave($clave){
        $this -> clave = $clave;
    }
    public function cambiar_nombre_usuario($nombre_usuario){
        $this -> nombre_usuario = $nombre_usuario;
    }
    public function cambiar_telefono($telefono){
        $this -> telefono = $telefono;
    }    
    public function cambiar_rol($rol){
        $this -> rol = $rol;
    }    
}