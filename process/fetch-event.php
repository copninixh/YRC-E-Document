<?php
    session_start();
    require_once "db.php";

    $json = array();
    $sqlQuery = "SELECT * FROM tbl_events WHERE teacher_id = '$_SESSION[t_id]'";

    $result = mysqli_query($conn, $sqlQuery);
    $eventArray = array();
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($eventArray, $row);
    }
    mysqli_free_result($result);

    mysqli_close($conn);
    echo json_encode($eventArray);
?>