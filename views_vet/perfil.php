<?php
    $titulo = 'Perfil Veterinario';
    $clase = 'vet';
    $icono = 'iconvet';
    include_once 'app/config.inc.php';
    include_once 'app/Conexion.inc.php';
    include_once 'templates/declaracion.php';
    include_once 'templates/navbar_vet.php';
?>
<div class="fila"></div>
<div class="container justify-content-center fila borde-redondo borde-naranja">
    <h1 class="fuente-WM naranja separadito text-center">Datos de veterinario.</h1>
    <div class="row sombreado-c"></div>
    <form method="post">
        <table class="table table-hover bg-blanco text-center fuente-R">

            <tbody>
                <tr>
                    <th>Nombre del veterinario</th>
                    <td>Pedro Armendari Lopez</td>
                </tr>
                <tr>
                    <th>Cedula</th>
                    <td>9182679</td>
                </tr>
                <tr>
                    <th>Correo electronico</th>
                    <td>locochon1231@gmail.com</td>
                </tr>
                <tr>
                    <th>Telefono</th>
                    <td>8714175920</td>
                </tr>
                <tr>
                    <td><button class="btn boton-gris" name="cambiar"><span class="material-icons">edit</span> Cambiar
                            contraseña</button></td>
                    <td><button class="btn boton-gris" name="editar"><span class="material-icons">edit</span> Editar
                            datos</button></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
<div class="esconde-logo"></div>
<?php include_once 'templates/cierre.php';?>