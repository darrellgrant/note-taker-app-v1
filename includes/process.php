<?php
session_start();
//$allowedTitleLimit = 60;

if (isset($_POST["submit-btn"])) {
    //require database connection here***
    include 'dbconnect.php';

    //sanitize input and store in php variables
    /* $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"]; */

    //$text = htmlspecialchars($_POST['post_content']);
    $text = ($_POST['post_content']);
    $title = ($_POST['post_title']);

    /* echo "This is post content " . $text . "<br> AND ALSO: ";
    $cleanText = $_POST['post_content'];
    echo $cleanText;
    $stripText = stripslashes($_POST['post_content']);
    echo "<br><br><br>PLUS <br> stripped test " . $stripText; */

    $sql = "INSERT INTO usertext (text, title) VALUES ('$text', '$title');";
    mysqli_query($conn, $sql);

    $sql2 = "SELECT text FROM usertext WHERE title = '$title';";
    $result = mysqli_query($conn, $sql2);
    $row = mysqli_fetch_assoc($result);

    $_SESSION['text'] = $row['text'];
    header("Location: ../index.php");
    exit();

    echo htmlspecialchars($row['text']);

    /* //check if variables are empty
if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
header("Location: ../register.php?error=missing_input_data");
exit();

}

$sql_query = "SELECT * FROM users where email = '$email';";
$result = mysqli_query($conn, $sql_query);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck > 0) {
header("Location: ../register.php?error=email_already_taken");
exit();

} else {
//store info in database
$sql_insert = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password');";
mysqli_query($conn, $sql_insert);

echo "SUCCESFUL REGISTRATION";
//send user to login page
header("Location: ../login.php?SUCCESFUL_REGISTRATION");
exit();
} */

} else {
    //if no info sent with submit...
    header("Location: ../register.php?user_error");
} //if isset $_POST end
