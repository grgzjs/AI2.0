<?php
include("conexion.php");

$sql = "select fecha, origen, destino from invoice_detail"; // add where clause

$calendar_dates = mysqli_query($con, $sql);

while ($row = mysqli_fetch_assoc($calendar_dates)) {
    $title = $row["origen"] . $row["destino"];
    $fecha = $row["fecha"];
}

echo "1";
echo "<span>2</span>";
echo "<script>console.log(3)</script>";