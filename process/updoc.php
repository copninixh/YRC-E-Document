<?php
    include("../connect/connect.php");

    if(isset($_POST['submit'])){ 
        $d_id = filter_input(INPUT_POST , 'd_id' , FILTER_SANITIZE_STRING); 
  
        $temp = explode('.',$_FILES['d_pic']['name']);
        $newName = round(microtime(true)). '.'.end($temp) ;
        move_uploaded_file($_FILES['d_pic']['tmp_name'], '../doc/' .$newName); 

        $sql = "UPDATE document SET
        d_pic = '".$newName."'
        WHERE d_id = '$d_id'
        "
        ;

        $query = mysqli_query($conn,$sql);
        if($query){
            header("location:../add_teacher_in_doc.php?id=$d_id&status=success");
        }else{
            header("location:../add_teacher_in_doc.php?id=$d_id&status=error");
        }

    }
    
   

?>