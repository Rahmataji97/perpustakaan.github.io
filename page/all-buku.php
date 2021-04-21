<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>UNAS | BOOK CATALOG</title>
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
                    <div class="col-sm-12 col-lg-3 mb-3">
                        <h2>Categories<hr></h2>
                        <div class="d-flex align-items-center mb-3">
                            <input id="catSearch" class="form-control" type="text" placeholder="Search...">
                        </div>
                        <ul class="nav flex-column nav-home-kategori">
                            <li class="nav-item">
                                <a class="nav-link" href="./all-buku.php">All</a>
                            </li>
                            <?php 
                                include('../api/config.php');
                                $query = mysqli_query($conn, "SELECT * FROM kategori_buku");
                                while($row = mysqli_fetch_array($query)) {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="./all-buku.php?id=<?= $row['id_kategori']; ?>"><?= $row['nama_kategori']; ?></a>
                            </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-lg-9 mb-3">
                        <div id="result" class="row ">
                            <?php include('home-kategori.php'); ?>
                        </div>
                    </div>
                </div>
                    
                </div>
            </div>
        </section>
    </div>
    <?php include('./home-footer.php'); ?>
</body>
</html>
<?php include('foot.php'); ?>