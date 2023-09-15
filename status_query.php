<?php
    include("conexion.php");

    

    if (isset($_GET["quote"]) ) {
        $quote = $_GET["quote"];
        $sql_update_status = "update invoices set status=3 where quote=" . $quote;
        mysqli_query($con, $sql_update_status) or die(mysqli_error($con));
    }

?>