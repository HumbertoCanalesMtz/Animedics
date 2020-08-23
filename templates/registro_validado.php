<div class="container">
    <div class="row text-center">
        <div class="col-md-12">
            <?php $validador -> mostrar_error_nombres();?>
        </div>
        <div class="col-md-12">
            <label for="nombres">Nombre(s)</label><br>
            <input class="txb" type="text" name="nombres" id="names" size="60" <?php $validador -> mostrar_nombres();?>>

        </div>
        <div class="col-md-6">
            <?php $validador -> mostrar_error_ap_paterno();?>
        </div>
        <div class="col-md-6">
            <?php $validador -> mostrar_error_ap_materno();?>
        </div>

        <div class="col-md-6">
            <label for="ap_paterno">Apellido Paterno</label><br>
            <input class="txb" type="text" name="ap_paterno" id="lastname" size="30"
                <?php $validador -> mostrar_ap_paterno();?>>
        </div>
        <div class="col-md-6">
            <label for="ap_materno">Apellido Materno</label><br>
            <input class="txb" type="text" name="ap_materno" id="lastname" size="30"
                <?php $validador -> mostrar_ap_materno();?>>
        </div>

        <div class="col-md-12">
            <?php $validador -> mostrar_error_correo();?>
        </div>
        <div class="col-md-12">
            <label for="correo">Correo electronico</label><br>
            <input class="txb" type="text" name="correo" id="email" size="60" <?php $validador -> mostrar_correo();?>>
        </div>

        <div class="col-md-6">
            <?php $validador -> mostrar_error_clave_1();?>
        </div>
        <div class="col-md-6">
            <?php $validador -> mostrar_error_clave_2();?>
        </div>

        <div class="col-md-6">
            <label for="clave_1">Contraseña</label><br>
            <input class="txb" type="password" name="clave_1" id="password" size="30">
        </div>
        <div class="col-md-6">
            <label for="clave_2">Confirmar contraseña</label><br>
            <input class="txb" type="password" name="clave_2" id="password" size="30">
        </div>
        <div class="col-md-12">
            <?php $validador -> mostrar_error_nom_usuario();?>
        </div>
                                        <div class="col-md-6">
                                            <label for="nom_usuario">Nombre de usuario</label><br>
                                            <input class="txb" type="text" name="nom_usuario" id="nick" size="30" <?php $validador -> mostrar_nom_usuario();?>>
                                            
                                        </div>       
        <div class="col-md-12">
            <?php $validador -> mostrar_error_telefono();?>
        </div>                                 
                                        <div class="col-md-6">
                                            <label for="telefono">Telefono</label><br>
                                            <input class="txb" type="number" name="telefono" id="phone" size="30" <?php $validador -> mostrar_telefono();?>
                                            onKeyPress = "if(this.value.length>50) return false;">
                                        </div>
        <div class="col-md-12 text-center">
            <br>
            <button type="submit" class="btn boton fuente-WM" name="registrar">REGISTRARSE</button>
        </div>
    </div>
</div>