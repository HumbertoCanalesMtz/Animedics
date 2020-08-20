<?php
$titulo = "Cita";
include_once "app/config.inc.php";
include_once "app/Redireccion.inc.php";
include_once "templates/declaracion.php";
include_once "templates/navbar.php";
?>
<div class="esconde-logo"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card text-center borde-normal borde-naranja">
                <div class="card-header">CONSULTA</div>
                <img src="../../img/especies/ASDASDASDASDASDSADSAD" class="card-img-top" alt="Especie">
                <div class="card-body d-flex justify-content-center centrado-vertical fila">
                    <table class="table-sm table-striped table-hover">
                        <tbody>
                            <tr>
                                <th>Veterinario:</th>
                                <td>Terry</td>
                            </tr>
                            <tr>
                                <th>Cedula:</th>
                                <td>15 años</td>
                            </tr>
                            <tr>
                                <th>Mascota:</th>
                                <td>Ya no</td>
                            </tr>
                            <tr>
                                <th>Especie:</th>
                                <td>Ya no</td>
                            </tr>
                            <tr>
                                <th>Fecha:</th>
                                <td>Ya no</td>
                            </tr>
                            <tr>
                                <th>Hora:</th>
                                <td>Ya no</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="esconde-logo"></div>
<?php include_once "templates/cierre.php";?>