<?php
    $titulo = 'Registrar usuario';
    $clase = 'admin';
    $icono = 'iconadmin';
    include_once 'app/config.inc.php';
    include_once 'app/Conexion.inc.php';
    include_once 'app/Usuario.inc.php';
    include_once 'app/Vet.inc.php';
    include_once 'app/RepositorioUsuario.inc.php';
    include_once 'app/ValidadorRegistro.inc.php';
    include_once 'app/Redireccion.inc.php';
    include_once 'app/Sesion.inc.php';

    if(isset($_POST['registrar'])){
        Conexion::abrir_conexion();
        //Se validan los datos insertados en el registro.
        $validador = new ValidadorRegistro(Conexion::obtener_conexion(), $_POST['nombres'], $_POST['ap_paterno'], $_POST['ap_materno'], 
        $_POST['correo'], $_POST['clave_1'], $_POST['clave_2'], $_POST['nom_usuario'], $_POST['telefono']);
        //Si todos los datos son correctos, se crea un nuevo usuario con los datos validados.
        if($validador -> validar_registro()){
            if ($_POST['rol']==2) {
                $usuario = new Veterinario('', $validador -> obtener_nombres(), $validador -> obtener_ap_paterno(), $validador -> obtener_ap_materno(),
                $validador -> obtener_correo(), password_hash($validador -> obtener_clave(),PASSWORD_DEFAULT), $validador -> obtener_nom_usuario(), $validador -> obtener_telefono(), $_POST['rol'], '', $_POST['cedula']);
            }else{
                $usuario = new Usuario('', $validador -> obtener_nombres(), $validador -> obtener_ap_paterno(), $validador -> obtener_ap_materno(),
                $validador -> obtener_correo(), password_hash($validador -> obtener_clave(),PASSWORD_DEFAULT), $validador -> obtener_nom_usuario(), $validador -> obtener_telefono(), $_POST['rol'], '');
            }
            //Se crea un nuevo registro en la tabla usuarios de la BD con los datos del usuario creado.
            RepositorioUsuario::insertar_usuario(Conexion::obtener_conexion(), $usuario);
            //Se redirige al usuario al index.
	        Redireccion::redirigir(RUTA_VERUSUARIOS);
        }
        Conexion::cerrar_conexion();
    }

    include_once 'templates/declaracion.php';
    include_once 'templates/navbar_admin.php';
?>
<div class="fila"></div>
<div class="container-fluid columna">
    <div class="borde-redondo fila">
        <h4 class="card-title text-center fuente-WM gris separadito">REGISTRAR USUARIO</h4>
        <br>
        <form method="post" action="<?php RUTA_REGISTRAR?>">
            <?php if(isset($_POST['registrar'])){
                        include_once 'templates/registro_validado_admin.php';
                    }else{
                        include_once 'templates/registro_vacio_admin.php';
                    }?>
        </form>
    </div>
</div>
<div class="esconde-logo"></div>
<?php include_once 'templates/cierre.php'?>