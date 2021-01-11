<?php

    $conn = new mysqli('localhost','root','','yrcdocument');

    if($conn->connect_errno){
        die("Connect failed" .$conn->connect_errno); #die ทำงานคล้ายๆ echo
    }

    $conn->set_charset('UTF8')

?>