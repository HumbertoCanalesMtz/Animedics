<?php
include_once 'app/RepositorioVet.inc.php';
include_once 'app/RepositorioCita.inc.php';

class EscritorVet{
    public static function escribir_citas($conexion){
        $citas = RepositorioVet::ver_todas_citas($conexion, $_SESSION['nombre_usuario']);
        if(count($citas)){
            foreach ($citas as $cita) {
            self::escribir_cita($cita, $conexion);
            }
        } else{
            ?>
            <tr>
                <th colspan="9">Aún no se han registrado citas</th>
            </tr>
            <?php
        }
    }
    public static function escribir_citas_completadas($conexion){
        $citas = RepositorioVet::ver_citas_completadas($conexion, $_SESSION['nombre_usuario']);
        if(count($citas)){
            foreach ($citas as $cita) {
            self::escribir_cita($cita, $conexion);
            }
        } else{
            ?>
            <tr>
                <th colspan="9">Aún no se han completado citas</th>
            </tr>
            <?php
        }
    }
    public static function escribir_citas_pendientes($conexion){
        $citas = RepositorioVet::ver_citas_pendientes($conexion, $_SESSION['nombre_usuario']);
        if(count($citas)){
            foreach ($citas as $cita) {
            self::escribir_cita($cita, $conexion);
            }
        } else{
            ?>
            <tr>
                <th colspan="9">No hay citas pendientes</th>
            </tr>
            <?php
        }
    }
    public static function escribir_cita($cita, $conexion){ ?>
            <tr>
                <td> <?php echo $cita['Folio']?></td>
                <td> 
                <?php 
                $fecha = date("d-m-Y",strtotime($cita['Fecha']));
                $fecha_nueva = str_replace('-','/', $fecha);
                echo $fecha_nueva?>
                </td>
                <td> <?php echo substr($cita['Hora'],0,-3);?></td>
                <td> <?php echo $cita['Mascota']?></td>
                <td> <?php echo $cita['Especie']?></td>
                <td> <?php echo $cita['Dueño']?></td>
                <td> <?php echo $cita['Telefono']?></td>
                <?php
                if(!RepositorioCita::completada($conexion, $cita['Folio'])){?>
                <form method='post' action='<?php echo RUTA_CITAS?>'>
                <input type='hidden' name='folio_com' value='<?php echo $cita['Folio']?>'>
                <td>
                    <button type ='submit' name='completar' data-toggle='modal' data-target='#ModalReceta' class='btn boton'>
                    <span class='material-icons'>done</span>
                    </button>
                </td>
                </form>
                <?php } else{ ?>
                <td>
                    <span class='material-icons'>done_outline</span>
                </td>
                <?php } ?>
                <form method='post' action='<?php echo RUTA_VER_CITA?>'>
                <input type='hidden' name='folio' value='<?php echo $cita['Folio']?>'>
                <td>
                    <button type="submit" name='ver' class='btn boton-gris'>
                    <span class='material-icons'>visibility</span>
                    </button>
                </td>
                </form>
                <?php
                if(RepositorioCita::revisar_datos_med($conexion, $cita['Folio'])){
                    ?>
                        <td>
                        <button data-toggle='modal' data-target='#ModalConsulta' data-folio='<?php echo $cita['Folio']?>' class='btn boton-naranja'>
                        <span class='material-icons'>medical_services</span>
                        </button>
                        </td>
                    <?php } else{ ?>
                        <td>
                        <button data-toggle='modal' data-target='#ModalReceta' data-folio='<?php echo $cita['Folio']?>' class='btn boton'>
                        <span class='material-icons'>playlist_add</span>
                        </button>
                        </td>
                    <?php }?>
            </tr>
        <?php }
    }

