<?php 
include_once 'app/config.inc.php';
include_once 'app/Sesion.inc.php';
include_once 'app/Redireccion.inc.php';
//Cuando se redirige a esta página se cierra la sesión del usuario.
Sesion::cerrar_sesion();
Redireccion::redirigir(SERVER);