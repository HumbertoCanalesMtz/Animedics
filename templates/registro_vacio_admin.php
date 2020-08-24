<table class="table table-hover table-striped text-center icono-15">
    <thead>
        <th>Escoja el rol del usuario</th>
        <th>
            <select class="txb-gris" name="rol" id="role">
                <option value="1">Administrador</option>
                <option value="2">Veterinario</option>
                <option value="3">Cliente</option>
            </select>
        </th>
    </thead>
    <tbody>
        <tr>
            <td>Nombre(s)</td>
            <td><input class="txb-gris" type="text" name="nombres" id="names" size="20"
                    placeholder="Ej. Gustavo Adolfo">
            </td>
        </tr>
        <tr>
            <td>Apellido paterno</td>
            <td>
                <input class="txb-gris" type="text" name="ap_paterno" id="lastname" size="20"
                    placeholder="Ej. Hernandez">
            </td>
        </tr>
        <tr>
            <td>Apellido materno</td>
            <td>
                <input class="txb-gris" type="text" name="ap_materno" id="lastname" size="20" placeholder="Ej. Torres">
            </td>
        </tr>
        <tr>
            <td>Correo electronico</td>
            <td>
                <input class="txb-gris" type="text" name="correo" id="email" size="20"
                    placeholder="ejemplo@equisde.com">
            </td>
        </tr>
        <tr>
            <td>Nombre de usuario</td>
            <td><input class="txb-gris" type="text" name="nom_usuario" id="nickname" size="20"
                    placeholder="Ej. GHT159">
            </td>
        </tr>
        <tr>
            <td>Contraseña</td>
            <td>
                <input class="txb-gris" type="password" name="clave_1" id="password" size="20"
                    placeholder="Mínimo ocho caracteres">
            </td>
        </tr>
        <tr>
        </tr>
        <tr>
            <td>Confirmar contraseña</td>
            <td>
                <input class="txb-gris" type="password" name="clave_2" id="password" size="20"
                    placeholder="Reescribir contraseña">
            </td>
        </tr>
        <tr>
            <td>Telefono</td>
            <td>
                <input class="txb-gris" type="number" name="telefono" id="phone" size="20" placeholder="10 dígitos"
                    onKeyPress="if(this.value.length>9) return false;">
            </td>
        </tr>
        <tr>
            <td>Cedula (En caso de estár registrando un veterinario)</td>
            <td>
                <input class="txb-gris" type="text" name="cedula" id="xd" size="20"
                    placeholder="Máxmio 10 cáracteres" onKeyPress="if(this.value.length>9) return false;">
            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2">
                <button type="submit" class="btn boton-gris fuente-WM" name="registrar">REGISTRARSE</button>
            </td>
        </tr>
    </tfoot>
</table>