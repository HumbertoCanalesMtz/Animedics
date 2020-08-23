<a role="button" type="button" href="<?php echo RUTA_PERFIL;?>" class="btn borde-boton borde-verde">
    <span class="material-icons verde icono-10">person_outline</span>
</a>
<button type="button" class="btn dropdown-toggle dropdown-toggle-split boton blanco" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">Toggle Dropdown</span>
</button>
<div class="dropdown-menu dropdown-menu-right fuente-R" aria-labelledby="dropdownMenuButton">
    <h6 class="dropdown-header" href="<?php echo RUTA_PERFIL;?>">Bienvenido, <?php echo $_SESSION['nombre_usuario'];?>
    </h6>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="<?php echo RUTA_MASCOTAS?>">Mis mascotas</a>
    <a class="dropdown-item" href="<?php echo RUTA_PERFIL?>">Mi perfil</a>
    <a class="dropdown-item" href="<?php echo RUTA_LOGOUT?>">Cerrar sesión</a>
</div>