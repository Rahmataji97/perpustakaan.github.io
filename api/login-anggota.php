<?php 
    include('config.php');
    session_start();

    if(!isset($_POST['login'])) {
        $_SESSION['msgFail'] = "You must login first!";
        header("Location: ../page/login-anggota.php");
        exit();
    } else {
        $nim      = $_POST['nim'];
        $password = md5($_POST['password']);
        $query    = mysqli_query($conn, "SELECT * FROM user where nim = '$nim' AND password = '$password'");
        $row      = mysqli_num_rows($query);
        if($row > 0) {
            $query_2 = mysqli_query($conn, "SELECT * FROM anggota where nim = '$nim'");
            while($row_2 = mysqli_fetch_array($query_2)){
                // SESSION
                $_SESSION['id_anggota'] = $row_2['id_anggota'];
                $_SESSION['nama']       = $row_2['nama_lengkap'];
                $_SESSION['msgSuccess'] = "Welcome, ".$_SESSION['nama']."!";
                header("Location: ../page/home.php");
                exit();
            }
        } else {
            $_SESSION['msgFail'] = "Login failed, try again!";
            header("Location: ../page/login-anggota.php");
            exit();
        }
    }
    
?>