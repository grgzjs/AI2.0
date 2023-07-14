<?php
include("conexion.php");

$sql = "select fecha, origen, destino from invoice_detail"; // add where clause

$calendar_dates = mysqli_query($con, $sql);

$calendar_data = array();
while ($row = mysqli_fetch_assoc($calendar_dates)) {
    $titulo = $row["origen"] . "-" .  $row["destino"];
    $fecha = $row["fecha"];
    $calendar_event = array($titulo, $fecha);
    array_push($calendar_data, $calendar_event);
}

echo json_encode($calendar_data);
?>