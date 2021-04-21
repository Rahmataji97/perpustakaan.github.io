<?php 
    include('config.php');
    session_start();

    $id_buku    = $_GET['id'];
    $id_anggota = $_SESSION['id_anggota'];
    if(isset($id_anggota )) {
        $query = mysqli_query($conn, "SELECT * FROM keranjang WHERE id_anggota='$id_anggota' AND id_buku='$id_buku'");
        $row   = mysqli_num_rows($query);
    
        if($row > 0) { 
            $_SESSION['msgFail'] = "Book already in cart!";
            header("Location: ../page/keranjang.php?id=$id_anggota");
            exit();
        } else {
            $query_2 = mysqli_query($conn, "INSERT INTO keranjang VALUES(NULL, '$id_buku', '$id_anggota')") or die(mysqli_error($conn));
            
            if($query_2) {
                $_SESSION['msgSuccess'] = "Book has been added to cart!";
                header("Location: ../page/keranjang.php?id=$id_anggota");
                exit();
            } else {
                $_SESSION['msgFail'] = "Failed to order!";
                header("Location: ../page/detail-buku.php?buku=$id_buku");
                exit();
            }
        }
    } else {
        $_SESSION['msgFail'] = "Failed to order books!";
        header("Location: ../page/keranjang.php");
        exit();
    }
?>
    