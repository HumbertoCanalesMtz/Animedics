<?php
include_once 'app/RepositorioMascota.inc.php';
include_once 'app/Mascota.inc.php';
include_once 'app/Especie.inc.php';

class Escritor{
    public static function escribir_mascotas($conexion, $id_usuario){
        $mascotas = RepositorioMascota::obtener_mascotas($conexion, $id_usuario);
        if(count($mascotas)){
            foreach ($mascotas as $mascota) {
                self::escribir_mascota($mascota);
            }
        } else{
            ?>
            <div class="card mb-3" style="max-width: 540px;">
                No hay mascotas
            </div>
            <?php
        }
    }

    public static function escribir_mascota($mascota){
        if(!isset($mascota)){
            return;
        }
        ?>
        <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?php Especie::seleccionar_imagen($mascota);?>" class="card-img" alt="Especie">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body d-flex justify-content-center centrado-vertical">
                                <table class="table-sm table-striped table-hover">
                                    <tbody>
                                        <tr>
                                            <th>Nombre:</th>
                                            <td><?php echo $mascota -> obtener_nombre();?></td>
                                        </tr>
                                        <tr>
                                            <th>Edad:</th>
                                            <td><?php echo $mascota -> obtener_edad();?></td>
                                        </tr>
                                        <tr>
                                            <th>Sexo:</th>
                                            <td><?php echo $mascota -> obtener_sexo();?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer flex-fill text-center"><a href="appointment.html" class="btn boton">Ver citas</a></div>
                    </div>
                </div>
        <?php
    }
}