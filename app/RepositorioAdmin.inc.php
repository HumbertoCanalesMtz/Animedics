<?php
//Esta clase sera para trabajar con los 

class RepositorioAdmin{
    public static function obtener_servicios($conexion){
        $servicios = [];
        try{
            $sql = "SELECT nombre FROM servicio";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> execute();
            $servicios = $sentencia -> fetchAll();

        } catch(PDOException $ex){
            print "ERROR: ". $ex -> getMessage();
        }
        return $servicios;
    }
    public static function num_servicios($conexion){
        $cantidad = null;
        try{
            $sql = "SELECT COUNT(nombre) AS cantidad FROM servicio";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> execute();
            $resultado = $sentencia -> fetch();
            $cantidad = $resultado['cantidad'];

        } catch(PDOException $ex){
            print "ERROR: ". $ex -> getMessage();
        }
        return $cantidad;
    }
    public static function eliminar_servicio($conexion, $nombre){
        try{
            $sql = "DELETE FROM servicio WHERE nombre = :nombre";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $sentencia -> execute();

        } catch(PDOException $ex){
            print "ERROR: ". $ex -> getMessage();
        }
    }
    public static function editar_servicio($conexion, $nombre_ant, $nombre_nuevo){
        try{
            $sql = "UPDATE servicio SET nombre = :nombre_nuevo WHERE nombre = :nombre_ant";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> bindParam(':nombre_ant', $nombre_ant, PDO::PARAM_STR);
            $sentencia -> bindParam(':nombre_nuevo', $nombre_nuevo, PDO::PARAM_STR);
            $sentencia -> execute();

        } catch(PDOException $ex){
            print "ERROR: ". $ex -> getMessage();
        }
    }
    public static function agregar_servicio($conexion, $nuevo_servicio){
        try{
            $sql = "INSERT INTO servicio (nombre) VALUES (:nuevo_servicio)";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> bindParam(':nuevo_servicio', $nuevo_servicio, PDO::PARAM_STR);
            $sentencia -> execute();

        } catch(PDOException $ex){
            print "ERROR: ". $ex -> getMessage();
        }
    }
}
?>