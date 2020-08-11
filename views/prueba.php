<?php 
if(isset($_POST['xd'])){
    Conexion::abrir_conexion();
    if($_POST['correo'] == 'lmao' && $_POST['clave'] == 'lol'){
        echo 'EL BICHO';
    } else {
        echo 'MI MADRE';
    }
}
include_once 'declaracion.php'?>
<h1>Hola mundo<h1>
<?php include_once 'cierre.php'?>
