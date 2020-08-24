<?php
include_once 'app/RepositorioAdmin.inc.php';
include_once 'app/RepositorioCita.inc.php';

class EscritorAdmin{
    public static function escribir_servicios($conexion){
        $servicios = RepositorioAdmin::obtener_servicios($conexion);
        if(count($servicios)){
            foreach ($servicios as $servicio) {?>
                <tr>
                    <td><?php echo $servicio['nombre']?></td>
                    <td>
                        <button class='btn boton-verde' data-toggle='modal' data-servicio='<?php echo $servicio['nombre']?>'
                        data-target='#ModalServicio'>
                        <span class='material-icons'>edit</span>
                        </button>
                    </td>
                    <form method='post' action='<?php echo RUTA_ADMINISTRACION?>'>
                    <input type='hidden' name='servicio' value='<?php echo $servicio['nombre']?>'>
                    
                    <td>
                        <button class='btn boton-naranja' name='eliminar_servicio'><span class='material-icons'>clear</span></button>
                    </td>
                    </form>
                </tr>
        <?php }
        } else{
            ?>
            <div class="card mb-3" style="max-width: 540px;">
                Aún no has añadido servicios, añade uno
            </div>
            <?php
        }
    }
    public static function escribir_especies($conexion){
        $especies = RepositorioAdmin::obtener_especies($conexion);
        if(count($especies)){
            foreach ($especies as $especie) {?>
                <tr>
                    <td><?php echo $especie['nombre']?></td>
                    <td>
                        <button class='btn boton-verde' data-toggle='modal' data-especie='<?php echo $especie['nombre']?>'
                        data-target='#ModalEspecie'>
                        <span class='material-icons'>edit</span>
                        </button>
                    </td>
                    <form method='post' action='<?php echo RUTA_ADMINISTRACION?>'>
                    <input type='hidden' name='especie' value='<?php echo $especie['nombre']?>'>
                    
                    </form>
                </tr>
        <?php }
        } else{
            ?>
            <div class="card mb-3" style="max-width: 540px;">
                Aún no has añadido especies, añade una
            </div>
            <?php
        }
    }
    public static function escribir_medicamento($conexion){
        $medicamentos = RepositorioAdmin::obtener_medicamentos($conexion);
        if(count($medicamentos)){
            foreach ($medicamentos as $medicamento) {?>
                <tr>
                    <td><?php echo $medicamento['nom_comercial']?></td>
                    <td>
                        <button class='btn boton-verde' data-toggle='modal' data-medicamento='<?php echo $medicamento['nom_comercial']?>'
                        data-target='#ModalMedicamento'>
                        <span class='material-icons'>edit</span>
                        </button>
                    </td>
                    <form method='post' action='<?php echo RUTA_ADMINISTRACION?>'>
                    <input type='hidden' name='medicamento' value='<?php echo $medicamento['nom_comercial']?>'>
                    
                    <td>
                        <button class='btn boton-naranja' name='eliminar_medicamento'><span class='material-icons'>clear</span></button>
                    </td>
                    </form>
                </tr>
        <?php }
        } else{
            ?>
            <div class="card mb-3" style="max-width: 540px;">
                Aún no has añadido medicamentos, añade uno
            </div>
            <?php
        }
    }
    public static function escribir_citas($conexion){
        $citas = RepositorioAdmin::ver_todas_citas($conexion);
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
        $citas = RepositorioAdmin::ver_citas_completadas($conexion);
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
        $citas = RepositorioAdmin::ver_citas_pendientes($conexion);
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
    public static function escribir_citas_invitados($conexion){
        $citas = RepositorioAdmin::ver_citas_invitados($conexion);
        if(count($citas)){
            foreach ($citas as $cita) {
            self::escribir_cita($cita, $conexion);
            }
        } else{
            ?>
            <tr>
                <th colspan="9">No hay citas agendadas por invitados</th>
            </tr>
            <?php
        }
    }
    public static function escribir_citas_usuarios($conexion){
        $citas = RepositorioAdmin::ver_citas_usuarios($conexion);
        if(count($citas)){
            foreach ($citas as $cita) {
            self::escribir_cita($cita, $conexion);
            }
        } else{
            ?>
            <tr>
                <th colspan="9">No hay citas agendadas por usuarios</th>
            </tr>
            <?php
        }
    }
    public static function escribir_cita($cita, $conexion){ ?>
            <tr>
                <td> <?php echo $cita['Folio']?></td>
                <td> <?php echo $cita['Veterinario']?></td>
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
    public static function escribir_usuarios($conexion, $rol){
        $usuarios = RepositorioAdmin::ver_usuarios_rol($conexion, $rol);
        if(count($usuarios)){
            foreach ($usuarios as $usuario) {?>
            <tr>
                            <td><?php echo $usuario['Nombre_usuario']?></td>
                            <td><?php echo $usuario['Nombre']?></td>
                            <td><?php echo $usuario['Correo']?></td>
                            <td><?php echo $usuario['Telefono']?></td>
            </tr>
        <?php
        }} else{
            ?>
            <tr>
                <th colspan="9">Aún no hay usuarios de este tipo agregados</th>
            </tr>
            <?php
        }
    }
    public static function escribir_medicamentos($conexion){
        $medicamentos = Extras::recuperar_medicamentos($conexion);
        foreach ($medicamentos as $medicamento){?>
            <option value="<?php echo $medicamento['id_medicamento']?>"><?php echo $medicamento['nom_comercial']?></option>
        <?php }
    }
}
