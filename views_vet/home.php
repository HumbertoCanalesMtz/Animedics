<?php
    $titulo = 'Veterinario Huellitas';
    $clase = 'vet';
    $icono = 'iconvet';
    include_once 'app/config.inc.php';
    include_once 'app/Conexion.inc.php';
    include_once 'templates/declaracion.php';
    include_once 'templates/navbar_vet.php';
?>
<div class="fila"></div>
<div class="container justify-content-center fila borde-redondo borde-naranja">
    <h1 class="fuente-WM naranja separadito text-center">Citas</h1>
    <div class="row sombreado-c"></div>
    <table class="table table-hover text-center fuente-R">
        <thead class="thead-dark">
            <tr>
                <th>Folio.</th>
                <th>Mascota.</th>
                <th>Especie.</th>
                <th>Dueño.</th>
                <th>Telefono.</th>
                <th>Fecha.</th>
                <th>Hora.</th>
                <th>Opciones.</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>C010293</td>
                <td>Ruly</td>
                <td>Perro</td>
                <td>juan daniel guzman</td>
                <td>87278909</td>
                <td>2020-06-15</td>
                <td>14:30:00</td>
                <td><button class="btn boton fuente-WM" name="cambiar" data-toggle="modal" data-target="#ModalReceta"> Receta</button>
                    <a href="<?php echo RUTA_CONSULTAS?>" class="btn boton-gris fuente-WM" name="editar"> Consulta</a></td>
            </tr>
        </tbody>
    </table>
    <?php include_once 'modals/modal_receta.php'?>
</div>
<div class="esconde-logo"></div>
<?php include_once 'templates/cierre.php';?>