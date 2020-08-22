<?php
//Esta clase incluye métodos estáticos que sirven para establecer, recuperar y abrir la conexión con la base de datos.

class Conexion{
    private $PDOLocal;
    private static $conexion;
    public static function abrir_conexion(){
        if(!isset(self::$conexion)){
            try{
                include_once 'config.inc.php';
                self::$conexion = new PDO('mysql:host='.NOMBRE_SERVIDOR.'; dbname='.NOMBRE_BD.'', NOMBRE_USUARIO, PASSWORD);
                self::$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conexion -> exec("SET CHARACTER SET utf8");
            } catch (PDOExeption $ex){
                print "ERROR: ". $ex ->getMessage();
                die();
            }
        }
    }
    public static function cerrar_conexion(){
        if(isset(self::$conexion)){
            self::$conexion = null;
        }
    }
    public static function obtener_conexion(){
        return self::$conexion;
    }
    public function query($conexion,$query)
    {
        try
        {
            include_once 'config.inc.php';
            $this->PDOLocal=new PDO('mysql:host='.NOMBRE_SERVIDOR.'; dbname='.NOMBRE_BD.'', NOMBRE_USUARIO, PASSWORD);
            $resultado=$this->PDOLocal->prepare($query);
            $resultado->execute();
            $renglon=$resultado->fetchAll(PDO::FETCH_OBJ);
            return $renglon;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}