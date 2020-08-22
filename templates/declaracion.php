<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<<<<<<< HEAD
    <link rel="icon" href="<?php if (!isset($icono)||empty($icono)) {$icono = 'icon';} echo RUTA_IMG.'/'.$icono.'.png'?>">
    <link rel="stylesheet" href="<?php echo RUTA_CSS?>/bootstrap.css">
=======
    <link rel="icon" href="<?php echo RUTA_IMG?>/icon.png">
    <link rel="stylesheet" href="<?php echo RUTA_CSS?>/bootstrap.min.css">
>>>>>>> 8964bc842b8634c69d1a60c6f666e0b3b5325fcf
    <link rel="stylesheet" href="<?php echo RUTA_CSS?>/hojaestilos.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="<?php echo RUTA_CSS?>/jquery-ui.min.css">
    <?php 
    if (!isset($titulo) || empty($titulo)){
        $titulo = 'Veterinaria Huellitas';}
    echo "<title>$titulo</title>";?>
</head>

<body class="<?php if (!isset($clase)||empty($clase)){$clase='cliente';}echo $clase?>">