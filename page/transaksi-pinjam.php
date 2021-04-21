<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ORDER | RETURN</title>
    <?php include('head.php'); ?>
</head>
<body>
    <div class="app-wrapper">
        <?php include('nav.php'); ?>
        <div class="app-main">
            <?php include('top-nav.php'); ?>
            <div class="app-content">
                <div class="app-content-inner">
                    <div class="row d-flex flex-column">
                        <div class="col-sm-12 align-self-center">
                            <div class="holder">
                                <span class="title">
                                    <span class="small">Table</span>
                                    <h3 class="h3">Transaction</h3>
                                </span>
                                <div class="table-responsive holder-content">
                                    <table id="table" class="table table-hover table-bordered nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>TRANSACTION ID</th>
                                                <th>MEMBER ID</th>
                                                <th>ORDER DATE</th>
                                                <th>RETURN DATE</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include('../api/config.php');
                                                $query = mysqli_query($conn, "SELECT transaksi.id_transaksi, transaksi.id_anggota, pinjam.tgl_pinjam,
                                                kembali.tgl_kembali FROM transaksi
                                                LEFT JOIN pinjam ON pinjam.id_transaksi = transaksi.id_transaksi
                                                LEFT JOIN kembali ON kembali.id_transaksi = transaksi.id_transaksi
                                                GROUP BY transaksi.id_transaksi ORDER BY pinjam.tgl_pinjam ASC") or die(mysqli_error($conn));
                                                $no    = 0;
                                                while($row = mysqli_fetch_array($query)) {
                                                    $no++;
                                            ?>
                                            <tr>
                                                <td class="text-center"><?= $no; ?></td>
                                                <td><?= $row['id_transaksi']; ?></td>
                                                <td><?= $row['id_anggota']; ?></td>
                                                <td class="text-center"><?= $row['tgl_pinjam']; ?></td>
                                                <td class="text-center"><?= $row['tgl_kembali']; ?></td>
                                                <td class="d-flex flex-column">
                                                    <div class="align-self-center">
                                                        <a class="btn btn-outline-success btn-sm" href="./detail-pinjam.php?id=<?= $row['id_transaksi']; ?>">
                                                            <i class="search plus icon m-0"></i>
                                                        </a>
                                                        <a class="btn btn-outline-info btn-sm" href="../print/nota-pinjam.php?id=<?= $row['id_transaksi']; ?>&anggota=<?= $row['id_anggota']; ?>">
                                                            <i class="print plus icon m-0"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php        
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php include('foot.php'); ?>