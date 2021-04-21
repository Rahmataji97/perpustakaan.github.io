<div class="app-header">
    <div class="d-flex">
        <div class="hamburger-menu">
            <div class="hamburger-inner"></div>
        </div>
    </div>
    <div class="d-flex">
        <div class="user-box">
            <?php
                include('../api/config.php');
                $id    = $_SESSION['id_admin'];
                $query = mysqli_query($conn, "SELECT username, foto FROM admin WHERE id_admin='$id'");
                while($data = mysqli_fetch_array($query)) {
            ?>  
            <img class="avatar" src="../assets/image/upload/setting/<?= $data['foto']; ?>" alt="">
            <span class="user-info">
                <p class="lead">Welcome</p>
                <a class="link" href="./pengaturan.php"><?= $data['username']; ?>!</a>
            </span>
            <?php 
                }
            ?>
        </div>
    </div>
</div>