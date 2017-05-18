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
$q = stripslashes($_POST['id']);
$action = new PacienteCtrl();
$result = $action->Eliminar_Paciente($q,$db);
echo $result;
