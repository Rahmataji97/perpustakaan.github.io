<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>UNAS | CART</title>
    <link rel="shortcut icon" href="../assets/image/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../assets/image/favicon.ico" type="image/x-icon">
    <?php include('head.php'); ?>
</head>
<body>
    <?php include('top-home-nav.php'); ?>
    <div class="home-content">
        <section class="mt-5 mb-5">
            <?php 
                include('../api/config.php');
                if(!isset($_SESSION['id_anggota'])) {
            ?>
            <div class="container">
                <div class="row d-flex flex-column">
                    <div class="col-sm-6 align-self-center">
                        <div class="card">
                            <div class="card-header">
                                INFORMATION
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">You must login first!</h5>
                                <p class="card-text">Use your account for borrowing some books.</p>
                                <a href="./login-anggota.php" class="btn btn-primary">Login Member</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php        
                } else {
            ?>
            <div class="container">
                <div class="row d-flex flex-column">
                    <div class="col-sm-12 align-self-center">
                        <h2>Order Cart</h2>
                        <hr>
                    </div>
                    <div class="col-sm-12 align-self-center">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title"><?= $_SESSION['id_anggota']; ?></h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>BOOK ID</th>
                                                <th>BOOK NAME</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                include('../api/config.php');
                                                $id_anggota = $_SESSION['id_anggota'];
                                                $query = mysqli_query($conn, "SELECT * FROM keranjang LEFT JOIN buku 
                                                    ON keranjang.id_buku = buku.id_buku WHERE id_anggota='$id_anggota'") or die(mysqli_error($conn));
                                                $row = mysqli_num_rows($query);
                                                if($row > 0) {
                                                    while($row_2 = mysqli_fetch_array($query)) {
                                            ?>
                                            <tr>
                                                <td><?= $row_2['id_buku']; ?></td>
                                                <td><?= $row_2['judul']; ?></td>
                                                <td class="d-flex flex-column">
                                                    <div class="align-self-center">
                                                        <a class="btn btn-outline-danger btn-sm m-1" href="../api/delete-keranjang.php?id=<?= $row_2['id_buku']; ?>">
                                                            <i class="trash icon m-0"></i>
                                                        </a>
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
                                <div class="float-right mt-3">
                                    <a href="../api/pinjam-buku.php" class="btn btn-primary ">Checkout Order</a>
                                    <a href="./all-buku.php" class="btn btn-danger">Get Some Books</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </section>
    </div>
</body>
</html>
<?php include('foot.php'); ?>