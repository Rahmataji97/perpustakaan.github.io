<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LIBRARY | MEMBER</title>
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
                                    <h3>Member</h3>
                                </span>
                                <div class="holder-content">
                                    <div class="table-responsive holder-content">
                                        <table id="table" class="table table-hover table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>MEMBER ID</th>
                                                    <th>NIM</th>
                                                    <th>FULL NAME</th>
                                                    <th>GENDER</th>
                                                    <th>DATE OF BIRTH</th>
                                                    <th>ADDRESS</th>
                                                    <th>PHONE</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    include('../api/config.php');
                                                    $query = mysqli_query($conn, "SELECT * FROM anggota");
                                                    $no    = 0;
                                                    while($row = mysqli_fetch_array($query)) {
                                                        $no++;
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?= $no; ?></td>
                                                    <td class="text-center"><?= $row['id_anggota']; ?></td>
                                                    <td class="text-center"><?= $row['nim']; ?></td>
                                                    <td><?= $row['nama_lengkap']; ?></td>
                                                    <td class="text-center"><?= $row['jenis_kelamin']; ?></td>
                                                    <td><?= $row['tmpt_tgl_lahir']; ?></td>
                                                    <td><?= $row['alamat']; ?></td>
                                                    <td><?= $row['telp']; ?></td>
                                                    <td class="d-flex flex-column">
                                                        <div class="align-self-center">
                                                            <a class="btn btn-outline-success btn-sm m-1" href="./edit-anggota.php?id=<?= $row['id_anggota']; ?>">
                                                                <i class="edit icon m-0"></i>
                                                            </a>
                                                            <a class="btn btn-outline-danger btn-sm m-1" href="../api/delete-anggota.php?id=<?= $row['id_anggota']; ?>">
                                                                <i class="trash icon m-0"></i>
                                                            </a>
                                                            <a class="btn btn-outline-info btn-sm m-1" href="../print/cetak-anggota.php?id=<?= $row['id_anggota']; ?>" target="_blank">
                                                                <i class="print icon m-0"></i>
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
                                    <a href="./add-anggota.php" class="btn btn-primary">
                                        <i class="plus icon"></i>Add New Member
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