<?php
/*Datos de conexion a la base de datos remoto*/
$db_host = "localhost"; // 208.109.21.16
$db_user = "w3ezyugzcrtk";
$db_pass = "Support1221!";
$db_name = "YouAirCharter";

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()) {
	echo 'No se pudo conectar a la base de datos : '.mysqli_connect_error();
}
session_start();