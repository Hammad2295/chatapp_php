<?php

session_start();

include_once "config.php";

// Passing data to database //

$firstName = mysqli_real_escape_string($conn, $_POST['first_name']);
$lastName = mysqli_real_escape_string($conn, $_POST['last_name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);


if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($password)) {

    // input data validations //
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        // checking if email already exists in database //
        $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");

        if (mysqli_num_rows($sql) > 0) {
            echo "$email - already exist!";
        } else {
            // checking if user uploaded img file //
            // $_FILES['image'][] returns array of image different attributes as following //
            if (isset($_FILES['image'])) {
                $img_name = $_FILES['image']['name'];
                $img_type = $_FILES['image']['type'];
                $tmp_name = $_FILES['image']['tmp_name'];


                // exploding image to gets its extension //
                $img_explode = explode('.', $img_name);
                $img_extension = end($img_explode);



                // will allow only this type of images to be uploaded
                $extensions = ['png', 'jpeg', 'jpg'];

                if (in_array($img_extension, $extensions) === true) {
                    $time = time(); // using time in which file is uploaded of each user to save it with that name uniquely 

                    // saving user uploaded file to a certain folder and only storing url in database //
                    $new_img_name = $time . $img_name;

                    if (move_uploaded_file($tmp_name, "user_profile_imgs/" . $new_img_name)) {

                        // once user is signed up itis active 
                        $status = "Active now";

                        $random_id = rand(time(), 10000000); // creating random id for user 

                        // Inserting all user data in table //
                        $sqlInsert = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                                                VALUES ({$random_id}, '{$firstName}',  '{$lastName}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");

                        if ($sqlInsert) {
                            $sqlPrint = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");

                            if (mysqli_num_rows($sqlPrint) > 0) {
                                $row = mysqli_fetch_assoc($sqlPrint);
                                $_SESSION['unique_id'] = $row['unique_id'];

                                echo "SUCCESS";
                            }
                        } else {
                            echo "ERROR: Inserting Data in Table!";
                        }
                    }

                } else {
                    echo $img_extension;
                }
            } else {
                echo "ERROR: Upload Profile Image!";
            }
        }
    } else {
        echo "$email - is not valid!";
    }
} else {
    echo "ERROR: All fields are required!";
}
?>