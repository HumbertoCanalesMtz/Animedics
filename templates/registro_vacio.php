                    <div class="container">
                                    <div class="row text-center">
                                        <div class="col-md-12">
                                            <label for="nombres">Nombre(s)</label><br>
                                            <input class="txb" type="text" name="nombres" id="names" size="60" placeholder="Ej. Gustavo Adolfo">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="ap_paterno">Apellido Paterno</label><br>
                                            <input class="txb" type="text" name="ap_paterno" id="lastname" size="30" placeholder="Ej. Hernandez">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="ap_materno">Apellido Materno</label><br>
                                            <input class="txb" type="text" name="ap_materno" id="lastname" size="30" placeholder="Ej. Torres">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="correo">Correo electronico</label><br>
                                            <input class="txb" type="text" name="correo" id="email" size="60" placeholder="ejemplo@equisde.com">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="clave_1">Contraseña</label><br>
                                            <input class="txb" type="password" name="clave_1" id="password" size="30" placeholder="Mínimo ocho caracteres">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="clave_2">Confirmar contraseña</label><br>
                                            <input class="txb" type="password" name="clave_2" id="password" size="30" placeholder="Reescribir contraseña">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="nom_usuario">Nombre de usuario</label><br>
                                            <input class="txb" type="text" name="nom_usuario" id="nick" size="30" placeholder="Ej. GutyoFF">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="telefono">Telefono</label><br>
                                            <input class="txb" type="number" name="telefono" id="phone" size="30" placeholder="10 dígitos"
                                            onKeyPress = "if(this.value.length>50) return false;">
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <br>
                                            <button type="submit" class="btn boton fuente-WM" name="registrar">REGISTRARSE</button>
                                        </div>
                                    </div>    
                                </div>
