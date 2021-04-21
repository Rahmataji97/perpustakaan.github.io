<?php 
    include('config.php');
    session_start();

    $id_buku    = $_GET['id'];
    $id_anggota = $_SESSION['id_anggota'];

    $query = mysqli_query($conn, "DELETE FROM keranjang WHERE id_anggota='$id_anggota' AND id_buku='$id_buku'");
    
    if($query) {
        $_SESSION['msgSuccess'] = "Book has been deleted from cart!";
        header("Location: ../page/keranjang.php?id=$id_anggota");
        exit();
    } else {
        $_SESSION['msgFail'] = "Failed to delete item!";
        header("Location: ../page/keranjang.php?id=$id_anggota");
        exit();
    }
?>