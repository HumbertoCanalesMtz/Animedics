<div class="modal fade" id="ModalConsulta" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Llenar datos medicos</h5>
            </div>
            <form action="" method="post">
                <div class="modal-body admin text-center">
                    <label for="symptoms">Sintomas</label><br>
                    <textarea class="txb-gris" name="sintomas" id="symptoms" cols="40" rows="5"></textarea><br>
                    <label for="temp">Temperatura (C°)</label><br>
                    <input type="text" class="txb-gris" name="temperatura" id="temp" placeholder="yasabes" size="40"><br>
                    <label for="weight">Peso (kg)</label><br>
                    <input type="text" class="txb-gris" name="peso" id="weight" placeholder="yasabes" size="40"><br>
                    <label for="diagnostic">Diagnostico</label><br>
                    <textarea class="txb-gris" name="diagnostico" id="diangostic" cols="40" rows="5"></textarea><br>
                    <label for="abstest">Examen abdomen</label><br>
                    <textarea class="txb-gris" name="ex_abdomen" id="abstest" cols="40" rows="5"></textarea><br>
                    <label for="intorgsts">Estado de organos internos</label><br>
                    <textarea class="txb-gris" name="est_org_int" id="intorgsts" cols="40" rows="5"></textarea><br>
                    <label for="extorgsts">Estado de organos externos</label><br>
                    <textarea class="txb-gris" name="est_org_ext" id="extorgsts" cols="40" rows="5"></textarea><br>
                    <label for="operated">Operado</label><br>
                    <input type="text" class="txb-gris" name="operado" id="operated" placeholder="yasabes" size="40"><br>
                    <label for="dehdeg">Grado deshidratación</label>
                    <select class="txb-gris" name="gr_desh" id="dehdeg">
                        <option value="ALTO">Alto</option>
                        <option value="MEDIO">Medio</option>
                        <option value="BAJO">Bajo</option>
                    </select><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn boton-naranja" data-dismiss="modal"><span
                            class="material-icons">clear</span></button>
                    <button type="submit" class="btn boton"><span class="material-icons">save</span></button>
                </div>
            </form>
        </div>
    </div>
</div>
