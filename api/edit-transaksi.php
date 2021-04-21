<?php 
    include('config.php');
    session_start();

    $id_transaksi = $_GET['id'];
    $id_buku      = $_GET['buku'];
    $tgl_pinjam   = date('Y-m-d');
    
    $query = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'");
    $row   = mysqli_num_rows($query);

    if($row > 0) {
        for($i=0;$i<$row;$i++) {
            while($data = mysqli_fetch_array($query)) {
                $id_buku = $data["id_buku"];
                $query_3 = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku='$id_buku'");
                $data_3  = mysqli_fetch_array($query_3);
                $jml     = $data_3['jml_buku'];
                $stock   = $jml - 1;

                $update_stock = mysqli_query($conn, "UPDATE buku SET jml_buku='$stock' WHERE id_buku='$id_buku'");
            }
        }
        $update_order = mysqli_query($conn, "INSERT INTO pinjam SET id_pinjam=NULL, id_transaksi='$id_transaksi', tgl_pinjam='$tgl_pinjam', status='Confirmed'");

        if($update_order > 0) {
            $_SESSION['msgSuccess'] = "Book has been confirmed!";
            header("Location: ../page/detail-pinjam.php?id=$id_transaksi");
        } else {
            $_SESSION['msgFail'] = "Some book is out of stock!";
            header("Location: ../page/detail-pinjam.php?id=$id_transaksi");
            exit();
        }
    } else {
        $_SESSION['msgFail'] = "Book has been confirmed!";
        header("Location: ../page/detail-pinjam.php?id=$id_transaksi");
        exit(); 
    }
?>