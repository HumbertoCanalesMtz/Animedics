<?php
include_once 'app/config.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/Redireccion.inc.php';

if(isset($_GET['nombre']) && !empty($_GET['nombre']))