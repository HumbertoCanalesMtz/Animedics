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
    include_once 'views_admin/modals/modal_usuario.php';
?>
<div class="fila"></div>
<div class="container-fluid fuente-R d-flex justify-content-center">
    <div class="fila columna borde-redondo">
        <table class="table table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre usuario</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Rol</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Pusidestroyer</td>
                    <td>Juanito</td>
                    <td>guapeton@gmail.com</td>
                    <td>8715251340</td>
                    <td>Estudiambre</td>
                    <td><button class="btn boton-gris"><span class="material-icons">edit</span></button></td>
                </tr>
            </tbody>
            <tfoot class="text-center">
                <tr>
                    <td colspan="6"><button class="btn boton"><span class="material-icons">add</span></button></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="esconde-logo"></div>
<?php include_once 'templates/cierre.php'?>