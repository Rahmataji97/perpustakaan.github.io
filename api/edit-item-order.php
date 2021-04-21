<?php 
    include('config.php');
    session_start();

    $id_transaksi = $_GET['id'];
    $id_admin     = $_SESSION['id_admin'];

    $query = mysqli_query($conn, "SELECT transaksi.id_transaksi, transaksi.id_anggota, 
    transaksi.id_buku, pinjam.tgl_pinjam, pinjam.status, kembali.tgl_kembali, kembali.denda FROM transaksi 
    LEFT JOIN pinjam ON pinjam.id_transaksi = transaksi.id_transaksi 
    LEFT JOIN kembali ON kembali.id_transaksi = transaksi.id_transaksi
    WHERE transaksi.id_transaksi='$id_transaksi' AND pinjam.status='Confirmed'");
    $row   = mysqli_num_rows($query);
    
    if($row > 0) {
        $data_trans  = mysqli_fetch_array($query);
        $tgl_pinjam  = $data_trans['tgl_pinjam'];

        $query_2     = mysqli_query($conn, "SELECT * FROM admin JOIN setting ON admin.id_aplikasi = setting.id_aplikasi 
        WHERE id_admin='$id_admin'");

        $data_2      = mysqli_fetch_array($query_2);
        $denda       = $data_2['jml_denda'];
        $max_hari    = $data_2['max_hari'];
        $tgl_kembali = date('Y-m-d');

        $cari_hari   = abs(strtotime($tgl_pinjam) - strtotime($tgl_kembali));
        $hitung_hari = floor($cari_hari/(60*60*24));

        if($hitung_hari > $max_hari) {
            $telat       = $hitung_hari - $max_hari;
            $total_denda = $denda * $telat;

            $update_kembali = mysqli_query($conn, "INSERT INTO kembali SET id_kembali=NULL, id_transaksi='$id_transaksi', 
            tgl_kembali='$tgl_kembali', denda='$total_denda', status='Returned'") or die(mysqli_error($conn));

            $query = mysqli_query($conn, "SELECT transaksi.id_transaksi, transaksi.id_anggota, 
            transaksi.id_buku, pinjam.tgl_pinjam, pinjam.status, kembali.tgl_kembali, kembali.denda FROM transaksi 
            LEFT JOIN pinjam ON pinjam.id_transaksi = transaksi.id_transaksi 
            LEFT JOIN kembali ON kembali.id_transaksi = transaksi.id_transaksi
            WHERE transaksi.id_transaksi='$id_transaksi' AND pinjam.status='Confirmed'");
            $row   = mysqli_num_rows($query);

            for($i=0;$i<$row;$i++) {
                while($data = mysqli_fetch_array($query)) {
                    $id_buku = $data["id_buku"];
                    $query_3 = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku='$id_buku'");
                    $data_3  = mysqli_fetch_array($query_3);
                    $jml     = $data_3['jml_buku'];
                    $stock   = $jml + 1;

                    $update_stock   = mysqli_query($conn, "UPDATE buku SET jml_buku='$stock' WHERE id_buku='$id_buku'");
                }
            }
            
            if($update_stock) {
                $_SESSION['msgSuccess'] = "Transaksi has been updated!";
                header("Location: ../page/detail-pinjam.php?id=$id_transaksi");
                exit();
            } else {
                $_SESSION['msgFail'] = "Update failed!";
                header("Location: ../page/detail-pinjam.php?id=$id_transaksi");
                exit();
            }
        } else {
            $update_kembali = mysqli_query($conn, "INSERT INTO kembali SET id_kembali=NULL, id_transaksi='$id_transaksi', tgl_kembali='$tgl_kembali', denda=0, status='Returned'") or die(mysqli_error($conn));
            $query = mysqli_query($conn, "SELECT transaksi.id_transaksi, transaksi.id_anggota, 
            transaksi.id_buku, pinjam.tgl_pinjam, pinjam.status, kembali.tgl_kembali, kembali.denda FROM transaksi 
            LEFT JOIN pinjam ON pinjam.id_transaksi = transaksi.id_transaksi 
            LEFT JOIN kembali ON kembali.id_transaksi = transaksi.id_transaksi
            WHERE transaksi.id_transaksi='$id_transaksi' AND pinjam.status='Confirmed'");
            $row   = mysqli_num_rows($query);

            for($i=0;$i<$row;$i++) {
                while($data = mysqli_fetch_array($query)) {
                    $id_buku = $data["id_buku"];
                    $query_3 = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku='$id_buku'");
                    $data_3  = mysqli_fetch_array($query_3);
                    $jml     = $data_3['jml_buku'];
                    $stock   = $jml + 1;

                    $update_stock   = mysqli_query($conn, "UPDATE buku SET jml_buku='$stock' WHERE id_buku='$id_buku'");
                }
            }
            
            if($update_stock) {
                $_SESSION['msgSuccess'] = "Transaksi has been updated!";
                header("Location: ../page/detail-pinjam.php?id=$id_transaksi");
                exit();
            } else {
                $_SESSION['msgFail'] = "Update failed!";
                header("Location: ../page/detail-pinjam.php?id=$id_transaksi");
                exit();
            }
        }
    } else {
        $_SESSION['msgFail'] = "Book has been confirmed!";
        header("Location: ../page/detail-pinjam.php?id=$id_transaksi");
        exit(); 
    }
?>