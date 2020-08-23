<div class="modal fade" id="ModalReceta" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Receta</h5>
            </div>
            <div class="modal-body">
                <form>
                    <table class="table table-hover bg-blanco text-center fuente-R">
                        <tbody>
                            <tr>
                                <th>Medicamento</th>
                                <td><input class="txb-naranja" type="text" name="medicamento" id="medicamento" size="20"
                                        value=""></td>
                            </tr>
                            <tr>
                                <th>Tomar(cantidad)</th>
                                <td><input class="txb-naranja" type="text" name="dosis" id="dosis" size="20" value=""
                                        placeholder="ej: 3(numerico)"></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td><input class="txb-naranja" type="text" name="via_adminis" id="via_admin" size="20" value=""
                                        placeholder="ej: pastillas/cucharadas"></td>
                            </tr>
                            <tr>
                                <th>Cada(horas)</th>
                                <td><input class="txb-naranja" type="text" name="horas" id="horas" size="20" value=""
                                        placeholder="ej: 5 horas"></td>
                            </tr>
                            <tr>
                                <th>Durante(dias)</th>
                                <td><input class="txb-naranja" type="text" name="mucosidad" id="mucosidad" size="20" value=""
                                        placeholder="ej: 7 dias"></td>
                            </tr>

                        </tbody>
                    </table>
                </form>

            </div>
            <div class="modal-footer">
                <button class="btn boton-naranja" name="cerrar" data-dismiss="modal"><span class="material-icons">clear</span></button>
                <button class="btn boton" name="guardar"><span class="material-icons">save</span></button>
            </div>
        </div>
    </div>
</div>