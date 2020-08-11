<?php
//Esta clase contiene métodos que sirven para validar que el inicio de sesión sea correcto.
include_once 'RepositorioUsuario.inc.php';

class ValidadorLogin {
    private $usuario;
    private $error;

    public function __construct($nom_o_correo, $clave, $conexion){
        $this -> error = '';
        if (!$this -> variable_iniciada($nom_o_correo) || !$this -> variable_iniciada($clave)){
            $this -> usuario = null;
            $this -> error = "Debes introducir tu email y contraseña";  
        } else{
            $this -> usuario = RepositorioUsuario::obtener_usuario($conexion, $nom_o_correo);
            if(is_null($this -> usuario) || !password_verify($clave, $this -> usuario -> obtener_clave())){
                $this -> error = "Datos incorrectos";
            }
        }
    }
    public function variable_iniciada($variable){
        if (isset($variable) && !empty($variable)){
            return true;
        } else {
            return false;
        }
    }
    public function obtener_usuario(){
        return $this -> usuario;
    }
    public function obtener_error(){
        return $this -> error;
    }
    public function mostrar_error(){
        if ($this -> error !==''){
            echo "<br><div class='alert alert-danger' role='alert'>".$this -> error."</div>";
        }
    }
}