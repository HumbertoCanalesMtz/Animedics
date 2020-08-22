<?php
include_once 'app/Sesion.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/Cita.inc.php';

?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="col-md-6 col-10">
            <div class="row navbar-g centrado-vertical">
                <div>
                    <a href="<?php echo SERVER?>"><img src="<?php echo RUTA_IMG?>/icon.png" class="gira" width="50px"
                            height="50px"></a>
                </div>
                <div class="d-none d-md-block">
                    <a style="color: inherit; text-decoration: none" href="<?php echo SERVER?>"> HUELLITAS
                    </a>
                </div>
            </div>
        </div>
        <div class="d-md-none justify-content-center col-2">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="material-icons">view_headline</span>
            </button>
        </div>
        <div class="col-md-6 collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="<?php echo SERVER?>#servicios">SERVICIOS</a>
                <a class="nav-item nav-link" href="<?php echo SERVER?>#contacto">CONTACTO</a>
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        BUSCAR CITA
                    </a>
                    <div class="dropdown-menu borde-redondo borde-verde fuente-WM"
                        aria-labelledby="navbarDropdownMenuLink">
                        <div class="dropdown-header verde">INTRODUZCA SU FOLIO</div>
                        <div class="dropdown-divider"></div>
                        <div class="text-center columna">
                            <form action="<?php echo RUTA_BUSCAR_CITA?>" method="post">
                                <input class="txb" type="text" name="folio" id="invoice" placeholder="Ej. C000001" size="10">
                                <div class="dropdown-divider"></div>
                                <button class="btn boton" type="submit" name="buscar">buscar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <a class="nav-item nav-link" href="<?php echo RUTA_AGENDAR_CITA?>">AGENDAR CITA</a>
                <div class="dropdown">
                    <!--Este cambiecito lo hice para que cuando no estés logueado no te muestre el boton de inicio de sesión-->
                    <div class="btn-group" role="group" aria-label="Basic example">

                        <?php 
                        if(Sesion::sesion_iniciada()){ 
                            include_once 'nav_logged.php';
                        } else{
                            include_once 'nav_guest.php';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
    </nav>
    
    <div class="card border-0 rounded-0 sombreado-g"></div>
    <?php if(isset($_POST['ingresar'])){if($validador -> obtener_error() !== ''){?>
    <div class='alert alert-danger text-center' role='alert'>¡Ocurrió un error al iniciar sesión!</div>
    <?php }} ?>
</header>