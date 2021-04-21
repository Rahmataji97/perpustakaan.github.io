<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>UNAS | MEMBER LOGIN</title>
    <link rel="shortcut icon" href="../assets/image/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../assets/image/favicon.ico" type="image/x-icon">
    <?php include('head.php'); ?>
</head>
<body class="page-wrapper">
    <?php include('top-home-nav.php'); ?>
    <div class="home-content">
        <section class="mt-5 mb-5 login-anggota">
        <div class="container">
            <div class="row d-flex flex-column">
                <div class="col-xl-5 col-md-8 col-lg-6 align-self-center ">
                    <div class="holder">
                        <span class="title">
                            <span class="small">Form</span>
                            <h3 class="h3">Login Member.</h3>
                        </span>
                        <form action="../api/login-anggota.php" method="POST">
                        <div class="holder-content">
                            <div class="form-group">
                                <label for="">NIM</label>
                                <input class="form-control" type="text" name="nim" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input class="form-control" type="password" name="password" required>
                            </div>
                        </div>
                        <span class="footer">
                            <button class="btn btn-primary w-100" type="submit" name="login">Login</button>
                        </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
<?php include('foot.php'); ?>