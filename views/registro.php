<?php
    $titulo = 'Registrarse';
    include_once 'app/config.inc.php';
    include_once 'app/Conexion.inc.php';
    include_once 'app/Usuario.inc.php';
    include_once 'app/RepositorioUsuario.inc.php';
    include_once 'app/ValidadorRegistro.inc.php';
    include_once 'app/Redireccion.inc.php';
    include_once 'app/Sesion.inc.php';

    if(Sesion::sesion_iniciada()){
        Redireccion::redirigir(SERVER);
    }
    if(isset($_POST['registrar'])){
        Conexion::abrir_conexion();
        //Se validan los datos insertados en el registro.
        $validador = new ValidadorRegistro(Conexion::obtener_conexion(), $_POST['nombres'], $_POST['ap_paterno'], $_POST['ap_materno'], 
        $_POST['correo'], $_POST['clave_1'], $_POST['clave_2'], $_POST['nom_usuario'], $_POST['telefono']);
        //Si todos los datos son correctos, se crea un nuevo usuario con los datos validados.
        if($validador -> validar_registro()){
            $usuario = new Usuario('', $validador -> obtener_nombres(), $validador -> obtener_ap_paterno(), $validador -> obtener_ap_materno(),
            $validador -> obtener_correo(), password_hash($validador -> obtener_clave(),PASSWORD_DEFAULT), $validador -> obtener_nom_usuario(), $validador -> obtener_telefono(), 3, '');
            echo $usuario -> obtener_nombre_usuario();
            //Se crea un nuevo registro en la tabla usuarios de la BD con los datos del usuario creado.
            RepositorioUsuario::insertar_usuario(Conexion::obtener_conexion(), $usuario);
            //Se inicia sesión con los valores del usuario creado.
            $usuario = RepositorioUsuario::obtener_usuario(Conexion::obtener_conexion(), $usuario -> obtener_nombre_usuario());
            Sesion::iniciar_sesion($usuario -> obtener_id_usuario(), $usuario -> obtener_nombre_usuario(), $usuario -> obtener_rol());
            //Se redirige al usuario al index.
	        Redireccion::redirigir(SERVER);
        }
        Conexion::cerrar_conexion();
    }

    include_once 'templates/declaracion.php';
    include_once 'templates/navbar.php';
?>
<div class="container">
    <div class="row fila">
        <div class="borde-redondo">
            <div class="row no-gutters centrado-vertical">
                <div class="col-md-6 no-gutters">
                    <img src="<?php echo RUTA_IMG?>/dogoñora.png" class="card-img img-fluid d-none d-md-block">
                </div>
                <div class="col-md-6">
                    <div class="card-body fuente-R">
                        <h4 class="card-title text-center fuente-WM verde separadito">CREA UN USUARIO</h4>
                        <br>
                        <form method="post" action="<?php RUTA_REGISTRO?>">
                            <?php if(isset($_POST['registrar'])){
                        include_once 'templates/registro_validado.php';
                    }else{
                        include_once 'templates/registro_vacio.php';
                    }?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="esconde-logo"></div>
<?php include_once 'templates/cierre.php'?>