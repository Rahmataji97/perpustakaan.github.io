<?php
    include('config.php');
    session_start();

    $id    = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM anggota WHERE id_anggota='$id'");

    if($query) {
        while($row = mysqli_fetch_array($query)) {
            $nim         = $row['nim'];
            $gambar_lama = $row['foto'];
            $query_2     = mysqli_query($conn, "DELETE FROM user WHERE nim='$nim'");

            if($query_2) {
                if($gambar_lama !== "default.jpg") {
                    $query_3 = mysqli_query($conn, "DELETE FROM anggota WHERE id_anggota='$id'");
                    unlink('../assets/image/upload/user/'.$gambar_lama);

                    $_SESSION['msgSuccess'] = "Member has been deleted!";
                    header("Location: ../page/anggota.php");
                    exit();
                } else {
                    $query_3 = mysqli_query($conn, "DELETE FROM anggota WHERE id_anggota='$id'");
                    $_SESSION['msgSuccess'] = "Member has been deleted!";
                    header("Location: ../page/anggota.php");
                    exit();
                }
            } else {
                $_SESSION['msgSuccess'] = "failed to delete member!";
                header("Location: ../page/anggota.php");
                exit();
            }
        }
    } else {
        $_SESSION['msgSuccess'] = "Failed to delete member!";
        header("Location: ../page/anggota.php");
        exit();
    }
?>