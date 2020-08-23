<?php
include_once 'app/Sesion.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/Cita.inc.php';
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand text-secondary fuente-WM" href="<?php echo SERVER?>">
            <img src="<?php echo RUTA_IMG?>/iconadmin.png" width="30" height="30" class="d-inline-block align-top"
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
                        Veterinaria
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Clientes</a>
                        <a class="dropdown-item" href="#">Veterinarios</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Administración
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo RUTA_ADMINISTRACION?>">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Servicios
                                    <span class="badge badge-primary badge-pill">14</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Especies
                                    <span class="badge badge-primary badge-pill">2</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Medicamentos
                                    <span class="badge badge-primary badge-pill">1</span>
                                </li>
                            </ul>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" role="button" data-toggle="modal" href="#ModalUsuario">Registrar usuario</a>
                    </div>
                    <?php include_once 'views_admin/modals/modal_usuario.php'?>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sesión
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Cerrar sesión</a>
                        <a class="dropdown-item" href="#">Perfil</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="sombreado-g"></div>
</header>