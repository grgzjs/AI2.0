<?php
    include("conexion.php");

    //I will asume this variables will be always defined
    

    if (isset($_GET["task_to_add"]) && isset($_GET["task_to_delete"])) {
        $task_to_add = $_GET["task_to_add"];
        $task_to_delete = $_GET["task_to_delete"];
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
        if($task_to_add == 0 && $task_to_delete == 0 && isset($_GET["user_unset"])){
            // Consulta para obtener los datos de MySQL
            $sql = "SELECT * FROM tasks WHERE status = 'pending'";
            $result = mysqli_query($con, $sql);

            $user=$_GET["user_unset"];
            // Check if the query was successful
            if ($result) { 
                $html ="";
                if($user == 1){
                    while ($row = mysqli_fetch_assoc($result)) {
                        $task = $row["id"];
                        // Now you have an html code with tasks                        
                            $html .= '<li class="todo-task"><label class="custom-control custom-checkbox" onclick="doneTask(\'' . $task . '\')"><input class="custom-control-input" type="checkbox"><span class="custom-control-label">' . $row['task'] . '</span></label><a class="close" id="close-icon" href="javascript:deleteTask(' . $row['id'] . ')"><span class="icon s7-close"></span></a></li>';
                    }
                }else{
                    while ($row = mysqli_fetch_assoc($result)) {
                        $task = $row["id"];
                        // Now you have an html code with tasks
                        $html .= '<li class="todo-task"><label class="custom-control custom-checkbox" onclick="doneTask(\'' . $task . '\')"><input class="custom-control-input" type="checkbox"><span class="custom-control-label">' . $row['task'] . '</span></label></li>';                        
                    }
                }
                
            } else {
                // Handle query error
                echo "Query error: " . mysqli_error($con);
            }
            echo $html;
            return;
        }
    }
    if(isset($_GET["done_task"])){
        $done_task = $_GET["done_task"];
        echo $done_task;
        $sql = "UPDATE tasks SET `status` = 'done' WHERE id = '$done_task'";
        mysqli_query($con, $sql);
        return;
    }
?>