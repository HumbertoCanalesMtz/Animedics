<?php
//Esta clase sirve para crear objetos del tipo Mascota y trabajar de manera más cómoda con las mascotas, de manera similar a los usuarios.

class Mascota {
    private $id_animal;
    private $nombre;
    private $especie;
    private $edad;
    private $sexo;
    private $propietario;

    public function __construct($id_animal, $nombre, $especie, $edad, $sexo, $propietario){
        $this -> id_animal = $id_animal;
        $this -> nombre = $nombre;
        $this -> especie = $especie;
        $this -> edad = $edad;
        $this -> sexo = $sexo;
        $this -> propietario = $propietario;
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