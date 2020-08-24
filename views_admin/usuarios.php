<?php
    $titulo = 'Administrar usuarios';
    $clase = 'admin';
    $icono = 'iconadmin';
    
    include_once 'app/config.inc.php';
    include_once 'app/Conexion.inc.php';
    include_once 'app/RepositorioAdmin.inc.php';
    include_once 'app/EscritorAdmin.inc.php';
    
    include_once 'templates/declaracion.php';
    include_once 'templates/navbar_admin.php';
    include_once 'modals/modal_usuario.php';
?>
<div class="fila"></div>
<div class="container-fluid fuente-R d-flex justify-content-center">
    <div class="fila columna borde-redondo">
    <h1 class="fuente-WM gris separadito text-center">Usuarios</h1>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link disabled gris" id="vets-tab" data-toggle="tab" href="#home" role="tab"
                    aria-controls="home" aria-selected="true">Ver lista de...</a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link active gris" id="vets-tab" data-toggle="tab" href="#home" role="tab"
                    aria-controls="home" aria-selected="true">Clientes</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link gris" id="users-tab" data-toggle="tab" href="#profile" role="tab"
                    aria-controls="profile" aria-selected="false">Veterinarios</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link gris" id="admins-tab" data-toggle="tab" href="#contact" role="tab"
                    aria-controls="contact" aria-selected="false">Administradores</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="vets-tab">
                <table class="table table-hover table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre de usuario</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    Conexion::abrir_conexion();
                    EscritorAdmin::escribir_usuarios(Conexion::obtener_conexion(), 'Cliente');
                    Conexion::cerrar_conexion();
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="users-tab">
                <table class="table table-hover table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre usuario</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    Conexion::abrir_conexion();
                    EscritorAdmin::escribir_usuarios(Conexion::obtener_conexion(), 'Veterinario');
                    Conexion::cerrar_conexion();
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="admins-tab">
                <table class="table table-hover table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre usuario</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    Conexion::abrir_conexion();
                    EscritorAdmin::escribir_usuarios(Conexion::obtener_conexion(), 'Administrador');
                    Conexion::cerrar_conexion();
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                <a href="<?php echo RUTA_REGISTRAR?>" class="btn boton"><span class="material-icons">add</span> Agregar usuario</a>
            </div>
        </div>
    </div>
</div>
<div class="esconde-logo"></div>
<?php include_once 'templates/cierre.php'?>