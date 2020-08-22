                <?php
                include_once 'templates/navbar_admin.php';
                include_once 'app/Conexion.inc.php';
                $conexion= new Conexion();
                Conexion::abrir_conexion();
                extract($_POST);
                $cadena="INSERT INTO servicio(nombre) values ('$nombre_servicio')";
                $conexion->ejecutarSQL($cadena);
                Conexion::cerrar_conexion();
                header("refresh:1; ../index.php");
                ?>