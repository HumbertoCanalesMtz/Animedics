<?php
//Clase que contiene métodos para validar el cambio de contraseña del usuario.

include_once 'RepositorioUsuario.inc.php';

class ValidadorClave{
    private $clave;

    private $error_contraseña_1;
    private $error_contraseña_2;

    private $alerta_inicio;
    private $alerta_cierre;

    public function __construct($clave_ing, $clave_bd, $clave_1, $clave_2){
        $this -> clave = "";
        $this -> error_clave_ing = $this -> validar_clave_ing($clave_ing, $clave_bd);
        $this -> error_clave_1 = $this -> validar_clave_1($clave_1);
        $this -> error_clave_2 = $this -> validar_clave_2($clave_1, $clave_2);
        $this -> alerta_inicio = "<tr><td colspan=2><div class='alert alert-danger' role='alert'>";
        $this -> alerta_cierre = "</div></td></tr>";
    }

    public function variable_iniciada($variable){
        if (isset($variable) && !empty($variable)){
            return true;
        } else {
            return false;
        }
    }

    public function validar_clave_ing($clave_ing, $clave_bd){
        if(!$this -> variable_iniciada($clave_ing)){
            return "Debes ingresar tu contraseña anterior";
        }
        if(!password_verify($clave_ing, $clave_bd)){
            return "La contraseña es incorrecta";
        }
        return "";
    }
    public function validar_clave_1($clave_1){
        if(!$this -> variable_iniciada($clave_1)){
            return "Debes ingresar una nueva contraseña";
        }
        if(strlen($clave_1) < 8){
            return "La contraseña puede tener menos de 8 caracteres";
        }
        if(strlen($clave_1) > 30){
            return "La contraseña no puede tener más de 30 caracteres";
        }
        return "";
    }
    public function validar_clave_2($clave_1, $clave_2){
        if(!$this -> variable_iniciada($clave_1)){
            $this -> error_clave_1 = "";
            return "Debes ingresar una nueva contraseña primero";
        }
        if(!$this -> variable_iniciada($clave_2)){
            return "Debes repetir la nueva contraseña";
        }
        if($clave_1 !== $clave_2){
            return "Las contraseñas no coinciden";
        } else{
            $this -> clave = $clave_1;
        }
        return "";
    }
    
    public function obtener_clave(){
        return $this -> clave;
    }
    
    public function mostrar_error_clave_ing(){
        if($this -> error_clave_ing !== ""){
            echo $this -> alerta_inicio . $this -> error_clave_ing . $this -> alerta_cierre;
        }
    }
    public function mostrar_error_clave_1(){
        if($this -> error_clave_1 !== ""){
            echo $this -> alerta_inicio . $this -> error_clave_1 . $this -> alerta_cierre;
        }
    }
    public function mostrar_error_clave_2(){
        if($this -> error_clave_2 !== ""){
            echo $this -> alerta_inicio . $this -> error_clave_2 . $this -> alerta_cierre;
        }
    }

    public function validar_clave(){
        if($this -> error_clave_ing === "" & $this -> error_clave_1 === "" && $this -> error_clave_2 === ""){
            return true;
        } else{ 
            return false;
        }
    }
}