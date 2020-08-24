<?php 
include_once "app/config.inc.php";
include_once "app/Conexion.inc.php";
include_once "app/ValidadorCitaInv.inc.php";
include_once "app/Usuario.inc.php";
include_once "app/Mascota.inc.php";
include_once "app/Cita.inc.php";
include_once "app/Extras.inc.php";
include_once "app/RepositorioUsuario.inc.php";
include_once "app/RepositorioMascota.inc.php";
include_once "app/RepositorioCita.inc.php";
include_once "app/Escritor.inc.php";
include_once "app/Redireccion.inc.php";

if(isset($_POST['agendar'])){
    Conexion::abrir_conexion();
        $validador = new ValidadorCitaInv($_POST['nombres'], $_POST['ap_paterno'], $_POST['ap_materno'], 
        $_POST['correo'], $_POST['telefono'], $_POST['nombre'], $_POST['edad'], $_POST['fecha']);
        $agendada = false;
        if($validador -> validar_cita()){
            $fecha_og = str_replace('/','-', $_POST['fecha']);
            $fecha_fol = substr(str_replace('/','', $_POST['fecha']),0,-4);
            $fecha = date("Y-m-d",strtotime($fecha_og));
            $persona = new Usuario('', $validador -> obtener_nombres(), $validador -> obtener_ap_paterno(), 
            $validador -> obtener_ap_materno(), $validador -> obtener_correo(),'','', $validador -> obtener_telefono(), '', '');
            $id_persona = RepositorioUsuario::insertar_persona_invitada(Conexion::obtener_conexion(), $persona);
            $mascota = new Mascota('', $validador -> obtener_nombre(), $_POST['especie'], $validador -> obtener_edad(), 
            $_POST['sexo'], $id_persona);
            $id_mascota = RepositorioMascota::insertar_mascota_invitada(Conexion::obtener_conexion(), $mascota);
            $folio = Extras::crear_nuevo_folio(Conexion::obtener_conexion(), $fecha_fol);
            $veterinario = Extras::seleccionar_veterinario(Conexion::obtener_conexion());
            $cita = new Cita('', $folio, $veterinario, $id_mascota, $fecha, $_POST['hora'], 'NO');
            $id_cita = RepositorioCita::insertar_cita(Conexion::obtener_conexion(), $cita);
            RepositorioServicio::insertar_cita_servicio(Conexion::obtener_conexion(), $id_cita, $_POST['servicios']);
            $agendada = true;
        }
    Conexion::cerrar_conexion();
}
include_once "templates/declaracion.php";
include_once "templates/navbar.php";
?>
<div class="container-fluid columna">
        <div class="row fila">
            <div class="container col-md-12 borde-redondo borde-verde d-flex justify-content-center fila">
                        <?php if(isset($_POST['agendar'])){
                            if($agendada){?>
                                <h1 class="fuente-WM verde separadito text-center">¡TU CITA HA SIDO AGENDADA</h1><br>
                                <p class="fuente-R icono-20">Tu folio de seguimiento es el siguiente: <?php echo $folio?></p><?php
                            } else{
                                include_once 'templates/agendar_cita_validado.php';
                            }
                        } else{
                            include_once 'templates/agendar_cita_vacio.php';
                        }?>
            </div>
        </div>    
    </div>
</div>
    <div class="esconde-logo"></div>
<?php include_once "templates/cierre.php";?>