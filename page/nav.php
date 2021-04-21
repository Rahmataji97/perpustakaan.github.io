
<div class="app-sidebar">
    <div class="app-sidebar-header">
        <?php
            include('../api/config.php');
            $id    = $_SESSION['id_app'];
            $query = mysqli_query($conn, "SELECT logo FROM setting WHERE id_aplikasi='$id'");
            while($data = mysqli_fetch_array($query)) {
        ?> 
        <a class="title"><img src="../assets/image/upload/setting/<?= $data['logo']; ?>" alt=""></a>
        <?php 
            }
        ?>
    </div>
    <div class="app-sidebar-menu">
        <ul class="app-sidebar-nav">
            <div class="sidebar-header">Page's</div>
            <li class="nav-item">
                <a class="nav-link d-flex" href="./dashboard.php">
                    <span class="link-icon"><i class="desktop icon"></i></span>Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./anggota.php">
                    <span class="link-icon"><i class="user icon"></i></span>Member
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./kategori-buku.php">
                    <span class="link-icon"><i class="folder icon"></i></span>Category
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./buku.php">
                    <span class="link-icon"><i class="book icon"></i></span>Book
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./transaksi-pinjam.php">
                    <span class="link-icon"><i class="calendar icon"></i></span>Transaction
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./laporan.php">
                    <span class="link-icon"><i class="folder open icon"></i></span>Report
                </a>
            </li>
            <div class="sidebar-header">Other's</div>
            <li class="nav-item">
                <a class="nav-link" href="./pengaturan.php">
                    <span class="link-icon"><i class="cogs icon"></i></span>Setting
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../api/logout.php">
                    <span class="link-icon"><i class="power off icon"></i></span>Logout
                </a>
            </li>
        </ul>
    </div>
</div>