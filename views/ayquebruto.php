<?php include_once 'templates/declaracion.php';
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
if(isset($_POST['xd'])){
   Conexion::abrir_conexion();
	try{
	$sql_1 = "INSERT INTO usuarios(nombre_usuario, correo) VALUES(:id,:user)";
	$sentencia = Conexion::obtener_conexion() -> prepare($sql_1);
	$sentencia -> bindParam(':id', $_POST['correo'], PDO::PARAM_INT);
	$sentencia -> bindParam(':user',$_POST['clave'],PDO::PARAM_STR);
	$sentencia -> execute();
	} catch(PDOException $ex){
		print "ERROR: ".$ex -> getMessage();
	}
   Conexion::cerrar_conexion();
}?>
	<form method="post" action="citas" class="fuente-R">
                        <div class="text-center">
                            <label for="correo">Correo electronico o nombre de usuario</label>
                            <br>
                            <input class="txb" type="text" name="correo" id="email" size="40" placeholder="Ej. Gustavo Hernandez">
                            <br>
                            <?php if(isset($_GET['ingresar'])){$validador -> mostrar_error();}?>
                            <label for="contraseña">Contraseña</label>
                            <br>
                            <input class="txb" type="password" name="clave" id="password" size="40" placeholder="Minimo 8 cáracteres" required autofocus>
                        </div>
                        <br>
                        <div class="text-center">
                            <button class="btn boton verde fuente-WM" type="submit" name="xd">Acceder</button>
                        </div>
                        <br>
                    </form>
<?php include_once 'cierre.php';?>
