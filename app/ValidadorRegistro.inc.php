<?php
//Esta clase contiene métodos para validar todos los campos del registro antes de registrar a un nuevo usuario en la BD. 
//La podemos simplificar y mejorar.

include_once 'RepositorioUsuario.inc.php';

class ValidadorRegistro{
    private $nombres;
    private $ap_paterno;
    private $ap_materno;
    private $correo;
    private $clave;
    private $nom_usuario;
    private $telefono;

    private $error_nombres;
    private $error_ap_paterno;
    private $error_ap_materno;
    private $error_correo;
    private $error_contraseña_1;
    private $error_contraseña_2;
    private $error_nom_usuario;
    private $error_telefono;

    private $alerta_inicio;
    private $alerta_cierre;

    public function __construct($conexion, $nombres, $ap_paterno, $ap_materno, $correo, $clave_1, $clave_2, $nom_usuario, $telefono){
        $this -> nombres = $this -> ap_paterno = $this -> ap_materno = $this -> correo = $this -> clave = $this -> nom_usuario = $this -> telefono = "";
        $this -> error_nombres = $this -> validar_nombres($nombres);
        $this -> error_ap_paterno = $this -> validar_ap_paterno($ap_paterno);
        $this -> error_ap_materno = $this -> validar_ap_materno($ap_materno);
        $this -> error_correo = $this -> validar_correo($correo, $conexion);
        $this -> error_clave_1 = $this -> validar_clave_1($clave_1);
        $this -> error_clave_2 = $this -> validar_clave_2($clave_1, $clave_2);
        $this -> error_nom_usuario = $this -> validar_nom_usuario($nom_usuario, $conexion);
        $this -> error_telefono = $this -> validar_telefono($telefono, $conexion);
        $this -> alerta_inicio = "<br><br><br><div class='alert alert-danger' role='alert'>";
        $this -> alerta_cierre = "</div>";

        if($this -> error_clave_1 === "" && $this -> error_clave_2 === ""){
            $this -> clave == $clave_1;
        }
    }

    public function variable_iniciada($variable){
        if (isset($variable) && !empty($variable)){
            return true;
        } else {
            return false;
        }
    }

    public function validar_nombres($nombres){
        if(!$this -> variable_iniciada($nombres)){
            return "Debes ingresar tu(s) nombre(s)";
        } else {
            $this -> nombres = $nombres;
        }
        if(strlen($nombres) > 50){
            return "El nombre no puede tener más de 50 caracteres";
        }
        return "";
    }
    public function validar_ap_paterno($ap_paterno){
        if(!$this -> variable_iniciada($ap_paterno)){
            return "Debes ingresar tu apellido paterno";
        } else {
            $this -> ap_paterno = $ap_paterno;
        }
        if(strlen($ap_paterno) > 50){
            return "El apellido paterno no puede tener más de 50 caracteres";
        }
        return "";
    }
    public function validar_ap_materno($ap_materno){
        if(!$this -> variable_iniciada($ap_materno)){
            return "Debes ingresar tu apellido materno";
        } else {
            $this -> ap_materno = $ap_materno;
        }
        if(strlen($ap_materno) > 50){
            return "El apellido materno no puede tener más de 50 caracteres";
        }
        return "";
    }
    public function validar_correo($correo, $conexion){
        if(!$this -> variable_iniciada($correo)){
            return "Debes ingresar un correo electrónico";
        } else {
            $this -> correo = $correo;
        }
        if(strlen($correo) > 50){
            return "El correo no puede tener más de 50 caracteres";
        }
        if(!RepositorioUsuario::correo_disponible($conexion, $correo)){
            return "El correo ingresado ya está en uso.";
        }
        return "";
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
    public function validar_nom_usuario($nom_usuario, $conexion){
        if(!$this -> variable_iniciada($nom_usuario)){
            return "Debes ingresar tu(s) nombre(s)";
        } else {
            $this -> nom_usuario = $nom_usuario;
        }
        if(strlen($nom_usuario) < 6){
            return "El nombre no puede tener menos de 6 caracteres";
        }
        if(strlen($nom_usuario) > 30){
            return "El nombre no puede tener más de 30 caracteres";
        }
        if(!RepositorioUsuario::nombre_usuario_disponible($conexion, $nom_usuario)){
            return "El nombre de usuario ingresado ya está en uso.";
        }
        return "";
    }
    public function validar_telefono($telefono, $conexion){
        if($this -> variable_iniciada($telefono)){
            $this -> telefono = $telefono;
            if(strlen($telefono) !== 10){
                return "El numéro de teléfono debe contener 10 dígitos";
            }
        }
        if(!RepositorioUsuario::telefono_disponible($conexion, $telefono) && $this -> telefono != ""){
            return "El telefono ingresado ya está en uso.";
        }
        return "";
    }

    public function obtener_nombres(){
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
    public function obtener_nom_usuario(){
        return $this -> nom_usuario;
    }
    public function obtener_telefono(){
        if ($this -> telefono != ""){
            return $this -> telefono;
        } else{
            return null;
        }
    }

    public function obtener_error_nombres(){
        return $this -> error_nombres;
    }
    public function obtener_error_ap_paterno(){
        return $this -> error_ap_paterno;
    }
    public function obtener_error_ap_materno(){
        return $this -> error_ap_materno;
    }
    public function obtener_error_correo(){
        return $this -> error_correo;
    }
    public function obtener_error_nom_usuario(){
        return $this -> error_nom_usuario;
    }
    public function obtener_error_telefono(){
        return $this -> error_telefono;
    }

    public function mostrar_nombres(){
        if($this -> nombres !== ""){
            echo 'value="' . $this -> nombres . '"';
        }
    }
    public function mostrar_error_nombres(){
        if($this -> error_nombres !== ""){
            echo $this -> alerta_inicio . $this -> error_nombres . $this -> alerta_cierre;
        }
    }
    public function mostrar_ap_paterno(){
        if($this -> ap_paterno !== ""){
            echo 'value="' . $this -> ap_paterno . '"';
        }
    }
    public function mostrar_error_ap_paterno(){
        if($this -> error_ap_paterno !== ""){
            echo $this -> alerta_inicio . $this -> error_ap_paterno . $this -> alerta_cierre;
        }
    }
    public function mostrar_ap_materno(){
        if($this -> ap_materno !== ""){
            echo 'value="' . $this -> ap_materno . '"';
        }
    }
    public function mostrar_error_ap_materno(){
        if($this -> error_ap_materno !== ""){
            echo $this -> alerta_inicio . $this -> error_ap_materno . $this -> alerta_cierre;
        }
    }
    public function mostrar_correo(){
        if($this -> correo !== ""){
            echo 'value="' . $this -> correo . '"';
        }
    }
    public function mostrar_error_correo(){
        if($this -> error_correo !== ""){
            echo $this -> alerta_inicio . $this -> error_correo . $this -> alerta_cierre;
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
    public function mostrar_nom_usuario(){
        if($this -> nom_usuario !== ""){
            echo 'value="' . $this -> nom_usuario . '"';
        }
    }
    public function mostrar_error_nom_usuario(){
        if($this -> error_nom_usuario !== ""){
            echo $this -> alerta_inicio . $this -> error_nom_usuario . $this -> alerta_cierre;
        }
    }
    public function mostrar_telefono(){
        if($this -> telefono !== ""){
            echo 'value="' . $this -> telefono . '"';
        }
    }
    public function mostrar_error_telefono(){
        if($this -> error_telefono !== ""){
            echo $this -> alerta_inicio . $this -> error_telefono . $this -> alerta_cierre;
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