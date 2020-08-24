<?php
include_once 'app/Sesion.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/Cita.inc.php';
include_once 'app/config.inc.php';
?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="liga-naranja fuente-WM icono-20" href="<?php echo SERVER?>">
            <img src="<?php echo RUTA_IMG?>/iconvet.png" width="30" height="30" class="d-inline-block align-top"
                alt="" loading="lazy">
            HUELLITAS
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sesión
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo RUTA_LOGOUT?>">Cerrar sesión</a>
                        <a class="dropdown-item" href="<?php echo RUTA_PERFIL?>">Perfil</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="sombreado-g"></div>
</header>