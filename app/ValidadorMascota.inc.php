<?php
//Clase que contiene métodos para validar el cambio de contraseña del usuario.

include_once 'RepositorioUsuario.inc.php';

class ValidadorMascota{
    private $clave;


    private $alerta_inicio;
    private $alerta_cierre;

    public function __construct($conexion, $nombre, $edad){
        $this -> nombre = $this -> edad = "" ;
        $this -> error_nombre = $this -> validar_nombre($conexion, $nombre);
        $this -> error_edad = $this -> validar_edad($edad);
        $this -> alerta_inicio = "<tr colspan=2><td><div class='alert alert-danger' role='alert'>";
        $this -> alerta_cierre = "</div></td></tr>";
    }

    public function variable_iniciada($variable){
        if (isset($variable) && !empty($variable)){
            return true;
        } else {
            return false;
        }
    }

    public function validar_nombre($conexion, $nombre){
        if(!$this -> variable_iniciada($nombre)){
            return "Debes ingresar un nombre para tu mascota";
        } else{
            $this -> nombre = $nombre;
        }
        if(strlen($nombre) > 50){
            return "El nombre no puede tener más de 50 caracteres";
        }
        if(!RepositorioMascota::mascota_duplicada(Conexion::obtener_conexion(), $nombre, $_SESSION['id_persona'])){
            return "Ya tienes una mascota registrada con ese nombre";
        }
        return "";
    }
    public function validar_edad($edad){
        if(!$this -> variable_iniciada($edad)){
            return "Debes ingresar la edad de tu mascota";
        } else{
            $this -> edad = $edad;
        }
        if($edad < 0){
            return "¡No existen las edades negativas!";
        }
        if($edad > 99){
            return "¡Todavía no atendemos tortugas! (Categoría: Comedia)";
        }
        return "";
    }
    
    public function obtener_nombre(){
        return $this -> nombre;
    }
    public function obtener_edad(){
        return $this -> edad;
    }

    public function mostrar_error_nombre(){
        if($this -> error_nombre !== ""){
            echo $this -> alerta_inicio . $this -> error_nombre . $this -> alerta_cierre;
        }
    }
    public function mostrar_error_edad(){
        if($this -> error_edad !== ""){
            echo $this -> alerta_inicio . $this -> error_edad . $this -> alerta_cierre;
        }
    }

    public function validar_mascota(){
        if($this -> error_nombre === "" && $this -> error_edad === ""){
            return true;
        } else{ 
            return false;
        }
    }
}