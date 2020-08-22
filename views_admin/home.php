<?php
    $titulo = 'Administrador Huellitas';
    $clase = 'admin';
    $icono = 'iconadmin';
    include_once 'app/config.inc.php';
    include_once 'app/Conexion.inc.php';
    include_once 'app/RepositorioUsuario.inc.php';
    include_once 'templates/declaracion.php';
    include_once 'templates/navbar_admin.php';
?>
<div class="fila fuente-R">
    <?php
        $conectado=new Conexion();
        Conexion::abrir_conexion();
        $consulta="SELECT * FROM animedics.total_citas";
        $tabla=$conectado->query(Conexion::obtener_conexion(),$consulta);
        echo "<table class='table table-light table-striped table-hover'>
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
                    echo "</tr>";
                }
                    echo "</tbody>";
        Conexion::cerrar_conexion();
    ?>
    <tfoot class="text-center fuente-WM">
        <tr>
            <td colspan="4"><button class="btn boton">Agregar</button></td>
            <td colspan="4"><button class="btn boton-gris">Editar</button></td>
        </tr>
    </tfoot>
    </table>
</div>
<?php include_once 'templates/cierre.php';?>