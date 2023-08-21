<?php
// no funciona
if (isset($_GET["task_to_add"])) {
    $task_to_add = $_GET["task_to_add"];

    $task_added = mysqli_query($con, "INSERT INTO tasks (`status`, taks) VALUES('pending', '$task_to_add')");

    $row = mysqli_fetch_assoc($task_added);
    echo json_encode($row);
    return;
}

if (isset($_GET["task_to_delete"])) {
    $task_to_delete = $_GET["task_to_delete"];
    
    $task_deleted = mysqli_query($con, "DELETE FROM tasks WHERE id = $task_to_delete;");

    $row = mysqli_fetch_assoc($task_deleted);
    echo json_encode($row);
    return;
}