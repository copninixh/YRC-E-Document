<?php
require_once "db.php";

if(isset($_GET['id'])){
    $t_id = $_GET['id'];
    $title = isset($_POST['title']) ? $_POST['title'] : "";
    $start = isset($_POST['start']) ? $_POST['start'] : "";
    $end = isset($_POST['end']) ? $_POST['end'] : "";

    $sqlInsert = "INSERT INTO tbl_events (title,start,end,teacher_id) VALUES ('".$title."','".$start."','".$end ."','".$t_id ."')";

    $result = mysqli_query($conn, $sqlInsert);

    if (! $result) {
        $result = mysqli_error($conn);
    }
}


?>