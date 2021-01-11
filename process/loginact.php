<?php
    session_start();
    include("connect.php");
    if(isset($_POST['submit'])){
        include("../connect/connect.php");
            $t_username = mysqli_real_escape_string($conn ,$_POST['t_username']);
            $t_password = mysqli_real_escape_string($conn , $_POST['t_password']);
            $sql = "SELECT * FROM `teacher` WHERE `t_username` = '".$t_username."' AND `t_password` = '".$t_password."'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result);
            if($row > 0){
                $_SESSION["t_id"] = $row["t_id"] ;
                $_SESSION["t_title"] = $row["t_title"] ;
                $_SESSION["t_name"] = $row["t_name"] ;
                $_SESSION["t_group"] = $row["t_group"];
                $_SESSION["t_position"] = $row["t_position"];
                $_SESSION["t_permission"] = $row["t_permission"];
                $_SESSION["t_pic"] = $row["t_pic"];
                header('Location: ../index.php');
            }else{
                header('Location: ../login.php?status=error');
            }
    }
?>
