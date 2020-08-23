<?php
include_once 'app/RepositorioAdmin.inc.php';

class EscritorAdmin{
    public static function escribir_servicios($conexion){
        $servicios = RepositorioAdmin::obtener_servicios($conexion);
        if(count($servicios)){
            foreach ($servicios as $servicio) {?>
                <tr>
                    <td><?php echo $servicio['nombre']?></td>
                    <td>
                        <button class='btn boton-verde' data-toggle='modal' data-servicio='<?php echo $servicio['nombre']?>'
                        data-target='#ModalServicio'>
                        <span class='material-icons'>edit</span>
                        </button>
                    </td>
                    <form method='post' action='<?php echo RUTA_ADMINISTRACION?>'>
                    <input type='hidden' name='servicio' value='<?php echo $servicio['nombre']?>'>
                    
                    <td>
                        <button class='btn boton-naranja' name='eliminar_servicio'><span class='material-icons'>clear</span></button>
                    </td>
                    </form>
                </tr>
        <?php }
        } else{
            ?>
            <div class="card mb-3" style="max-width: 540px;">
                Aún no has añadido servicios, añade uno
            </div>
            <?php
        }
    }
}