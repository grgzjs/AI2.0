<?php
include("conexion.php");

$sql = "select i_d.fecha, i_d.origen, i_d.destino, i_d.id_invoice from invoices i, invoice_detail i_d where i.status = 2 and i.quote=i_d.id_invoice"; // add where clause

$calendar_dates = mysqli_query($con, $sql);

$calendar_data = array();
while ($row = mysqli_fetch_assoc($calendar_dates)) {
    $titulo = $row["origen"] . "-" .  $row["destino"];
    $fecha = $row["fecha"];
    $quote_id = $row["id_invoice"];
    $calendar_event = array($titulo, $fecha, $quote_id);
    array_push($calendar_data, $calendar_event);
}

echo json_encode($calendar_data);
?>