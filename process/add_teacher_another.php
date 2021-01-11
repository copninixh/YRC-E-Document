<?php
    session_start();
    include("../connect/connect.php");
    if(isset($_POST['add_teacher'])){
        $d_id = filter_input(INPUT_POST, 'd_id' , FILTER_SANITIZE_STRING);
        $search_data = filter_input(INPUT_POST, 'search_data' ,  FILTER_SANITIZE_STRING);
        $data1 = explode(", ", $search_data);
        foreach ($data1 as $row) {
            $data2 = explode("#", $row);
            $data3 = $data2[0];
           
            $sql = "SELECT * FROM teacher WHERE t_id = '$data3'";
            $result = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);
            while($fetch = mysqli_fetch_array($result)){
                $check = "SELECT * FROM resultdoc WHERE t_id = '$fetch[0]' AND d_id = '$d_id'";
                $qch = mysqli_query($conn,$check);
                $numch = mysqli_num_rows($qch);
                if($numch > 0){
                    header("location:../add_teacher_in_doc.php?id=$d_id&status=error&t_id=$fetch[0]");
                }else{
                    $insert = "INSERT INTO `resultdoc` (`r_id`, `d_id`, `t_id`, `r_if`, `r_status`) 
                    VALUES (NULL, '$d_id', '$fetch[0]', '100', '1');";
                    $q = mysqli_query($conn,$insert);
                    if($q){
                        header("location:../add_teacher_in_doc.php?id=$d_id&status=success");
                    }else{
                        header("location:../add_teacher_in_doc.php?id=$d_id&status=error");
                    }
                }
                

               
            }
         
        }

    
       
    }

?>