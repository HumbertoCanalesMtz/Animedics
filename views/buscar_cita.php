<?php
$titulo = "Datos de la cita";
include_once "app/config.inc.php";
include_once "app/Especie.inc.php";
include_once "app/Conexion.inc.php";
include_once "app/Escritor.inc.php";
include_once "app/Mascota.inc.php";
include_once "app/Cita.inc.php";
include_once "app/RepositorioMascota.inc.php";

if(isset($_POST['buscar'])){
    Conexion::abrir_conexion();
    $cita = RepositorioCita::obtener_cita_por_folio(Conexion::obtener_conexion(), $_POST['folio']);
    $veterinario = RepositorioCita::obtener_nombre_veterinario(Conexion::obtener_conexion(), $cita -> obtener_id_cita());
    $mascota = RepositorioMascota::obtener_mascota_por_cita(Conexion::obtener_conexion(), $cita -> obtener_id_cita());
    $persona = RepositorioCita::obtener_persona(Conexion::obtener_conexion(), $cita -> obtener_id_cita());
    Conexion::cerrar_conexion();
}

include_once "templates/declaracion.php";
include_once "templates/navbar.php";
?>
 
<div class="container fila borde-redondo borde-naranja">
    <div class="row">
        <div class="col-md-12">
                <h1 class="fuente-WM verde separadito text-center">DATOS DE LA CITA</h1>
                <div class="borde-sup"></div><br>
                <div class="d-flex justify-content-center centrado-vertical fila">
                        <table class="table-sm table-striped table-hover">
                            <tbody>
                                    <?php if(isset($cita) && $cita != null){?>
                                    <tr><th colspan=2 class="text-center">DATOS DE LA CITA</th></tr>
                                    <tr>
                                        <th>Nombre del solicitante:</th>
                                        <td><?php echo $persona;?></td>
                                    </tr>
                                    <tr>
                                        <th>Folio:</th>
                                        <td><?php echo $cita -> obtener_folio();?></td>
                                    </tr>
                                    <tr>
                                        <th>Fecha:</th>
                                        <td><?php echo $cita -> obtener_fecha();?></td>
                                    </tr>
                                    <tr>
                                        <th>Hora:</th>
                                        <td><?php echo $cita -> obtener_hora();?></td>
                                    </tr>
                                    <tr><th colspan=2 class="text-center">DATOS DE LA MASCOTA</th></tr>
                                    <tr>
                                        <th>Nombre:</th>
                                        <td><?php echo $mascota -> obtener_nombre();?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Sexo:</th>
                                        <td><?php echo $mascota -> obtener_sexo();?></td>
                                    </tr>
                                    <tr>
                                        <th>Edad:</th>
                                        <td><?php echo $mascota -> obtener_edad();?> años</td>
                                    </tr>
                                    <tr><th colspan=2 class="text-center">DATOS DEL VETERINARIO</th></tr>
                                    <tr>
                                        <th>Nombre:</th>
                                        <td><?php echo $veterinario['nombre'];?></td>
                                    </tr>
                                    <tr>
                                        <th>Cédula:</th>
                                        <td><?php echo $veterinario['cedula'];?></td>
                                    </tr>
                                    <?php if($cita -> obtener_completada() == 'SI'){
                                include_once 'app/Datos.inc.php';
                                Conexion::abrir_conexion();
                                $datos = RepositorioCita::obtener_datos_medicos(Conexion::obtener_conexion(),$cita -> obtener_id_cita());
                                Conexion::cerrar_conexion();    
                                if(isset($datos) && $datos != null){
                            ?>
                                    <tr><th colspan=2 class="text-center">DATOS DE LA CONSULTA MÉDICA</th></tr>
                                    <tr>
                                        <th>Síntomas:</th>
                                        <td><?php echo $datos -> obtener_sintomas();?></td>
                                    </tr>
                                    <tr>
                                        <th>Temperatura:</th>
                                        <td><?php echo $datos -> obtener_temperatura();?> °C</td>
                                    </tr>
                                    <tr>
                                        <th>Peso:</th>
                                        <td><?php echo $datos -> obtener_peso();?> Kg</td>
                                    </tr>
                                    <tr>
                                        <th>Diagnóstico:</th>
                                        <td><?php echo $datos -> obtener_diagnostico();?></td>
                                    </tr>
                                    <tr>
                                        <th>Examen del abdomen:</th>
                                        <td><?php echo $datos -> obtener_abdomen();?></td>
                                    </tr>
                                    <tr>
                                        <th>Estado de los órganos internos:</th>
                                        <td><?php echo $datos -> obtener_org_int();?></td>
                                    </tr>
                                    <tr>
                                        <th>Estado de los órganos externos:</th>
                                        <td><?php echo $datos -> obtener_org_ext();?></td>
                                    </tr>
                                    <tr>
                                        <th>¿Había sido operado previamente?</th>
                                        <td><?php echo $datos -> obtener_operado();?></td>
                                    </tr>
                                    <tr>
                                        <th>Grado de deshidratación:</th>
                                        <td><?php echo $datos -> obtener_deshidratacion();?></td>
                                    </tr>
                            <?php }}} else{ ?>
                                    <tr><div class='alert alert-danger' role='alert'>No existe ninguna cita con ese folio, ingresa un folio valido</div></tr>
                            <?php } ?>
                            </tbody>
                        </table>    
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>  
<div class="esconde-logo"></div>
<?php include_once "templates/cierre.php";