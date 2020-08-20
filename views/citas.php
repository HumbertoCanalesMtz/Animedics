<?php
$titulo = "Agendar una cita";
include_once "app/config.inc.php";
include_once "app/Especie.inc.php";
include_once "app/Conexion.inc.php";
include_once "app/Escritor.inc.php";
include_once "app/Mascota.inc.php";
include_once "templates/declaracion.php";
include_once "templates/navbar.php"
?>
<body class="fuente-R">
    <div class="container fila borde-redondo">
        <div class="row fila">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">PACIENTE</div>
                    <img src="<?php Especie::seleccionar_imagen($mascota);?>" class="card-img-top" alt="Especie">
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
            </div>
        </div>
        <div class="borde-sup"><br></div>
        <div class="row fila">
            <div class="col-md-12 text-center">
                <h4>Próximas citas</h4>
                <div class="d-flex flex-wrap align-items-center justify-content-center">
                    <?php
                    Conexion::abrir_conexion();
                    Escritor::escribir_citas_pendientes(Conexion::obtener_conexion(), $mascota -> obtener_id_animal());
                    ?>
                </div>
            </div>
        </div>
        <div class="borde-sup"><br></div>
        <div class="row">
            <div class="col-md-12 text-center">
                <h4>Citas pasadas</h4>
                <div class="d-flex flex-wrap align-items-center justify-content-center">
                    <?php
                    Escritor::escribir_citas_completadas(Conexion::obtener_conexion(), $mascota -> obtener_id_animal());
                    Conexion::cerrar_conexion();
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php include_once "templates/cierre.php";