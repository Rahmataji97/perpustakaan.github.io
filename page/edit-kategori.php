<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LIBRARY | EDIT CATEGORY</title>
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
                        <div class="col-sm-6 align-self-center">
                            <div class="holder">
                                <span class="title">
                                    <span class="small">Form</span>
                                    <h3 class="h3">Edit Category</h3>
                                </span>
                                <form action="../api/edit-kategori.php" method="POST">
                                <div class="holder-content">
                                    <?php 
                                        include('../api/config.php');
                                        $id = $_GET['id'];
                                        $query = mysqli_query($conn, "SELECT * FROM kategori_buku WHERE id_kategori='$id'");
                                        while($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <div class="form-group">
                                        <label for="">Nama Kategori</label>
                                        <input class="form-control" type="text" name="nama_kategori" value="<?= $row['nama_kategori']; ?>" required>
                                        <input class="form-control" type="hidden" name="id_kategori" value="<?= $row['id_kategori']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Keterangan</label>
                                        <input class="form-control" type="text" name="keterangan" value="<?= $row['keterangan']; ?>" required>
                                    </div>
                                    <?php } ?>
                                </div>
                                <span class="footer">
                                    <button class="btn btn-primary w-100" name="simpan"><i class="sync icon"></i>Update Category</button>
                                </span>
                                </form>
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