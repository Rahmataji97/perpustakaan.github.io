<?php
    include('config.php');
    session_start();

    $title = $_POST["title"];
  
    $result = mysqli_query($conn, "SELECT * FROM buku where judul like '%$title%'");
    $found  = mysqli_num_rows($result);
    
    if($found > 0) {
        while($row = mysqli_fetch_array($result)) {
            $row["judul"];
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
?>