<?php
include_once 'app/RepositorioMascota.inc.php';
include_once 'app/RepositorioCita.inc.php';
include_once 'app/RepositorioServicio.inc.php';
include_once 'app/Mascota.inc.php';
include_once 'app/Extras.inc.php';
include_once 'app/Cita.inc.php';

class Escritor{
    public static function escribir_mascotas($conexion, $id_usuario){
        $mascotas = RepositorioMascota::obtener_mascotas($conexion, $id_usuario);
        if(count($mascotas)){
            foreach ($mascotas as $mascota) {
                self::escribir_mascota($mascota);
            }
        } else{
            ?>
            <div class="card mb-3" style="max-width: 540px;">
                Aún no tienes mascotas, <br>añade una utilizando el <br>botón superior
            </div>
            <?php
        }
    }

    public static function escribir_mascota($mascota){
        if(!isset($mascota)){
            return;
        }
        ?>
        <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?php Extras::seleccionar_imagen($mascota);?>" class="card-img img-fluid" alt="Especie">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body d-flex justify-content-center centrado-vertical">
                                <table class="table-sm table-striped table-hover">
                                    <tbody>
                                        <tr>
                                            <th>Nombre:</th>
                                            <td><?php echo $mascota -> obtener_nombre();?></td>
                                        </tr>
                                        <tr>
                                            <th>Edad:</th>
                                            <td><?php echo $mascota -> obtener_edad();?></td>
                                        </tr>
                                        <tr>
                                            <th>Sexo:</th>
                                            <td><?php echo $mascota -> obtener_sexo();?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer flex-fill text-center"><a href="
                        <?php echo RUTA_CITAS.'/'.str_replace(' ','-',$mascota -> obtener_nombre());?>" class="btn boton fuente-R">Ver citas</a></div>
                    </div>
                </div>
        <?php
    }

    public static function escribir_citas_pendientes($conexion, $id_mascota){
        $citas = RepositorioCita::obtener_citas_pendientes(Conexion::obtener_conexion(),$id_mascota);
        if(count($citas)){
            foreach ($citas as $cita) {
                self::escribir_cita_pendiente($cita);
            }
        } else{
            ?>
            <div class="card mb-3" style="max-width: 540px;">
                No hay citas pendientes
            </div>
            <?php
        }
    }
    public static function escribir_cita_pendiente($cita){
        if(!isset($cita)){
            return;
        }
        $veterinario = RepositorioCita::obtener_nombre_veterinario(Conexion::obtener_conexion(), $cita -> obtener_id_cita());
        ?>
        <div class="card">
            <div class="card-body mb-3">
                <table class="table-sm table-striped table-hover">
                    <tbody>
                                    <tr>
                                        <th>Fecha:</th>
                                        <td><?php echo $cita -> obtener_fecha();?></td>
                                    </tr>
                                    <tr>
                                        <th>Hora:</th>
                                        <td><?php echo $cita -> obtener_hora();?></td>
                                    </tr>
                                    <tr>
                                        <th>Servicio(s):</th>
                                        <td><?php
                                        $cadena = Escritor::escribir_servicios_cita(Conexion::obtener_conexion(), $cita -> obtener_folio());
                                        echo $cadena;
                                        ?></td>
                                    </tr>
                                    <tr>
                                        <th>Veterinario:</th>
                                        <td><?php echo $veterinario['nombre']?></td>
                                    </tr>
                                    <tr>
                                        <th>Cédula:</th>
                                        <td><?php echo $veterinario['cedula']?></td>
                                    </tr>
                                    <tr>
                                        <th>Folio de la cita:</th>
                                        <td><?php echo $cita -> obtener_folio();?></td>
                                    </tr>
                    </tbody>
                </table>    
            </div>
        </div>
        <?php
    }

    public static function escribir_citas_completadas($conexion, $id_mascota){
        $citas = RepositorioCita::obtener_citas_completadas(Conexion::obtener_conexion(),$id_mascota);
        if(count($citas)){
            foreach ($citas as $cita) {
                self::escribir_cita_completada($cita);
            }
        } else{
            ?>
            <div class="card mb-3" style="max-width: 540px;">
                No hay citas completadas
            </div>
            <?php
        }
    }
    public static function escribir_cita_completada($cita){
        if(!isset($cita)){
            return;
        }
        $veterinario = RepositorioCita::obtener_nombre_veterinario(Conexion::obtener_conexion(), $cita -> obtener_id_cita());
        $datos = RepositorioCita::obtener_datos_medicos(Conexion::obtener_conexion(), $cita -> obtener_id_cita());
        ?>
        <div class="card">
                        <div class="card-body mb-3">
                            <table class="table-sm table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <th>Fecha:</th>
                                        <td colspan="3"><?php echo $cita -> obtener_fecha();?></td>
                                    </tr>
                                    <tr>
                                        <th>Hora:</th>
                                        <td colspan="3"><?php echo $cita -> obtener_hora();?></td>
                                    </tr>
                                    <tr>
                                        <th>Servicio(s):</th>
                                        <td colspan="3"><?php
                                        $cadena = Escritor::escribir_servicios_cita(Conexion::obtener_conexion(), $cita -> obtener_folio());
                                        echo $cadena;
                                        ?></td>
                                    </tr>
                                    <tr>
                                        <th>Veterinario:</th>
                                        <td colspan="3"><?php echo $veterinario['nombre']?></td>
                                    </tr>
                                    <tr>
                                        <th>Cédula:</th>
                                        <td colspan="3"><?php echo $veterinario['cedula']?></td>
                                    </tr>
                                    <tr>
                                        <th>Folio de la cita:</th>
                                        <td colspan="3"><?php echo $cita -> obtener_folio();?></td>
                                    </tr>
                                    <?php if(isset($datos) && $datos != null){
                                    $receta = RepositorioCita::obtener_receta(Conexion::obtener_conexion(), $datos -> obtener_id_datos());
                                    ?>
                                    <tr><th colspan="4" class="text-center">DATOS DE LA CONSULTA MÉDICA</th></tr>
                                    <tr>
                                        <th>Síntomas:</th>
                                        <td colspan="3"><?php echo $datos -> obtener_sintomas();?></td>
                                    </tr>
                                    <tr>
                                        <th>Temperatura:</th>
                                        <td colspan="3"><?php echo $datos -> obtener_temperatura();?> °C</td>
                                    </tr>
                                    <tr>
                                        <th>Peso:</th>
                                        <td colspan="3"><?php echo $datos -> obtener_peso();?> Kg</td>
                                    </tr>
                                    <tr>
                                        <th>Diagnóstico:</th>
                                        <td colspan="3"><?php echo $datos -> obtener_diagnostico();?></td>
                                    </tr>
                                    <tr>
                                        <th>Examen del abdomen:</th>
                                        <td colspan="3"><?php echo $datos -> obtener_abdomen();?></td>
                                    </tr>
                                    <tr>
                                        <th>Estado de los órganos internos:</th>
                                        <td colspan="3"><?php echo $datos -> obtener_org_int();?></td>
                                    </tr>
                                    <tr>
                                        <th>Estado de los órganos externos:</th>
                                        <td colspan="3"><?php echo $datos -> obtener_org_ext();?></td>
                                    </tr>
                                    <tr>
                                        <th>¿Había sido operado previamente?</th>
                                        <td colspan="3"><?php echo $datos -> obtener_operado();?></td>
                                    </tr>
                                    <tr>
                                        <th>Grado de deshidratación:</th>
                                        <td colspan="3"><?php echo $datos -> obtener_deshidratacion();?></td>
                                    </tr>
                                    <?php } if(isset($receta) && $receta != null){?>
                                    <tr><th colspan="4" class="text-center">RECETA MÉDICA</th></tr>
                                    <tr>
                                        <th>Medicamento</th>
                                        <th>Dosis</th>
                                        <th>Durante</th>
                                        <th>Cada</th>
                                    </tr>
                                    <?php foreach ($receta as $medicamento) {?>
                                            <tr>
                                            <td><?php echo $medicamento -> obtener_nombre();?></td>
                                            <td><?php echo $medicamento -> obtener_dosis();?></td>
                                            <td><?php echo $medicamento -> obtener_dias();?> días</td>
                                            <td><?php echo $medicamento -> obtener_horas();?> horas</td>
                                            </tr>
                                        <?php }}
                                        ?>
                                </tbody>
                            </table>    
                        </div>
                    </div>  
        <?php
    }

    public static function escribir_servicios($conexion){
        $servicios = RepositorioServicio::recuperar_servicios($conexion);
        foreach ($servicios as $servicio){?>
            <option value="<?php echo $servicio['nombre']?>"><?php echo $servicio['nombre']?></option>
        <?php }
    }
    public static function escribir_servicios_cita($conexion, $folio){
        $servicios = RepositorioServicio::recuperar_servicios_folio($conexion, $folio);
        $cadena = "";
        foreach ($servicios as $servicio){
            $cadena.=$servicio;
            if($servicio != end($servicios)){
                $cadena.=', ';
            }
        }
        return $cadena;
    }
    public static function escribir_especies($conexion){
        $especies = Extras::recuperar_especies($conexion);
        foreach ($especies as $especie){?>
            <option value="<?php echo $especie['id_especie']?>"><?php echo $especie['nombre']?></option>
        <?php }
    }
    public static function escribir_mascotas_cita($conexion, $id_persona){
        $mascotas = RepositorioMascota::recuperar_mascotas($conexion, $id_persona);
        foreach ($mascotas as $mascota){?>
            <option value="<?php echo $mascota['nombre']?>"><?php echo $mascota['nombre']?></option>
        <?php }
    }
}