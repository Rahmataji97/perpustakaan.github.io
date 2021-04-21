<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LIBRARY | ADD MEMBER</title>
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
                                    <h3 class="h3">New Member</h3>
                                </span>
                                <form action="../api/add-anggota.php" method="POST" enctype="multipart/form-data">
                                <div class="holder-content">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="">NIM</label>
                                            <input class="form-control" type="text" name="nim" required autofocus>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Password</label>
                                            <input class="form-control" type="password" name="password" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Full Name</label>
                                        <input class="form-control" type="text" name="nama" required>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6">
                                            <label for="">Date of Birth</label>
                                            <input class="form-control" type="text" name="ttl">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="">Gender</label>
                                            <select class="form-control" name="jekel">
                                                <option value="">Select Gender</option>
                                                <option value="Pria">Pria</option>
                                                <option value="Wanita">Wanita</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <textarea class="form-control" name="alamat"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone Number</label>
                                        <input class="form-control" type="text" name="telp">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Picture</label>
                                        <input class="form-control-file" type="file" name="file">
                                    </div>
                                </div>
                                <span class="footer">
                                    <button class="btn btn-primary w-100" name="simpan"><i class="sync icon"></i>Simpan Anggota</button>
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