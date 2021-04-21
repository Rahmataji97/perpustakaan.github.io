<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LIBRARY | ADD CATEGORY</title>
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
                                    <h3 class="h3">New Category</h3>
                                </span>
                                <form action="../api/add-kategori.php" method="POST">
                                <div class="holder-content">
                                    <div class="form-group">
                                        <label for="">Category Name</label>
                                        <input class="form-control" type="text" name="nama_kategori" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <input class="form-control" type="text" name="keterangan" required>
                                    </div>
                                </div>
                                <span class="footer">
                                    <button class="btn btn-primary w-100" name="simpan"><i class="sync icon"></i>Simpan Kategori</button>
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