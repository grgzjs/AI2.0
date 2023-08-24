<?php
    include("conexion.php");

    //I will asume this variables will be always defined
    $task_to_add = $_GET["task_to_add"];
    $task_to_delete = $_GET["task_to_delete"];

    if (isset($task_to_add) && isset($task_to_delete)) {
        //If I don't want to delete, I create a task
        if($task_to_delete == 0 && $task_to_add != 0){
            $task_added = mysqli_query($con, "INSERT INTO tasks (`status`, task) VALUES('pending', '$task_to_add')");
            echo json_encode(true);
            return;
        }

        //If I don't want to add a task, I delete one
        if($task_to_add == 0 && $task_to_delete != 0){
            $task_deleted = mysqli_query($con, "DELETE FROM tasks WHERE id = $task_to_delete;");
            echo json_encode(true);
            return;
        }
        //If I don't want to add or delete a task, I return all tasks
        if($task_to_add == 0 && $task_to_delete == 0){
            // Consulta para obtener los datos de MySQL
            $sql = "SELECT * FROM tasks WHERE status = 'pending'";
            $result = mysqli_query($con, $sql);
            // Check if the query was successful
            if ($result) { 
                $html ="";
                while ($row = mysqli_fetch_assoc($result)) {
                    // Now you have an html code with tasks
                    $html .= '<li class="todo-task"><label class="custom-control custom-checkbox"><input class="custom-control-input" type="checkbox"><span class="custom-control-label">' . $row['task'] . '</span></label><a class="close" href="javascript:deleteTask(' . $row['id'] . ')"><span class="icon s7-close"></span></a></li>';
                }
            } else {
                // Handle query error
                echo "Query error: " . mysqli_error($con);
            }
            echo $html;
            return;
        }
    }
?>