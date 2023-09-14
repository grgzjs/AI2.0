<?php
    include("conexion.php");

    if(isset($_GET["email"]) && isset($_GET["username"]) && isset($_GET["action"]) && isset($_GET["role"])){
        
        $email = $_GET['email'];
        $username = $_GET['username'];
        $action = $_GET['action'];
        $role = $_GET['role'];
        $current_date = date('Y-m-d H:i:s');

        $sql = "INSERT INTO logs (`email`, `username`, `date` ,`action`,`role`) VALUES('$email', '$username','$current_date',$action,'$role')";
        mysqli_query($con, $sql);  
        echo json_encode($sql);
        return;      
    }
    
?>