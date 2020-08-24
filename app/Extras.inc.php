<?php
//Esta clase sólo fue una solución rápida a las imagenes de cada especie.
include_once 'app/config.inc.php';
include_once 'app/Mascota.inc.php';

class Extras{
    public static function seleccionar_imagen($mascota){
        switch($mascota -> obtener_especie()){
            case 1:
                echo RUTA_IMG.'/dogo.gif';
            break;
            case 2:
                echo RUTA_IMG.'/cato.gif';
            break;
            default:
                echo RUTA_IMG.'/bugs.gif';
            break;
        }
    }

    public static function crear_nuevo_folio($conexion, $fecha_fo){
        $folio = null;
        if (isset($conexion)){
            try{
                $sql = "SELECT COUNT(*) AS total FROM citas";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();
                $total = $resultado['total'] + 1;

                $random = self::generar_cadena_random(10 - strlen($total));
                $folio = 'C'.$total.$random.$fecha_fo;

	    } catch(PDOException $ex){
		print "ERROR: ".$ex ->getMessage();
            }
        }
        return $folio;
        //Se devuelve un folio con el siguiente formato: C + Total de citas registradas + Cadena random + Día de la cita + Mes de la cita
        //Ejemplo: C | Total citas: 14 | Random: 6B7F6ZC0 | Día: 23 | Mes: 08 = C146B7F6ZC02308
    }

    public static function seleccionar_veterinario($conexion){
        $veterinario = null;
        if (isset($conexion)){
            try{
                $sql = "SELECT COUNT(*) AS total FROM veterinarios";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();
                $total = $resultado['total'];

                $veterinario = rand(1, $total);
	    } catch(PDOException $ex){
		print "ERROR: ".$ex ->getMessage();
            }
        }
        return $veterinario;
    }

    public static function generar_cadena_random($largo) {
        $caracteres = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $total_caracteres = strlen($caracteres);
        $cadena = '';
        if($largo > 0){
            for ($i = 0; $i < $largo; $i++) {
                $cadena .= $caracteres[rand(0, $total_caracteres - 1)];
            }
            return $cadena;
        } else{
            return;
        }
    }

    public static function recuperar_especies($conexion){
        $especies = [];
        if(isset($conexion)){
            try{
                $sql = "SELECT * FROM especie";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                foreach ($resultado as $especie) {
                    $especies[] = $especie;
                }
            } catch(PDOException $ex){
                print "ERROR: ". $ex -> getMessage();
            }
        }
        return $especies;
    }
    public static function recuperar_medicamentos($conexion){
        $medicamentos = [];
        if(isset($conexion)){
            try{
                $sql = "SELECT * FROM medicamento";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $medicamentos = $sentencia -> fetchAll();

            } catch(PDOException $ex){
                print "ERROR: ". $ex -> getMessage();
            }
        }
        return $medicamentos;
    }
}