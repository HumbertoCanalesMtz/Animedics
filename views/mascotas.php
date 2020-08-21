<?php
$titulo = "Mis Mascotas";
include_once "app/config.inc.php";
include_once "app/Conexion.inc.php";
include_once "app/Escritor.inc.php";
include_once "app/Mascota.inc.php";
include_once "app/RepositorioUsuario.inc.php";
include_once "app/RepositorioMascota.inc.php";
include_once "app/ValidadorMascota.inc.php";
include_once "app/Redireccion.inc.php";

if(isset($_POST['registrar'])){
    Conexion::abrir_conexion();
    $validador = new ValidadorMascota(Conexion::obtener_conexion(), $_POST['nombre'],$_POST['edad']);
    if($validador -> validar_mascota()){
        $mascota = new Mascota('',$validador -> obtener_nombre(), $_POST['especie'], $validador -> obtener_edad(), 
        $_POST['sexo'], $_SESSION['id_persona']);
        RepositorioMascota::insertar_mascota(Conexion::obtener_conexion(), $mascota);
    }
    Conexion::cerrar_conexion();
}
include_once "templates/declaracion.php";
include_once "templates/navbar.php"
?>
<div class="container">
    <div class="row fila borde-redondo">
        <div class="col-md-12 text-center fuente-R">
        <h1 class="fuente-WM verde separadito text-center">MIS MASCOTAS</h1><br>
            <button type="button" class="btn boton" data-toggle="modal" data-target="#modalmascotas">
                Registrar a una nueva mascota
            </button>
            <div class="modal fade" id="modalmascotas" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content borde-redondo borde-verde">
                        <div class="modal-header justify-content-center">
                            <h5 class="fuente-WM verde">REGISTRA A TU MASCOTA</h5>
                        </div>
                        <div class="sombreado-c"></div>
                        <div class="modal-body justify-content-center">
                            <form method="post" action="<?php echo RUTA_MASCOTAS;?>">
                                <div class="d-flex justify-content-center">
                                    <table class="table-sm table-hover">
                                        <tbody>
                                            <tr>
                                                <th><label for="petname">Nombre de la mascota:</label></th>
                                                <td>
                                                    <input class="txb" type="text" name="nombre" id="petname" placeholder="Ej. Terry">
                                                </td>
                                            </tr>
                                            <?php if(isset($validador)){echo $validador -> mostrar_error_nombre();}?>
                                            <tr>
                                                <th><label for="petspecie">Especie:</label></th>
                                                <td>
                                                    <select name="especie" id="petspecie">
                                                        <option value="1">Perro</option>
                                                        <option value="2">Gato</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th><label for="petage">Edad de su mascota (Años):</label></th>
                                                <td>
                                                    <input class="txb" type="text" name="edad" id="petage" placeholder="Ej. 12">
                                                </td>
                                            </tr>
                                            <?php if(isset($validador)){echo $validador -> mostrar_error_edad();}?>
                                            <tr>
                                                <th>Sexo de su mascota:</th>
                                                <td>
                                                    <select name="sexo" id="sex">
                                                        <option value='MACHO'>Macho</option>
                                                        <option value='HEMBRA'>Hembra</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <td>
                                                <button type="button" class="btn btn-secondary" name="cancelar"
                                                    data-dismiss="modal">Cancelar</button>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn boton" name="registrar">Registrar</button>
                                            </td>
                                        </tfoot>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 text-center"><br>
            <?php if(isset($validador)){if(!$validador -> validar_mascota()){?>
            <div class='alert alert-danger' role='alert'>¡Ocurrió un problema al registrar a tu mascota!</div>
                <?php }}?>
            <br>
            <div class="card-columns">
            <?php 
                Conexion::abrir_conexion();
                //Se llama al método que escribe en pantalla todas las mascotas del usuario.
                Escritor::escribir_mascotas(Conexion::obtener_conexion(), $_SESSION['id_usuario']);
                Conexion::cerrar_conexion();
            ?>
            </div>
        </div>
    </div>
    <div class="esconde-logo"></div>
    <div class="esconde-logo"></div>
</div>
<div class="esconde-logo"></div>
<?php include_once "templates/cierre.php";