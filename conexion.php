<?php
/*Datos de conexion a la base de datos remoto*/
$db_host = "127.0.0.1:3308";//"localhost";
$db_user = "root";//"u894414282_InfoTesting";
$db_pass = "";//"Support1221!";
$db_name = "youaircharter";//"u894414282_SkySalesPro";

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()) {
	echo 'No se pudo conectar a la base de datos : '.mysqli_connect_error();
}
session_start();