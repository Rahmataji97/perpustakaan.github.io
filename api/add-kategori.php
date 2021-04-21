<?php 
    include('config.php');
    session_start();

    $nm = $_POST['nama_kategori'];
    $kt = $_POST['keterangan'];

    $query = mysqli_query($conn, "INSERT INTO kategori_buku VALUES(NULL, '$nm', '$kt')");

    if($query) {
        $_SESSION['msgSuccess'] = "Category has been saved!";
        header("Location: ../page/kategori-buku.php");
        exit();
    } else {
        $_SESSION['msgFail'] = "Save category failed!";
        header("Location: ../page/add-kategori.php");
        exit();
    }