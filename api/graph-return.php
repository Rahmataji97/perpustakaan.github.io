<?php
    header('Content-Type: application/json');

    include('./config.php');

    $query = mysqli_query($conn, "SELECT COUNT(*) AS total, kembali.tgl_kembali FROM kembali
    JOIN transaksi ON transaksi.id_transaksi = kembali.id_transaksi
    WHERE kembali.status = 'Returned' GROUP BY kembali.tgl_kembali ORDER BY kembali.tgl_kembali");
    $data  = array();

    foreach ($query as $row) {
        $data[] = $row;
    }

    mysqli_close($conn);

    echo json_encode($data);
?>