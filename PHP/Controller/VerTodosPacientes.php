<?php
/**
 * Created by PhpStorm.
 * User: Jia Ming Liou
 * Date: 3/28/2017
 * Time: 9:26 AM
 */

require "PacienteCtrl.php";
require "../Model/ConnectionControl.php";
require "../Model/Paciente.php";

$conection = new ConnectionControl();
$db = $conection->Conectar();
$action = new PacienteCtrl();
$result = $action->Mostrar_Paciente ($db);
echo json_encode($result);