<div class="top-home-nav">
    <div class="top-home-logo">
        <img class="image" src="../assets/image/logo-unas3.png" alt="">
    </div>
    <div class="top-home-link">
        <?php 
            include('../api/config.php');

            if(isset($_SESSION['id_anggota'])) {
        ?>
        <ul class="nav d-flex">
            <li class="nav-item"><a href="./home.php">Home</a></li>
            <li class="nav-item"><a href="./all-buku.php">Books</a></li>
            <li class="nav-item"><a href="./e-jurnal.php">E-Jurnal</a></li>
        </ul>
        <ul class="nav d-flex">
            <li class="nav-item"><a href="./profile.php"><i class="user icon"></i><?= $_SESSION['nama']; ?></a></li>
            <li class="nav-item"><a href="./keranjang.php"><i class="cart icon"></i>Cart</a></li>
            <li class="nav-item"><a href="../api/logout-anggota.php"><i class="power off icon"></i>Logout</a></li>
        </ul>
        <?php
            } else {
        ?>
        <ul class="nav d-flex">
            <li class="nav-item text-uppercase"><a href="./home.php">Home</a></li>
            <li class="nav-item text-uppercase"><a href="./all-buku.php">Books</a></li>
            <li class="nav-item text-uppercase"><a href="./e-jurnal.php">E-Jurnal</a></li>
        </ul>
        <ul class="nav d-flex">
            <li class="nav-item"><a href="./keranjang.php"><i class="cart icon"></i>Cart</a></li>
            <li class="nav-item text-uppercase"><a href="./login-anggota.php">Login</a></li>
        </ul>
        <?php
            }
        ?>
    </div>
</div>