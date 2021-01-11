<?php
    session_start();
    include("../connect/connect.php");
    if($_POST['t_id'] == ''){

    }else{
        $t_id = filter_input(INPUT_POST , 't_id' , FILTER_SANITIZE_NUMBER_INT);
        $t_name = filter_input(INPUT_POST , 't_name' , FILTER_SANITIZE_STRING);
        $t_date = filter_input(INPUT_POST , 't_date'  , FILTER_SANITIZE_STRING);
        $t_detail = filter_input(INPUT_POST , 't_detail' , FILTER_SANITIZE_STRING);
        $t_lable = filter_input(INPUT_POST, 't_lable' , FILTER_SANITIZE_STRING);
        $t_status = filter_input(INPUT_POST , 't_status' , FILTER_SANITIZE_STRING);
        $teacher_id = filter_input(INPUT_POST , 'teacher_id' , FILTER_SANITIZE_STRING);

        $sql = "UPDATE todo SET 
            t_name = '$t_name',
            t_date  = '$t_date',
            t_detail = '$t_detail',
            t_lable = '$t_lable',
            t_status = '$t_status',
            teacher_id = '$teacher_id'
            WHERE t_id = '$t_id'";

        $result = mysqli_query($conn,$sql);
        
        if($result){
            header("location:../todo.php?status=success");
        }else{
            header("location:../todo.php?status=error");
        }
    }

?>