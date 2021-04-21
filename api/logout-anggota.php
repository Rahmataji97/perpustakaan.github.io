<?php 
    include('config.php');
    session_start();

    unset($_SESSION['id_anggota']);
    unset($_SESSION['nama']);

    header("Location: ../page/home.php");
    exit();
?>
