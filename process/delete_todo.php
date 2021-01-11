<?php
    session_start();
    include("../connect/connect.php");
    if(isset($_GET['t_id'])){
        $t_id = filter_input(INPUT_GET , 't_id' , FILTER_SANITIZE_NUMBER_INT);
        $sql = "DELETE FROM todo WHERE t_id = '$t_id'";
        $result = mysqli_query($conn,$sql);
        if($result){
            header("location:../todo.php?status=success");
        }else{
            header("location:../todo.php?status=error");
        }
    }


?>