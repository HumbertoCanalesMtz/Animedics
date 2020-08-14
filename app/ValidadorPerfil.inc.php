<?php

include_once 'RepositorioUsuario.inc.php';

class ValidadorPerfil{
    private $nombres;
    private $ap_paterno;
    private $ap_materno;
    private $correo;
    private $nom_usuario;
    private $telefono;

    private $error_nombres;
    private $error_ap_paterno;
    private $error_ap_materno;
    private $error_correo;
    private $error_nom_usuario;
    private $error_telefono;

    private $alerta_inicio;
    private $alerta_cierre;

    public function __construct($conexion, $nombres, $ap_paterno, $ap_materno, $correo, $nom_usuario, $telefono, $nom_us_ant, $correo_ant, $tel_ant){
        $this -> nombres = $this -> ap_paterno = $this -> ap_materno = $this -> correo = $this -> nom_usuario = $this -> telefono = "";
        $this -> error_nombres = $this -> validar_nombres($nombres);
        $this -> error_ap_paterno = $this -> validar_ap_paterno($ap_paterno);
        $this -> error_ap_materno = $this -> validar_ap_materno($ap_materno);
        $this -> error_correo = $this -> validar_correo($correo, $correo_ant, $conexion);
        $this -> error_nom_usuario = $this -> validar_nom_usuario($nom_usuario, $nom_us_ant, $conexion);
        $this -> error_telefono = $this -> validar_telefono($telefono, $tel_ant, $conexion);
        $this -> alerta_inicio = "<tr>";
        $this -> alerta_cierre = "</tr>";
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
    public function validar_correo($correo, $correo_ant, $conexion){
        if(!$this -> variable_iniciada($correo)){
            return "Debes ingresar un correo electrónico";
        } else {
            $this -> correo = $correo;
        }
        if(strlen($correo) > 50){
            return "El correo no puede tener más de 50 caracteres";
        }
        if($correo_ant!=$correo){
            if(!RepositorioUsuario::correo_disponible($conexion, $correo)){
                return "El correo ingresado ya está en uso.";
            }
        }
        return "";
    }
    public function validar_nom_usuario($nom_usuario, $nom_us_ant, $conexion){
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
        if($nom_us_ant!=$nom_usuario){
            if(!RepositorioUsuario::nombre_usuario_disponible($conexion, $nom_usuario)){
                return "El nombre de usuario ingresado ya está en uso.";
            }
        }
        return "";
    }
    public function validar_telefono($telefono, $tel_ant, $conexion){
        if($this -> variable_iniciada($telefono)){
            $this -> telefono = $telefono;
            if(strlen($telefono) !== 10){
                return "El numéro de teléfono debe contener 10 dígitos";
            }
        }
        if($tel_ant!=$tel){
            if(!RepositorioUsuario::telefono_disponible($conexion, $telefono) && $this -> telefono != ""){
                return "El telefono ingresado ya está en uso.";
            }
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

    public function validar_edicion(){
        if($this -> error_nombres === "" && $this -> error_ap_paterno === "" && $this -> error_ap_materno === "" && $this -> error_correo === "" &&
        $this -> error_nom_usuario === "" && $this -> error_telefono === ""){
            return true;
        } else{ 
            return false;
        }
    }
}