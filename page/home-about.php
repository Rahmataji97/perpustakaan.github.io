<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>UNAS | ABOUT</title>
    <link rel="shortcut icon" href="../assets/image/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../assets/image/favicon.ico" type="image/x-icon">
    <?php include('head.php'); ?>
</head>
<body>
    <?php include('top-home-nav.php'); ?>
    <div class="home-content">
        <section class="mt-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                    <?php 
                        $link = $_GET['id'];
                        if($link == "history") {
                    ?>
                        <h2>Library history</h2>
                        <hr>
                        <p class="text-justify">
                            Perpustakaan Universitas dan Akademi-Akademi Nasional didirikan oleh 
                            Pimpinan Universitas Nasional pada tahun 1970. Sejak berdiri hingga 
                            tahun 1973, Perpustakaan menempati ruang seluas +/-20 m2 di Jl.Kalilio 
                            No. 17-19 Jakarta, dengan koleksi sekitar 2915 eksemplar, termasuk buku, 
                            skripsi, dan tebitan berkala dengan 3 orang pengelola.Dengan semakin 
                            berkembangnya koleksi hingga mencapai jumlah 13.000 eksemplar, maka ruangan 
                            perpustakaan diperluas pda tahun 1973. Tahun 1978, Perpustakaan membuka 
                            cabang untuk koleksi biologi di Ragunan, Pasar Minggu, Jakarta. 
                            Pada Tahun 1980 s/d 1982, Perpustakaan memperoleh bantuan untuk perluasan 
                            ruangan dari Departemen Pendidikan dan Kebudayaan hingga mencapai seluas 102m2.
                        </p>
                        <p class="text-justify">
                            Dengan pindahnya Kampus UNAS ke Pejaten, Pasar Minggu tahun 1983, Perpustakaan 
                            cabag Ragunan digabungkan kembali bersama induknya dalam satu ruang berukuran 
                            499 m2, yang terletak di lantai 1 blok III. Untuk menyelaraskan perpustakaan dengan 
                            perkembangan teknologi informasi, tahun 2001 perpustakan dipindahkan ke gedung baru 
                            sebelah Selatan kampus, yang menempati ruang di lantai 2 seluas 752 m. 
                            Di gedung ini Perpustakaan dilengkapi dengan ruangan kedap suara, full AC, 
                            serta pengolahan dan layanan dengan sistem komputerisasi. Staff perpustakaan sebanyak 
                            8 orang yang kesemuanya telah memngikuti kursus perpustakaan, diharapkan akan 
                            mampu memaksimalkan layanannya dengan sistem otomasi perpustakaan, layanan terbuka, 
                            dan dipersiapkan menuju terciptanya Perpustkaan maya (virtual library) dimasa yang 
                            akan datang.
                        </p>
                    <?php
                        } elseif($link == "employee") {
                    ?>
                        <h2>Library Employee</h2>
                        <hr>
                        <p class="text-justify">
                            Perpustakaan Universitas dan Akademi-Akademi Nasional didirikan oleh 
                            Pimpinan Universitas Nasional pada tahun 1970. Sejak berdiri hingga 
                            tahun 1973, Perpustakaan menempati ruang seluas +/-20 m2 di Jl.Kalilio 
                            No. 17-19 Jakarta, dengan koleksi sekitar 2915 eksemplar, termasuk buku, 
                            skripsi, dan tebitan berkala dengan 3 orang pengelola.Dengan semakin 
                            berkembangnya koleksi hingga mencapai jumlah 13.000 eksemplar, maka ruangan 
                            perpustakaan diperluas pda tahun 1973. Tahun 1978, Perpustakaan membuka 
                            cabang untuk koleksi biologi di Ragunan, Pasar Minggu, Jakarta. 
                            Pada Tahun 1980 s/d 1982, Perpustakaan memperoleh bantuan untuk perluasan 
                            ruangan dari Departemen Pendidikan dan Kebudayaan hingga mencapai seluas 102m2.
                        </p>
                        <p class="text-justify">
                            Dengan pindahnya Kampus UNAS ke Pejaten, Pasar Minggu tahun 1983, Perpustakaan 
                            cabag Ragunan digabungkan kembali bersama induknya dalam satu ruang berukuran 
                            499 m2, yang terletak di lantai 1 blok III. Untuk menyelaraskan perpustakaan dengan 
                            perkembangan teknologi informasi, tahun 2001 perpustakan dipindahkan ke gedung baru 
                            sebelah Selatan kampus, yang menempati ruang di lantai 2 seluas 752 m. 
                            Di gedung ini Perpustakaan dilengkapi dengan ruangan kedap suara, full AC, 
                            serta pengolahan dan layanan dengan sistem komputerisasi. Staff perpustakaan sebanyak 
                            8 orang yang kesemuanya telah memngikuti kursus perpustakaan, diharapkan akan 
                            mampu memaksimalkan layanannya dengan sistem otomasi perpustakaan, layanan terbuka, 
                            dan dipersiapkan menuju terciptanya Perpustkaan maya (virtual library) dimasa yang 
                            akan datang.
                        </p>
                    <?php
                        } else {
                    ?>
                        <h2>Library User</h2>
                        <hr>
                        <p class="text-justify">
                            Pengguna perpustakaan terdiri dari anggota perpustakaan dan non anggota perpustakaan.
                        </p>
                        <p class="font-weight-bold">I. Anggota perpustakaan, terdiri dari :</p>
                        <p class="text-justify">
                            1. Mahasiswa UNAS.</br>
                            2. Dosen UNAS.</br>
                            3. Karyawan UNAS.</br>
                        </p>
                        <p class="font-weight-bold">Syarat menjadi anggota :</p>
                        <p class="text-justify">
                            1. Mengisi formulir keanggaotaan.</br>
                            2. Melampirkan kwitansi pembayaran uang kuliah bagi Mahasiswa.</br>
                            3. Melampirkan Surat pengantar dari Bagian Personalia UNAS bagi Dosen & Karyawan.</br>
                            4. Menyerahkan pass foto ukuran 2X3 cm, 2 lembar</br>
                        </p>
                        <p class="mb-1">- Setiap anggota akan mendapat Kartu Anggota Perpustakaan.</p>
                        <p class="mb-1">- Bagi Mahasiswa, Kartu Anggota berlaku selama pembelajaran, namun harus diperpanjang setiap tahun.</p>
                        <p class="mb-1">- Bagi dosen dan Karyawan Kartu Anggota berlaku selama 1 tahun, bila diperlukan dapat di diperpanjang kembali.</p>
                        <p class="">- Setiap Anggota dapat meminjam buku sebanyak 2 exemplar, dengan masa pinjam selama 7 hari.</p>

                        <p class="font-weight-bold">II. Non anggota, terdiri dari :</p>
                        <p class="text-justify">
                            1. Mahasiswa dari luar UNAS.</br>
                            2. Dosen dari luar UNAS.</br>
                        </p>
                        <p>Pengguna Perpustakaan Non-angota, diwajibkan membawa surat pengantar dari:</p>
                        <p class="mb-1">- Bidang Kemahasiswaan Institusi Pendidikan tempat Mahasiswa kuliah.</p>
                        <p>- Purek/Puket/Pudir bidang Akademik Institusi Pendidikan tempat Dosen mengajar.</p>
                        <p class="text-justify">
                            Pengguna Perpustakaan Non Anggota, hanya dapat meminjam koleksi untuk di baca di dalam perpustakaan. 
                            Apabila berminat, dapat memesan fotocopy melalui petugas.
                        </p>
                    <?php
                        }
                    ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include('./home-footer.php'); ?>
</body>
</html>