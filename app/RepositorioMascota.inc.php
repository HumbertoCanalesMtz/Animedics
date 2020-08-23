<?php
//Esta clase contiene los métodos que permiten trabajar con la tabla Mascotas de la base de datos

class RepositorioMascota {

    public static function insertar_mascota($conexion, $mascota){
        if (isset($conexion)){
            try{
                $sql = "INSERT INTO mascotas(nombre, especie, edad, sexo, propietario) 
                VALUES(:nombre, :especie, :edad, :sexo, :propietario)";
                $nombre_temp = $mascota -> obtener_nombre();
                $especie_temp = $mascota -> obtener_especie();
                $edad_temp = $mascota -> obtener_edad();
                $sexo_temp = $mascota -> obtener_sexo();
                $propietario_temp = $mascota -> obtener_propietario();
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':nombre', $nombre_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':especie', $especie_temp, PDO::PARAM_INT);
                $sentencia -> bindParam(':edad', $edad_temp , PDO::PARAM_INT);
                $sentencia -> bindParam(':sexo', $sexo_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':propietario', $propietario_temp, PDO::PARAM_INT);
                $sentencia -> execute();
	    } catch(PDOException $ex){
		print "ERROR: ".$ex ->getMessage();
            }
        }
    }

    public static function obtener_mascotas($conexion, $id_usuario){
        $mascotas = [];
        if(isset($conexion)){
            try{
                include_once 'app/Mascota.inc.php';

                $sql = "SELECT m.id_animal, m.nombre, m.especie, m.edad, m.sexo, m.propietario
                FROM mascotas AS m INNER JOIN personas AS p ON m.propietario = p.id_persona
                INNER JOIN usuarios AS u ON p.usuario = u.id_usuario WHERE u.id_usuario = :id_usuario";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();

                $filas_afectadas = $sentencia -> rowCount();
                if($filas_afectadas!==0){
                    foreach ($resultado as $fila){
                        $mascotas[] = new Mascota($fila['id_animal'], $fila['nombre'], $fila['especie'], 
                        $fila['edad'], $fila['sexo'], $fila['propietario']);
                    }
                }
            } catch(PDOException $ex){
                print "ERROR: ". $ex -> getMessage();
            }
        }
        return $mascotas;
    }

    public static function obtener_mascota_individual($conexion, $nombre, $id_usuario){
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

    public static function editar_mascota($conexion, $mascota){
        if(isset($conexion)){
            try{
                $sql_1 = "UPDATE mascotas SET nombre = :nombre, edad = :edad WHERE id_mascota = :id_mascota";
                $nombre_temp = $mascota -> obtener_correo();
                $especie_temp = $mascota -> obtener_clave();
                $edad_temp = $mascota -> obtener_nombre_usuario();
                $sexo_temp = $mascota -> obtener_rol();
                $id_temp = $mascota -> obtener_id_mascota();
                $sentencia = $conexion -> prepare($sql_1);
                $sentencia -> bindParam(':nombre', $nombre_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':edad', $edad_temp , PDO::PARAM_INT);
                $sentencia -> bindParam(':id_mascota', $id_temp, PDO::PARAM_INT);
                $sentencia -> execute();

            } catch(PDOException $ex){
                print "ERROR: ". $ex -> getMessage();
            }
        }
        return $mascota;
    }

    public static function mascota_duplicada($conexion, $nombre, $id_persona){
        $nombre_disp = false;
        if(isset($conexion)){
            try{
                $sql = "SELECT * from mascotas WHERE nombre = :nombre AND propietario = :id_persona";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia -> bindParam(':id_persona', $id_persona, PDO::PARAM_INT);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                if(count($resultado)){
                    $nombre_disp = false;
                } else{
                    $nombre_disp = true;
                }

            } catch(PDOException $ex){
                print "ERROR: ". $ex -> getMessage();
            }
        }
        return $nombre_disp;
    }

    public static function obtener_mascota_por_cita($conexion, $id_cita){
        $mascota = null;
        if(isset($conexion)){
            try{
                include_once 'app/Mascota.inc.php';

                $sql = "SELECT m.id_animal, m.nombre, m.especie, m.edad, m.sexo, m.propietario
                FROM citas AS c INNER JOIN mascotas AS m ON c.mascota = m.id_animal WHERE c.id_cita = :cita";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':cita', $id_cita, PDO::PARAM_INT);
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
    public static function insertar_mascota_invitada($conexion, $mascota){
        if (isset($conexion)){
            try{
                $sql = "INSERT INTO mascotas(nombre, especie, edad, sexo, propietario) 
                VALUES(:nombre, :especie, :edad, :sexo, :propietario)";
                $nombre_temp = $mascota -> obtener_nombre();
                $especie_temp = $mascota -> obtener_especie();
                $edad_temp = $mascota -> obtener_edad();
                $sexo_temp = $mascota -> obtener_sexo();
                $propietario_temp = $mascota -> obtener_propietario();
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':nombre', $nombre_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':especie', $especie_temp, PDO::PARAM_INT);
                $sentencia -> bindParam(':edad', $edad_temp , PDO::PARAM_INT);
                $sentencia -> bindParam(':sexo', $sexo_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':propietario', $propietario_temp, PDO::PARAM_INT);
                $sentencia -> execute();

                $id_mascota = $conexion -> lastInsertId();

	    } catch(PDOException $ex){
		print "ERROR: ".$ex ->getMessage();
            }
        }
        return $id_mascota;
    }
    public static function recuperar_mascotas($conexion, $id_persona){
        $mascotas = [];
        if(isset($conexion)){
            try{
                $sql = "SELECT nombre FROM mascotas WHERE propietario = :id_persona";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':id_persona', $id_persona, PDO::PARAM_INT);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                foreach ($resultado as $mascota) {
                    $mascotas[] = $mascota;
                }
            } catch(PDOException $ex){
                print "ERROR: ". $ex -> getMessage();
            }
        }
        return $mascotas;
    }
    public static function recuperar_id_mascota($conexion, $nombre, $id_persona){
        $id_mascota = null;
        if(isset($conexion)){
            try{
                $sql = "SELECT id_animal FROM mascotas WHERE nombre = :nombre AND propietario = :id_persona";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia -> bindParam(':id_persona', $id_persona, PDO::PARAM_INT);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();
                $id_mascota = $resultado['id_animal'];
            } catch(PDOException $ex){
                print "ERROR: ". $ex -> getMessage();
            }
        }
        return $id_mascota;
    }
}   
