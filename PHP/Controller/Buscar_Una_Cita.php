<?php
/**
 * Created by PhpStorm.
 * User: Jia Ming Liou
 * Date: 3/30/2017
 * Time: 8:49 PM
 */

require "CitaCtrl.php";
require "../Model/ConnectionControl.php";
require "../Model/Cita.php";

$_POST = json_decode(file_get_contents('php://input'), true);
$conection = new ConnectionControl();
$db = $conection->Conectar();
$id = stripslashes($_POST['id']);
$action = new CitaCtrl();
$result = $action->Buscar_Una_Cita_Por_ID($id,$db);
echo json_encode($result);
