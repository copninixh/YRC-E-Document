<?php
    session_start();
    include("../connect/connect.php");
    if($_POST['r_id'] == ''){
        header("location:../add_teacher_in_doc.php?id=$d_id&status=error");
    }else{
        $r_id = filter_input(INPUT_POST , 'r_id' , FILTER_SANITIZE_NUMBER_INT);
        $d_id = filter_input(INPUT_POST, 'd_id' , FILTER_SANITIZE_STRING);
        $t_id = filter_input(INPUT_POST, 't_id' ,  FILTER_SANITIZE_STRING);
        $r_status = filter_input(INPUT_POST, 'r_status' , FILTER_SANITIZE_NUMBER_INT);

        $sql = "UPDATE resultdoc SET
        r_status = '2'
        WHERE d_id = '$d_id'
        ";

        $result = mysqli_query($conn,$sql);
        if($result){
           
            header("location:../add_teacher_in_doc.php?id=$d_id&status=success");
        }else{
            header("location:../add_teacher_in_doc.php?id=$d_id&status=error");
        }
    }

?>