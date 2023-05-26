<?php


$outgoing_id = $_SESSION['unique_id'];

while ($row = mysqli_fetch_assoc($sql)) {

    $query2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";


    $sql2 = $conn->execute_query($query2);
    $row2 = mysqli_fetch_assoc($sql2);

    if (mysqli_num_rows($sql2) > 0) {
        $result = $row2['msg'];
    } else {
        $result = "No Message Available!";
    }

    // trimming message 
    strlen(($result) > 28) ? $msg = substr($result, 0, 28) . '...' : $msg = $result;
    // ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";

    // Checking user is offline or online
    ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";

    $output .= '<a href="chat.php?user_id=' . $row['unique_id'] . '">
                                <div class="content">
                                    <img src="php/user_profile_imgs/' . $row['img'] . '" alt="Profile-userlist">
                                    <div class="details">
                                        <span>' . $row['fname'] . " " . $row['lname'] . '</span>
                                        <p>' . $msg . '</p>
                                    </div>
                                </div>

                                <div class="status-dot ' . $offline . '">
                                    <i class="fas fa-circle" ></i>
                                </div>
                            </a>';
}
?>