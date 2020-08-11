<?php
include_once 'app/Sesion.inc.php';
?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="col-md-6 col-10">
            <div class="row navbar-g centrado-vertical">
                <div>
                    <a href="<?php echo SERVER?>"><img src="<?php echo RUTA_IMG?>/icon.png" class="gira" width="50px" height="50px"></a>
                </div>
                <div class="d-none d-md-block"><a style="color: inherit; text-decoration: none" href="<?php echo SERVER?>"> HUELLITAS</a></div>
            </div>
        </div>
        <div class="d-md-none justify-content-center col-2">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="material-icons">view_headline</span>
            </button>        
        </div>    
        <div class="col-md-6 collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="<?php echo SERVER?>#servicios">SERVICIOS</a>
                <a class="nav-item nav-link" href="<?php echo SERVER?>#contacto">CONTACTO</a>
                <a class="nav-item nav-link" href="<?php echo SERVER?>/index/guestappointment.html">BUSCAR CITA</a>
                <a class="nav-item nav-link" href="../views/ayquebruto.php">AGENDAR CITA</a>
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
</header>