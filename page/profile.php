<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>UNAS | USER PROFILE</title>
    <link rel="shortcut icon" href="../assets/image/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../assets/image/favicon.ico" type="image/x-icon">
    <?php include('head.php'); ?>
</head>
<body>
    <?php include('top-home-nav.php'); ?>
    <div class="home-content">
        <section class="mt-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <h2>My Details</h2>
                        <hr>
                        <?php 
                            include('../api/config.php');
                            $id = $_SESSION['id_anggota'];
                            $query = mysqli_query($conn, "SELECT * FROM anggota WHERE id_anggota='$id'");
                            while($row = mysqli_fetch_array($query)) {
                        ?>
                        <h5>Member ID</h5>
                        <p class=""><?= $row['id_anggota']; ?></p>
                        <h5>Nim</h5>
                        <p class=""><?= $row['nim']; ?></p>
                        <h5>Full Name</h5>
                        <p class=""><?= $row['nama_lengkap']; ?></p>
                        <h5>Date of Birth</h5>
                        <p class=""><?= $row['tmpt_tgl_lahir']; ?></p>
                        <h5>Gender</h5>
                        <p class=""><?= $row['jenis_kelamin']; ?></p>
                        <h5>Address</h5>
                        <p class=""><?= $row['alamat']; ?></p>
                        <h5>Phone</h5>
                        <p class=""><?= $row['telp']; ?></p>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-12 mb-5">
                                <h2>My Order History</h2>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table table-bordered nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>ORDER ID</th>
                                                <th>BOOK ID</th>
                                                <th>BOOK NAME</th>
                                                <th>ORDER DATE</th>
                                                <th>STATUS</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                include('../api/config.php');
                                                $id_anggota = $_SESSION['id_anggota'];
                                                $query = mysqli_query($conn, "SELECT transaksi.id_transaksi, transaksi.id_anggota, 
                                                transaksi.id_buku, pinjam.tgl_pinjam, pinjam.status, buku.judul FROM transaksi
                                                LEFT JOIN pinjam on pinjam.id_transaksi = transaksi.id_transaksi
                                                LEFT JOIN buku on buku.id_buku = transaksi.id_buku
                                                WHERE transaksi.id_anggota='$id_anggota' ORDER BY transaksi.id_transaksi DESC");
                                                $row = mysqli_num_rows($query);
                                                if($row > 0) {
                                                    $no = 0;
                                                    while($row_2 = mysqli_fetch_array($query)) {
                                                        $no++                                                        
                                            ?>
                                            <tr>
                                                <td class="text-center"><?= $no; ?></td>
                                                <td><?= $row_2['id_transaksi']; ?></td>
                                                <td><?= $row_2['id_buku']; ?></td>
                                                <td><a href="./detail-buku.php?buku=<?= $row_2['id_buku']; ?>"><?= $row_2['judul']; ?></a></td>
                                                <td class="text-center"><?= $row_2['tgl_pinjam']; ?></td>
                                                <td class="text-center"><?= $row_2['status']; ?></td>
                                                <td class="d-flex flex-column">
                                                    <div class="align-self-center">
                                                        <?php if($row_2['status'] != "Confirmed") { ?>
                                                            <a class="btn btn-outline-danger btn-sm m-1" href="../api/delete-item-order.php?id=<?= $row_2['id_transaksi']; ?>&buku=<?= $row_2['id_buku']; ?>">
                                                                <i class="trash icon m-0"></i>
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php 
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-5">
                                <h2>My Return History</h2>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table table-bordered nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>ORDER ID</th>
                                                <th>BOOK ID</th>
                                                <th>BOOK NAME</th>
                                                <th>ORDER DATE</th>
                                                <th>RETURN DATE</th>
                                                <th>DENDA</th>
                                                <th>STATUS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                include('../api/config.php');
                                                $id_anggota = $_SESSION['id_anggota'];
                                                $query = mysqli_query($conn, "SELECT transaksi.*, pinjam.tgl_pinjam, kembali.tgl_kembali, 
                                                kembali.denda, kembali.status, buku.* FROM buku
                                                RIGHT JOIN transaksi ON transaksi.id_buku = buku.id_buku 
                                                LEFT JOIN kembali ON kembali.id_transaksi = transaksi.id_transaksi
                                                LEFT JOIN pinjam ON pinjam.id_transaksi = transaksi.id_transaksi
                                                WHERE transaksi.id_anggota='$id_anggota' AND kembali.status='Returned'  GROUP BY transaksi.id_buku
                                                ORDER BY transaksi.id_transaksi DESC");
                                                $row = mysqli_num_rows($query);
                                                if($row > 0) {
                                                    $no = 0;
                                                    while($row_2 = mysqli_fetch_array($query)) {
                                                        $no++
                                            ?>
                                            <tr>
                                                <td class="text-center"><?= $no; ?></td>
                                                <td><?= $row_2['id_transaksi']; ?></td>
                                                <td><?= $row_2['id_buku']; ?></td>
                                                <td><a href="./detail-buku?buku=<?= $row_2['id_buku']; ?>"><?= $row_2['judul']; ?></a></td>
                                                <td class="text-center"><?= $row_2['tgl_pinjam']; ?></td>
                                                <td class="text-center"><?= $row_2['tgl_kembali']; ?></td>
                                                <td>Rp. <?= number_format($row['denda'],2,',','.'); ?></td>
                                                <td><?= $row_2['status']; ?></td>
                                            <?php 
                                                    }
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
        </section>
    </div>
</body>
</html>
<?php include('foot.php'); ?>