<?php 
    include('config.php');
    session_start();

    $id_anggota = $_SESSION['id_anggota'];
    $date = date('Y-m-d');

    $query = mysqli_query($conn, "SELECT * FROM setting JOIN anggota 
        ON setting.id_aplikasi = anggota.id_aplikasi WHERE id_anggota='$id_anggota'");
    $data  = mysqli_fetch_array($query);
    $max_pinjam = $data['max_pinjam'];

    $query_2 = mysqli_query($conn, "SELECT * FROM keranjang WHERE id_anggota='$id_anggota'");
    $row_2   = mysqli_num_rows($query_2);

    if($row_2 <= $max_pinjam) {
        $id_transaksi = $id_anggota.id_transaksi();
        for($i=0; $i < $row_2; $i++) { 
            while($data = mysqli_fetch_array($query_2)) {
                $id_buku = $data['id_buku'];
                $query_3 = mysqli_query($conn, "INSERT INTO transaksi SET id=NULL, id_transaksi='$id_transaksi', 
                    id_buku='$id_buku', id_anggota='$id_anggota'");
            }
        }
        if($query_3) {
            $query_delete = mysqli_query($conn, "DELETE FROM keranjang WHERE id_anggota='$id_anggota'");
            $_SESSION['msgSuccess'] = "Books has been ordered!";
            header("Location: ../page/profile.php");
            exit();
        } else {
            $_SESSION['msgFail'] = "Failed to order books!";
            header("Location: ../page/keranjang.php?id=$id_anggota");
            exit();
        }
    } else {
        $_SESSION['msgFail'] = "You can only order up to $max_pinjam books at once!";
        header("Location: ../page/keranjang.php?id=$id_anggota");
        exit();
    }

    function id_transaksi() {
        include('config.php');
        $query  = mysqli_query($conn, "SELECT max(id_transaksi) AS last FROM transaksi") or die(mysqli_error($conn));
        
        while($data = mysqli_fetch_array($query)) {
            $id     = $data['last'];
            $noUrut = (int) substr($id, -1);
            $noUrut++;
            $char   = date('dmy');
            $id_transaksi = $char.sprintf("%01s", $noUrut);
            
            return $id_transaksi;
        }
        
    }
?>