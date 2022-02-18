<?php

session_start();
include('./server/connect.php');

// Check login
if (!isset($_SESSION["success"])) {
    header("location: ../auth/login.php");
}

if (isset($_POST['submit'])) {
    $pname = $_POST['pname'];
    $phone_number = $_POST['phone_number'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $sql =  "INSERT INTO user_info (`name`,phone_number,dob,email,`address`) VALUE ('$pname', '$phone_number', '$dob','$email', '$address')";
    $resultInsert = mysqli_query($conn, $sql);


    if ($resultInsert) {
        echo "<script>";
        echo "alert('Insert success')";
        echo "</script>";
        echo "<script>";
        echo "window.location.replace('index.php')";
        echo "</script>";
    }
}
