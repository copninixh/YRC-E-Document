<?php
    session_start();
    include("../connect/connect.php");
    if($_POST['t_id'] == ''){

    }else{
        $t_id = filter_input(INPUT_POST , 't_id' , FILTER_SANITIZE_NUMBER_INT);
      
        $t_status = filter_input(INPUT_POST , 't_status' , FILTER_SANITIZE_STRING);
  

        $sql = "UPDATE todo SET 
            t_status = '$t_status'
            WHERE t_id = '$t_id'";

        $result = mysqli_query($conn,$sql);
        
        if($result){
            header("location:../todo.php?status=success");
        }else{
            header("location:../todo.php?status=error");
        }
    }


?>