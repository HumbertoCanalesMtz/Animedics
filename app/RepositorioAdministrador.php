<?php
    //Esta clase sera para trabajar con los administradores
    public static insertar_servicios($conexion,$servicio)
    {
        if(isset($conexion))
        {
            try
            {
                $sql_1="INSERT INTO servicio(nombre) values ($servicio)";
                $sql_1->execute();
            }
            catch (PDOException $ex)
            {
                print "ERROR: ".$ex ->getMessage();    
            }
        }
    }










?>