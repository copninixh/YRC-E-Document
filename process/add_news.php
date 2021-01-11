<?php
    session_start();
    include("../connect/connect.php");
    if(isset($_POST['Insert'])){
        $n_name = filter_input(INPUT_POST , 'n_name' , FILTER_SANITIZE_STRING);
        $n_date = filter_input(INPUT_POST , 'n_date' , FILTER_SANITIZE_STRING);
        $n_ref = filter_input(INPUT_POST , 'n_ref' , FILTER_SANITIZE_STRING);
        $n_detail = filter_input(INPUT_POST , 'n_detail' , FILTER_SANITIZE_STRING);

        $sql = "INSERT INTO `news` (`n_id`, `n_name`, `n_date`, `n_ref`, `n_detail`) 
        VALUES (NULL, '$n_name', '$n_date', '$n_ref', '$n_detail');";
        $result = mysqli_query($conn ,$sql);
        if($result){
            header('location:../manage_news.php?status=success');
        }else{
            header('location:../manage_news.php?status=error');
        }
    }


?>