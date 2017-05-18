<?php

/**
 * Created by PhpStorm.
 * User: Jia Ming Liou
 * Date: 3/27/2017
 * Time: 6:59 AM
 */
class PacienteCtrl
{
    public static function Agregar_Paciente(Paciente $p, $db)
    {

        $connectionControl = new ConnectionControl();
        $ConnectionString = $db;


        $query = "INSERT INTO pacientes (paciente,raza,peso,edad,sexo,dueno,telefono,alergias) VALUES ('$p->paciente',
              '$p->raza','$p->peso','$p->edad','$p->sexo','$p->dueno','$p->telefono','$p->alergias')";
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

    public static function Mostrar_Paciente($db)
    {

        $connectionControl = new ConnectionControl();
        $ConnectionString = $db;


        $query = "Select * from pacientes";
        $pacientes = [];
        if ($resultado = mysqli_query($ConnectionString, $query)) {
            $personal = "";

            while ($row = $resultado->fetch_array()) {
                //$idUsuario,$NombreUsuario,$Nombre,$Apellido,$Correo,$Contraseña,$FechaCreacion,$CorreoActivo,$TipoUsuario,$Verificado
                $paciente = new Paciente($row["id"],$row["paciente"], $row["raza"],
                    $row["peso"], $row["edad"], $row["sexo"], $row["dueno"], $row["telefono"], $row["alergias"]);
                array_push($pacientes, $paciente);
            }
            $connectionControl->Desconectar();
            $connectionControl = null;
            return $pacientes;

        }
        $connectionControl->Desconectar();
        $connectionControl = null;
        return null;

    }

    public static function Buscar_Un_Paciente_Por_ID($q, $db)
    {
        $connectionControl = new ConnectionControl();
        $ConnectionString = $db;
        $query = "SELECT * FROM   pacientes WHERE id='" . $q . "'";

        $pacientes = [];
        if ($resultado = mysqli_query($ConnectionString, $query)) {
            $personal = "";

            while ($row = $resultado->fetch_array()) {
                //$idUsuario,$NombreUsuario,$Nombre,$Apellido,$Correo,$Contraseña,$FechaCreacion,$CorreoActivo,$TipoUsuario,$Verificado
                $paciente = new Paciente($row["id"],$row["paciente"], $row["raza"],
                    $row["peso"], $row["edad"], $row["sexo"], $row["dueno"], $row["telefono"], $row["alergias"]);
                array_push($pacientes, $paciente);
            }
            $connectionControl->Desconectar();
            $connectionControl = null;
            return $pacientes;

        }
        $connectionControl->Desconectar();
        $connectionControl = null;
        return null;
    }

    public static function Buscar_Paciente($buscarpor, $db)
    {

        $connectionControl = new ConnectionControl();
        $ConnectionString = $db;
        if ($buscarpor != '*' || $buscarpor=='') {

            $query = "SELECT * FROM  pacientes WHERE (paciente LIKE '%" . $buscarpor . "%' OR dueno LIKE '%" . $buscarpor . "%')";
        } else {
            $query = "SELECT * FROM pacientes";

        }

        $pacientes = [];
        if ($resultado = mysqli_query($ConnectionString, $query)) {
            $personal = "";

            while ($row = $resultado->fetch_array()) {
                //$idUsuario,$NombreUsuario,$Nombre,$Apellido,$Correo,$Contraseña,$FechaCreacion,$CorreoActivo,$TipoUsuario,$Verificado
                $paciente = new Paciente($row["id"],$row["paciente"], $row["raza"],
                    $row["peso"], $row["edad"], $row["sexo"], $row["dueno"], $row["telefono"], $row["alergias"]);
                array_push($pacientes, $paciente);
            }
            $connectionControl->Desconectar();
            $connectionControl = null;
            return $pacientes;

        }
        $connectionControl->Desconectar();
        $connectionControl = null;
        return null;

    }

    public static function Editar_Paciente(Paciente $paciente, $db)
    {

        $connectionControl = new ConnectionControl();
        $ConnectionString = $db;


        $query = "Update pacientes set paciente='$paciente->paciente',raza= '$paciente->raza',peso='$paciente->peso',sexo='$paciente->sexo',dueno='$paciente->dueno',telefono='$paciente->telefono',alergias='$paciente->alergias', edad='$paciente->edad' Where id='$paciente->id'";
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



    public static  function Eliminar_Paciente ($q,$db){

        $connectionControl = new ConnectionControl();
        $ConnectionString = $db;


        $query ="DELETE FROM pacientes WHERE id='".$q."'";
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
