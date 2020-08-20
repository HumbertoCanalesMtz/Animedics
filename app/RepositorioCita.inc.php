<?php
//Esta clase contiene los métodos que permiten trabajar con la tabla Mascotas de la base de datos

class RepositorioCita {

    public static function insertar_cita($conexion, $cita){
        if (isset($conexion)){
            try{
                $sql = "INSERT INTO citas(folio, veterinario, mascota, fecha, hora, completada) 
                VALUES(:folio, :veterinario, :mascota, :fecha, :hora, :completada)";
                $folio_temp = $cita -> obtener_folio();
                $veterinario_temp = $cita -> obtener_veterinario();
                $mascota_temp = $cita -> obtener_mascota();
                $fecha_temp = $cita -> obtener_fecha();
                $hora_temp = $cita -> obtener_hora();
                $completada_temp = $cita -> obtener_completada();
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':folio', $folio_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':veterinario', $veterinario_temp, PDO::PARAM_INT);
                $sentencia -> bindParam(':mascota', $mascota_temp , PDO::PARAM_INT);
                $sentencia -> bindParam(':fecha', $fecha_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':hora', $hora_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':completada', $completada_temp, PDO::PARAM_INT);
                $sentencia -> execute();
	    } catch(PDOException $ex){
		print "ERROR: ".$ex ->getMessage();
            }
        }
    }

    public static function obtener_citas_pendientes($conexion, $id_mascota){
        $citas = [];
        if(isset($conexion)){
            try{
                include_once 'app/Cita.inc.php';

                $sql = "SELECT * FROM citas WHERE mascota = :mascota AND completada = 'NO'";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':mascota', $id_mascota, PDO::PARAM_INT);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();

                $filas_afectadas = $sentencia -> rowCount();
                if($filas_afectadas!==0){
                    foreach ($resultado as $fila){
                        $citas[] = new Cita($fila['id_cita'], $fila['folio'], $fila['veterinario'], 
                        $fila['mascota'], $fila['fecha'], $fila['hora'], $fila['completada']);
                    }
                }
            } catch(PDOException $ex){
                print "ERROR: ". $ex -> getMessage();
            }
        }
        return $citas;
    }
    public static function obtener_citas_completadas($conexion, $id_mascota){
        $citas = [];
        if(isset($conexion)){
            try{
                include_once 'app/Cita.inc.php';

                $sql = "SELECT * FROM citas AS c INNER JOIN datos_medicos AS dm ON dm.cita = c.id_cita 
                WHERE mascota = :mascota AND completada = 'SI'";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':mascota', $id_mascota, PDO::PARAM_INT);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();

                $filas_afectadas = $sentencia -> rowCount();
                if($filas_afectadas!==0){
                    foreach ($resultado as $fila){
                        $citas[] = new Cita($fila['id_cita'], $fila['folio'], $fila['veterinario'], 
                        $fila['mascota'], $fila['fecha'], $fila['hora'], $fila['completada']);
                    }
                }
            } catch(PDOException $ex){
                print "ERROR: ". $ex -> getMessage();
            }
        }
        return $citas;
    }

    public static function obtener_cita_individual($conexion, $nombre, $id_usuario){
        $mascota = null;
        if(isset($conexion)){
            try{
                include_once 'app/Mascota.inc.php';

                $sql = "SELECT m.id_animal, m.nombre, m.especie, m.edad, m.sexo, m.propietario
                FROM mascotas AS m INNER JOIN personas AS p ON m.propietario = p.id_persona
                INNER JOIN usuarios AS u ON p.usuario = u.id_usuario WHERE u.id_usuario = :id_usuario AND m.nombre = :nombre";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();

                $filas_afectadas = $sentencia -> rowCount();
                if($filas_afectadas!==0){
                        $mascota = new Mascota($resultado['id_animal'], $resultado['nombre'], $resultado['especie'], 
                        $resultado['edad'], $resultado['sexo'], $resultado['propietario']);
                }
            } catch(PDOException $ex){
                print "ERROR: ". $ex -> getMessage();
            }
        }
        return $mascota;
    }
}   