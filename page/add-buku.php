<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LIBRARY | ADD BOOK</title>
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
                                    <h3 class="h3">New Book</h3>
                                </span>
                                <form action="../api/add-buku.php" method="POST" enctype="multipart/form-data">
                                <div class="holder-content">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="">Book ID</label>
                                            <input class="form-control" type="text" name="id_buku" required autofocus>
                                            <input class="form-control" type="hidden" name="tgl_input" value="<?= date('D, d-m-yy'); ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">ISBN</label>
                                            <input class="form-control" type="text" name="isbn" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Category</label>
                                            <select class="form-control" name="kategori" required>
                                                <option value="">Select</option>
                                                <?php
                                                    include('../api/config.php');
                                                    $query = mysqli_query($conn, "SELECT * FROM kategori_buku");
                                                    while($row = mysqli_fetch_array($query)) {
                                                ?>
                                                <option value="<?= $row['id_kategori']; ?>"><?= $row['nama_kategori']; ?></option>
                                                <?php 
                                                    } 
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="">Book Title</label>
                                            <input class="form-control" type="text" name="judul" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Author</label>
                                            <input class="form-control" type="text" name="pengarang" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-4">
                                            <label for="">Publisher</label>
                                            <input class="form-control" type="text" name="penerbit" required>
                                        </div>
                                        <div class="form-group col-sm-2">
                                            <label for="">Year</label>
                                            <input class="form-control" type="text" name="th_terbit" required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="">Published Place</label>
                                            <input class="form-control" type="text" name="tmpt_terbit" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea class="form-control" type="text" name="deskripsi" required></textarea>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6">
                                            <label for="">Book Placement Location</label>
                                            <input class="form-control" type="text" name="lokasi_buku" required>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="">Qty</label>
                                            <input class="form-control" type="number" name="jml" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Cover</label>
                                        <input type="file" class="form-control-file" name="file">
                                    </div>
                                </div>
                                <span class="footer">
                                    <button class="btn btn-primary w-100" name="simpan"><i class="sync icon"></i>Save Book</button>
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