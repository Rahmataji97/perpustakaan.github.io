<?php
    include('config.php');
    session_start();

    $id = $_POST['id_kategori'];
    $nm = $_POST['nama_kategori'];
    $kt = $_POST['keterangan'];

    $query = mysqli_query($conn, "UPDATE kategori_buku SET id_kategori='$id', nama_kategori='$nm', 
        keterangan='$kt' WHERE id_kategori='$id'");

    if($query) {
        $_SESSION['msgSuccess'] = "Category has been updated!";
        header("Location: ../page/kategori-buku.php");
        exit();
    } else {
        $_SESSION['msgFail'] = "Save category failed!";
        header("Location: ../page/kategori-buku.php");
        exit();
    }
?>