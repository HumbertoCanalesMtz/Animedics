<?php
$titulo = "Mis Mascotas";
include_once "app/config.inc.php";
include_once "app/Conexion.inc.php";
include_once "app/Escritor.inc.php";

if(isset($_POST['añadir'])){
    Conexion::abrir_conexion();
    $mascota = new Mascota('',$_POST['nombre'], $_POST['especie'], $_POST['edad'], $_POST['sexo'], $_POST['propietario']);
    RepositorioMascota::insertar_mascota(Conexion::obtener_conexion(), $mascota);
    Conexion::cerrar_conexion();
}
include_once "templates/declaracion.php";
include_once "templates/navbar.php"
?>
<div class="container">
    <div class="row fila borde-redondo">
        <div class="col-md-12 text-center fuente-R">
            <button type="button" class="btn boton" data-toggle="modal" data-target="#modalmascotas">
                Dar de alta una mascota
            </button>
            <div class="modal fade" id="modalmascotas" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content borde-redondo borde-verde">
                        <div class="modal-header">
                            <h5 class="fuente-WM verde">REGISTRA TU MASCOTA</h5>
                        </div>
                        <div class="sombreado-c"></div>
                        <div class="modal-body justify-content-center">
                            <form action="" method="post" class="">
                                <div class="d-flex justify-content-center">
                                    <table class="table-sm table-hover">
                                        <tbody>
                                            <tr>
                                                <th><label for="petname">Nombre de su mascota:</label></th>
                                                <td>
                                                    <input class="txb" type="text" name="nombre_mascota" id="petname" placeholder="Terry">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th><label for="petspecie">Especie:</label></th>
                                                <td>
                                                    <select name="especie_mascota" id="petspecie">
                                                        <option value="Dog">Sasukebuto</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th><label for="petage">Edad de su mascota (Años):</label></th>
                                                <td>
                                                    <input class="txb" type="text" name="edad_mascota" id="petage" placeholder="Ej. 12">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Sexo de su mascota:</th>
                                                <td>
                                                    <select name="sexo" id="sex">
                                                        <option value="MACHO">Macho</option>
                                                        <option value="HEMBRA">Hembra</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <td>
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancelar</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn boton">Guardar</button>
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
        <div class="col-md-12">
            <?php 
                Conexion::abrir_conexion();
                //Se llama al método que escribe en pantalla todas las mascotas del usuario.
                Escritor::escribir_mascotas(Conexion::obtener_conexion(), $_SESSION['id_usuario']);
                Conexion::cerrar_conexion();
            ?>
        </div>
    </div>
    <div class="esconde-logo"></div>
    <div class="esconde-logo"></div>
</div>
<div class="esconde-logo"></div>
<?php include_once "templates/cierre.php";