<?php
class RepositorioUsuario {

    public static function obtener_todos($conexion){
        $usuarios = array();
        if(isset($conexion)){
            try{
                include_once 'Usuario.inc.php';

                $sql = "SELECT * FROM usuarios";

                $sentencia = $conexion -> prepare($sql);
                $sentencia ->execute();
                $resultado = $sentencia -> fetchAll();
                
                if(count($resultado)){
                    foreach ($resultado as $fila) {
                        $usuarios[] = new Usuario(
                            $fila['id_usuario'], $fila['nombre'], $fila['email'], $fila['password'], $fila['fecha_registro'], $fila['activo']);
                    }
                }
                else{
                    print 'No hay usuarios';
                }

            } catch (PDOException $ex){
                print "ERROR: ". $ex -> getMessage();
            }
        }
        return $usuarios;
    }

    public static function obtener_num_usuarios($conexion){
        $total_usuarios = null;
        if(isset($conexion)){
            try{
                $sql = "SELECT COUNT(*) AS total FROM usuarios";

                $sentencia = $conexion -> prepare($sql);
                $sentencia ->execute();
                $resultado = $sentencia -> fetch();
                $total_usuarios = $resultado['total'];

            } catch (PDOException $ex){
                print "ERROR: ". $ex -> getMessage();
            }
        }
        return $total_usuarios;
    }

    public static function insertar_usuario($conexion, $usuario){
        $usuario_insertado = false;
        if (isset($conexion)){
            try{
                $sql = "INSERT INTO usuarios VALUES('',:nombres, :ap_paterno, :ap_materno, :correo, :clave, :nombre_usuario, :telefono, :rol, NOW())";
                $nombres_temp = $usuario -> obtener_nombres();
                $ap_paterno_temp = $usuario -> obtener_ap_paterno();
                $ap_materno_temp = $usuario -> obtener_ap_materno();
                $correo_temp = $usuario -> obtener_correo();
                $clave_temp = $usuario -> obtener_clave();
                $nombre_usuario_temp = $usuario -> obtener_nombre_usuario();
                $telefono_temp = $usuario -> obtener_telefono();
                $rol_temp = $usuario -> obtener_rol();
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':nombres', $nombres_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':ap_paterno', $ap_paterno_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':ap_materno', $ap_materno_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':correo', $correo_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':clave', $clave_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':nombre_usuario', $nombre_usuario_temp , PDO::PARAM_STR);
                $sentencia -> bindParam(':telefono', $telefono_temp, PDO::PARAM_INT);
                $sentencia -> bindParam(':rol', $rol_temp, PDO::PARAM_INT);
                $usuario_insertado = $sentencia -> execute();
            } catch(PDOException $ex){
                print "ERROR: ". $ex -> getMessage();
            }
        }
    }

    public static function correo_disponible($conexion, $correo){
        $correo_disp = false;
        if(isset($conexion)){
            try{
                $sql = "SELECT * FROM usuarios WHERE correo = :correo";

                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':correo', $correo, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                if(count($resultado)){
                    $correo_disp = false;
                } else{
                    $correo_disp = true;
                }
            } catch (PDOException $ex){
                print "ERROR: ". $ex -> getMessage();
            }
        }
        return $correo_disp;
    }
    public static function nombre_usuario_disponible($conexion, $nombre_usuario){
        $nombre_usuario_disp = false;
        if(isset($conexion)){
            try{
                $sql = "SELECT * FROM usuarios WHERE nombre_usuario = :nombre_usuario";

                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':nombre_usuario', $nombre_usuario, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                if(count($resultado)){
                    $nombre_usuario_disp = false;
                } else{
                    $nombre_usuario_disp = true;
                }
            } catch (PDOException $ex){
                print "ERROR: ". $ex -> getMessage();
            }
        }
        return $nombre_usuario_disp;
    }
    public static function telefono_disponible($conexion, $telefono){
        $telefono_disp = false;
        if(isset($conexion)){
            try{
                $sql = "SELECT * FROM usuarios WHERE telefono = :telefono";

                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':telefono', $telefono, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                if(count($resultado)){
                    $telefono_disp = false;
                } else{
                    $telefono_disp = true;
                }
            } catch (PDOException $ex){
                print "ERROR: ". $ex -> getMessage();
            }
        }
        return $telefono_disp;
    }
}