<?php
session_start();
//$allowedTitleLimit = 60;

if (isset($_POST["submit-btn"])) {
    //require database connection here***
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "Brainiac5";
    $db_name = "login_site1";

    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

    //sanitize input and store in php variables
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    //check if variables are empty
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        header("Location: ../register.php?error=missing_input_data");
        exit();

    } else {
        //store info in database
        $sql_insert = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password');";
        mysqli_query($conn, $sql_insert);

        echo "SUCCESFUL REGISTRATION";
        //send user to login page
    }

} else {
    //if no info sent with submit...
    header("Location: ../register.php?user_error");
} //if isset $_POST end
