<?php 
include_once 'app/config.inc.php';
include_once 'app/Sesion.inc.php';
include_once 'app/Redireccion.inc.php';

Sesion::cerrar_sesion();
Redireccion::redirigir(SERVER);