<div class="modal fade" id="ModalReceta" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Llenar receta</h5>
            </div>
            <form action="" method="post">
                <div class="modal-body admin text-center">
                    <input type='hidden' name='folio_hid'>
                    <label for="meds">Medicamento:</label>
                    <select class='txb-gris' name='medicamento' id='meds'>
                    <?php
                    Conexion::abrir_conexion();
                    EscritorAdmin::escribir_medicamentos(Conexion::obtener_conexion());
                    Conexion::cerrar_conexion();
                    ?>
                    </select>
                    <br>
                    <label for="dose">Tomar (cantidad)</label>
                    <input type="text" class="txb-gris" name="dosis" id="dose" placeholder="Ej. 3 pastillas/ 100 ml"><br>
                    <label for="hrs">Cada (horas)</label>
                    <input type="number" class="txb-gris" name="horas" id="hrs" placeholder="Ej. 8"><br>
                    <label for="days">Durante (dias)</label>
                    <input type="number" class="txb-gris" name="dias" id="days" placeholder="Ej. 3">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn boton-naranja" data-dismiss="modal"><span
                            class="material-icons">clear</span></button>
                    <button type="submit" name = "guardar_med" class="btn boton"><span class="material-icons">save</span></button>
                </div>
            </form>
        </div>
    </div>
</div>