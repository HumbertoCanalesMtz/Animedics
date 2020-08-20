<?php
include_once 'app/RepositorioMascota.inc.php';
include_once 'app/RepositorioCita.inc.php';
include_once 'app/Mascota.inc.php';
include_once 'app/Especie.inc.php';
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
                No hay mascotas
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
                            <img src="<?php Especie::seleccionar_imagen($mascota);?>" class="card-img" alt="Especie">
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
                        <?php echo RUTA_CITAS.'/'.str_replace(' ','-',$mascota -> obtener_nombre());?>" class="btn boton">Ver citas</a></div>
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
                                        <th>Veterinario:</th>
                                        <td><?php echo $cita -> obtener_veterinario();?></td>
                                    </tr>
                                    <tr>
                                        <th>Folio:</th>
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
        ?>
        <div class="card">
                        <div class="card-body mb-3">
                            <table class="table-sm table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <th>Diagnostico:</th>
                                        <td>Es wapo</td>
                                    </tr>
                                    <tr>
                                        <th>Medicamento:</th>
                                        <td>Descansar</td>
                                    </tr>
                                    <tr>
                                        <th>Dosis:</th>
                                        <td>Grande</td>
                                    </tr>
                                    <tr>
                                        <th>Horas:</th>
                                        <td>.1</td>
                                    </tr>
                                    <tr>
                                        <th>Duración(Días):</th>
                                        <td>1000000</td>
                                    </tr>
                                </tbody>
                            </table>    
                        </div>
                    </div>  
        <?php
    }
}