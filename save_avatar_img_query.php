<?php
include("conexion.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    if (isset($_FILES["avatar_img"]) && isset($_POST['email'])) {
        $file = $_FILES["avatar_img"];
        $email = $_POST["email"];
        $name ="avatar_img_" .$email;

        $target_path = "assets/img/avatars/" . basename($name);
        move_uploaded_file($file["tmp_name"], $target_path);

        $sql = "UPDATE `users` SET `user_img` = '". $target_path ."' WHERE `email`='"  . $email. "';";
        mysqli_query($con, $sql);
        


        echo $sql;
        return;
    }
}
?>