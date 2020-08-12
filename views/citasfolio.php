<?php
$titulo = "Cita";
include_once "app/config.inc.php";
include_once "templates/declaracion.php";
include_once "templates/navbar.php";
?>
<div class="row fila">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header text-center">CONSULTA</div>
            <img src="../../img/especies/ASDASDASDASDASDSADSAD" class="card-img-top" alt="Especie">
            <div class="card-body d-flex justify-content-center centrado-vertical">
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
<?php include_once "templates/cierre.php";?>