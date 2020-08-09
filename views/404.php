<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/icon.png">
    <link rel="stylesheet" href="../css/hojaestilos.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>No existe ésta página</title>
</head>
<body>
    <header>
        <?php 
            include_once "app/config.inc.php";
            include_once "templates/declaracion.php";
            include_once "templates/navbar.php";
        ?>
    </header>
    <div class="fila fuente-R">
        <div class="container fila borde-redondo borde-verde">
            <div class="row justify-content-center">
                <h1>Página no encontrada</h1>
                <div class="col-md-12 text-center">
                    <img src="<?php echo RUTA_IMG?>/cheems.jpg" alt="UnU" width="200">
                </div>
                <div class="col-md-12 text-center">
                    <a href="<?php echo SERVER?>" class="icono-40">Volver al inicio</a>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <?php include_once "templates/cierre.php";?>
    </footer>
</body>
</html>