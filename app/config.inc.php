<?php
//En este archivo se guardan datos generales del proyecto.

//Información de la base de datos
define('NOMBRE_SERVIDOR', 'localhost');
define('NOMBRE_USUARIO', 'root');
define('PASSWORD', '');
define('NOMBRE_BD', 'animedics');

//Rutas generales
define("SERVER", "http://localhost/Animedics");
define("RUTA_REGISTRO", SERVER."/registro");
define("RUTA_LOGIN", SERVER."/login");
define("RUTA_LOGOUT", SERVER."/logout");

//Rutas para administradores

//Rutas para veterinarios

//Rutas para clientes
define("RUTA_PERFIL", SERVER."/perfil");
define("RUTA_MASCOTAS", SERVER."/mascotas");
define("RUTA_CITAS", SERVER."/citas");
define("RUTA_CITASFOLIO", SERVER."/citasfolio");
define("RUTA_AGENDARCITA", SERVER."/agendarcita");

//Rutas de archivos
define("RUTA_CSS", SERVER."/css");
define("RUTA_JS", SERVER."/js");
define("RUTA_IMG", SERVER."/img");

