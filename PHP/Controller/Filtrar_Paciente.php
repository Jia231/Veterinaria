<?php
/**
 * Created by PhpStorm.
 * User: Jia Ming Liou
 * Date: 3/30/2017
 * Time: 8:49 PM
 */

require "PacienteCtrl.php";
require "../Model/ConnectionControl.php";
require "../Model/Paciente.php";

$_POST = json_decode(file_get_contents('php://input'), true);
$conection = new ConnectionControl();
$db = $conection->Conectar();
$texto = stripslashes($_POST['texto']);
$action = new PacienteCtrl();
$result = $action->Buscar_Paciente($texto,$db);
echo json_encode($result);