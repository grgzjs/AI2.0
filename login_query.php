<?php
include("conexion.php");

if (isset($_GET["check_username"]) && isset($_GET["check_password"])) {
    $username_to_check = $_GET["check_username"];
    $pssw_to_check = $_GET["check_password"];
    $username_exists = mysqli_query($con, "SELECT EXISTS(SELECT 1 FROM users WHERE username = '$username_to_check' OR email = '$username_to_check') AS username;");
    $row = mysqli_fetch_assoc($username_exists);
    // echo json_encode($row);
    $username_checked = $row["username"];

    $pssw_exists = mysqli_query($con, "SELECT `password` FROM users WHERE username = '$username_to_check' OR email = '$username_to_check';");
    $row = mysqli_fetch_assoc($pssw_exists);
    // echo json_encode(password_verify($pssw_to_check, $row["password"]) ? 1 : 0);
    $password_checked = password_verify($pssw_to_check, $row["password"]) ? 1 : 0;

    $data_for_validation = array();

    array_push($data_for_validation, ($username_checked == 1 && $password_checked == 1) ? 1 : 0);

    if ($data_for_validation[0] == 1) {
        $user_data = mysqli_query($con, "SELECT username, email, user_type FROM users WHERE username = '$username_to_check' OR email = '$username_to_check'");
        $row = mysqli_fetch_assoc($user_data);

        array_push($data_for_validation, $row["username"]);
        array_push($data_for_validation, $row["email"]);
        array_push($data_for_validation, $row["user_type"]);
    }

    echo json_encode($data_for_validation);
    return;
}

if (isset($_GET["check_token"])) {
    $token_to_check = $_GET["check_token"];
    $token_exists = mysqli_query($con, "SELECT EXISTS(SELECT 1 FROM users WHERE token = '$token_to_check');");

    $row = mysqli_fetch_assoc($token_exists);
    echo json_encode($row);
    return;
}

if (isset($_GET["generate_token"])) {
    $generate_token = $_GET["generate_token"];
    $token_generated = mysqli_query($con, "INSERT INTO users (token) VALUES('$generate_token')");

    $row = mysqli_fetch_assoc($token_generated);
    echo json_encode($row);
    return;
}

if (isset($_GET["new_username"]) && isset($_GET["new_password"]) && isset($_GET["new_email"]) && isset($_GET["new_token"]) && isset($_GET["user_type"])) {
    $new_username = $_GET["new_username"];
    $new_password = $_GET["new_password"];
    $new_email = $_GET["new_email"];
    $new_token = $_GET["new_token"];
    $user_type = $_GET["user_type"];
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $signup_succesful = mysqli_query($con, "INSERT INTO users (username, email, `password`, token, user_type) VALUES('$new_username', '$new_email', '$hashed_password', '$new_token', '$user_type')");

    $row = mysqli_fetch_assoc($signup_succesful);
    echo json_encode($row);
    return;
}

if (isset($_GET["new_username_to_check"]) && isset($_GET["new_email_to_check"])) {
    $new_username_to_check = $_GET["new_username_to_check"];
    $new_email_to_check = strtolower($_GET["new_email_to_check"]);

    $user_check = mysqli_query($con, "SELECT id FROM `users` WHERE username='$new_username_to_check';");
    $user_row = mysqli_fetch_assoc($user_check);
    $email_check = mysqli_query($con, "SELECT id FROM `users` WHERE email='$new_email_to_check';");
    $email_row = mysqli_fetch_assoc($email_check);

    if ($user_row == '' && $email_row == '') {
        echo json_encode(0); //usuario y email no existen
    } else if ($user_row == '' && $email_row != '') {
        echo json_encode(1); //email existe
    } else if ($user_row != '' && $email_row == '') {
        echo json_encode(2); //usuario existe
    } else {
        echo json_encode(3); //usuario y mail existen
    }

    return;
}