<?php
    session_start();
    include("../connect/connect.php");
    if($_POST['n_id'] == ''){

    }else{
        $n_id  = filter_input(INPUT_POST , 'n_id' , FILTER_SANITIZE_NUMBER_INT);
        $n_name = filter_input(INPUT_POST , 'n_name' , FILTER_SANITIZE_STRING);
        $n_date = filter_input(INPUT_POST , 'n_date' , FILTER_SANITIZE_STRING);
        $n_ref = filter_input(INPUT_POST , 'n_ref' , FILTER_SANITIZE_STRING);
        $n_detail = $_POST['n_detail'];

        $sql = "UPDATE news SET
        n_name = '$n_name',
        n_date = '$n_date',
        n_ref = '$n_ref',
        n_detail = '$n_detail'
        WHERE n_id = '$n_id'";

        $result = mysqli_query($conn,$sql);

        if($result){
            header('location:../manage_news.php?status=success');
        }else{
            header('location:../manage_news.php?status=error');
        }
    }

?>