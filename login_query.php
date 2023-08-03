<?php
include("conexion.php");

// $username_to_check = $_GET["check_username"];
// if (isset($username_to_check)) {
//     $username_exists = mysqli_query($con, "SELECT EXISTS(SELECT 1 FROM users WHERE username = '$username_to_check' or email = '$username_to_check');");

//     $row = mysqli_fetch_assoc($username_exists);
//     echo json_encode($row);
// }

// $pssw_to_check = $_GET["check_password"];
// if (isset($pssw_to_check)) {
//     $pssw_exists = mysqli_query($con, "SELECT `password` FROM users WHERE username = '$username_to_check' or email = '$username_to_check');");

//     $row = mysqli_fetch_assoc($pssw_exists);
//     echo json_encode(password_verify($pssw_to_check, $row["password"]) ? 1 : 0);
// }

$username_to_check = $_GET["check_username"];
$pssw_to_check = $_GET["check_password"];
if (isset($username_to_check) && isset($pssw_to_check)) {
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

        // $data_for_validation[1] = $row["username"];
        // $data_for_validation[2] = $row["email"];
        // $data_for_validation[3] = $row["user_type"];
    }

    echo json_encode($data_for_validation);
}

$token_to_check = $_GET["check_token"];
if (isset($token_to_check)) {
    $token_exists = mysqli_query($con, "SELECT EXISTS(SELECT 1 FROM users WHERE token = '$token_to_check');");

    $row = mysqli_fetch_assoc($token_exists);
    echo json_encode($row);
}

$generate_token = $_GET["generate_token"];
if (isset($generate_token)) {
    $token_generated = mysqli_query($con, "INSERT INTO users (token) VALUES('$generate_token')");

    $row = mysqli_fetch_assoc($token_generated);
    echo json_encode($row);
}

$new_username = $_GET["new_username"];
$new_password = $_GET["new_password"];
$new_email = $_GET["new_email"];
$new_token = $_GET["new_token"];
$user_type = $_GET["user_type"];
if (isset($new_username) && isset($new_password) && isset($new_email) && isset($new_token) && isset($user_type)) {
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $signup_succesful = mysqli_query($con, "INSERT INTO users (username, email, `password`, token, user_type) VALUES('$new_username', '$new_email', '$hashed_password', '$new_token', '$user_type')");

    $row = mysqli_fetch_assoc($signup_succesful);
    echo json_encode($row);
}