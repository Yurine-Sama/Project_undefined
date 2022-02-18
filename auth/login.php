<?php

session_start();
include("../server/connect.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="width: 570px">
        <!-- alert -->
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="alert alert-danger my-5" role="alert">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php endif ?>
        <!-- form login -->
        <form action="login_db.php" method="post">
            <div class="row">
                <div class="col col-12 mt-5">
                    <h1>Login</h1>
                </div>
                <div class="col col-12 mt-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="admin@mail.com" placeholder="Press your email" require class="form-control">
                </div>
                <div class="col col-12 mt-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" value="admin1234" placeholder="Press your password" require class="form-control">
                </div>
                <div class="col col-12 mt-5 mb-2">
                    <div class="d-grid gap-2">
                        <button type="submit" name="loginClick" class="btn btn-primary btn-block">Login</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>