<?php
//Esta clase contiene métodos para validar que todos los campos insertados sean correctos antes de registrar a un nuevo usuario en la BD. 

include_once 'RepositorioUsuario.inc.php';

class ValidadorCitaInv{
    private $nombres;
    private $ap_paterno;
    private $ap_materno;
    private $correo;
    private $telefono;
    private $nombre;
    private $edad;
    private $fecha;

    private $error_nombres;
    private $error_ap_paterno;
    private $error_ap_materno;
    private $error_correo;
    private $error_telefono;
    private $error_nombre;
    private $error_edad;

    private $alerta_inicio;
    private $alerta_cierre;

    public function __construct($nombres, $ap_paterno, $ap_materno, $correo, $telefono, $nombre, $edad, $fecha){
        $this -> nombres = $this -> ap_paterno = $this -> ap_materno = $this -> correo = $this -> telefono = 
        $this -> nombre = $this -> edad = $this -> fecha = "";
        $this -> error_nombres = $this -> validar_nombres($nombres);
        $this -> error_ap_paterno = $this -> validar_ap_paterno($ap_paterno);
        $this -> error_ap_materno = $this -> validar_ap_materno($ap_materno);
        $this -> error_correo = $this -> validar_correo($correo);
        $this -> error_telefono = $this -> validar_telefono($telefono);
        $this -> error_nombre = $this -> validar_nombre($nombre);
        $this -> error_edad = $this -> validar_edad($edad);
        $this -> error_fecha = $this -> validar_fecha($fecha);
        $this -> alerta_inicio = "<tr><td colspan=2><div class='alert alert-danger' role='alert'>";
        $this -> alerta_cierre = "</div></td></tr>";
    }

    //Método que comprueba si se insertó algo en el campo.
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
    public function validar_correo($correo){
        if(!$this -> variable_iniciada($correo)){
            return "Debes ingresar un correo electrónico";
        } else {
            $this -> correo = $correo;
        }
        if(strlen($correo) > 50){
            return "El correo no puede tener más de 50 caracteres";
        }
        return "";
    }
    public function validar_telefono($telefono){
        if($this -> variable_iniciada($telefono)){
            $this -> telefono = $telefono;
            if(strlen($telefono) !== 10){
                return "El numéro de teléfono debe contener 10 dígitos";
            }
        }
        return "";
    }
    public function validar_nombre($nombre){
        if(!$this -> variable_iniciada($nombre)){
            return "Debes ingresar un nombre para tu mascota";
        } else{
            $this -> nombre = $nombre;
        }
        if(strlen($nombre) > 50){
            return "El nombre no puede tener más de 50 caracteres";
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
    public function validar_fecha($fecha){
        if(!$this -> variable_iniciada($fecha)){
            return "Debes ingresar una fecha";
        } else{
            $this -> fecha = $fecha;
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
    public function obtener_telefono(){
        if ($this -> telefono != ""){
            return $this -> telefono;
        } else{
            return null;
        }
    }
    public function obtener_nombre(){
        return $this -> nombre;
    }
    public function obtener_edad(){
        return $this -> edad;
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
    public function mostrar_nombre(){
        if($this -> nombre !== ""){
            echo 'value="' . $this -> nombre . '"';
        }
    }
    public function mostrar_error_nombre(){
        if($this -> error_nombre !== ""){
            echo $this -> alerta_inicio . $this -> error_nombre . $this -> alerta_cierre;
        }
    }
    public function mostrar_edad(){
        if($this -> edad !== ""){
            echo 'value="' . $this -> edad . '"';
        }
    }
    public function mostrar_error_edad(){
        if($this -> error_edad !== ""){
            echo $this -> alerta_inicio . $this -> error_edad . $this -> alerta_cierre;
        }
    }

    //Método que combrueba que no exista ningún error en ninguno de los campos para validar por completo el registro.
    public function validar_cita(){
        if($this -> error_nombres === "" && $this -> error_ap_paterno === "" && $this -> error_ap_materno === "" && 
        $this -> error_correo === "" && $this -> error_telefono === "" && $this -> error_nombre === "" &&
        $this -> error_edad === ""){
            return true;
        } else{ 
            return false;
        }
    }
}