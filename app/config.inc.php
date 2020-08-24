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
define("RUTA_ADMINISTRACION", SERVER."/administracion");
define("RUTA_PERFILADMIN", SERVER."/perfil");
define("RUTA_VERUSUARIOS", SERVER."/verusuarios");
define("RUTA_REGISTRAR", SERVER."/registrar");

//Rutas para veterinarios
define("RUTA_PERFILVET", SERVER."/perfil");
define("RUTA_CONSULTAS", SERVER."/consultas");

//Rutas para clientes
define("RUTA_PERFIL", SERVER."/perfil");
define("RUTA_MASCOTAS", SERVER."/mascotas");
define("RUTA_CITAS", SERVER."/citas");
define("RUTA_BUSCAR_CITA", SERVER."/buscar-cita");
define("RUTA_AGENDAR_CITA", SERVER."/agendar-cita");
define("RUTA_CITA_AGENDADA", SERVER."/cita-agendada");

//Rutas de archivos
define("RUTA_CSS", SERVER."/css");
define("RUTA_JS", SERVER."/js");
define("RUTA_IMG", SERVER."/img");

