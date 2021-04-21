<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LIBRARY | BOOK CATALOG</title>
    <?php include('head.php'); ?>
</head>
<body>
    <div class="app-wrapper">
        <?php include('nav.php'); ?>
        <div class="app-main">
            <?php include('top-nav.php'); ?>
            <div class="app-content">
                <div class="app-content-inner">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="holder">
                                <span class="title">
                                    <span class="small">Table</span>
                                    <h3>Book Catalog</h3>
                                </span>
                                <div class="holder-content">
                                    <div class="table-responsive">
                                        <table id="table" class="table table-hover table-bordered nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>BOOK ID</th>
                                                    <th>CATEGORY</th>
                                                    <th>TITLE</th>
                                                    <th>AUTHOR</th>
                                                    <th>PUBLISHER</th>
                                                    <th>YEAR</th>
                                                    <th>PUBLISHED PLACE</th>
                                                    <th>PLACEMENT</th>
                                                    <th>QTY</th>
                                                    <th>INPUT DATE</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    include('../api/config.php');
                                                    $query = mysqli_query($conn, "SELECT * FROM buku JOIN kategori_buku 
                                                        ON buku.id_kategori = kategori_buku.id_kategori");
                                                    $no = 0;
                                                    while($row = mysqli_fetch_array($query)) {
                                                        $no++;
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?= $no; ?></td>
                                                    <td><?= $row['id_buku']; ?></td>
                                                    <td><?= $row['nama_kategori']; ?></td>
                                                    <td><a href="./detail-buku.php?buku=<?= $row['id_buku']; ?>"><?= $row['judul']; ?></a></td>
                                                    <td><?= $row['pengarang']; ?></td>
                                                    <td><?= $row['penerbit']; ?></td>
                                                    <td class="text-center"><?= $row['th_terbit']; ?></td>
                                                    <td><?= $row['tempat_terbit']; ?></td>
                                                    <td class="text-center"><?= $row['lokasi_buku']; ?></td>
                                                    <td class="text-center"><?= $row['jml_buku']; ?></td>
                                                    <td><?= $row['tgl_input']; ?></td>
                                                    <td class="d-flex flex-column">
                                                        <div class="align-self-center">
                                                            <a class="btn btn-outline-success btn-sm" href="./edit-buku.php?id=<?= $row['id_buku']; ?>">
                                                                <i class="edit icon m-0"></i>
                                                            </a>
                                                            <a class="btn btn-outline-danger btn-sm" href="../api/delete-buku.php?id=<?= $row['id_buku']; ?>">
                                                                <i class="trash icon m-0"></i>
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
                                <span class="footer">
                                    <a href="./add-buku.php" class="btn btn-primary">
                                        <i class="plus icon"></i>Add New Book
                                    </a>
                                </span>
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