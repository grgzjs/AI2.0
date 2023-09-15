<?php
    include("conexion.php");

    //I will asume this variables will be always defined
    

    if (isset($_GET["email"])) {
        $email = $_GET["email"];
        //If I don't want to delete, I create a task
   
            $result =mysqli_query($con, "SELECT `user_img` FROM users WHERE `email`='$email'");
            while ($row = mysqli_fetch_assoc($result)) {
                echo json_encode($row['user_img']);
            }
            
            return;
   

    }
 
?>