<?php
$titulo = 'Llenar consulta';
$clase = 'vet';
$icono = 'iconvet';
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'templates/declaracion.php';
include_once 'templates/navbar_vet.php';
?>
<div class="fila"></div>
<div class="container justify-content-center fila borde-redondo borde-naranja">
    <h1 class="fuente-WM naranja separadito text-center">Completar consulta</h1>
    <div class="row sombreado-c"></div>
    <form method="post">
        <table class="table table-hover table-striped bg-blanco text-center fuente-R">
            <thead class="naranja separadito">
                <tr>
                    <th colspan="2">rellena los datos</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Sintomas.</th>
                    <td><textarea class="txb-naranja" type="text" name="sintomas" id="sintomas" rows="5" cols="60"
                            value=""> </textarea></td>
                </tr>
                <tr>
                    <th>Temperatura(c')</th>
                    <td><input class="txb-naranja" type="text" name="temperatura" id="temperatura" size="60" value="">
                    </td>
                </tr>
                <tr>
                    <th>Peso(kg)</th>
                    <td><input class="txb-naranja" type="text" name="peso" id="peso" size="60" value=""></td>
                </tr>
                <tr>
                    <th>Examen abdomen</th>
                    <td><input class="txb-naranja" type="text" name="examen_abd" id="examen_abd" size="60" value="">
                    </td>
                </tr>
                <tr>
                    <th>Estado de los organos</th>
                    <td><input class="txb-naranja" type="text" name="est_organos" id="est_organos" size="60" value="">
                    </td>
                </tr>
                <tr>
                    <th>Color de mucosidad</th>
                    <td><input class="txb-naranja" type="text" name="mucosidad" id="mucosidad" size="60" value=""></td>
                </tr>
                <tr>
                    <th>Operado</th>
                    <td><input class="txb-naranja" type="text" name="operado" id="operado" size="60" value=""></td>
                </tr>
                <tr>
                    <th>Grado de deshidratacion.</th>
                    <td><input class="txb-naranja" type="text" name="gr_deshidratacion" id="gr_deshidratacion" size="60"
                            value=""></td>
                </tr>
                <tr>
                    <th>Diagnostico</th>
                    <td><textarea class="txb-naranja" type="text" name="diagnostico" id="diagnostico" rows="5" cols="60"
                            value=""> </textarea></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="fuente-WM">
                        <a href="<?php echo SERVER?>" class="btn boton-naranja">CANCELAR</a>
                        <button type="submit" class="btn boton-naranja">Completar consulta</button>
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</div>
<div class="esconde-logo"></div>
<?php include_once 'templates/cierre.php'?>