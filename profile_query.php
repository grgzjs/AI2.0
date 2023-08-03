<?php
include("conexion.php");

$key = $_GET["key"];
if ($key == "change_user_type") {
    $new_user_type = $_GET["new_user_type"];
    $email = $_GET["credential"];

    $sql = "UPDATE users SET user_type = '$new_user_type' WHERE email = '$email'";
    $update_user_type = mysqli_query($con, "UPDATE users SET user_type = '$new_user_type' WHERE email = '$email'");
    $row_updated = mysqli_fetch_assoc($update_user_type);
    echo json_encode($sql);
}