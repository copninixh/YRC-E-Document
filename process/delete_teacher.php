<?php
    session_start();
    include("../connect/connect.php");

    if(isset($_GET['teacher_id'])){
        $teacher_id = filter_input(INPUT_GET , 'teacher_id' , FILTER_SANITIZE_NUMBER_INT);#$_GET['id'];
        $sql = "DELETE FROM teacher WHERE t_id  = '$teacher_id';";
        $result = mysqli_query($conn,$sql);

        if($result){
            header("location:../manage_teacher.php?status=success");
        }else{
            header("location:../manage_teacher.php?status=error");
        }

    }

   


?>