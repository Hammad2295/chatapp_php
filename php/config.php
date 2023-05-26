<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "chatapptest";

// Connection to server
$conn = mysqli_connect($server, $username, $password);
if (!$conn) {
    die("ERROR: Connection Failed: " . mysqli_connect_error());
}

// Creation of database
$dbQuery = "CREATE DATABASE IF NOT EXISTS $database;";
if (mysqli_query($conn, $dbQuery)) {
    // Connection with database
    $conn = mysqli_connect($server, $username, $password, $database);
    if (!$conn) {
        die("ERROR: Connection Failed: " . mysqli_connect_error());
    }
} else {
    echo "ERROR: Creation Failed: " . mysqli_error($conn);
}

// Creating tables in database
$table1 = "users";
$tableQuery1 = "CREATE TABLE IF NOT EXISTS $table1 (
    user_id INT(11),
    unique_id INT(20),
    fname VARCHAR(255),
    lname VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    img VARCHAR(255),
    status VARCHAR(255)
);";

$table2 = "messages";
$tableQuery2 = "CREATE TABLE IF NOT EXISTS $table2 (
    msg_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    incoming_msg_id INT(255),
    outgoing_msg_id INT(255),
    msg VARCHAR(1000)
);";

if (mysqli_query($conn, $tableQuery1) && mysqli_query($conn, $tableQuery2)) {
    // echo "Tables Created Successfully!";
} else {
    echo "ERROR: Creating Tables! " . mysqli_error($conn);
}


?>