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
            <div class="modal fade" id="modalmascota" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered borde-redondo">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h5 class="fuente-WM verde">REGISTRA TU MASCOTA</h5>
                        </div>
                        <div class="sombreado-c"></div>
                        <div class="modal-body">
                            <form action="" method="post">
                                <input type="text" name="nombre_mascota" id="petname">
                                <select name="especie_mascota" id="petspecie">
                                    <option value="Dog">Sasukebuto</option>
                                </select>
                                <input type="text" name="edad_mascota" id="petage">
                                <select name="sexo" id="sex">
                                    <option value="MACHO">Macho</option>
                                    <option value="HEMBRA">Hembra</option>
                                </select>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Buscar mascota" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn boton" type="button" id="button-addon2"><span
                            class="material-icons icono-10">search</span>
                    </button>
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
</div>
<?php include_once "templates/cierre.php";