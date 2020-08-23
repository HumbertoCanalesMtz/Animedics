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
    include_once 'modals/modal_agregar_servicio.php';
    include_once 'modals/modal_agregar_meds.php';
    include_once 'modals/modal_agregar_especie.php';
?>
<div class="container-fluid columna fila fuente-R icono-20">
    <div class="row text-center">
        <div class="col-md-4">
            <table class="table table-light table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Servicio</th>
                        <th colspan="2"><button data-toggle='modal' data-target='#ModalAServicio' class="btn boton fuente-WM">Agregar</button></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include_once 'modals/modal_servicio.php';
                $conectado=new Conexion();
                Conexion::abrir_conexion();
                $consulta="SELECT nombre from servicio";
                $tabla=$conectado->query(Conexion::obtener_conexion(),$consulta);
                $contar="SELECT count(nombre) as n from servicio";
                $contado=$conectado->query(Conexion::obtener_conexion(),$contar);
                
                foreach ($tabla as $fila)
                {
                    echo "<tr>";
                    echo "<td>$fila->nombre</td>";
                    echo "<td>";
                    echo "<button class='btn boton-gris' data-toggle='modal' data-target='#ModalServicio'>";
                    echo "<span class='material-icons'>edit</span>";
                    echo "</button>";
                    echo "</td>";
                    echo "<td><form method='post' action='administracion.php'>
                    <input type='hidden' name='nombre' value='.$fila->nombre'>
                    <button class='btn boton-naranja'><span class='material-icons'>clear</span></button>
                    </form></td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                if (isset($_POST["nombre"]))
                {
                //Se almacena en una variable el id del registro a eliminar
                $nombre = $_POST["nombre"];

                //Preparar la consulta
                $eliminar = "DELETE FROM servicio WHERE nombre=$nombre";

                //Ejecutar la consulta
                $resultado=$conectado->query(Conexion::obtener_conexion(),$eliminar);
                //redirigir nuevamente a la página para ver el resultado
                }
                foreach ($contado as $xd)
                {
                echo "<tfoot>
                    <tr>
                        <td>Total servicios:</td>
                        <td colspan='2'>$xd->n</td>
                    </tr>
                </tfoot>";
                }
                ?>
            </table>
        </div>
        <div class="col-md-4">
            <table class="table table-light table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Especie</th>
                        <th colspan="2"><button class="btn boton fuente-WM" data-toggle='modal' data-target='#ModalAEspecie'>Agregar</button></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include_once 'modals/modal_especie.php';
                $conectado=new Conexion();
                Conexion::abrir_conexion();
                $consulta="SELECT nombre from especie";
                $tabla=$conectado->query(Conexion::obtener_conexion(),$consulta);
                $contar="SELECT count(nombre) as n from especie";
                $contado=$conectado->query(Conexion::obtener_conexion(),$contar);
                foreach ($tabla as $fila)
                {
                    echo "<tr>";
                    echo "<td>$fila->nombre</td>";
                    echo "<td>";
                    echo "<button class='btn boton-gris' data-toggle='modal' data-target='#ModalEspecie'>";
                    echo "<span class='material-icons'>edit</span>";
                    echo "</button>";
                    echo "</td>";
                    echo "<td><button class='btn boton-naranja'><span class='material-icons'>clear</span></button></td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                foreach ($contado as $xd)
                {
                echo "<tfoot>
                    <tr>
                        <td>Total especies:</td>
                        <td colspan='2'>$xd->n</td>
                    </tr>
                </tfoot>";
                }
                ?>
            </table>
        </div>
        <div class="col-md-4">
            <table class="table table-light table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Medicamento</th>
                        <th colspan="2"><button class="btn boton fuente-WM" data-toggle='modal' data-target='#ModalAMeds'>Agregar</button></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include_once 'modals/modal_meds.php';
                $conectado=new Conexion();
                Conexion::abrir_conexion();
                $consulta="SELECT nom_comercial from medicamento";
                $tabla=$conectado->query(Conexion::obtener_conexion(),$consulta);
                $contar="SELECT count(nom_comercial) as n from medicamento";
                $contado=$conectado->query(Conexion::obtener_conexion(),$contar);
                foreach ($tabla as $fila)
                {
                    echo "<tr>";
                    echo "<td>$fila->nom_comercial</td>";
                    echo "<td>";
                    echo "<button class='btn boton-gris' data-toggle='modal' data-target='#ModalMeds'>";
                    echo "<span class='material-icons'>edit</span>";
                    echo "</button>";
                    echo "</td>";
                    echo "<td><button class='btn boton-naranja'><span class='material-icons'>clear</span></button></td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                foreach ($contado as $xd)
                {
                echo "<tfoot>
                    <tr>
                        <td>Total Medicamentos:</td>
                        <td colspan='2'>$xd->n</td>
                    </tr>
                </tfoot>";
                }
                ?>
            </table>
        </div>
    </div>
</div>
<div class="esconde-logo"></div>
<?php include_once 'templates/cierre.php'?>