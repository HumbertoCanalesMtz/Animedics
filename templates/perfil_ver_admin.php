<thead class="<?php if ($clase == 'admin') {echo 'gris';}elseif ($clase == 'vet') {echo 'naranja';} else{echo 'verde';}?> separadito">
    <tr>
        <th colspan="2">
            <h4><?php echo $usuario -> obtener_nombres()." ".$usuario -> obtener_ap_paterno()." ".$usuario -> obtener_ap_materno()?>
            </h4>
        </th>
    </tr>
</thead>
<tbody>
    <tr>
        <th>Nombre de usuario</th>
        <td><?php echo $usuario -> obtener_nombre_usuario()?></td>
    </tr>
    <tr>
        <th>Correo electronico</th>
        <td><?php echo $usuario -> obtener_correo()?></td>
    </tr>
    <tr>
        <th>Telefono</th>
        <td><?php echo $usuario -> obtener_telefono()?></td>
    </tr>
    <tr>
        <td><button class="btn boton-gris" name="cambiar"><span class="material-icons">edit</span> Cambiar
                contraseña</button></td>
        <td><button class="btn boton-gris" name="editar"><span class="material-icons">edit</span> Editar datos</button></td>
    </tr>
</tbody>