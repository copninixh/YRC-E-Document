<?php
    session_start();
    include("../connect/connect.php");

    if(isset($_GET['news_id'])){
        $news_id = filter_input(INPUT_GET , 'news_id' , FILTER_SANITIZE_NUMBER_INT);#$_GET['id'];
        $sql = "DELETE FROM news WHERE n_id  = '$news_id';";
        $result = mysqli_query($conn,$sql);

        if($result){
            header('location:../manage_news.php?status=success');
        }else{
            header('location:../manage_news.php?status=error');
        }
    }

   


?>