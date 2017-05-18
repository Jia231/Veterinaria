<?php
/**
 * Created by PhpStorm.
 * User: Jia Ming Liou
 * Date: 3/28/2017
 * Time: 9:26 AM
 */

require "CitaCtrl.php";
require "../Model/ConnectionControl.php";
require "../Model/Cita.php";

$conection = new ConnectionControl();
$db = $conection->Conectar();
$action = new CitaCtrl();
$result = $action->Mostrar_Cita ($db);
echo json_encode($result);