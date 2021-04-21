<?php
    header('Content-Type: application/json');

    include('./config.php');

    $query = mysqli_query($conn, "SELECT COUNT(*) AS total, pinjam.tgl_pinjam FROM pinjam
        JOIN transaksi ON transaksi.id_transaksi = pinjam.id_transaksi
        WHERE pinjam.status = 'Confirmed' GROUP BY pinjam.tgl_pinjam ORDER BY pinjam.tgl_pinjam");
    $data  = array();

    foreach ($query as $row) {
        $data[] = $row;
    }

    mysqli_close($conn);

    echo json_encode($data);
?>