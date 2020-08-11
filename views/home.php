<?php
    include_once 'app/config.inc.php';
    include_once 'app/Conexion.inc.php';
    include_once 'app/RepositorioUsuario.inc.php';
    include_once 'templates/declaracion.php';
    include_once 'templates/navbar.php';
?>
    <!--Presentación-->
    <div class="container">
        <div class="row fila">
            <div class="borde-redondo">
                <div class="row no-gutters centrado-vertical">
                    <div class="col-md-4 no-gutters">
                        <img src="<?php echo RUTA_IMG?>/doggo.png" class="card-img img-fluid">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title text-center fuente-WM verde">VETERINARIA HUELLITAS</h4>
                            <br>
                            <p class="card-text fuente-R" style="font-size: 20px;">
                        Veterinaria “Huellitas”  es una clínica 100% mexicana; Sus
                        inicios se remontan al año 2014, cuando los alumnos más prestigiosos y dedicados de la carrera de Médico veterinario del Instituto de Investigación de Ciencias Veterinarias  
                       tomaron la decisión de abrir su propia clínica para el 
                       beneficio de todo animal que lo necesitara. Desde ese 
                       entonces profesionales capaces y comprometidos han 
                       formado parte de la familia Huellitas para poco a poco, conseguir el prestigio y renombre que tanto la caracteriza. 
                        Los años de experiencia han forjado un gran sentido de la empatía y bondad en cada uno de los médicos de la empresa; Gracias a esto y su enorme vocación, hoy en día Huellitas cuenta con 7 sucursales distribuidas a lo largo de la comarca lagunera, cada una de ellas ofreciendo siempre la misma calidad, confort y confianza a sus clientes.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <!--Visión y misión-->
    <div class="container">
        <div class="row">
            <div class="col-md-6 fila">
                <div class="card mb-3 borde-redondo">
                    <div class="row no-gutters centrado-vertical">
                        <div>
                            <div class="card-body">
                                <h4 class="card-title text-center fuente-WM verde">MISION</h4>
                                <div class="row sombreado-c"></div>
                                <div style="height: 130px;">
                                    <p class="card-text text-center fuente-R" style="font-size: 18px;">
                                        Que cada uno de nuestros servicios sea realizado con respeto y eficacia, 
                                        brindando a los dueños de las mascotas que ingresan seguridad y bienestar, 
                                        siempre teniendo en consideración a cada uno de los animales y ofreciéndoles 
                                        el mejor de los tratos, ajustándonos siempre a sus necesidades para una atención más personalizada y adecuada.   
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters justify-content-center">
                        <div>
                            <img src="<?php echo RUTA_IMG?>/dogcat.png" class="card-img img-fluid altura-390">
                        </div>
                    </div>
                </div>
            </div>        
            <div class="col-md-6 fila">
                <div class="card mb-3 borde-redondo">
                    <div class="row no-gutters centrado-vertical">
                        <div>
                            <div class="card-body">
                                <h4 class="card-title text-center fuente-WM verde">VISION</h4>
                                <div class="row sombreado-c"></div>
                                <div style="height: 130px;">
                                    <p class="card-text text-center fuente-R" style="font-size: 18px;">
                                        Ser líderes en el sector veterinario de la región,
                                        y así poco a poco, manteniendo siempre la calidad característica, 
                                        poder ofrecer su trabajo y conocimiento a cada rincón de la república Mexicana.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters justify-content-center">
                        <div>
                            <img src="<?php echo RUTA_IMG?>/catdog.png" class="card-img altura-390">
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
    <!--Servicios-->
    <div class="container" id="servicios">
        <div class="fila">
            <div class="card mb-3 borde-redondo">
                <div class="row no-gutters centrado-vertical">
                     <div class="col-md-6">
                        <div class="card-body">
                            <h3 class="card-title text-center fuente-WM verde">SERVICIOS</h3>
                            <br>
                            <div style="padding-left: 20px;">
                                <p class="card-text">
                                    <dl class="fuente-R" style="font-size: 25px;">
                                        <dt>
                                            <span class="material-icons naranja icono-90deg">pets</span> Belleza y estética
                                        </dt>
                                        <dt>
                                            <span class="material-icons verde icono-90deg">pets</span> Cirugía
                                        </dt>
                                        <dt>
                                            <span class="material-icons naranja icono-90deg">pets</span> Consulta
                                        </dt>
                                        <dt>
                                            <span class="material-icons verde icono-90deg">pets</span> Desparasitación
                                        </dt>
                                        <dt>
                                            <span class="material-icons naranja icono-90deg">pets</span> Ecografías
                                        </dt>
                                        <dt>
                                            <span class="material-icons verde icono-90deg">pets</span> Hospitalización
                                        </dt>
                                        <dt>
                                            <span class="material-icons naranja icono-90deg">pets</span> Medicina prepagada
                                        </dt>
                                        <dt>
                                            <span class="material-icons verde icono-90deg">pets</span> Petshop
                                        </dt>
                                        <dt>
                                            <span class="material-icons naranja icono-90deg">pets</span> Rayos X
                                        </dt>
                                        <dt>
                                            <span class="material-icons verde icono-90deg">pets</span> Traumatología
                                        </dt>
                                        <dt>
                                            <span class="material-icons naranja icono-90deg">pets</span> Vacunación
                                        </dt>

                                    </dl>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="<?php echo RUTA_IMG?>/peludog.png" class="card-img">
                    </div>    
                </div>
            </div>
        </div>    
    </div>
        <!--Carrusel-->
        <div class="fila text-center bg-naranja">
            <h4 class="blanco separadito fuente-WM">LAS MEJORES INSTALACIONES</h4>
            <div class="fila centrado-vertical">
                <div class="d-flex justify-content-center">
                    <div class="align-self-center"><button class="btn bg-blanco" onclick="carruselder(document.getElementById('marco1'),document.getElementById('marco2'),document.getElementById('marco3'),'<?php echo RUTA_IMG?>/imgcar')"><span class="material-icons icono-270deg icono-40 naranja">pets</span></button></div>
                    <div class="d-none d-md-block align-self-center"><img src="<?php echo RUTA_IMG?>/imgcar2.png" id="marco1" width="200"></div>
                    <div class="align-self-center"><img src="<?php echo RUTA_IMG?>/imgcar3.png" id="marco2" width="300"></div>
                    <div class="d-none d-md-block align-self-center"><img src="<?php echo RUTA_IMG?>/imgcar4.png" id="marco3" width="200"></div>
                    <div class="align-self-center"><button class="btn bg-blanco" onclick="carrsuelizq(document.getElementById('marco1'),document.getElementById('marco2'),document.getElementById('marco3'),'<?php echo RUTA_IMG?>/imgcar')"><span class="material-icons icono-90deg icono-40 naranja">pets</span></button></div>
                </div>
            </div>
        </div>    
    <div class="container d-sm-none d-md-block">
        <div class="text-center">
            <img src="<?php echo RUTA_IMG?>/squadog.png">
        </div>
    </div>

<footer class="borde-sup borde-g borde-naranja">
        <!--Contacto-->
        <div class="text-center fila" id="contacto">
            <h4 class="fuente-WM verde separadito">CONTACTO</h4>
            <div class="text-center centrado-vertical fila">
                <div class="fuente-R icono-20">
                    <span class="material-icons naranja">place</span>
                    <a href="" class="liga-R">CALLE COSTA RICA COLONIA AVIACION #294 BIS</a>
                </div>
            <div class="icono-20">
                <span class="material-icons naranja">mail</span>
                <a href="mailto:veterinariahuellitas@gmail.com" class="liga-R">veterinariahuellitas@gmail.com</a>    
            </div>
            <div>
                <span class="material-icons naranja">local_phone</span>
                <a class="liga-R" href="#">+52 8715251340</a>
            </div>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d819.2744283765471!2d-103.39929423733645!3d25.551791727570073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x868fdb05e1f740dd%3A0xb416713ea5a71288!2sCalle%20Av%20Costa%20Rica%20294%2C%20Col%20Salvador%20Allende%2C%2027050%20Torre%C3%B3n%2C%20Coah.!5e0!3m2!1ses-419!2smx!4v1596939648248!5m2!1ses-419!2smx" frameborder="0" style="border:0; width: 100%; height: 500px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>   
</footer>
<?php include_once 'templates/cierre.php'?>
