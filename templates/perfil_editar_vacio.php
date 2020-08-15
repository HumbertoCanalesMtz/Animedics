<thead class="verde separadito">
                <tr><th colspan="2">MODIFICA LOS DATOS DE TU PERFIL</th></tr>
            </thead>
            <tbody>
                <tr>
                    <th>Nombre(s)</th>
                    <td><input class="txb" type="text" name="nombres" id="names" size="30" value="<?php echo $usuario -> obtener_nombres()?>"></td>
                </tr>
                <tr>
                    <th>Apellido Paterno</th>
                    <td><input class="txb" type="text" name="ap_paterno" id="lastname" size="30" value="<?php echo $usuario -> obtener_ap_paterno()?>"></td>
                </tr>
                <tr>
                    <th>Apellido Materno</th>
                    <td><input class="txb" type="text" name="ap_materno" id="lastname" size="30" value="<?php echo $usuario -> obtener_ap_materno()?>"></td>
                </tr>
                <tr>
                    <th>Nombre de usuario</th>
                    <td><input class="txb" type="text" name="nombre_usuario" id="nick" size="30" value="<?php echo $usuario -> obtener_nombre_usuario()?>"></td>
                </tr>
                <tr>
                    <th>Correo electronico</th>
                    <td><input class="txb" type="text" name="correo" id="email" size="30" value="<?php echo $usuario -> obtener_correo()?>"></td>
                </tr>
                <tr>
                    <th>Telefono</th>
                    <td><input class="txb" type="text" name="telefono" id="phone" size="30" value="<?php echo $usuario -> obtener_telefono()?>"></td>
                </tr>
                <tr>
                    <td><button class="btn boton" name="cancelar" type="reset"><span class="material-icons">edit</span>Cancelar</button></td>
                    <td><button class="btn boton" name="guardar"><span class="material-icons">edit</span>Guardar cambios</button></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2"><a href="<?php echo RUTA_MASCOTAS?>" class="btn boton"><span class="material-icons icono-20">pets</span> Mis mascotas</a></th>
                </tr>
            </tfoot>
