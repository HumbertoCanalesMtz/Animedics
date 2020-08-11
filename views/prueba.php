<?php
include_once '../app/config.inc.php';
include_once '../app/Conexion.inc.php';
Conexion::abrir_conexion();
Conexion::cerrar_conexion();

include_once 'declaracion.php';

?>
<h1><?php echo $_POST['correo'];?></h1>
<h1>Hola mundo</h1>
<?php include_once 'cierre.php';?>
