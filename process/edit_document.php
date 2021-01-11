<?php
    session_start();
    include("../connect/connect.php");
    if($_POST['d_id'] == ''){
        header("location:../manage_document.php?status=error");
    }else{
        $d_id = filter_input(INPUT_POST , 'd_id' , FILTER_SANITIZE_NUMBER_INT);
        $d_name = filter_input(INPUT_POST , 'd_name' , FILTER_SANITIZE_STRING);
        $d_number =  filter_input(INPUT_POST , 'd_number' , FILTER_SANITIZE_STRING);
        $d_name =  filter_input(INPUT_POST , 'd_name' , FILTER_SANITIZE_STRING);
        $d_date = filter_input(INPUT_POST, 'd_date' , FILTER_SANITIZE_STRING);
        $d_datestart = filter_input(INPUT_POST, 'd_datestart' , FILTER_SANITIZE_STRING);
        $d_dateend = filter_input(INPUT_POST, 'd_dateend' , FILTER_SANITIZE_STRING);
        $d_detail = filter_input(INPUT_POST, 'd_detail' , FILTER_SANITIZE_STRING);
    

        $sql = "UPDATE document SET 
            d_number = '$d_number',
            d_name = '$d_name',
            d_date = '$d_date',
            d_datestart = '$d_datestart',
            d_detail = '$d_detail',
            d_pic = '0',
            d_dateend = '$d_dateend'
            WHERE d_id = '$d_id'";
        $result = mysqli_query($conn,$sql);
        if($result){
            header("location:../manage_document.php?status=success");
        }else{
            header("location:../manage_document.php?status=error");
        }
    
        
    }

?>