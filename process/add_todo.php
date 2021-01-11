<?php
    session_start();
    include("../connect/connect.php");

    if(isset($_POST['Insert'])){
        $t_name = filter_input(INPUT_POST , 't_name' , FILTER_SANITIZE_STRING);
        $t_date = filter_input(INPUT_POST , 't_date'  , FILTER_SANITIZE_STRING);
        $t_detail = filter_input(INPUT_POST , 't_detail' , FILTER_SANITIZE_STRING);
        $t_lable = filter_input(INPUT_POST, 't_lable' , FILTER_SANITIZE_STRING);
        $t_status = filter_input(INPUT_POST , 't_status' , FILTER_SANITIZE_STRING);
        $teacher_id = filter_input(INPUT_POST , 'teacher_id' , FILTER_SANITIZE_STRING);

        $sql = "INSERT INTO `todo` (`t_id`, `t_name`, `t_date`, `t_detail`, `t_lable`, `t_status`, `teacher_id`) 
        VALUES (NULL, '$t_name', '$t_date', '$t_detail', '$t_lable', '$t_status', '$teacher_id');";
        $result = mysqli_query($conn,$sql);
        
        if($result){
            header("location:../todo.php?status=success");
        }else{
            header("location:../todo.php?status=error");
        }

    }


?>