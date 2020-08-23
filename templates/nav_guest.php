
<button type="button" class="btn dropdown-toggle dropdown-toggle-split boton blanco" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">ACCEDER </button>


<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" style="padding: 20px;">
    <h4 class="text-center fuente-R verde">INTRODUZCA SUS DATOS DE USUARIO</h4>
    <form method="post" action="<?php echo RUTA_LOGIN?>" class="fuente-R">
        <div class="text-center">
            <label for="correo">Correo electronico o nombre de usuario</label>
            <br>
            <input class="txb" type="text" name="correo" id="email" size="40" placeholder="Ej. Gustavo Hernandez" <?php if(isset($_POST['ingresar'])&&isset($_POST['correo'])&&!empty($_POST['correo'])){
                            echo 'value="'.$_POST['correo'].'"';
                            }?> required autofocus>
            <br>
            <?php if(isset($_POST['ingresar'])){$validador -> mostrar_error();}?>
            <label for="contraseña">Contraseña</label>
            <br>
            <input class="txb" type="password" name="clave" id="password" size="40" placeholder="Minimo 8 cáracteres"
                required autofocus>
        </div>
        <br>
        <div class="text-center">
            <button class="btn boton verde fuente-WM" type="submit" name="ingresar">Acceder</button>
        </div>
        <br>
    </form>
    <div class="text-center">
        <p class="fuente-R">¿No tienes una cuenta? <a href="<?php echo RUTA_REGISTRO?>" class="liga-WM">REGISTRATE</a>
        </p>
    </div>
</div>