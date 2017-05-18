<?php
/**
 * Created by PhpStorm.
 * User: Jia Ming Liou
 * Date: 3/27/2017
 * Time: 7:03 AM
 */
require "CitaCtrl.php";
require "../Model/ConnectionControl.php";
require "../Model/Cita.php";

$_POST = json_decode(file_get_contents('php://input'), true);
$conection = new ConnectionControl();
$db = $conection->Conectar();
$id = stripslashes($_POST['id']);
$nombre = stripslashes($_POST['paciente']);
$raza = stripslashes($_POST['raza']);
$peso = stripslashes($_POST['peso']);
$edad = stripslashes($_POST['edad']);
$sexo = stripslashes($_POST['sexo']);
$dueno = stripslashes($_POST['dueno']);
$telefono = stripslashes($_POST['telefono']);
$alergias = stripslashes($_POST['alergias']);
$fecha  = stripslashes($_POST['fecha']);
$parasitos  = stripslashes($_POST['parasito']);
$tratamiento = stripslashes($_POST['tratamiento']);
$diagnostico = stripslashes($_POST['diagnostico']);
$hora =  stripslashes($_POST['hora']);
$cita = new Cita($id,$nombre,$raza,$peso,$edad,$sexo,$dueno,$telefono,$alergias,$fecha,$parasitos,$tratamiento,$diagnostico,$hora);
$action = new CitaCtrl();
$result = $action->Editar_Cita($cita,$db);
echo $result;

