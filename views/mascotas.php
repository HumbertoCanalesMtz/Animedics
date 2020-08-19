<?php
$titulo = "Mis Mascotas";
include_once "app/config.inc.php";
include_once "app/Conexion.inc.php";
include_once "templates/declaracion.php";
include_once "templates/navbar.php"
?>
<div class="container">
        <div class="row fila borde-redondo">
            <div class="col-md-4 text-center fuente-R">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Buscar mascota" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn boton" type="button" id="button-addon2"><span class="material-icons icono-10">search</span></button>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <?php 
                Conexion::abrir_conexion();
                Escritor::escribir_mascotas(Conexion::obtener_conexion(), $_SESSION['id_usuario']);
                Conexion::cerrar_conexion();
                ?>
            </div>
        </div>
    </div>
<?php include_once "templates/cierre.php";