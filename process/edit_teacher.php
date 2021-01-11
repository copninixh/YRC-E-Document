<?php
    include("../connect/connect.php");
    if($_POST['t_id'] == ''){
        header("location:../manage_teacher.php?status=notfound");
    }
    
    $t_id = filter_input(INPUT_POST , 't_id' , FILTER_SANITIZE_NUMBER_INT); 
    $t_name = filter_input(INPUT_POST , 't_name' , FILTER_SANITIZE_STRING);
    $t_title = filter_input(INPUT_POST , 't_title' , FILTER_SANITIZE_STRING);
    $t_position = filter_input(INPUT_POST , 't_position' , FILTER_SANITIZE_STRING);
    $t_group = filter_input(INPUT_POST , 't_group' , FILTER_SANITIZE_STRING);
    $t_pic = $_FILES['t_pic']['name'];
    

    if($t_pic == ''){
        $sql = "UPDATE teacher SET
       t_name = '$t_name',
       t_title = '$t_title',
       t_position = '$t_position',
       t_group = '$t_group'

       WHERE t_id = '$t_id'";

        $result = mysqli_query($conn,$sql);
        if($result){
            header("location:../manage_teacher.php?status=success");
        }else{
            header("location:../manage_teacher.php?status=error");
        }
    }else{
        $temp = explode('.',$_FILES['t_pic']['name']);
        $newName = round(microtime(true)). '.'.end($temp) ;

        move_uploaded_file($_FILES['t_pic']['tmp_name'], '../assets/images/users/' .$newName);
        $sql = "UPDATE teacher SET
        t_name = '$t_name',
        t_title = '$t_title',
        t_position = '$t_position',
        t_group = '$t_group',
        t_pic = '$newName'
 
        WHERE t_id = '$t_id'";

        $result = mysqli_query($conn,$sql);
        if($result){
            header("location:../manage_teacher.php?status=success");
        }else{
            header("location:../manage_teacher.php?status=error");
        }
    }
    

?>