<?php
    include('config.php');
    session_start();

    $id = $_GET['id'];

    $query = mysqli_query($conn, "DELETE FROM kategori_buku WHERE id_kategori='$id'");

    if($query) {
        $_SESSION['msgSuccess'] = "Category has been deleted!";
        header("Location: ../page/kategori-buku.php");
        exit();
    } else {
        $_SESSION['msgFail'] = "Category failed to delete!";
        header("Location: ../page/kategori-buku.php");
        exit();
    }
?>