<div class="modal fade" id="ModalReceta" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Llenar receta</h5>
            </div>
            <form action="" method="post">
                <div class="modal-body admin text-center">
                    <label for="meds">Medicamento:</label>
                    <?php
                    $conectado=new Conexion();
                    Conexion::abrir_conexion();
                    $contar="SELECT * from medicamento";
                    $contado=$conectado->query(Conexion::obtener_conexion(),$contar);
                     echo "<select class='txb-gris' name='medicamento' id='meds'>";
                     foreach ($contado as $value)
                    {   
                     echo "<option value='.$value->id_medicamento.'>$value->nom_comercial</option>";
                    }
                     echo "</select>";
                    ?><br>
                    <label for="dose">Tomar (cantidad)</label>
                    <input type="text" class="txb-gris" name="dosis" id="dose" placeholder="Ej. 3 (númerico)">
                    <input type="text" class="txb-gris" name="dosis" id="dose" placeholder="Ej. pastillas/ml"><br>
                    <label for="hrs">Cada (horas)</label>
                    <input type="text" class="txb-gris" name="horas" id="hrs" placeholder="Ej. 8"><br>
                    <label for="days">Durante (dias)</label>
                    <input type="text" class="txb-gris" name="dias" id="days" placeholder="Ej. 3">
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