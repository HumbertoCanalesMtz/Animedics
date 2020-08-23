<?php

class RepositorioServicio{
    public static function recuperar_servicios($conexion){
        $servicios = [];
        if (isset($conexion)){
            try{
                $sql = "SELECT nombre FROM servicio";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                foreach ($resultado as $servicio) {
                    $servicios[] = $servicio;
                }
	    } catch(PDOException $ex){
		print "ERROR: ".$ex ->getMessage();
            }
        }
        return $servicios;
    }

    public static function insertar_cita_servicio($conexion, $id_cita, $servicios){
        if (isset($conexion)){
            try{
                foreach ($servicios as $servicio){
                    $select = "SELECT id_servicio FROM servicio WHERE nombre = :nombre";
                    $sentencia_sel = $conexion -> prepare($select);
                    $sentencia_sel -> bindParam(':nombre', $servicio, PDO::PARAM_STR);
                    $sentencia_sel -> execute();
                    $resultado = $sentencia_sel -> fetch();
                    $id_servicio = $resultado['id_servicio'];

                    $sql = "INSERT INTO cita_servicio VALUES(:id_cita, :id_servicio)";
                    $sentencia = $conexion -> prepare($sql);
                    $sentencia -> bindParam(':id_cita', $id_cita);
                    $sentencia -> bindParam(':id_servicio', $id_servicio);
                    $sentencia -> execute();
                }
	    } catch(PDOException $ex){
		print "ERROR: ".$ex ->getMessage();
            }
        }
    }

    public static function recuperar_servicios_folio($conexion, $folio){
        $servicios = [];
        if (isset($conexion)){
            try{
                $sql = "SELECT s.nombre FROM servicio AS s INNER JOIN cita_servicio AS cs ON cs.servicio = s.id_servicio 
                INNER JOIN citas AS c ON cs.cita = c.id_cita WHERE c.folio = :folio";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':folio', $folio, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                foreach ($resultado as $servicio) {
                    $servicios[] = $servicio['nombre'];
                }
                
	    } catch(PDOException $ex){
		print "ERROR: ".$ex ->getMessage();
            }
        }
        return $servicios;
    }
}