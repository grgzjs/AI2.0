<?php
include("conexion.php");

$matricula = $_GET["matricula"];

// $sql = "select i_d.fecha, i_d.origen, i_d.destino, i_d.id_invoice from invoices i, invoice_detail i_d where (i.status = 2 or i.status = 3) and i.quote=i_d.id_invoice";
$sql = "SELECT i_d.fecha, i_d.origen, i_d.destino, i_d.id_invoice 
FROM invoices i, invoice_detail i_d 
WHERE (i.status = 2 OR i.status = 3) AND i.quote=i_d.id_invoice";

if (isset($matricula) && $matricula != "General") {
    $sql .= " AND i.aircraft='$matricula'";
}

$calendar_dates = mysqli_query($con, $sql);

$calendar_data = array();
while ($row = mysqli_fetch_assoc($calendar_dates)) {
    $titulo = $row["origen"] . "-" .  $row["destino"] . " (#".$row["id_invoice"].")";
    $fecha = $row["fecha"];
    $quote_id = $row["id_invoice"];
    $calendar_event = array($titulo, $fecha, $quote_id);
    array_push($calendar_data, $calendar_event);
}

echo json_encode($calendar_data);
