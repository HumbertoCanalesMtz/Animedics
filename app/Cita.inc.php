<?php

class Cita {
    private $id_cita;
    private $folio;
    private $veterinario;
    private $mascota;
    private $fecha;
    private $hora;
    private $completada;

    public function __construct($id_cita, $folio, $veterinario, $mascota, $fecha, $hora, $completada){
        $this -> id_cita = $id_cita;
        $this -> folio = $folio;
        $this -> veterinario = $veterinario;
        $this -> mascota = $mascota;
        $this -> fecha = $fecha;
        $this -> hora = $hora;
        $this -> completada = $completada;
    }
    public function obtener_id_cita() {
        return $this -> id_cita;
    }  
    public function obtener_folio() {
        return $this -> folio;
    }
    public function obtener_veterinario(){
        return $this -> veterinario;
    }
    public function obtener_mascota(){
        return $this -> mascota;
    }
    public function obtener_fecha(){
        return $this -> fecha;
    }
    public function obtener_hora(){
        return $this -> hora;
    }
    public function obtener_completada(){
        return $this -> completada;
    }
}