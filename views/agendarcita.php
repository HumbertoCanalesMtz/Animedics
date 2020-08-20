<?php 
include_once "app/config.inc.php";
include_once "templates/declaracion.php";
include_once "templates/navbar.php";
?>
<div class="container-fluid columna">
        <div class="row fila">
            <div class="container col-md-12 borde-redondo fila">
                <form action="" method="post">
                    <table class="table table-hover table-striped text-center fuente-R icono-20">
                        <thead class="fuente-WM verde">
                            <tr>
                                <th colspan="2">Introduzca los datos solicitados</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mascota</td>
                                <td>
                                    <select name="id_mascota" id="id_pet">
                                        <option value="XD">Sasuke</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Día</td>
                                <td>
                                    <select name="diafecha" id="day">
                                        <option value="XD">Sasuke</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Mes</td>
                                <td>
                                    <select name="mesfecha" id="month">
                                        <option value="XD">Sasuke</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Año</td>
                                <td>
                                    <select name="aniofecha" id="year">
                                        <option value="XD">Sasuke</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Servicio</td>
                                <td>
                                    <select name="servicio" id="service">
                                        <option value="XD">Sasuke</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2"><button type="submit" class="btn boton">Agendar Cita</button></td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </div>    
    </div>
</div>
    <div class="esconde-logo"></div>
<?php include_once "templates/cierre.php";?>