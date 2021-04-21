<?php 
    include('../api/config.php');
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = mysqli_query($conn, "SELECT * FROM buku WHERE id_kategori='$id'");
        $row = mysqli_num_rows($query);
        if($row > 0) {
            while($row = mysqli_fetch_array($query)) {
?>
    <div class="col-sm-4 mb-3">
        <div class="card text-left">
            <img class="card-img-top" src="../assets/image/upload/buku/<?= $row['gambar']; ?>" alt="Image" style="height: 200px;">
            <div class="card-body">
                <h5 class="card-title font-weight-bold text-truncate"><?= $row['judul']; ?></h5>
                <p class="card-text"><?= $row['th_terbit']; ?></p>
                <a href="./detail-buku.php?buku=<?= $row['id_buku']; ?>" class="btn btn-primary w-100">View Detail</a>
            </div>
        </div>
    </div>
<?php
            }
        } else {
?>
    <div class="col-sm-12 align-self-center">
        <div class="card">
            <div class="card-header">
                INFORMATION
            </div>
            <div class="card-body">
                <h5 class="card-title">No books found!</h5>
                <p class="card-text">Please contact administrator.</p>
                <a href="./kontak.php" class="btn btn-primary">Contact Information</a>
            </div>
        </div>
    </div>
<?php
        }
    } else {
        $query_all = mysqli_query($conn, "SELECT * FROM buku");
        while($row = mysqli_fetch_array($query_all)) {
?>
    <div class="col-sm-4 mb-3">
        <div class="card text-left">
            <img class="card-img-top" src="../assets/image/upload/buku/<?= $row['gambar']; ?>" alt="Image" style="height: 200px;">
            <div class="card-body">
                <h5 class="card-title font-weight-bold text-truncate"><?= $row['judul']; ?></h5>
                <p class="card-text"><?= $row['th_terbit']; ?></p>
                <a href="./detail-buku.php?buku=<?= $row['id_buku']; ?>" class="btn btn-primary w-100">View Detail</a>
            </div>
        </div>
    </div>
<?php
        }
    }
?>