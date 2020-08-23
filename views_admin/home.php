<?php
    $titulo = 'Administrador Huellitas';
    $clase = 'admin';
    $icono = 'iconadmin';
    include_once 'app/config.inc.php';
    include_once 'app/Conexion.inc.php';
    include_once 'templates/declaracion.php';
    include_once 'templates/navbar_admin.php';
?>
<div class="container-fluid fila fuente-R d-flex justify-content-center">
    <div>
        <?php
        $conectado=new Conexion();
        Conexion::abrir_conexion();
        $consulta="SELECT * FROM animedics.total_citas";
        $tabla=$conectado->query(Conexion::obtener_conexion(),$consulta);
        echo "<table class='table table-light table-striped table-hover text-center'>
                <thead class='thead-dark'>
                    <tr>
                        <th>Folio</th>
                        <th>Mascota</th>
                        <th>Especie</th>
                        <th>Dueño</th>
                        <th>Telefono</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Veterinario</th>
                        <th colspan='2'>Llenar datos</th>
                    </tr>
                </thead>
                <tbody>";
                foreach ($tabla as $fila)
                {
                    echo "<tr>";
                    echo "<td> $fila->Folio </td>";
                    echo "<td> $fila->Mascota </td>";
                    echo "<td> $fila->Especie </td>";
                    echo "<td> $fila->Dueño </td>";
                    echo "<td> $fila->Telefono </td>";
                    echo "<td> $fila->Fecha </td>";
                    echo "<td> $fila->Hora </td>";
                    echo "<td> $fila->Veterinario </td>";  
                    echo "<td>
                    <button data-toggle='modal' data-target='#ModalConsulta' class='btn boton-gris'>
                    <span class='material-icons'>create</span>
                    </button>
                    </td>";
                    echo "<td>
                    <button data-toggle='modal' data-target='#ModalReceta' class='btn boton'>
                    <span class='material-icons'>add</span>
                    </button>
                    </td>";
                    echo "</tr>";
                }
                    echo "</tbody>";
                    include_once 'modals/modal_receta.php';
                    include_once 'modals/modal_consulta.php';
        Conexion::cerrar_conexion();
    ?>
        <tfoot class="text-center fuente-WM">
            <tr>
                <td colspan="10"><button class="btn boton">Agregar</button></td>
            </tr>
        </tfoot>
        </table>
    </div>
</div>
<div class="esconde-logo"></div>
<?php include_once 'templates/cierre.php';?>