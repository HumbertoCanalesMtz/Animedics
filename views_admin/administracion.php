<?php
    $titulo = 'Administrar servicios';
    $clase = 'admin';
    $icono = 'iconadmin';
    include_once 'app/config.inc.php';
    include_once 'app/Conexion.inc.php';
    include_once 'app/RepositorioUsuario.inc.php';
    include_once 'templates/declaracion.php';
    include_once 'app/RepositorioCita.inc.php';
    include_once 'templates/navbar_admin.php';
?>
<div class="container-fluid columna fila fuente-R icono-20">
    <div class="row text-center">
        <div class="col-md-4">
            <table class="table table-light table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Servicio</th>
                        <th colspan="2"><button class="btn boton fuente-WM">Agregar</button></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ejemplo</td>
                        <td>
                            <button class="btn boton-gris" data-toggle="modal" data-target="#ModalServicio">
                                <span class="material-icons">edit</span>
                            </button>
                            <?php include_once 'modals/modal_servicio.php';?>
                        </td>
                        <td><button class="btn boton-naranja"><span class="material-icons">clear</span></button></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td>Total servicios:</td>
                        <td colspan="2">69</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-md-4">
            <table class="table table-light table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Especie</th>
                        <th colspan="2"><button class="btn boton fuente-WM">Agregar</button></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ejemplo</td>
                        <td>
                            <button class="btn boton-gris" data-toggle="modal" data-target="#ModalEspecie">
                                <span class="material-icons">edit</span>
                            </button>
                            <?php include_once 'modals/modal_especie.php';?>
                        </td>
                        <td><button class="btn boton-naranja"><span class="material-icons">clear</span></button></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td>Total especies:</td>
                        <td colspan="2">69</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-md-4">
            <table class="table table-light table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Medicamento</th>
                        <th colspan="2"><button class="btn boton fuente-WM">Agregar</button></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ejemplo</td>
                        <td>
                            <button class="btn boton-gris" data-toggle="modal" data-target="#ModalMeds">
                                <span class="material-icons">edit</span>
                            </button>
                            <?php include_once 'modals/modal_meds.php';?>
                        </td>
                        <td><button class="btn boton-naranja"><span class="material-icons">clear</span></button></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td>Total especies:</td>
                        <td colspan="2">69</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<div class="esconde-logo"></div>
<?php include_once 'templates/cierre.php'?>