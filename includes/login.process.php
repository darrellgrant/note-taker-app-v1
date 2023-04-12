<?php
session_start();

if (isset($_POST["submit-btn"])) {
    //require database connection here***
    include 'dbconnect.php';

    //sanitize input and store in php variables
    $email = $_POST["email"];
    $password = $_POST["password"];
    echo $email;
    echo $password;

    //check if variables are empty
    if (empty($email) || empty($password)) {
        header("Location: ../login.php?error=missing_login_data");
        exit();
    } else {
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $query);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck < 1) {
            header("Location: ../login.php?error=email_not_found");
            exit();
        } else {
            //check if password = password in db
            $row = mysqli_fetch_assoc($result);
            echo "this is 1 " . $row['password'];
            echo "<br> and this is 2 " . $password;
            if ($row['password'] !== $password) {

                header("Location: ../login.php?error=incorrect_password");
                exit();

            } else {
                $_SESSION['first_name'] = $row['first_name'];
                //echo "<br>Greetings, <b> " . $_SESSION['first_name'] . " !";

                header("Location: ../profile.php?login=success!");
                exit();

            }
        }
    }

} else {
//if user error
    header("Location: ../login.php?error=user_login_error");
    exit();

}
