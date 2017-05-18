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
$q = stripslashes($_POST['id']);
$action = new CitaCtrl();
$result = $action->Eliminar_Cita($q,$db);
echo $result;
