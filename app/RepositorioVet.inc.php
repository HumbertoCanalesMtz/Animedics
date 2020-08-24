<?php

class RepositorioVet{

    public static function ver_todas_citas($conexion, $nombre_usuario){
        $citas = [];
        try{
            $sql = "CALL citas_veterinario(:nombre_usuario)";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> bindParam(':nombre_usuario', $nombre_usuario, PDO::PARAM_STR);
            $sentencia -> execute();
            $citas = $sentencia -> fetchAll();

        } catch(PDOException $ex){
            print "ERROR: ". $ex -> getMessage();
        }
        return $citas;
    }
    public static function ver_citas_completadas($conexion, $nombre_usuario){
        $citas = [];
        try{
            $sql = "CALL citas_veterinario_completadas(:nombre_usuario)";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> bindParam(':nombre_usuario', $nombre_usuario, PDO::PARAM_STR);
            $sentencia -> execute();
            $citas = $sentencia -> fetchAll();

        } catch(PDOException $ex){
            print "ERROR: ". $ex -> getMessage();
        }
        return $citas;
    }
    public static function ver_citas_pendientes($conexion, $nombre_usuario){
        $citas = [];
        try{
            $sql = "CALL citas_veterinario_pendientes(:nombre_usuario)";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> bindParam(':nombre_usuario', $nombre_usuario, PDO::PARAM_STR);
            $sentencia -> execute();
            $citas = $sentencia -> fetchAll();

        } catch(PDOException $ex){
            print "ERROR: ". $ex -> getMessage();
        }
        return $citas;
    }
    public static function recuperar_id_veterinario($conexion, $nombre_usuario){
        $veterinario = null;
        if (isset($conexion)){
            try{
                $sql = "SELECT v.id_veterinario FROM veterinarios AS v INNER JOIN personas AS p ON v.persona = p.id_persona
                INNER JOIN usuarios AS u ON p.usuario = u.id_usuario WHERE u.nombre_usuario = :nombre_usuario";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':nombre_usuario', $nombre_usuario, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();
                $veterinario = $resultado['id_veterinario'];

	    } catch(PDOException $ex){
		print "ERROR: ".$ex ->getMessage();
            }
        }
        return $veterinario;
    }
}
?>