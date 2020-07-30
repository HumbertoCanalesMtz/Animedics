<div class="form-group">
                        <label for="nombres">Nombre(s)</label>
                        <input type="text" class="form-control" name="nombres" <?php $validador -> mostrar_nombres();?>>
                        <?php $validador -> mostrar_error_nombres();?>
                    </div>
                    <div class="form-group">
                        <label for="ap_paterno">Apellido Paterno</label>
                        <input type="text" class="form-control" name="ap_paterno" <?php $validador -> mostrar_ap_paterno();?>>
                        <?php $validador -> mostrar_error_ap_paterno();?>
                    </div>
                    <div class="form-group">
                        <label for="ap_materno">Apellido Materno</label>
                        <input type="text" class="form-control" name="ap_materno" <?php $validador -> mostrar_ap_materno();?>>
                        <?php $validador -> mostrar_error_ap_materno();?>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input type="email" class="form-control" name="correo" <?php $validador -> mostrar_correo();?>>
                        <?php $validador -> mostrar_error_correo();?>
                    </div>
                    <div class="form-group">
                        <label for="contraseña">Contraseña</label>
                        <input type="password" class="form-control" name="clave_1">
                        <?php $validador -> mostrar_error_clave_1();?>
                    </div>
                    <div class="form-group">
                        <label for="rep_contraseña">Repetir la contraseña</label>
                        <input type="password" class="form-control" name="clave_2">
                        <?php $validador -> mostrar_error_clave_2();?>
                    </div>
                    <div class="form-group">
                        <label for="nombre_usuario">Nombre de usuario</label>
                        <input type="text" class="form-control" name="nom_usuario" <?php $validador -> mostrar_nom_usuario();?>>
                        <?php $validador -> mostrar_error_nom_usuario();?>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono (Opcional)</label>
                        <input type="text" class="form-control" name="telefono" <?php $validador -> mostrar_telefono();?>>
                        <?php $validador -> mostrar_error_telefono();?>
                    </div>
                    <button type="submit" class="btn btn-primary" name="registrar">Registrarse</button>