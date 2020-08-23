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
    public static function escribir_especies($conexion){
        $especies = RepositorioAdmin::obtener_especies($conexion);
        if(count($especies)){
            foreach ($especies as $especie) {?>
                <tr>
                    <td><?php echo $especie['nombre']?></td>
                    <td>
                        <button class='btn boton-verde' data-toggle='modal' data-especie='<?php echo $especie['nombre']?>'
                        data-target='#ModalEspecie'>
                        <span class='material-icons'>edit</span>
                        </button>
                    </td>
                    <form method='post' action='<?php echo RUTA_ADMINISTRACION?>'>
                    <input type='hidden' name='especie' value='<?php echo $especie['nombre']?>'>
                    
                    <td>
                        <button class='btn boton-naranja' name='eliminar_especie'><span class='material-icons'>clear</span></button>
                    </td>
                    </form>
                </tr>
        <?php }
        } else{
            ?>
            <div class="card mb-3" style="max-width: 540px;">
                Aún no has añadido especies, añade una
            </div>
            <?php
        }
    }
    public static function escribir_medicamento($conexion){
        $medicamentos = RepositorioAdmin::obtener_medicamentos($conexion);
        if(count($medicamentos)){
            foreach ($medicamentos as $medicamento) {?>
                <tr>
                    <td><?php echo $medicamento['nom_comercial']?></td>
                    <td>
                        <button class='btn boton-verde' data-toggle='modal' data-medicamento='<?php echo $medicamento['nom_comercial']?>'
                        data-target='#ModalMeds'>
                        <span class='material-icons'>edit</span>
                        </button>
                    </td>
                    <form method='post' action='<?php echo RUTA_ADMINISTRACION?>'>
                    <input type='hidden' name='medicamento' value='<?php echo $medicamento['nom_comercial']?>'>
                    
                    <td>
                        <button class='btn boton-naranja' name='eliminar_medicamento'><span class='material-icons'>clear</span></button>
                    </td>
                    </form>
                </tr>
        <?php }
        } else{
            ?>
            <div class="card mb-3" style="max-width: 540px;">
                Aún no has añadido medicamentos, añade uno
            </div>
            <?php
        }
    }
}