<?php 
include_once "app/config.inc.php";
include_once "app/Conexion.inc.php";
include_once "app/Cita.inc.php";
include_once "app/Extras.inc.php";
include_once "app/RepositorioCita.inc.php";
include_once "app/RepositorioServicio.inc.php";
include_once "app/RepositorioMascota.inc.php";
include_once "app/Escritor.inc.php";
include_once "app/Redireccion.inc.php";
$agendada = false;
if(isset($_POST['agendar'])){
    Conexion::abrir_conexion();
    $fecha_og = str_replace('/','-', $_POST['fecha']);
    $fecha_fol = substr(str_replace('/','', $_POST['fecha']),0,-4);
    $fecha = date("Y-m-d",strtotime($fecha_og));
    $folio = Extras::crear_nuevo_folio(Conexion::obtener_conexion(), $fecha_fol);
    $veterinario = Extras::seleccionar_veterinario(Conexion::obtener_conexion());
    $id_mascota = RepositorioMascota::recuperar_id_mascota(Conexion::obtener_conexion(), $_POST['mascota'], $_SESSION['id_persona']);
    $cita = new Cita('', $folio, $veterinario, $id_mascota, $fecha, $_POST['hora'], 'NO');
    $id_cita = RepositorioCita::insertar_cita(Conexion::obtener_conexion(), $cita);
    RepositorioServicio::insertar_cita_servicio(Conexion::obtener_conexion(), $id_cita, $_POST['servicios']);
    Conexion::cerrar_conexion();  
    $agendada = true;      
}

include_once "templates/declaracion.php";
include_once "templates/navbar.php";
?>
<div class="container-fluid columna">
        <div class="row fila">
            <div class="container col-md-12 borde-redondo fila">
                        <?php if(isset($_POST['agendar'])){
                            if($agendada){?>
                                <h1 class="fuente-WM verde separadito text-center">¡TU CITA HA SIDO AGENDADA!</h1><br>
                                Tu folio de seguimiento es el siguiente: <?php echo $folio?><?php
                            }} else{ ?>
                        <form action="<?php echo RUTA_AGENDAR_CITA?>" method="post">
                    <table class="table table-hover table-striped text-center fuente-R icono-20">
                        <thead class="fuente-WM verde">
                            <tr>
                                <th colspan="2">Introduzca los datos solicitados</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mascota</td>
                                <td>
                                    <select name="mascota" id="service">
                                    <?php 
                                    Conexion::abrir_conexion();
                                    Escritor::escribir_mascotas_cita(Conexion::obtener_conexion(), $_SESSION['id_persona']);
                                    Conexion::cerrar_conexion();
                                    ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Día</td>
                                <td>
                                    <input type="text" id="datepicker" name="fecha" value ="<?php echo date("d/m/Y")?>" readonly placeholder="Selecciona una fecha" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Hora</td>
                                <td>
                                    <select name="hora" id="id_pet">
                                        <option value="09:00:00">9:00 a.m.</option>
                                        <option value="10:00:00">10:00 a.m.</option>
                                        <option value="11:00:00">11:00 a.m.</option>
                                        <option value="12:00:00">12:00 p.m.</option>
                                        <option value="13:00:00">1:00 p.m.</option>
                                        <option value="14:00:00">2:00 p.m.</option>
                                        <option value="15:00:00">3:00 p.m.</option>
                                        <option value="16:00:00">4:00 p.m.</option>
                                        <option value="17:00:00">5:00 p.m.</option>
                                        <option value="18:00:00">6:00 p.m.</option>
                                        <option value="19:00:00">7:00 p.m.</option>
                                        <option value="20:00:00">8:00 p.m.</option>

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Servicio(s)</td>
                                <td>
                                    <select name="servicios[]" id="service" multiple="multiple" required>
                                    <?php 
                                    Conexion::abrir_conexion();
                                    Escritor::escribir_servicios(Conexion::obtener_conexion());
                                    Conexion::cerrar_conexion();?>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2"><button type="submit" class="btn boton" name="agendar">Agendar Cita</button></td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
                <?php } ?>
            </div>
        </div>    
    </div>
</div>
    <div class="esconde-logo"></div>
<?php include_once "templates/cierre.php";?>