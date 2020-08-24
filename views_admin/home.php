<?php
    $titulo = 'Administrador - Huellitas';
    $clase = 'admin';
    $icono = 'iconadmin';

    include_once 'app/config.inc.php';
    include_once 'app/Conexion.inc.php';
    include_once 'app/Datos.inc.php';
    include_once 'app/Medicamento.inc.php';
    include_once 'app/RepositorioCita.inc.php';
    include_once 'app/EscritorAdmin.inc.php';
    include_once 'app/Extras.inc.php';
    
    
    if(isset($_POST['guardar_consulta'])){
        Conexion::abrir_conexion();
        $datos = new Datos('',$_POST['sintomas'],$_POST['temperatura'],$_POST['peso'],$_POST['diagnostico'],$_POST['abdomen'],
        $_POST['org_int'],$_POST['org_ext'],$_POST['operado'],$_POST['deshidratacion']);
        RepositorioCita::agregar_datos_medicos(Conexion::obtener_conexion(), $_POST['folio_hid'], $datos);
        Conexion::cerrar_conexion();
    }
    if(isset($_POST['guardar_med'])){
        Conexion::abrir_conexion();
        $medicamento = new Medicamento($_POST['medicamento'],$_POST['dosis'],$_POST['dias'],$_POST['horas']);
        RepositorioCita::agregar_med_receta(Conexion::obtener_conexion(), $_POST['folio_hid'], $medicamento);
        Conexion::cerrar_conexion();
    }
    if(isset($_POST['completar'])){
        Conexion::abrir_conexion();
        RepositorioCita::completar(Conexion::obtener_conexion(), $_POST['folio_com']);
        Conexion::cerrar_conexion();
    }
    include_once 'templates/declaracion.php';
    include_once 'templates/navbar_admin.php';
    include_once 'modals/modal_receta.php';
    include_once 'modals/modal_consulta.php';
?>
<div class="container-fluid fila fuente-R d-flex justify-content-center">
<div class="fila columna borde-redondo">
    <div>
        <table class='table table-light table-striped table-hover text-center'>
                <thead class='thead-dark'>
                    <tr>
                    <h1 class="fuente-WM gris separadito text-center">Citas</h1>
                    </tr>
                    <tr>
                        <td>Filtrar las citas por:</td>
                        <form method='post' action='<?php echo RUTA_CITAS?>'>
                        <td><button class="btn boton-gris" name="todas">Todas</button></td>
                        <td><button class="btn boton-gris" name="pendientes">Pendientes</button></td>
                        <td><button class="btn boton-gris" name="completadas">Completadas</button></td>
                        <td><button class="btn boton-gris" name="usuarios">Usuarios</button></td>
                        <td><button class="btn boton-gris" name="invitados">Invitados</button></td>
                        </form>
                        <form method='post' action='<?php echo RUTA_AGENDAR_CITA?>'>
                        <td colspan="3"><button class="btn boton">Agregar una nueva cita</button></td>
                        </form>
                    </tr>
                    <tr>
                        <th>Folio</th>
                        <th>Veterinario</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Mascota</th>
                        <th>Especie</th>
                        <th>Dueño</th>
                        <th>Teléfono</th>
                        <th colspan="3">Administrar</th>
                    </tr>
                </thead>
                <tbody>
        <?php
        Conexion::abrir_conexion();
        if(isset($_POST['completadas'])){
            EscritorAdmin::escribir_citas_completadas(Conexion::obtener_conexion());
        } else if(isset($_POST['pendientes'])){
            EscritorAdmin::escribir_citas_pendientes(Conexion::obtener_conexion());
        } else if(isset($_POST['todas'])){
            EscritorAdmin::escribir_citas(Conexion::obtener_conexion());
        } else if(isset($_POST['usuarios'])){
            EscritorAdmin::escribir_citas_usuarios(Conexion::obtener_conexion());
        } else if(isset($_POST['invitados'])){
            EscritorAdmin::escribir_citas_invitados(Conexion::obtener_conexion());
        } else{
            EscritorAdmin::escribir_citas(Conexion::obtener_conexion());
        }
        Conexion::cerrar_conexion();
        ?>
        </table>
    </div>
    </div>
</div>
<div class="esconde-logo"></div>
<?php include_once 'templates/cierre.php';?>