<?php
    session_start();
    include_once "php/config.php";
    if (!isset($_SESSION['unique_id'])) {
        header("location: login.php");
    }
?>
 
<?php include_once "header.php"; ?>



<body>

    <div class="wrapper">
        <section class="chat-area">
            <header>
                <?php
                    include_once "php/config.php";
                    $user_id = intval($_GET['user_id']);
                    
                    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");

                    if (mysqli_num_rows($sql) > 0) {
                        $row = mysqli_fetch_assoc($sql);
                    } 
                    else {
                        header("location: users.php");
                    }
                ?>             
                
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="php/user_profile_imgs/<?php echo $row['img']; ?>" alt="Profile">
                <div class="details">
                    <span><?php echo $row['fname'] . " " . $row['lname']; ?></span>
                    <p><?php echo $row['status']; ?></p>
                </div>
            </header>

            <!-- chat area box -->
            <div class="chat-box">
                
            </div>

            <!-- input message form -->
            <form action="#" class="typing-area" autocomplete="off">
                
                <!-- inputs for sending & receiving messages -->

                <!-- message sender  -->
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden> 
                <!-- message receiver -->
                <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>

                <input type="text" name="message" class="input-field" placeholder="Type a message here...">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>


    <!-- local Js -->
    <script src="js/chat.js"></script>

    <!-- Js Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>

</html>