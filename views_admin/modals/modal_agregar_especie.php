<div class="modal fade" id="ModalAEspecie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Especie</h5>
            </div>
            <form action="<?php echo RUTA_ADMINISTRACION?>" method="post">
            <div class="modal-body">
                    <label for="especiename">Escribir nombre de especie</label><br>
                    <input type="text" name="nueva_especie" id="especiename" placeholder="Especie a agregar"
                    size="40" onKeyPress = "if(this.value.length>20) return false;">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn boton-naranja" data-dismiss="modal"><span class="material-icons">clear</span></button>
                <button type="submit" class="btn boton" name="agregar_especie"><span class="material-icons">save</span></button>
            </div>
            </form>
        </div>
    </div>
</div>