<?php

    session_start();

    

    if (isset($_SESSION['unique_id'])) {
        include_once "config.php";

        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";

        // selecting chats from db where ids matches to user 
        $query = "SELECT * FROM messages
                LEFT JOIN users ON users.unique_id = messages.incoming_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id ASC"; 

        $sql = mysqli_query($conn, $query);

        if(mysqli_num_rows($sql) > 0) {
            while($row = mysqli_fetch_assoc($sql)) {

                // if this is equal then user is a msg sender else a receiver 
                if($row['outgoing_msg_id'] === $outgoing_id) {
                    $output .= '<div class="chat outgoing">
                                    <div class="detail">
                                        <p>' . $row['msg'] . '</p>
                                    </div>
                                </div>';
                }
                else {
                    $output .= '<div class="chat incoming">
                                    <img src="php/user_profile_imgs/'. $row['img'] .'" alt="incomingProfile">
                                    <div class="detail">
                                        <p>' . $row['msg'] . '</p>
                                    </div>
                                </div>';
                }
            }

            echo $output;
        }

    } else { 
        header("../login.php");
    }

?>