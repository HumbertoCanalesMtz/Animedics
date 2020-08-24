<?php

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
    //Especies
    public static function obtener_especies($conexion){
        $especies = [];
        try{
            $sql = "SELECT nombre FROM especie";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> execute();
            $especies = $sentencia -> fetchAll();

        } catch(PDOException $ex){
            print "ERROR: ". $ex -> getMessage();
        }
        return $especies;
    }
    public static function num_especies($conexion){
        $cantidad = null;
        try{
            $sql = "SELECT COUNT(nombre) AS cantidad FROM especie";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> execute();
            $resultado = $sentencia -> fetch();
            $cantidad = $resultado['cantidad'];

        } catch(PDOException $ex){
            print "ERROR: ". $ex -> getMessage();
        }
        return $cantidad;
    }
    public static function eliminar_especie($conexion, $nombre){
        try{
            $sql = "DELETE FROM especie WHERE nombre = :nombre";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $sentencia -> execute();

        } catch(PDOException $ex){
            print "ERROR: ". $ex -> getMessage();
        }
    }
    public static function editar_especie($conexion, $nombre_ant, $nombre_nuevo){
        try{
            $sql = "UPDATE especie SET nombre = :nombre_nuevo WHERE nombre = :nombre_ant";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> bindParam(':nombre_ant', $nombre_ant, PDO::PARAM_STR);
            $sentencia -> bindParam(':nombre_nuevo', $nombre_nuevo, PDO::PARAM_STR);
            $sentencia -> execute();

        } catch(PDOException $ex){
            print "ERROR: ". $ex -> getMessage();
        }
    }
    public static function agregar_especie($conexion, $nueva_especie){
        try{
            $sql = "INSERT INTO especie (nombre) VALUES (:nueva_especie)";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> bindParam(':nueva_especie', $nueva_especie, PDO::PARAM_STR);
            $sentencia -> execute();

        } catch(PDOException $ex){
            print "ERROR: ". $ex -> getMessage();
        }
    }
    //Medicamentos
    public static function obtener_medicamentos($conexion){
        $medicamentos = [];
        try{
            $sql = "SELECT nom_comercial FROM medicamento";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> execute();
            $especies = $sentencia -> fetchAll();

        } catch(PDOException $ex){
            print "ERROR: ". $ex -> getMessage();
        }
        return $especies;
    }
    public static function num_medicamentos($conexion){
        $cantidad = null;
        try{
            $sql = "SELECT COUNT(nom_comercial) AS cantidad FROM medicamento";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> execute();
            $resultado = $sentencia -> fetch();
            $cantidad = $resultado['cantidad'];

        } catch(PDOException $ex){
            print "ERROR: ". $ex -> getMessage();
        }
        return $cantidad;
    }
    public static function eliminar_medicamentos($conexion, $nombre){
        try{
            $sql = "DELETE FROM medicamento WHERE nom_comercial = :nombre";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $sentencia -> execute();

        } catch(PDOException $ex){
            print "ERROR: ". $ex -> getMessage();
        }
    }
    public static function editar_medicamento($conexion, $nombre_ant, $nombre_nuevo){
        try{
            $sql = "UPDATE medicamento SET nom_comercial = :nombre_nuevo WHERE nom_comercial = :nombre_ant";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> bindParam(':nombre_ant', $nombre_ant, PDO::PARAM_STR);
            $sentencia -> bindParam(':nombre_nuevo', $nombre_nuevo, PDO::PARAM_STR);
            $sentencia -> execute();

        } catch(PDOException $ex){
            print "ERROR: ". $ex -> getMessage();
        }
    }
    public static function agregar_medicamento($conexion, $nuevo_medicamento){
        try{
            $sql = "INSERT INTO medicamento (nom_comercial) VALUES (:nuevo_medicamento)";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> bindParam(':nuevo_medicamento', $nuevo_medicamento, PDO::PARAM_STR);
            $sentencia -> execute();

        } catch(PDOException $ex){
            print "ERROR: ". $ex -> getMessage();
        }
    }

    public static function ver_todas_citas($conexion){
        $citas = [];
        try{
            $sql = "SELECT * FROM total_citas ORDER BY Fecha DESC, Hora ASC";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> execute();
            $citas = $sentencia -> fetchAll();

        } catch(PDOException $ex){
            print "ERROR: ". $ex -> getMessage();
        }
        return $citas;
    }
    public static function ver_citas_completadas($conexion){
        $citas = [];
        try{
            $sql = "SELECT * FROM citas_completadas ORDER BY Fecha DESC, Hora ASC";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> execute();
            $citas = $sentencia -> fetchAll();

        } catch(PDOException $ex){
            print "ERROR: ". $ex -> getMessage();
        }
        return $citas;
    }
    public static function ver_citas_pendientes($conexion){
        $citas = [];
        try{
            $sql = "SELECT * FROM citas_no_completadas ORDER BY Fecha DESC, Hora ASC";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> execute();
            $citas = $sentencia -> fetchAll();

        } catch(PDOException $ex){
            print "ERROR: ". $ex -> getMessage();
        }
        return $citas;
    }
    public static function ver_citas_usuarios($conexion){
        $citas = [];
        try{
            $sql = "SELECT * FROM citas_registrados ORDER BY Fecha DESC, Hora ASC";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> execute();
            $citas = $sentencia -> fetchAll();

        } catch(PDOException $ex){
            print "ERROR: ". $ex -> getMessage();
        }
        return $citas;
    }
    public static function ver_citas_invitados($conexion){
        $citas = [];
        try{
            $sql = "SELECT * FROM citas_invitados ORDER BY Fecha DESC, Hora ASC";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> execute();
            $citas = $sentencia -> fetchAll();

        } catch(PDOException $ex){
            print "ERROR: ". $ex -> getMessage();
        }
        return $citas;
    }
    public static function comprobar_servicio($conexion, $nombre){
        $existe = false;
        if(isset($conexion)){
            try{
                $sql = "SELECT * FROM servicio WHERE nombre = :nombre";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                if(count($resultado)){
                    $existe = true;
                } else{
                    $existe = false;
                }
            } catch (PDOException $ex){
                print "ERROR: ". $ex -> getMessage();
            }
        }
        return $existe;
    }
    public static function comprobar_especie($conexion, $nombre){
        $existe = false;
        if(isset($conexion)){
            try{
                $sql = "SELECT * FROM especie WHERE nombre = :nombre";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                if(count($resultado)){
                    $existe = true;
                } else{
                    $existe = false;
                }
            } catch (PDOException $ex){
                print "ERROR: ". $ex -> getMessage();
            }
        }
        return $existe;
    }
    public static function comprobar_medicamento($conexion, $nombre){
        $existe = false;
        if(isset($conexion)){
            try{
                $sql = "SELECT * FROM medicamento WHERE nom_comercial = :nombre";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                if(count($resultado)){
                    $existe = true;
                } else{
                    $existe = false;
                }
            } catch (PDOException $ex){
                print "ERROR: ". $ex -> getMessage();
            }
        }
        return $existe;
    }
}
?>