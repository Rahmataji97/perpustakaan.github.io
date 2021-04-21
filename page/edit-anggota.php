<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LIBRARY | EDIT MEMBER</title>
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
                                    <h3 class="h3">Edit Member</h3>
                                </span>
                                <form action="../api/edit-anggota.php" method="POST" enctype="multipart/form-data">
                                <div class="holder-content">
                                    <?php 
                                        include('../api/config.php');
                                        $id = $_GET['id'];
                                        $query = mysqli_query($conn, "SELECT * FROM anggota WHERE id_anggota='$id'");
                                        while($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="">NIM</label>
                                            <input class="form-control" type="text" name="nim" value="<?= $row['nim']; ?>" required autofocus>
                                            <input class="form-control" type="hidden" name="id_anggota" value="<?= $row['id_anggota']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Password</label>
                                            <input class="form-control" type="password" name="password" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Full Name</label>
                                        <input class="form-control" type="text" name="nama" value="<?= $row['nama_lengkap']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Gender</label>
                                        <select class="form-control" name="jekel" required>
                                            <option value="">Select Gender</option>
                                            <option value="Pria">Pria</option>
                                            <option value="Wanita">Wanita</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Date of Birth</label>
                                        <input class="form-control" type="text" name="ttl" value="<?= $row['tmpt_tgl_lahir']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <textarea class="form-control" name="alamat"><?= $row['alamat']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone Number</label>
                                        <input class="form-control" type="text" name="telp" value="<?= $row['telp']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Foto</label>
                                        <input class="form-control-file" type="file" name="file" value="" >
                                        <input class="form-control" type="text" name="old_file" value="<?= $row['foto']; ?>" hidden>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                                <span class="footer">
                                    <button class="btn btn-primary w-100" name="simpan"><i class="sync icon"></i>Update Member</button>
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