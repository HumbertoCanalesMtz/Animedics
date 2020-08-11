<?php
//Así no va a ser esto, mañana lo edito, es sólo para ejemplificar.
$titulo = "Mi Perfil";
include_once "app/config.inc.php";
include_once "templates/declaracion.php";
include_once "templates/navbar.php";
?>
<body>
    <div class="container justify-content-center fila borde-redondo borde-verde">
        <table class="table table-hover bg-blanco text-center fuente-R">
            <thead class="verde separadito">
                <tr><th colspan="2"><?php echo $_SESSION['nombres'], $_SESSION['ap_paterno'], $_SESSION['ap_materno'];?></th></tr>
            </thead>
            <tbody>
                <tr>
                    <th>Nombre de usuario</th>
                    <td><?php echo $_SESSION['nombre_usuario']?></td>
                </tr>
                <tr>
                    <th>Correo electronico</th>
                    <td><?php echo $_SESSION['correo']?></td>
                </tr>
                <tr>
                    <th>Telefono</th>
                    <td><?php echo $_SESSION['telefono']?></td>
                </tr>
                <tr>
                    <td><button class="btn boton"><span class="material-icons">edit</span> Cambiar contraseña</button></td>
                    <td><button class="btn boton"><span class="material-icons">edit</span> Editar datos</button></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2"><a href="pets.html" class="btn boton"><span class="material-icons icono-20">pets</span> Mis mascotas</a></th>
                </tr>
            </tfoot>
        </table>
    </div>
    <br><br><br><br><br><br><br><br><br>    <!--Preciso que el footer se vea así XD-->
<?php include_once "templates/cierre.php";