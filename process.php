<?php
session_start();
if (isset($_POST["submit"])) {
    echo "Hello World";
    $postblog = $_POST["post_content"];

    header("Location: index.php");

}
