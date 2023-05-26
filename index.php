<?php
include_once "php/config.php";

session_start();

if (isset($_SESSION['unique_id'])) {
    header("location: users.php");
}
?>

<?php include_once "header.php"; ?>

<body>

    <div class="wrapper">
        <div class="form signup">
            <header>Chat App</header>
            <form action="#" enctype="multipart/form-data" autocomplete="off">
                <div class="error-txt">This is an error message!</div>
                <div class="name-details">
                    <div class="field input">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" placeholder="Enter First Name..." required>
                    </div>
                    <div class="field input">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name" placeholder="Enter Last Name..." required>
                    </div>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter Email..." required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter Password..." required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field image">
                    <label for="image">Select Image</label>
                    <input type="file" name="image" id="image">
                </div>
                <div class="field button">
                    <input type="submit" name="submit" id="submit" value="Continue to Chat">
                </div>

            </form>

            <!-- Already Created -->
            <div class="link">Already Signed Up? <a href="login.php">Login Now</a></div>
        </div>
    </div>



    <!-- Local Js -->
    <script src="./js/pass_show_hide.js"></script>
    <script src="./js/signup.js"></script>
    <!-- Js Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>

</html>