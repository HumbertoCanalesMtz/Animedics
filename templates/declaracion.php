<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo RUTA_CSS?>/bootstrap.css">
    <link rel="stylesheet" href="<?php echo RUTA_CSS?>/styles.css">
    <?php 
    if (!isset($titulo) || empty($titulo)){
        $titulo = 'Veterinaria Huellitas';}
    echo "<title>$titulo</title>";?>
  </head>
  <body>