<?php
$titulo = 'Error 404';
$clase = 'admin';
$icono = 'iconadmin'; 
include_once "app/config.inc.php";
include_once "templates/declaracion.php";
include_once "templates/navbar_admin.php";
?>
<div class="fila fuente-R">
    <div class="container fila borde-redondo borde-verde">
        <div class="row justify-content-center">
            <h1>Lo sentimos, esta página no existe.</h1>
            <div class="col-md-12 text-center">
                <img src="<?php echo RUTA_IMG?>/cheems.jpg" alt="UnU" width="200">
            </div>
            <div class="col-md-12 text-center">
                <a href="<?php echo SERVER?>" class="icono-40">Volver al inicio</a>
            </div>
        </div>
    </div>
</div>
<div class="esconde-logo"></div>
<?php include_once "templates/cierre.php";?>