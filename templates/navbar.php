<?php
include_once 'app/Sesion.inc.php';
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <a class="navbar-brand" href="<?php echo SERVER;?>"><h1>Animedics</h1></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Servicios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contacto</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Agendar cita</a>
            </li>
          </ul>
          <ul class="navbar-nav justify-content-right">
          <?php if(Sesion::sesion_iniciada()){?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo RUTA_MASCOTAS;?>">Mis Mascotas</a> 
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo RUTA_PERFIL;?>">Bienvenido, <?php echo $_SESSION['nombre_usuario'];?></a> 
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo RUTA_LOGOUT;?>">Cerrar sesión</a>
            </li>
          </ul>
          <?php } else{ ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo RUTA_LOGIN;?>">Iniciar Sesión</a> 
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo RUTA_REGISTRO;?>">Registrarse</a>
            </li>
          </ul>
          <?php } ?>
        </div>
      </nav>