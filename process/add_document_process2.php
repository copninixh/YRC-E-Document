<?php
    session_start();
    include("../connect/connect.php");

    if(isset($_POST['submit'])){
   
       
        $curl = curl_init();
        $d_id = filter_input(INPUT_POST , 'd_id' , FILTER_SANITIZE_NUMBER_INT);
        $d_datestart = filter_input(INPUT_POST, 'd_datestart' , FILTER_SANITIZE_STRING);
        $d_dateend = filter_input(INPUT_POST, 'd_dateend' , FILTER_SANITIZE_STRING);
        

        $temp = explode('.',$_FILES['d_pic']['name']);
        $newName = round(microtime(true)). '.'.end($temp) ;
        move_uploaded_file($_FILES['d_pic']['tmp_name'], '../assets/images/document/detail/' .$newName);
        


        $img_file = ('../assets/images/document/detail/'.$newName);
        $data = array("uploadfile" => new CURLFile($img_file, mime_content_type($img_file), basename($img_file)));
 
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.aiforthai.in.th/ocr",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: multipart/form-data",
                "apikey: OwuduyXiJiAWrSWg9nskGBdfcJwNYYsL"
            )
            ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
        echo "cURL Error #:" . $err;
        } else {

            $qc = json_decode($response);
            $data =  $qc->Original;
            

            $sql ="SELECT * FROM teacher ORDER BY t_id ASC";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($result)){
               
                $id = "$row[t_id]";
                $title ="$row[t_title]";
                $name = "$row[t_name2]";
                $surname = "$row[t_lastname]";
                $success = 0;
                $pos = strpos($data, $title.$name);
                $pos2 = strpos($data, $surname);

                // Note our use of ===.  Simply == would not work as expected
                // because the position of 'a' was the 0th (first) character.

                if ($pos === false) {
                    #echo "The string '$title$name' was not found in the string data<br><hr>";
                } else {
                    
                    $se = $title.$name;

                    $array  = array($title.$name);


                    foreach($array as $key ){
                        $sqlin = "SELECT * FROM teacher WHERE t_name3 = '$key'";
                        $query = mysqli_query($conn,$sqlin);
                        echo '<br>';

                        while($fetch = mysqli_fetch_array($query)){
                            echo 'ไอดีครู '.$fetch[0];
                            echo '<br>';
                            $check = "SELECT * FROM resultdoc WHERE t_id = '$fetch[0]' AND d_id = '$d_id'";
                            $qch = mysqli_query($conn,$check);
                            $numch = mysqli_num_rows($qch);
                            if($numch > 0){
                                header("location:../add_teacher_in_doc.php?id=$d_id&status=error&t_id=$fetch[0]");
                            }else{
                                $sqlinsert = "INSERT INTO `resultdoc` (`r_id`, `d_id`, `t_id`, `r_if`, `d_datestart`, `d_dateend`, `r_status`) 
                                VALUES (NULL, '$d_id', '$fetch[0]', '50','$d_datestart','$d_dateend', '1');";
                                $queryinsert = mysqli_query($conn,$sqlinsert);
                                if($queryinsert){
                                    header("location:../add_teacher_in_doc.php?id=$d_id&status=success");
                                }else{
                                    header("location:../add_teacher_in_doc.php?id=$d_id&status=error");
                                }
                            }
                           
                        }
                    }
                
                    echo "The string '$title$name' was found in the string data<br>";
                    echo " and exists at position $pos<br>";
                    if ($pos2 === false) {
                        #echo "The string '$surname' was not found in the string data<br><hr>";
                    } else {
                        echo "The string '$surname' was found in the string data<br>";
                        echo " and exists at position $pos2<br>";
                    }
                }

                

            
            }
            
        }
                

    }

?>





           
        
        

        


        
            

            

 

