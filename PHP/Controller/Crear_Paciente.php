<?php
/**
 * Created by PhpStorm.
 * User: Jia Ming Liou
 * Date: 3/27/2017
 * Time: 7:03 AM
 */
require "PacienteCtrl.php";
require "../Model/ConnectionControl.php";
require "../Model/Paciente.php";

$_POST = json_decode(file_get_contents('php://input'), true);
$conection = new ConnectionControl();
$db = $conection->Conectar();
$nombre = stripslashes($_POST['paciente']);
$raza = stripslashes($_POST['raza']);
$peso = stripslashes($_POST['peso']);
$edad = stripslashes($_POST['edad']);
$sexo = stripslashes($_POST['sexo']);
$dueno = stripslashes($_POST['dueno']);
$telefono = stripslashes($_POST['telefono']);
$alergias = stripslashes($_POST['alergias']);
$paciente = new Paciente($nombre,$raza,$peso,$edad,$sexo,$dueno,$telefono,$alergias);
$action = new PacienteCtrl();
$result = $action->Agregar_Paciente($paciente,$db);
echo $result;
