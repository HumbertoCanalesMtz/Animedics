<?php
//Así no va a ser esto, mañana lo edito, es sólo para ejemplificar.
$titulo = "Mi Perfil";
include_once "app/config.inc.php";
include_once "app/Conexion.inc.php";
include_once "app/Usuario.inc.php";
include_once "app/RepositorioUsuario.inc.php";
include_once "app/ValidadorPerfil.inc.php";
include_once "app/Redireccion.inc.php";
include_once "app/Sesion.inc.php";
include_once "templates/declaracion.php";
include_once "templates/navbar.php";

if(!Sesion::sesion_iniciada()){
    Redireccion::redirigir(SERVER);
}
Conexion::abrir_conexion();
$usuario = RepositorioUsuario::obtener_usuario(Conexion::obtener_conexion(), $_SESSION['nombre_usuario']); 

if(isset($_POST['guardar'])){
    $cambio_listo = false;
    $validador = new ValidadorPerfil(Conexion::obtener_conexion(), $_POST['nombres'], $_POST['ap_paterno'], $_POST['ap_materno'], 
    $_POST['correo'], $_POST['nombre_usuario'], $_POST['telefono'], $usuario -> obtener_nombre_usuario(), $usuario -> obtener_correo(),
    $usuario -> obtener_telefono());
    if($validador -> validar_edicion()){
        $id = $_SESSION['id_usuario'];
        $usuario_c = new Usuario($id, $validador -> obtener_nombres(), $validador -> obtener_ap_paterno(), $validador -> obtener_ap_materno(),
        $validador -> obtener_correo(),'', $validador -> obtener_nom_usuario(), $validador -> obtener_telefono(), '', '');
        RepositorioUsuario::editar_usuario(Conexion::obtener_conexion(), $usuario_c);
        Sesion::cerrar_sesion();
        Sesion::iniciar_sesion($usuario_c -> obtener_id_usuario(), $usuario_c -> obtener_nombre_usuario());
	    $cambio_listo = true;
        $usuario = RepositorioUsuario::obtener_usuario(Conexion::obtener_conexion(), $usuario_c -> obtener_nombre_usuario());	
    }
}
if(isset($_POST['guardar_clave'])){
    $clave_lista = false;
    $validador_clave = new ValidadorClave($_POST['clave_ing'], $usuario -> obtener_clave(), $_POST['clave_1'], $_POST['clave_2']);
    if($validador_clave -> validar_clave()){
        $id = $_SESSION['id_usuario'];
        RepositorioUsuario::cambiar_clave(Conexion::obtener_conexion(), $id, $validador_clave -> obtener_clave());
	    $clave_lista = true;	
    }
}
Conexion::cerrar_conexion();
?>
<body>
    <div class="container justify-content-center fila borde-redondo borde-verde">
    <form method="post" action="<?php echo htmlspecialchars(RUTA_PERFIL);?>">
        <table class="table table-hover bg-blanco text-center fuente-R">
        <?php 
            if(!isset($_POST['editar'])&&!isset($_POST['guardar'])&&!isset($_POST['cambiar'])){
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
    <br><br><br><br><br><br><br><br><br>    <!--Preciso que el footer se vea así XD-->
<?php include_once "templates/cierre.php";?>
