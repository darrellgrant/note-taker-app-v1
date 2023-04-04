<?php
session_start();
$allowedTitleLimit = 60;

if (isset($_POST["submit"])) {
    //require database connection here***

    //sanitize input and store in php variables
    $post_title = check_input($_POST["post_title"]);
    $post_content = check_input($_POST["post_content"]);
    $post_tag[] = check_input($_POST["post_tag"]);

    //check if variables are empty
    if (empty($post_title) || empty($post_content)) {
        header("Location: ../index.php?error=missing_input_data");
        exit();

        //check if post title is too long
    } elseif (mb_strlen($post_title) > $allowedTitleLimit) {
        header("Location: ../index.php?error=title_exceeds_limit");
        exit();
    } else {
        //store info into database

    }

} else {
    //if no info sent with submit...
    header("Location: ..index.php?user_error");
} //if isset $_POST end

function check_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
