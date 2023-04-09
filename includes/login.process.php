<?php
session_start();


if (isset($_POST["submit-btn"])) {
    //require database connection here***
   

    //sanitize input and store in php variables
    $email = $_POST["email"];
    $password = $_POST["password"];

    //check if variables are empty
    if (empty($email) || empty($password)) {
        header("Location: ../register.php?error=missing_login_data");
        exit();
    }
}
else {
//if user error

}