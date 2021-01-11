<?php 
session_start();

if(!empty($_FILES)){ 
   
        require '../connect/connect.php'; 

         
        $uploadDir = "../uploads/"; 
        $temp = explode('.',$_FILES['file']['name']);
        $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
      
        $fileName = substr( str_shuffle( $chars ), 0, 5 ). '.'.end($temp) ;
        $uploadFilePath = $uploadDir.$fileName; 
 
        if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath)){ 
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $select = "SELECT * FROM port WHERE p_id = '$id'";
                $result = mysqli_query($conn,$select);
                $row = mysqli_fetch_array($result);
            }
            
         
            $insert = $conn->query("INSERT INTO picport (pi_id , p_file ,u_id, p_id) VALUES (NULL ,'".$fileName."','$_SESSION[u_id]', '$row[p_id]')"); 
            
           
            
        } 
}


?>