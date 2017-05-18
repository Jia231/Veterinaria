<?php
/**
 * Created by PhpStorm.
 * User: Jia Ming Liou
 * Date: 3/27/2017
 * Time: 11:12 AM
 */

require "CitaCtrl.php";
require "../Model/ConnectionControl.php";
require "../Model/Cita.php";

$_POST = json_decode(file_get_contents('php://input'), true);
$conection = new ConnectionControl();
$db = $conection->Conectar();
$paciente = stripslashes($_POST['paciente']);
$raza = stripslashes($_POST['raza']);
$peso = stripslashes($_POST['peso']);
$edad = stripslashes($_POST['edad']);
$sexo = stripslashes($_POST['sexo']);
$dueno = stripslashes($_POST['dueno']);
$telefono = stripslashes($_POST['telefono']);
$alergias = stripslashes($_POST['alergias']);
$tratamiento = stripslashes($_POST['tratamiento']);
$fecha = stripslashes($_POST['fecha']);
$parasito = stripslashes($_POST['parasito']);
$diagnostico = stripslashes($_POST['diagnostico']);
$hora = stripslashes($_POST['hora']);
$cita = new Cita(0,$paciente,$raza,$peso,$edad,$sexo,$dueno,$telefono,$alergias,$fecha,$parasito,$tratamiento,$diagnostico,$hora);
$action = new CitaCtrl();
$result = $action->Agregar_Cita($cita,$db);
echo $result;