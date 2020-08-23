<div class="modal fade" id="ModalUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir usuario</h5>
            </div>
            <form action="" method="post">
                <div class="modal-body text-center">
                    <label for="names">Nombre(s)</label><br>
                    <input class="txb-gris" type="text" name="nombres" id="names" placeholder="Ej. Alex" size="40"><br>
                    <label for="lastname1">Apellido paterno</label><br>
                    <input class="txb-gris" type="text" name="ap_pat" id="lastname1" placeholder="Ej. Lozano" size="40"><br>
                    <label for="lastname2">Apellido materno</label><br>
                    <input class="txb-gris" type="text" name="ap_mat" id="lastname2" placeholder="Ej. Mendez" size="40"><br>
                    <label for="phone">Telefono</label><br>
                    <input class="txb-gris" type="text" name="telefono" id="phone" placeholder="10 dígitos" size="40"><br>
                    <label for="mail">Correo</label><br>
                    <input class="txb-gris" type="text" name="correo" id="mail" placeholder="alexferloz@algo.com" size="40"><br>
                    <label for="username">Nombre de usuario</label><br>
                    <input class="txb-gris" type="text" name="nombre_usuario" id="username" placeholder="Alexferloz" size="40"><br>
                    <label for="role">Rol</label>
                    <select name="rol" id="role">
                        <option value="1">Administrador</option>
                        <option value="2">Veterinario</option>
                        <option value="3">Cliente</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn boton-naranja" data-dismiss="modal">
                        <span class="material-icons">clear</span>
                    </button>
                    <button type="submit" class="btn boton"><span class="material-icons">add</span></button>
                </div>
            </form>
        </div>
    </div>
</div>