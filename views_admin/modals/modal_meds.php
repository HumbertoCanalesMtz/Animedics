<div class="modal fade" id="ModalMedicamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar medicamento</h5>
            </div>
            <form action="<?php echo RUTA_ADMINISTRACION?>" method="post">
                <div class="modal-body">
                    <label for="medicamentoname">Actualizar nombre de medicamento</label><br>
                    <input type='hidden' name='medicamento_hid'>
                    <input class="txb-gris" type="text" name="nombre_medicamento" id="medicamentoname" placeholder="" 
                    size = "40" onKeyPress = "if(this.value.length>50) return false;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn boton-naranja" data-dismiss="modal"><span
                            class="material-icons">clear</span></button>
                    <button type="button submit" class="btn boton" name="editar_medicamento"><span class="material-icons">save</span></button>
                </div>
            </form>
        </div>
    </div>
</div>