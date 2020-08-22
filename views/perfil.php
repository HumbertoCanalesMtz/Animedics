<?php
//Así no va a ser esto, mañana lo edito, es sólo para ejemplificar.
$titulo = "Mi Perfil";
include_once "app/config.inc.php";
include_once "app/Conexion.inc.php";
include_once "app/Usuario.inc.php";
include_once "app/RepositorioUsuario.inc.php";
include_once "app/ValidadorPerfil.inc.php";
include_once "app/ValidadorClave.inc.php";
include_once "app/Redireccion.inc.php";
include_once "app/Sesion.inc.php";
include_once "templates/declaracion.php";
include_once "templates/navbar.php";

if(!Sesion::sesion_iniciada()){
    Redireccion::redirigir(SERVER);
}
Conexion::abrir_conexion();
//Se crea un usuario a partir de recuperar los datos del usuario que tiene sesión iniciada.
$usuario = RepositorioUsuario::obtener_usuario(Conexion::obtener_conexion(), $_SESSION['nombre_usuario']); 
//Para cambiar los datos del usuario ->
if(isset($_POST['guardar'])){
    $cambio_listo = false;
    //Se validan los datos ingresados en el formulario
    $validador = new ValidadorPerfil(Conexion::obtener_conexion(), $_POST['nombres'], $_POST['ap_paterno'], $_POST['ap_materno'], 
    $_POST['correo'], $_POST['nombre_usuario'], $_POST['telefono'], $usuario -> obtener_nombre_usuario(), $usuario -> obtener_correo(),
    $usuario -> obtener_telefono());
    //Si todos los datos son válidos, se crea un usuario (usuario_c) con los datos ingresados.
    if($validador -> validar_edicion()){
        $id = $_SESSION['id_usuario'];
        $usuario_c = new Usuario($id, $validador -> obtener_nombres(), $validador -> obtener_ap_paterno(), $validador -> obtener_ap_materno(),
        $validador -> obtener_correo(),'', $validador -> obtener_nom_usuario(), $validador -> obtener_telefono(), '', '');
        //Se llama al método para editar a un usuario y se realizaron los cambios.
        RepositorioUsuario::editar_usuario(Conexion::obtener_conexion(), $usuario_c);
        //Se cierra sesión y se vuelve a iniciar para que el nombre de usuario se actualice.
        Sesion::cerrar_sesion();
        Sesion::iniciar_sesion($usuario_c -> obtener_id_usuario(), $usuario_c -> obtener_nombre_usuario());
        $cambio_listo = true;
        //Se reemplaza al usuario anterior por el que ha sido editado para que los cambios se reflejen en la página.
        $usuario = RepositorioUsuario::obtener_usuario(Conexion::obtener_conexion(), $usuario_c -> obtener_nombre_usuario());	
    }
}
//Para cambiar la contraseña ->
if(isset($_POST['guardar_clave'])){
    $clave_lista = false;
    //Se validan las tres contraseñas ingresadas.
    $validador_clave = new ValidadorClave($_POST['clave_ing'], $usuario -> obtener_clave(), $_POST['clave_1'], $_POST['clave_2']);
    //Si son correctas, se cambia la contraseña del usuario que tiene la sesión iniciada.
    if($validador_clave -> validar_clave()){
        $id = $_SESSION['id_usuario'];
        RepositorioUsuario::cambiar_clave(Conexion::obtener_conexion(), $id, password_hash($validador_clave -> obtener_clave(),PASSWORD_DEFAULT));
	    $clave_lista = true;	
    }
}
Conexion::cerrar_conexion();
?>
<body>
    <div class="container justify-content-center fila borde-redondo borde-verde">
    <h1 class="fuente-WM verde separadito text-center">MI PERFIL</h1>
    <form method="post" action="<?php echo htmlspecialchars(RUTA_PERFIL);?>">
        <table class="table table-hover bg-blanco text-center fuente-R">
        <?php 
            if(!isset($_POST['editar'])&&!isset($_POST['guardar'])&&!isset($_POST['cambiar'])&&!isset($_POST['guardar_clave'])){
                include_once 'templates/perfil_ver.php';
            }
            if(isset($_POST['editar'])){
                include_once 'templates/perfil_editar_vacio.php';
            }
            if(isset($_POST['cambiar'])){
                include_once 'templates/perfil_clave_vacio.php';
            }
            if(isset($_POST['cancelar'])){
                include_once 'templates/perfil_ver.php';
            }
            if(isset($_POST['guardar'])){
                if($cambio_listo == true){
                    include_once 'templates/perfil_ver.php'; 
                } else {
                    include_once 'templates/perfil_editar_validado.php';
                } 
            }
            if(isset($_POST['guardar_clave'])){
                if($clave_lista == true){
                    include_once 'templates/perfil_ver.php';
                } else {
                    include_once 'templates/perfil_clave_validado.php';
                }
            }
        ?>
        </table>
    </form>
    </div>
<div class="esconde-logo"></div>
<?php include_once "templates/cierre.php";?>
