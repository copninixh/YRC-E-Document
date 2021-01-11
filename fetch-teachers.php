<?php

$data = array();
//$db_user = "root_information";
//$db_password = "$8hdMr26";
if (isset($_GET["query"])) {
    $connect = new PDO("mysql:host=localhost; dbname=yrcdocument", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    $query = "SELECT t_id, t_title, t_name FROM teacher
    WHERE t_name LIKE '" . $_GET["query"] . "%' 
    ORDER BY t_id ASC 
    ";

    $statement = $connect->prepare($query);

    $statement->execute();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row["t_id"] . "#" . $row["t_title"] . "#". $row["t_name"];
    }
}

echo json_encode($data);
?>