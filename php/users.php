<?php
session_start();
$outgoing_id = $_SESSION['unique_id'];

$currentSessionID = $_SESSION['unique_id'];

include_once "config.php";

$query = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id}";
$sql = mysqli_query($conn, $query);

$output = "";


if (mysqli_num_rows($sql) > 1) { // if one row in database mean that its the user which is currently logged in 
    $output .= "ERROR: No Users Available!";
} else if (mysqli_num_rows($sql) == 1) {
    include "data.php";
} else {
    echo "ERROR: No User Outputting!";
}

echo $output;

?>