<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    if (isset($_FILES["gastos_file"])) {
        $file = $_FILES["gastos_file"];
        $target_path = "gastos/" . basename($file["name"]);
        move_uploaded_file($file["tmp_name"], $target_path);
        echo $target_path;
    }
    if (isset($_FILES["ingreso_file"])) {
        $file = $_FILES["ingreso_file"];
        $target_path = "ingresos/" . basename($file["name"]);
        move_uploaded_file($file["tmp_name"], $target_path);
        echo $target_path;
    }
}
?>