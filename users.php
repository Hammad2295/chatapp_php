<?php
session_start();

if (!isset($_SESSION['unique_id'])) {
    header("location: login.php");
}

?>


<?php include_once "header.php"; ?>

<body>

    <div class="wrapper">
        <section class="users">
            <header>

                <!-- obtaining users unique for session maintaince -->
                <?php
                include_once "php/config.php";

                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");

                if (mysqli_num_rows(($sql)) > 0) {
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>

                <div class="content">
                    <img src="php/user_profile_imgs/<?php echo $row['img']; ?>" alt="Profile">
                    <div class="details">
                        <span>
                            <?php echo $row['fname'] . " " . $row['lname']; ?>
                        </span>
                        <p>
                            <?php echo $row['status']; ?>
                        </p>
                    </div>
                </div>
                <a href="php/logout.php?logout_id=<?php echo $row['unique_id'] ?>" class="logout">Logout</a>
            </header>

            <!-- Search bar -->
            <div class="search">
                <span class="text">Select a User to Start Chat</span>
                <input type="text" placeholder="Enter name to search..">
                <button><i class="fas fa-search"></i></button>
            </div>

            <!-- users list -->
            <div class="users-list">
                <!-- Single User Template Start -->

                <!-- Single User Template End -->
            </div>
        </section>
    </div>

    <!-- Local JS -->
    <script src="./js/users.js"></script>
    <!-- Js Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>

</html>