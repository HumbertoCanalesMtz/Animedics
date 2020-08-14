<thead class="verde separadito">
                <tr><th colspan="2"><?php $usuario -> obtener_nombres()." ".$usuario -> obtener_ap_paterno()." ".$usuario -> obtener_ap_materno()?></th></tr>
            </thead>
            <tbody>
                <tr>
                    <th>Nombre de usuario</th>
                    <td><?php $usuario -> obtener_nombre_usuario()?></td>
                </tr>
                <tr>
                    <th>Correo electronico</th>
                    <td><?php $usuario -> obtener_correo()?></td>
                </tr>
                <tr>
                    <th>Telefono</th>
                    <td><?php $usuario -> obtener_telefono()?></td>
                </tr>
                <tr>
                    <td><button class="btn boton"><span class="material-icons">edit</span> Cambiar contraseña</button></td>
                    <td><button class="btn boton" name="editar"><span class="material-icons">edit</span> Editar datos</button></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2"><a href="<?php echo RUTA_MASCOTAS?>" class="btn boton"><span class="material-icons icono-20">pets</span> Mis mascotas</a></th>
                </tr>
            </tfoot>