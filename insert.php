<?php

session_start();
include("./server/connect.php");

// Check login
if (!isset($_SESSION["success"])) {
    header("location: ../auth/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <div class="d-flex vh-100">
        <div style=" width: 400px; height: 500px; border-radius: 24px; padding:15px 16px 77px 16px;" class="mx-auto align-self-center">
            <h2 class="a"> Insert Member </h2>
            <form action="insert_db.php" method="POST">
                <label>Name</label><br>
                <input class="form-control" name="pname" type="text" id="pname" size="40" required> <br>

                <label>Phone number</label><br>
                <input class="form-control" name="phone_number" type="text" id="phone_number" size="40" required><br>

                <label>Date of birth</label><br>
                <input class="form-control" name="dob" type="date" id="dob" size="40" required> <br>

                <label>Email</label><br>
                <input class="form-control" name="email" type="email" id="email" size="40" required> <br>

                <label>Location address</label><br>
                <input class="form-control" name="address" type="text" id="address" size="40" required> <br>

                <div class="text-center">
                    <input class="btn btn-outline-danger" type="reset" value="Cancel">
                    <input class="btn btn-outline-primary" type="submit" name="submit" value="Save">
                </div>
            </form>
        </div>
    </div>

    <!-- JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>