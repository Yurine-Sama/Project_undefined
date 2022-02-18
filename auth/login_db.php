<?php

session_start();
include("../server/connect.php");

if (isset($_POST["loginClick"])) {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $new_password = md5($password);
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$new_password' ";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['userEmail'] = $email;
        $_SESSION['success'] = "Login success.";
        header("location: ../index.php");
    } else {
        $_SESSION['error'] = "Wrong Email or Password!";
        header("location: login.php");
    }
}
