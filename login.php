<?php include_once "header.php"; ?>

<body>

    <div class="wrapper">
        <div class="form login">
            <header>Chat App</header>
            <form action="#" autocomplete="off">
                <div class="error-txt">This is an error message!</div>
                
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter Your Email...">
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter Your Password...">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" name="submit" id="submit" value="Continue to Chat">
                </div>

            </form>

            <!-- Already Created -->
            <div class="link">Not Yet Signed Up? <a href="index.php">Signup Now</a></div>
        </div>
    </div>


    <!-- Local Js -->
    <script src="./js/pass_show_hide.js"></script>
    <script src="./js/login.js"></script>
    <!-- Js Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>

</html>