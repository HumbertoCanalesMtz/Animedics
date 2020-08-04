<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorLogin.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/Sesion.inc.php';

if(Sesion::sesion_iniciada()){
    Redireccion::redirigir(SERVER);
}
if(isset($_POST['ingresar'])){
    Conexion::abrir_conexion();
    $validador = new ValidadorLogin($_POST['correo'], $_POST['clave'], Conexion::obtener_conexion());
    if($validador -> obtener_error() === '' && !is_null($validador -> obtener_usuario())){
        //iniciar sesion y volver al index
        Sesion::iniciar_sesion($validador -> obtener_usuario() -> obtener_id_usuario(), $validador -> obtener_usuario() -> obtener_nombre_usuario());
        Redireccion::redirigir(SERVER);
    } 
    Conexion::cerrar_conexion();
}
$titulo = 'Iniciar Sesión';
include_once 'templates/declaracion.php';
include_once 'templates/navbar.php';
?>
  <br/>
  <div class="container">
    <div class="row">
        <div class="col">
            <h1>Inciar Sesión</h1>
            <form method="post" action="<?php echo htmlspecialchars(RUTA_LOGIN);?>">
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="text" class="form-control" name="correo" 
                    <?php if(isset($_POST['ingresar'])&&isset($_POST['correo'])&&!empty($_POST['correo'])){
                        echo 'value="'.$_POST['correo'].'"';
                    }?>
                    required autofocus>
                </div>
                    <div class="form-group">
                    <label for="contraseña">Contraseña</label>
                    <input type="password" class="form-control" name="clave" required autofocus>
                    <?php if(isset($_POST['ingresar'])){
                        $validador -> mostrar_error();
                    }?>
                </div>
                <button type="submit" class="btn btn-primary" name="ingresar">Ingresar</button> 
            </form>
        </div>
    </div>
  </div>
<?php include_once 'templates/cierre.php'?>

