<?php
//Esta clase contiene métodos para validar todos los campos del registro antes de registrar a un nuevo usuario en la BD. 
//La podemos simplificar y mejorar.

include_once 'RepositorioUsuario.inc.php';

class ValidadorPass{
    private $clave;

    private $error_contraseña_1;
    private $error_contraseña_2;

    private $alerta_inicio;
    private $alerta_cierre;

    public function __construct($clave_1, $clave_2){
        $this -> clave = "";
        $this -> error_clave_1 = $this -> validar_clave_1($clave_1);
        $this -> error_clave_2 = $this -> validar_clave_2($clave_1, $clave_2);
        $this -> alerta_inicio = "<br><br><br><div class='alert alert-danger' role='alert'>";
        $this -> alerta_cierre = "</div>";
    }

    public function variable_iniciada($variable){
        if (isset($variable) && !empty($variable)){
            return true;
        } else {
            return false;
        }
    }

    public function validar_clave_1($clave_1){
        if(!$this -> variable_iniciada($clave_1)){
            return "Debes ingresar una contraseña";
        }
        if(strlen($clave_1) < 8){
            return "La contraseña puede tener menos de 8 caracteres";
        }
        if(strlen($clave_1) > 30){
            return "El nombre no puede tener más de 30 caracteres";
        }
        return "";
    }
    public function validar_clave_2($clave_1, $clave_2){
        if(!$this -> variable_iniciada($clave_1)){
            $this -> error_clave_1 = "";
            return "Debes ingresar una contraseña primero";
        }
        if(!$this -> variable_iniciada($clave_2)){
            return "Debes repetir la contraseña ingresada";
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

    public function validar_registro(){
        if($this -> error_nombres === "" && $this -> error_ap_paterno === "" && $this -> error_ap_materno === "" && $this -> error_correo === "" &&
        $this -> error_clave_1 === "" && $this -> error_clave_2 === "" && $this -> error_nom_usuario === "" && $this -> error_telefono === ""){
            return true;
        } else{ 
            return false;
        }
    }
}