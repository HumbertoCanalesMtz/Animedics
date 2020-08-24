<?php
    $titulo = 'Administrar servicios';
    $clase = 'admin';
    $icono = 'iconadmin';
    
    include_once 'app/config.inc.php';
    include_once 'app/Conexion.inc.php';
    include_once 'app/RepositorioAdmin.inc.php';
    include_once 'app/EscritorAdmin.inc.php';
    
    include_once 'templates/declaracion.php';
    include_once 'templates/navbar_admin.php';

    include_once 'modals/modal_agregar_servicio.php';
    include_once 'modals/modal_agregar_meds.php';
    include_once 'modals/modal_agregar_especie.php';
    include_once 'modals/modal_servicio.php';
    include_once 'modals/modal_especie.php';
    include_once 'modals/modal_meds.php';

    $error_serv = null;
    $error_esp = null;
    $error_med = null;

    if(isset($_POST['eliminar_servicio'])){
        Conexion::abrir_conexion();
        RepositorioAdmin::eliminar_servicio(Conexion::obtener_conexion(), $_POST['servicio']);
        Conexion::cerrar_conexion();
    }
    if(isset($_POST['editar_servicio'])){
        Conexion::abrir_conexion();
        RepositorioAdmin::editar_servicio(Conexion::obtener_conexion(), $_POST['servicio_hid'], $_POST['nombre_servicio']);
        Conexion::cerrar_conexion();
    }
    if(isset($_POST['agregar_servicio'])){
        Conexion::abrir_conexion();
        if(!RepositorioAdmin::comprobar_servicio(Conexion::obtener_conexion(), $_POST['nuevo_servicio'])){
            RepositorioAdmin::agregar_servicio(Conexion::obtener_conexion(), $_POST['nuevo_servicio']);
        } else{
            $error_serv = "El servicio que intentaste agregar ya existe";
        }
        Conexion::cerrar_conexion();
    }
    if(isset($_POST['eliminar_especie'])){
        Conexion::abrir_conexion();
        RepositorioAdmin::eliminar_especie(Conexion::obtener_conexion(), $_POST['especie']);
        Conexion::cerrar_conexion();
    }
    if(isset($_POST['editar_especie'])){
        Conexion::abrir_conexion();
        RepositorioAdmin::editar_especie(Conexion::obtener_conexion(), $_POST['especie_hid'], $_POST['nombre_especie']);
        Conexion::cerrar_conexion();
    }
    if(isset($_POST['agregar_especie'])){
        Conexion::abrir_conexion();
        if(!RepositorioAdmin::comprobar_especie(Conexion::obtener_conexion(), $_POST['nueva_especie'])){
            RepositorioAdmin::agregar_especie(Conexion::obtener_conexion(), $_POST['nueva_especie']);
        } else{
            $error_esp = "La especie que intentaste agregar ya existe";
        }
        Conexion::cerrar_conexion();
    }
    if(isset($_POST['eliminar_medicamento'])){
        Conexion::abrir_conexion();
        RepositorioAdmin::eliminar_medicamentos(Conexion::obtener_conexion(), $_POST['medicamento']);
        Conexion::cerrar_conexion();
    }
    if(isset($_POST['editar_medicamento'])){
        Conexion::abrir_conexion();
        RepositorioAdmin::editar_medicamento(Conexion::obtener_conexion(), $_POST['medicamento_hid'], $_POST['nombre_medicamento']);
        Conexion::cerrar_conexion();
    }
    if(isset($_POST['agregar_medicamento'])){
        Conexion::abrir_conexion();
        if(!RepositorioAdmin::comprobar_medicamento(Conexion::obtener_conexion(), $_POST['nuevo_medicamento'])){
            RepositorioAdmin::agregar_medicamento(Conexion::obtener_conexion(), $_POST['nuevo_medicamento']);
        } else{
            $error_med = "El medicamento que intentaste agregar ya existe";
        }
        Conexion::cerrar_conexion();
    }
?>
<div class="container-fluid columna fila fuente-R icono-20">
    <div class="row text-center">
        <div class="col-md-4">
        <?php if(isset($error_serv)&&$error_serv!=null){?>
        <div class='alert alert-danger text-center' role='alert'><?php echo $error_serv?></div>
        <?php } ?>
            <table class="table table-light table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Servicio</th>
                        <th colspan="2"><button data-toggle='modal' data-target='#ModalAServicio' class="btn boton fuente-WM">Agregar</button></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                Conexion::abrir_conexion();
                EscritorAdmin::escribir_servicios(Conexion::obtener_conexion());
                ?>
                <tfoot>
                    <tr>
                        <td>Total servicios:</td>
                        <td colspan='2'><?php 
                        echo RepositorioAdmin::num_servicios(Conexion::obtener_conexion());
                        Conexion::cerrar_conexion();
                        ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-md-4">
        <?php if(isset($error_esp)&&$error_esp!=null){?>
        <div class='alert alert-danger text-center' role='alert'><?php echo $error_esp?></div>
        <?php } ?>
            <table class="table table-light table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Especie</th>
                        <th colspan="2"><button class="btn boton fuente-WM" data-toggle='modal' data-target='#ModalAEspecie'>Agregar</button></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                 Conexion::abrir_conexion();
                 EscritorAdmin::escribir_especies(Conexion::obtener_conexion());
                ?>
                <tfoot>
                    <tr>
                        <td>Total especies:</td>
                        <td colspan='2'><?php 
                        echo RepositorioAdmin::num_especies(Conexion::obtener_conexion());
                        Conexion::cerrar_conexion();
                        ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-md-4">
        <?php if(isset($error_med)&&$error_med!=null){?>
        <div class='alert alert-danger text-center' role='alert'><?php echo $error_med?></div>
        <?php } ?>
            <table class="table table-light table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Medicamento</th>
                        <th colspan="2"><button class="btn boton fuente-WM" data-toggle='modal' data-target='#ModalAMeds'>Agregar</button></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                 Conexion::abrir_conexion();
                 EscritorAdmin::escribir_medicamento(Conexion::obtener_conexion());
                ?>
                <tfoot>
                    <tr>
                        <td>Total medicamentos:</td>
                        <td colspan='2'><?php 
                        echo RepositorioAdmin::num_medicamentos(Conexion::obtener_conexion());
                        Conexion::cerrar_conexion();
                        ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<div class="esconde-logo"></div>
<?php include_once 'templates/cierre.php'?>