<?php
    include('config.php');
    session_start();

    $id = $_GET['id'];

    $query_gambar = mysqli_query($conn, "SELECT gambar FROM buku WHERE id_buku='$id'");
    $gambar_lama = mysqli_fetch_array($query_gambar);

    if($gambar_lama !== "default.jpg") {
        unlink('../assets/image/upload/buku/'.$gambar_lama);
    
        $query = mysqli_query($conn, "DELETE FROM buku WHERE id_buku='$id'");
    
        if($query) {
            $_SESSION['msgSuccess'] = "Book has been deleted!";
            header("Location: ../page/buku.php");
            exit();
        } else {
            $_SESSION['msgFail'] = "Book failed to delete!";
            header("Location: ../page/buku.php");
            exit();
        }
    } else {
        $query = mysqli_query($conn, "DELETE FROM buku WHERE id_buku='$id'");
    
        if($query) {
            $_SESSION['msgSuccess'] = "Book has been deleted!";
            header("Location: ../page/buku.php");
            exit();
        } else {
            $_SESSION['msgFail'] = "Book failed to delete!";
            header("Location: ../page/buku.php");
            exit();
        }
    }
?>