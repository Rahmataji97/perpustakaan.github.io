<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LIBRARY | EDIT BOOK</title>
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
                                    <span class="small">Form</span>
                                    <h3 class="h3">Edit Book</h3>
                                </span>
                                <form action="../api/edit-buku.php" method="POST" enctype="multipart/form-data">
                                <div class="holder-content">
                                    <?php
                                        include('../api/config.php');
                                        $id = $_GET['id'];
                                        $query = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku='$id'");
                                        while($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="">BOOK ID</label>
                                            <input class="form-control" type="text" name="id_buku" value="<?= $row['id_buku']; ?>" required readonly>
                                            <input class="form-control" type="hidden" name="tgl_input" value="<?= date('D, d-m-yy'); ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">ISBN</label>
                                            <input class="form-control" type="text" name="isbn" value="<?= $row['isbn']; ?>" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Category</label>
                                            <select class="form-control" name="kategori" required>
                                                <option value="">Pilih Kategori</option>
                                                <?php
                                                    include('../api/config.php');
                                                    $query = mysqli_query($conn, "SELECT * FROM kategori_buku");
                                                    while($row2 = mysqli_fetch_array($query)) {
                                                ?>
                                                <option value="<?= $row2['id_kategori']; ?>"><?= $row2['nama_kategori']; ?></option>
                                                <?php 
                                                    } 
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="">Title</label>
                                            <input class="form-control" type="text" name="judul" value="<?= $row['judul']; ?>" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Author</label>
                                            <input class="form-control" type="text" name="pengarang" value="<?= $row['pengarang']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-4">
                                            <label for="">Publisher</label>
                                            <input class="form-control" type="text" name="penerbit" value="<?= $row['penerbit']; ?>" required>
                                        </div>
                                        <div class="form-group col-sm-2">
                                            <label for="">Year</label>
                                            <input class="form-control" type="text" name="th_terbit" value="<?= $row['th_terbit']; ?>" required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="">Published Place</label>
                                            <input class="form-control" type="text" name="tmpt_terbit" value="<?= $row['tempat_terbit']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea class="form-control" type="text" name="deskripsi" required><?= $row['deskripsi']; ?></textarea>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6">
                                            <label for="">Book Placement Location</label>
                                            <input class="form-control" type="text" name="lokasi_buku" value="<?= $row['lokasi_buku']; ?>" required>
                                        </div>
                                        <div class="form-group col-sm-2">
                                            <label for="">Qty</label>
                                            <input class="form-control" type="number" name="jml" value="<?= $row['jml_buku']; ?>" required>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="">Cover</label>
                                            <input type="file" class="form-control-file" name="file">
                                            <input type="text" class="form-control" name="old_file" value="<?= $row['gambar']; ?>" hidden>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <span class="footer">
                                    <button class="btn btn-primary w-100" name="simpan"><i class="sync icon"></i>Update Book</button>
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