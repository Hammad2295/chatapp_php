<?php
    session_start();
    $outgoing_id = $_SESSION['unique_id'];
    include_once "config.php";
    
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $queryString = "SELECT * FROM users WHERE (fname LIKE '%$searchTerm%' OR fname LIKE '%$searchTerm%') AND NOT unique_id = {$outgoing_id}";
    $output = "";

    $sql = mysqli_query($conn, $queryString);

    if(mysqli_num_rows($sql) > 0) {
        include "data.php";
    }
    else {
        $output = "ERROR: No Users Found!";
    }

    echo $output;
?>