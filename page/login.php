<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - </title>
    <?php include('head.php'); ?>
</head>
<body>
    <div class="main-login">
        <div class="login-image-container rounded">
            <img  class="rounded mx-auto d-block img-fluid" src="../assets/image/login-image.jpg" alt="login image">
        </div>
        <div class="login-box">
            <div class="container">
                <div class="row">
                    <form action="../api/login.php" method="POST">
                    <div class="col-sm-12">
                        <h1 class="h1">Login to Dashboard.</h1>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control" type="text" name="username" required autofocus>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="username">Password</label>
                            <input class="form-control" type="password" name="password" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <button class="btn btn-primary w-100" type="submit" name="login">Login</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php include('foot.php'); ?>
