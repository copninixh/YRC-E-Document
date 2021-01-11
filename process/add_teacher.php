<?php
    include("../connect/connect.php");

    if(isset($_POST['Insert'])){ 
        $t_name = filter_input(INPUT_POST , 't_name' , FILTER_SANITIZE_STRING); 
        $t_title = filter_input(INPUT_POST , 't_title' , FILTER_SANITIZE_STRING);
        $t_position = filter_input(INPUT_POST , 't_position' , FILTER_SANITIZE_STRING);
        $t_group = filter_input(INPUT_POST , 't_group' , FILTER_SANITIZE_STRING);
        $t_permission = filter_input(INPUT_POST , 't_permission' , FILTER_SANITIZE_STRING);
        $temp = explode('.',$_FILES['t_pic']['name']);
        $newName = round(microtime(true)). '.'.end($temp) ;
        move_uploaded_file($_FILES['t_pic']['tmp_name'], '../assets/teacher/' .$newName); 

        $sql = "INSERT INTO `teacher` (`t_id`, `t_name`, `t_title`, `t_position`, `t_group`, `t_permission`, `t_pic`) 
        VALUES (NULL, '$t_name', '$t_title', '$t_position', '$t_group', '$t_permission', '".$newName."')";

        $query = mysqli_query($conn,$sql);
        if($query){
            header("location:../manage_teacher.php?status=success");
        }else{
            header("location:../manage_teacher.php?status=error");
        }

    }
    
   

?>