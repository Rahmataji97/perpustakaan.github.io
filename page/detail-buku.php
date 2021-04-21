<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>UNAS | BOOK DETAIL</title>
    <link rel="shortcut icon" href="../assets/image/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../assets/image/favicon.ico" type="image/x-icon">
    <?php include('head.php'); ?>
</head>
<body>
    <?php include('top-home-nav.php'); ?>
    <div class="home-content">
        <section class="mt-5 mb-3">
            <div class="container">
                <div class="row">
                    <?php
                        include('../api/config.php');
                        $id = $_GET["buku"];
                        $query = mysqli_query($conn,"SELECT * FROM buku  WHERE id_buku='$id'");
                        while($row = mysqli_fetch_array($query)) {
                    ?>
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="detail-image">
                                    <img class="card-img-top" src="../assets/image/upload/buku/<?= $row['gambar']; ?>" alt="Card image cap">
                                </div>
                            </div>
                            <div class="col-sm-12 mt-3">
                                <?php
                                    include('../api/config.php');
                                    $buku = $_GET["buku"];
                                    $check_order = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku='$buku'");
                                    $row_order   = mysqli_num_rows($check_order);
                                    if($row['jml_buku'] < 1) {
                                ?>
                                <button class="btn btn-danger w-100" disabled>Out of Stock</button>
                                <?php
                                    } else {
                                ?>
                                <a href="../api/keranjang.php?id=<?= $row['id_buku']; ?>" class="btn btn-primary w-100">Order</a>
                                <?php
                                    }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2><?= $row['judul']; ?></h2>
                                <hr>
                                <p class="lead"><?= $row['pengarang']; ?></p>
                                <p class="lead m-0">ISBN <?= $row['isbn']; ?></p>
                                <p class="lead"><?= $row['tempat_terbit']; ?>, Th. <?= $row['th_terbit']; ?></p>
                                <p class="lead"><?=$row['jml_buku']; ?> Books left</p>
                            </div>
                            <div class="col-sm-12">
                                <h2>About</h2>
                                <hr>
                                <p class="lead text-justify"><?=$row['deskripsi']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </section>
    </div>
    <?php include('./home-footer.php'); ?>
</body>
</html>
<?php include('foot.php'); ?>