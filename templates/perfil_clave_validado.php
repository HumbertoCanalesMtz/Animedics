<thead class="verde separadito">
    <tr>
        <th colspan="2">MODIFICA TU CONTRASEÑA</th>
    </tr>
</thead>
<tbody>
    <tr>
        <th>Contraseña anterior</th>
        <td><input class="txb" type="password" name="clave_ing" id="password" size="30"></td>
    </tr>
    <?php $validador_clave -> mostrar_error_clave_ing();?>
    <tr>
        <th>Nueva contraseña</th>
        <td><input class="txb" type="password" name="clave_1" id="password" size="30"></td>
    </tr>
    <?php $validador_clave -> mostrar_error_clave_1();?>
    <tr>
        <th>Confirmar contraseña</th>
        <td><input class="txb" type="password" name="clave_2" id="password" size="30"></td>
    </tr>
    <?php $validador_clave -> mostrar_error_clave_2();?>
    <tr>
        <td><button class="btn boton" name="cancelar"><span class="material-icons">edit</span>Cancelar</button></td>
        <td><button class="btn boton" name="guardar_clave"><span class="material-icons">edit</span>Guardar
                cambios</button></td>
    </tr>
</tbody>