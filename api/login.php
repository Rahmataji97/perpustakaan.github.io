<?php 
    include('config.php');
    session_start();

    if(!isset($_POST['login'])) {
        $_SESSION['msgFail'] = "You must login first!";
        header("Location: ../page/login.php");
        exit();
    } else {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $query    = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
        $row      = mysqli_num_rows($query);
        
        if($row > 0) {
            while($row = mysqli_fetch_array($query)){
                $id_admin = $row['id_admin'];
                $query_2  = mysqli_query($conn, "SELECT * FROM setting JOIN admin ON setting.id_aplikasi = admin.id_aplikasi 
                    WHERE id_admin = '$id_admin'");
                $row_2    = mysqli_num_rows($query_2);

                while($row_2 = mysqli_fetch_array($query_2)){
                    // SESSION
                    $_SESSION['id_admin']   = $row_2['id_admin'];
                    $_SESSION['sub_id']     = $row_2['sub_id'];
                    $_SESSION['id_app']     = $row_2['id_aplikasi'];
                    $_SESSION['username']   = $row['username'];
                    $_SESSION['msgSuccess'] = "Welcome, ".$_SESSION['username']."!";
                    header("Location: ../page/dashboard.php");
                    exit();
                }
            }
        } else {
            $_SESSION['msgFail'] = "Login failed, try again!";
            header("Location: ../page/login.php");
            exit();
        }
    } 
?>