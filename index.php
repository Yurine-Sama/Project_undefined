<?php

session_start();
include("./server/connect.php");

// Check login
if (!isset($_SESSION["success"])) {
    header("location: ../auth/login.php");
}

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: ../auth/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .logout {
            position: fixed;
            right: 15px;
            top: 10px;
        }

        .insert {
            position: absolute;
            bottom: 0;
            height: 1px;
            right: 10px;
        }
    </style>
</head>

<body>
    <!-- nav bar -->
    <nav class="navbar navbar-light bg-dark justify-content-between">
        <a class="navbar-brand text-light">Navbar</a>
        <form class="form-inline">
            <a href="index.php?logout='1'" class="btn btn-danger logout">Logout</a>
        </form>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col col-12 mt-5">
                <h3>
                    Hello
                    <?php
                    echo $_SESSION['userEmail'];
                    ?>
                </h3>
            </div>
            <div class="col col-12 my-4">
                <div class="card">
                    <div class=" container">
                        <div class="row">
                            <div class="col col-12 my-3">
                                <h3>Member Info</h3>
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-bordered ">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Phone Number</th>
                                                <th scope="col">Date of birth</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Address</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM user_info";
                                            $result = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $row["_id"] . "</td>";
                                                echo "<td>" . " <a href= 'update.php?id=$row[0]' > " . $row["name"] . "</a>" . "</td>";
                                                echo "<td>" . $row["phone_number"] . "</td>";
                                                echo "<td>" . $row["dob"] . "</td>";
                                                echo "<td>" . $row["email"] . "</td>";
                                                echo "<td>" . $row["address"] . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="position-relative">
                    <div class="position-absolute insert">
                        <a href="insert.php" class="btn btn-primary">Insert</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>