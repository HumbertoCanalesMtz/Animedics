<?php
//Esta es la clase para los Usuarios. Como todos los atributos son privados hay muchas funciones para recuperar o cambiar los datos.

class Mascota {
    private $id_animal;
    private $nombre;
    private $especie;
    private $edad;
    private $sexo;
    private $propietario;

    public function __construct($id_animal, $nombre, $especie, $edad, $sexo, $propietario){
        $this -> id_usuario = $id_animal;
        $this -> nombres = $nombre;
        $this -> ap_paterno = $especie;
        $this -> ap_materno = $edad;
        $this -> correo = $sexo;
        $this -> clave = $propietario;
    }
    public function obtener_id_animal() {
        return $this -> id_animal;
    }  
    public function obtener_nombre() {
        return $this -> nombre;
    }
    public function obtener_especie(){
        return $this -> especie;
    }
    public function obtener_edad(){
        return $this -> edad;
    }
    public function obtener_sexo(){
        return $this -> sexo;
    }
    public function obtener_propietario(){
        return $this -> propietario;
    }
}