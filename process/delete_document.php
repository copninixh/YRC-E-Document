<?php
    session_start();
    include("../connect/connect.php");
    if(isset($_GET['d_id'])){
        $d_id = filter_input(INPUT_GET, 'd_id' , FILTER_SANITIZE_NUMBER_INT);
        $sql = "DELETE FROM document WHERE d_id = '$d_id'";
        $result = mysqli_query($conn,$sql);
        if($result){
            $sql2 = "DELETE FROM resultdoc WHERE d_id = '$d_id' ";
            $query = mysqli_query($conn,$sql2);
            if($query){
                header("location:../manage_document.php?status=success");
            }else{
                header("location:../manage_document.php?status=error");
            }
        }else{
            header("location:../manage_document.php?status=error");
        }
    }


?>