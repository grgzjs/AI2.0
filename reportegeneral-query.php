<?php
    include("conexion.php");
    $sql_reporte = '
    SELECT `date`,DATE_FORMAT(date, "%d/%m/%Y") as spanish_date, `type`, `concept`, `amount`, `moneda_cambio`, `file` FROM `gastos_generales` 
    UNION SELECT `date`, DATE_FORMAT(date, "%d/%m/%Y") as spanish_date, `tipoingreso` AS `type`, `concepto` AS `concept`, `monto` AS `amount`, `moneda_cambio`, `file` FROM `ingresos_generales` 
    ORDER BY `date` DESC;';
    $reporte = mysqli_query($con, $sql_reporte);
    $reporte_data = array();
    while ($rowp = mysqli_fetch_assoc($reporte)) {
        array_push($reporte_data,array(
            "date" => $rowp["date"],
            "spanish_date" => $rowp["spanish_date"], 
            "type" => $rowp["type"], 
            "concept" => $rowp["concept"], 
            "amount" => $rowp["amount"], 
            "moneda_cambio" => $rowp["moneda_cambio"],
            "moneda_cambio" => $rowp["moneda_cambio"],
            "file" => $rowp["file"],
        ));
    }

    echo json_encode($reporte_data);
    return;
?>