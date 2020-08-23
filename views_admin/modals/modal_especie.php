<div class="modal fade" id="ModalEspecie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Especie</h5>
            </div>
            <form action="<?php echo RUTA_ADMINISTRACION?>" method="post">
                <div class="modal-body">
                    <label for="especiename">Actualizar nombre de especie</label><br>
                    <input type='hidden' name='especie_hid'>
                    <input class="txb-gris" type="text" name="nombre_especie" id="especiename" placeholder=""
                    size = "40" onKeyPress = "if(this.value.length>50) return false;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn boton-naranja" data-dismiss="modal"><span
                            class="material-icons">clear</span></button>
                    <button type="button submit" class="btn boton" name="editar_especie"><span class="material-icons">save</span></button>
                </div>
            </form>
        </div>
    </div>
</div>