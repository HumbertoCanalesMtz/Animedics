<?php

class Datos {
    private $id_datos;
    private $sintomas;
    private $temperatura;
    private $peso;
    private $diagnostico;
    private $abdomen;
    private $org_int;
    private $org_ext;
    private $operado;
    private $deshidratacion;

    public function __construct($id_datos,$sintomas,$temperatura,$peso,$diagnostico,$abdomen,$org_int,$org_ext,$operado,$deshidratacion){
        $this -> id_datos = $id_datos;
        $this -> sintomas = $sintomas;
        $this -> temperatura = $temperatura;
        $this -> peso = $peso;
        $this -> diagnostico = $diagnostico;
        $this -> abdomen = $abdomen;
        $this -> org_int = $org_int;
        $this -> org_ext = $org_ext;
        $this -> operado = $operado;
        $this -> deshidratacion = $deshidratacion;
    }
    public function obtener_id_datos() {
        return $this -> id_datos;
    }  
    public function obtener_sintomas() {
        return $this -> sintomas;
    }
    public function obtener_temperatura(){
        return $this -> temperatura;
    }
    public function obtener_peso(){
        return $this -> peso;
    }
    public function obtener_diagnostico(){
        return $this -> diagnostico;
    }
    public function obtener_abdomen(){
        return $this -> abdomen;
    }
    public function obtener_org_int(){
        return $this -> org_int;
    }
    public function obtener_org_ext(){
        return $this -> org_ext;
    }
    public function obtener_operado(){
        return $this -> operado;
    }
    public function obtener_deshidratacion(){
        return $this -> deshidratacion;
    }
}