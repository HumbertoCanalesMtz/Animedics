<?php
//En este archivo se guardan datos generales del proyecto.

//Información de la base de datos
define('NOMBRE_SERVIDOR', 'localhost');
define('NOMBRE_USUARIO', 'admin');
define('PASSWORD', 'admin');
define('NOMBRE_BD', 'animedics');

//Rutas web
define("SERVER", "http://localhost/Animedics");
define("RUTA_REGISTRO", SERVER."/registro");
define("RUTA_LOGIN", SERVER."/login");
define("RUTA_LOGOUT", SERVER."/logout");
define("RUTA_PERFIL", SERVER."/perfil");
define("RUTA_MASCOTAS", SERVER."/mascotas");
define("RUTA_CITAS", SERVER."/citas");

define("RUTA_CSS", SERVER."/css");
define("RUTA_JS", SERVER."/js");
define("RUTA_IMG", SERVER."/img");