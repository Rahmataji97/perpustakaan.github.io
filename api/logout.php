<?php 
    include('config.php');
    session_start();

    unset($_SESSION['id_admin']);
    unset($_SESSION['sub_id']);
    unset($_SESSION['id_app']);
    unset($_SESSION['username']);

    header("Location: ../page/login.php");
    exit();
?>
