<?php
/*Datos de conexion a la base de datos remoto*/
$db_host = "localhost";
$db_user = "u894414282_InfoTesting";
$db_pass = "Support1221!";
$db_name = "u894414282_SkySalesPro";

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()) {
	echo 'No se pudo conectar a la base de datos : '.mysqli_connect_error();
}
session_start();