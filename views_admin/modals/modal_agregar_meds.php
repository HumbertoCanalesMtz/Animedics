<div class="modal fade" id="ModalAMeds" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar medicamento</h5>
            </div>
            <form action="<?php echo RUTA_ADMINISTRACION?>" method="post">
            <div class="modal-body">
                    <label for="medicamentoname">Escribir nombre de medicamento</label><br>
                    <input type="text" name="nuevo_medicamento" id="medicamentoname" placeholder="Escriba el medicamento" size="40"
                    size="40" onKeyPress = "if(this.value.length>20) return false;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn boton-naranja" data-dismiss="modal"><span class="material-icons">clear</span></button>
                <button type="submit" class="btn boton" name="agregar_medicamento"><span class="material-icons">save</span></button>
            </div>
            </form>
        </div>
    </div>
</div>