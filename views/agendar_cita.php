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
                                    <select name="mascota" id="id_pet">
                                        <option value="XD">Sasuke</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Día</td>
                                <td>
                                    <input type="text" id="datepicker" name="fecha" readonly placeholder="Selecciona una fecha">
                                </td>
                            </tr>
                            <tr>
                                <td>Hora</td>
                                <td>
                                    <select name="hora" id="id_pet">
                                        <option value="09:00:00">9:00 a.m.</option>
                                        <option value="09:00:00">10:00 a.m.</option>
                                        <option value="09:00:00">11:00 a.m.</option>
                                        <option value="09:00:00">12:00 p.m.</option>
                                        <option value="09:00:00">1:00 p.m.</option>
                                        <option value="09:00:00">2:00 p.m.</option>
                                        <option value="09:00:00">3:00 p.m.</option>
                                        <option value="09:00:00">4:00 p.m.</option>
                                        <option value="09:00:00">5:00 p.m.</option>
                                        <option value="09:00:00">6:00 p.m.</option>
                                        <option value="09:00:00">7:00 p.m.</option>
                                        <option value="09:00:00">8:00 p.m.</option>

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