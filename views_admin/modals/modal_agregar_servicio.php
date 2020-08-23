<div class="modal fade" id="ModalAServicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar servicio</h5>
            </div>
            <div class="modal-body">
                <form action="insertar.php" method="post">
                    <label for="servicename">Escribir nombre de servicio</label><br>
                    <input type="text" name="nombre_servicio" id="servicename" placeholder="Servicio a agregar" size="40">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn boton-naranja" data-dismiss="modal"><span class="material-icons">clear</span></button>
                <button type="submit" class="btn boton"><span class="material-icons">save</span></button>
                </form>
                
            </div>
        </div>
    </div>
</div>