<?php
    $titulo = 'Administrador Huellitas';
    $clase = 'admin';
    include_once 'app/config.inc.php';
    include_once 'app/Conexion.inc.php';
    include_once 'app/RepositorioUsuario.inc.php';
    include_once 'templates/declaracion.php';
?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand text-secondary fuente-WM" href="<?php echo SERVER?>">
            <img src="<?php echo RUTA_IMG?>/iconadmin.png" width="30" height="30"
                class="d-inline-block align-top" alt="" loading="lazy">
            HUELLITAS
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Veterinaria
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Clientes</a>
                        <a class="dropdown-item" href="#">Veterinarios</a>
                        <a class="dropdown-item" href="<?php echo RUTA_VERCITAS?>">Citas</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Llenar recetas</a>
                        <a class="dropdown-item" href="#">Llenar consulta</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Administración
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Servicios</a>
                        <a class="dropdown-item" href="#">Especies</a>
                        <a class="dropdown-item" href="#">Medicamentos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Registrar usuario</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<?php include_once 'templates/cierre.php'?>