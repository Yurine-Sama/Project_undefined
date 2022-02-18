<?php

session_start();
include("./server/connect.php");

// Check login
if (!isset($_SESSION["success"])) {
    header("location: ../auth/login.php");
}

if (isset($_GET['id'])) {
    $_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM user_info WHERE _id='$_id' ";
    $result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error());
    $row = mysqli_fetch_array($result);
    extract($row);
}

if (isset($_GET['deleteId'])) {
    $_id = mysqli_real_escape_string($conn, $_GET['deleteId']);
    $sql = "DELETE FROM user_info WHERE _id = '$_id'";
    $resultDel = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error());

    if ($resultDel) {
        echo "<script>";
        echo "alert('Delete success')";
        echo "</script>";
        echo "<script>";
        echo "window.location.replace('index.php')";
        echo "</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member info</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex vh-100">
        <div style=" width: 400px; height: 500px; border-radius: 24px; padding:15px 16px 77px 16px;" class="mx-auto align-self-center">
            <h2 class="a"> Member Info </h2>
            <form action="update_db.php" method="post">
                <label>ID</label><br>
                <input type="number" readonly name="id" value="<?php echo $_id; ?>" class="form-control">

                <label>Name</label><br>
                <input class="form-control" name="pname" value="<?php echo $name; ?>" type="text" id="pname" required> <br>

                <label>Phone number</label><br>
                <input class="form-control" name="phone_number" value="<?php echo $phone_number; ?>" type="text" id="phone_number" required><br>

                <label>Date of birth</label><br>
                <input class="form-control" name="dob" value="<?php echo $dob; ?>" type="date" id="dob" required> <br>

                <label>Email</label><br>
                <input class="form-control" name="email" value="<?php echo $email; ?>" type="email" id="email" required> <br>

                <label>Location address</label><br>
                <input class="form-control" name="address" value="<?php echo $address; ?>" type="text" id="address" required> <br>

                <div class="text-center">
                    <a href="update.php?deleteId=<?php echo $_id ?>" class="btn btn-outline-danger">Delete</a>
                    <button class="btn btn-outline-primary" type="submit" name="update">Update</button>
                </div>
            </form>
        </div>
    </div>

    <!-- JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>