<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LIBRARY | SETTING</title>
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
                                    <span class="small">Aplication</span>
                                    <h3 class="h3">Setting</h3>
                                </span>
                                <form action="../api/add-pengaturan.php" method="POST" enctype="multipart/form-data">
                                <div class="holder-content">
                                    <?php
                                        include('../api/config.php');
                                        $id = $_SESSION['id_admin'];
                                        $query = mysqli_query($conn, "SELECT * FROM admin JOIN setting 
                                            ON admin.id_aplikasi = setting.id_aplikasi 
                                                WHERE id_admin='$id'") or die(mysqli_error($conn));
                                        while($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6">
                                            <label for="">Username</label>
                                            <input class="form-control" type="text" name="username" value="<?= $row['username']; ?>" required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="">Password</label>
                                            <input class="form-control" type="password" name="password" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Picture</label>
                                        <input class="form-control-file" type="file" name="file1">
                                        <input class="form-control" type="text" name="old_file1" value="<?= $row['foto']; ?>" hidden>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="">Aplication ID</label>
                                        <input class="form-control" type="text" name="id_aplikasi" value="<?= $row['id_aplikasi']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Aplication Name</label>
                                        <input class="form-control" type="text" name="nama_aplikasi" value="<?= $row['nama_aplikasi']; ?>" required>
                                        <input class="form-control" type="text" name="id_aplikasi" value="<?= $row['id_aplikasi']; ?>" hidden>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-4">
                                            <label for="">Insitute ID</label>
                                            <input class="form-control" type="text" name="sub_id" value="<?= $row['sub_id']; ?>" required>
                                        </div>
                                        <div class="form-group col-sm-8">
                                            <label for="">Insitute Name</label>
                                            <input class="form-control" type="text" name="instansi" value="<?= $row['instansi']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-4">
                                            <label for="">Max Order</label>
                                            <input class="form-control" type="number" name="max_pinjam" value="<?= $row['max_pinjam']; ?>" required>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="">Max Day</label>
                                            <input class="form-control" type="number" name="max_hari" value="<?= $row['max_hari']; ?>" required>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="">Late Tax</label>
                                            <input class="form-control" type="text" name="jml_denda" value="<?= $row['jml_denda']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Logo</label>
                                        <input class="form-control-file" type="file" name="file2">
                                        <input class="form-control" type="text" name="old_file2" value="<?= $row['logo']; ?>" hidden>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                                <span class="footer">
                                    <button class="btn btn-primary w-100"><i class="save icon"></i>Save Setting</button>
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