<?php
    session_start();
    include("../connect/connect.php");
    if(isset($_POST['Insert'])){
        $d_name = filter_input(INPUT_POST , 'd_name' , FILTER_SANITIZE_STRING);
        $d_number =  filter_input(INPUT_POST , 'd_number' , FILTER_SANITIZE_STRING);
        $d_name =  filter_input(INPUT_POST , 'd_name' , FILTER_SANITIZE_STRING);
        $d_date = filter_input(INPUT_POST, 'd_date' , FILTER_SANITIZE_STRING);
        $d_datestart = filter_input(INPUT_POST, 'd_datestart' , FILTER_SANITIZE_STRING);
        $d_dateend = filter_input(INPUT_POST, 'd_dateend' , FILTER_SANITIZE_STRING);
        $d_detail = filter_input(INPUT_POST, 'd_detail' , FILTER_SANITIZE_STRING);
      
        
        $sql = "INSERT INTO `document` (`d_id`, `d_number`, `d_name`, `d_detail`, `d_date`, `d_datestart`, `d_dateend`,  `d_pic`) 
        VALUES (NULL, '$d_number', '$d_name', '$d_detail', '$d_date', '$d_datestart', '$d_dateend', '0');";
        $result = mysqli_query($conn,$sql);

        if($result){
            header("location:../manage_document.php?status=success");
        }else{
            header("location:../manage_document.php?status=error");
        }

    }

?>