<?php
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
        $validador = new ValidadorRegistro(Conexion::obtener_conexion(), $_POST['nombres'], $_POST['ap_paterno'], $_POST['ap_materno'], 
        $_POST['correo'], $_POST['clave_1'], $_POST['clave_2'], $_POST['nom_usuario'], $_POST['telefono']);
        if($validador ->validar_registro()){
            $usuario = new Usuario('', $validador -> obtener_nombres(), $validador -> obtener_ap_paterno(), $validador -> obtener_ap_materno(),
            $validador -> obtener_correo(), password_hash($validador -> obtener_clave(),PASSWORD_DEFAULT), $validador -> obtener_nom_usuario(), $validador -> obtener_telefono(), 3, '');
            $usuario_insertado = RepositorioUsuario::insertar_usuario(Conexion::obtener_conexion(), $usuario);
            Redireccion::redirigir(SERVER);
        }
        Conexion::cerrar_conexion();
    }

    $titulo = 'Registrarse';
    include_once 'templates/declaracion.php';
    include_once 'templates/navbar.php';
?>
      <br/>
      <div class="container">
        <div class="row">
            <div class="col">
                <h1>Registrarse</h1>
                <form method="post" action="<?php echo htmlspecialchars(RUTA_REGISTRO);?>">
                    <?php if(isset($_POST['registrar'])){
                        include_once 'templates/registro_validado.php';
                    }else{
                        include_once 'templates/registro_vacio.php';
                    }?>
                </form>
            </div>
        </div>
      </div>
<?php include_once 'templates/cierre.php'?>