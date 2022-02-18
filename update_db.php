<?php

session_start();
include("./server/connect.php");

// Check login
if (!isset($_SESSION["success"])) {
    header("location: ../auth/login.php");
}


if (isset($_POST["update"])) {
    $_id = mysqli_real_escape_string($conn, $_POST['id']);
    $pname = mysqli_real_escape_string($conn, $_POST['pname']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);


    $sql = "UPDATE user_info SET `name` = '$pname', phone_number = '$phone_number', `dob` = '$dob', email = '$email', `address` = '$address' WHERE `_id` = '$_id'";

    $resultUpdate = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error());

    if ($resultUpdate) {
        echo "<script>";
        echo "alert('Update success')";
        echo "</script>";
        echo "<script>";
        echo "window.location.replace('index.php')";
        echo "</script>";
    }
}
