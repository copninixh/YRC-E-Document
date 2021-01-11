<?php
    session_start();
    include("../connect/connect.php");
    if(isset($_GET['t_id'])&&($_GET['d_id'])){
        $t_id = filter_input(INPUT_GET , 't_id' , FILTER_SANITIZE_NUMBER_INT);
        $d_id = filter_input(INPUT_GET , 'd_id' , FILTER_SANITIZE_NUMBER_INT);

        $sql = "DELETE FROM resultdoc WHERE t_id = '$t_id' AND d_id = '$d_id'";
        $result = mysqli_query($conn,$sql);

        if($result){
            header("location:../add_teacher_in_doc.php?id=$d_id&status=success");
        }else{
            header("location:../add_teacher_in_doc.php?id=$d_id&status=error");
        }

    }

?>