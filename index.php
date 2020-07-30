<?php
    include_once 'app/Conexion.inc.php';
    include_once 'app/RepositorioUsuario.inc.php';
    Conexion::abrir_conexion();
    $total_usuarios = RepositorioUsuario::obtener_num_usuarios(Conexion::obtener_conexion());
    Conexion::cerrar_conexion();
    include_once 'templates/declaracion.php';
    include_once 'templates/navbar.php';
?>
      <br/>
      <div class="container">
        <h1 style=>Hola Mundo</h1>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3600.188785706692!2d-103.32311224966928!3d25.53208772421833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x868fc48455d823cb%3A0xc18fad7b464487e4!2sUniversidad%20Tecnol%C3%B3gica%20de%20Torre%C3%B3n!5e0!3m2!1ses-419!2smx!4v1595822039549!5m2!1ses-419!2smx" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
<?php include_once 'templates/cierre.php'?>