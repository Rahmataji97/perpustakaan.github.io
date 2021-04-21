<?php 
    include('config.php');
    session_start();

    $id_buku      = $_GET['buku'];
    $id_transaksi = $_GET['id'];
    $id_anggota   = $_SESSION['id_anggota'];
    $id_admin     = $_SESSION['id_admin'];

    $query = mysqli_query($conn, "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi' 
    AND id_anggota='$id_anggota' AND id_buku='$id_buku'");
    
    if(isset($query) && isset($id_anggota)) {
        $_SESSION['msgSuccess'] = "Order has been canceled!";
        header("Location: ../page/profile.php");
        exit();
    } elseif(isset($query) && isset($id_admin)) {
        $_SESSION['msgSuccess'] = "Order has been canceled!";
        header("Location: ../page/transaksi-pinjam.php");
        exit();
    } else {
        $_SESSION['msgFail'] = "No order found!";
        header("Location: ../page/profile.php");
        exit();
    }
?>