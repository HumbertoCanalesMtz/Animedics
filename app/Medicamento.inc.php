<?php

class Medicamento {
    private $nombre;
    private $dosis;
    private $horas;
    private $dias;

    public function __construct($nombre, $dosis, $horas, $dias){
        $this -> nombre = $nombre;
        $this -> dosis = $dosis;
        $this -> horas = $horas;
        $this -> dias = $dias;
    }

    public function obtener_nombre() {
        return $this -> nombre;
    }
    public function obtener_dosis(){
        return $this -> dosis;
    }
    public function obtener_horas(){
        return $this -> horas;
    }
    public function obtener_dias(){
        return $this -> dias;
    }
}