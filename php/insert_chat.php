<?php

    session_start();

    if(isset($_SESSION['unique_id'])) {
        include_once "config.php";

        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);


        if(!empty($message)) {
            $query = "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                            VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')" or die();
            $sql = mysqli_query($conn, $query);
        }
    }
    else {
        header("../login.php");
    }

?>