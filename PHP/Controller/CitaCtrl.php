<?php

/**
 * Created by PhpStorm.
 * User: Jia Ming Liou
 * Date: 3/27/2017
 * Time: 11:13 AM
 */
class CitaCtrl
{
    public static function Agregar_Cita(Cita $c, $db)
    {

        $connectionControl = new ConnectionControl();
        $ConnectionString = $db;


        $query = "INSERT INTO citas (paciente,raza,peso,edad,sexo,dueno,telefono,alergias,fecha,parasitos,tratamiento,diagnostico,hora) VALUES ('$c->paciente','$c->raza','$c->peso','$c->edad','$c->sexo','$c->dueno','$c->telefono','$c->alergias','$c->fecha','$c->parasito','$c->tratamiento','$c->diagnostico','$c->hora')";
       try {
            if ($result = mysqli_query($ConnectionString, $query)) {
                $connectionControl->Desconectar();
                $connectionControl = null;
                return true;
            }
            $connectionControl->Desconectar();
            $connectionControl = null;
            return false;
        } catch (Exception $exception) {
            return false;
        }
    }
    public static function Mostrar_Cita($db)
    {

        $connectionControl = new ConnectionControl();
        $ConnectionString = $db;


        $query = "Select * from citas";
        $citas = [];
        if ($resultado = mysqli_query($ConnectionString, $query)) {
            $personal = "";

            while ($row = $resultado->fetch_array()) {
                //$idUsuario,$NombreUsuario,$Nombre,$Apellido,$Correo,$Contraseña,$FechaCreacion,$CorreoActivo,$TipoUsuario,$Verificado$rpw[
                $cita = new Cita($row['id'],$row['paciente'],$row['Raza'],$row['Peso'],$row['Edad'],$row['sexo'],$row['Dueno'],$row['Telefono'],$row['Alergias'],$row['Fecha'],$row['Parasitos'],$row['Tratamiento'],$row['Diagnostico'],$row['hora']);
                array_push($citas, $cita);
            }
            $connectionControl->Desconectar();
            $connectionControl = null;
            return $citas;

        }
        $connectionControl->Desconectar();
        $connectionControl = null;
        return null;

    }

    public static function Editar_Cita(Cita $cita, $db)
    {

        $connectionControl = new ConnectionControl();
        $ConnectionString = $db;


        $query = "Update citas set paciente='$cita->paciente',Raza= '$cita->raza',Peso='$cita->peso',Edad='$cita->edad',sexo='$cita->sexo',Dueno='$cita->dueno',Telefono='$cita->telefono',Alergias='$cita->alergias', Fecha='$cita->fecha',Parasitos='$cita->parasito',Tratamiento='$cita->tratamiento',Diagnostico='$cita->diagnostico',hora='$cita->hora' Where id='$cita->id'";
        try {
            if ($result = mysqli_query($ConnectionString, $query)) {
                $connectionControl->Desconectar();
                $connectionControl = null;
                return $query;
            }
            $connectionControl->Desconectar();
            $connectionControl = null;
            return false;
        } catch (Exception $exception) {
            return false;
        }

    }


    public static function Buscar_Una_Cita_Por_ID($q, $db)
    {

        $connectionControl = new ConnectionControl();
        $ConnectionString = $db;


        $query = "Select * from citas Where id='" . $q . "'";
        $citas = [];
        if ($resultado = mysqli_query($ConnectionString, $query)) {
            $personal = "";

            while ($row = $resultado->fetch_array()) {
                //$idUsuario,$NombreUsuario,$Nombre,$Apellido,$Correo,$Contraseña,$FechaCreacion,$CorreoActivo,$TipoUsuario,$Verificado$rpw[
                $cita = new Cita($row['id'],$row['paciente'],$row['Raza'],$row['Peso'],$row['Edad'],$row['sexo'],$row['Dueno'],$row['Telefono'],$row['Alergias'],$row['Fecha'],$row['Parasitos'],$row['Tratamiento'],$row['Diagnostico'],$row['hora']);
                array_push($citas, $cita);
            }
            $connectionControl->Desconectar();
            $connectionControl = null;
            return $citas;

        }
        $connectionControl->Desconectar();
        $connectionControl = null;
        return null;



    }



    public static  function Eliminar_Cita ($q,$db){

        $connectionControl = new ConnectionControl();
        $ConnectionString = $db;


        $query ="DELETE FROM citas WHERE id='".$q."'";
        try{
            if ($result=mysqli_query($ConnectionString, $query))
            {
                $connectionControl->Desconectar();
                $connectionControl = null;
                return true;
            }
            $connectionControl->Desconectar();
            $connectionControl = null;
            return false;
        }
        catch (Exception $exception)
        {
            return false;
        }



    }
}