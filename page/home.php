<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>UNAS | HOMPAGE</title>
    <link rel="shortcut icon" href="../assets/image/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../assets/image/favicon.ico" type="image/x-icon">
    <?php include('head.php'); ?>
</head>
<body>
    <?php include('top-home-nav.php'); ?>
    <div class="header">
        <div class="header-image">
            <img class="image" src="../assets/image/header-image.jpg" alt="">
            <div class="top-home-text">
                <h1>Perpustakaan Universitas Nasional<br>Pionir Perubahan</h1>
            </div>
        </div>
    </div>
    <div class="home-content p-0">
        <section class="mt-5 mb-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>New Releases</h2>
                        <hr>
                    </div>
                    
                    <?php
                        include('../api/config.php');

                        $query = mysqli_query($conn,"SELECT * FROM buku order by tgl_input LIMIT 0,4");
                        while($row = mysqli_fetch_array($query)) {
                    ?>
                    <div class="col-sm-3">
                        <div class="card text-left">
                            <img class="card-img-top" src="../assets/image/upload/buku/<?= $row['gambar']; ?>" alt="Image" style="height: 250px;">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold text-truncate"><?= $row['judul']; ?></h5>
                                <p class="card-text"><?= $row['th_terbit']; ?></p>
                                <a href="./detail-buku.php?buku=<?= $row['id_buku']; ?>" class="btn btn-primary w-100">View Detail</a>
                            </div>
                        </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </section>
        <section class="mt-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>About Library</h2>
                        <hr>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>History</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-title">History of Universitas Nasional library.</p>
                                <a class="btn btn-primary" href="./home-about.php?id=history">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>Employee</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-title">Duties of library employees.</p>
                                <a class="btn btn-primary" href="./home-about.php?id=employee">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>User</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-title">Rights and Obligations as a user.</p>
                                <a class="btn btn-primary" href="./home-abou.phpt?id=user">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mt-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Service Information</h2>
                        <hr>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="holder">
                            <span class="title">
                                <span class="small">Read</span>
                                <h3 class="h3">Visitor Rules</h3>
                            </span>
                            <div class="holder-content">
                                <p>Each library visitor must comply with :</p>
                                <p class="info-list">Leave anything in the day care department.</p>
                                <p class="info-list">Write a guest book.</p>
                                <p class="info-list">Maintain the integrity and cleanliness of the book.</p>
                                <p class="info-list">It is forbidden to eat, drink and smoke while in the library.</p>
                                <p class="info-list">Tearing books is not permitted.</p>
                                <p class="info-list">Writing and crossing out books is prohibited.</p>
                            </div>
                        </div>                        
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="holder">
                            <span class="title">
                                <span class="small">Read</span>
                                <h3 class="h3">Order Rules</h3>
                            </span>
                            <div class="holder-content">
                                <p>Every borrower is required to :</p>
                                <p class="info-list">Check the completeness of the book, before borrowing.</p>
                                <p class="info-list">Showing member card when borrowing.</p>
                                <p class="info-list">Do not lend membership cards to others.</p>
                                <p class="info-list">It is not permitted to borrow books on behalf of others.</p>
                                <p class="info-list">Writing and crossing out books is prohibited.</p>
                                <p class="info-list">Books that have been read, leave them on the reading table.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="holder">
                            <span class="title">
                                <span class="small">Read</span>
                                <h3 class="h3">Return Rules</h3>
                            </span>
                            <div class="holder-content">
                                <p>Return rules are including :</p>
                                <p class="info-list">Returning books on time.</p>
                                <p class="info-list">Responsible for damage to the loan book.</p>
                                <p class="info-list">Immediately report the lost loan book.</p>
                                <p class="info-list">Replace lost loan books.</p>
                                <p class="info-list">Pay a late fee for returning the book.</p>
                                <p class="info-list">Can return books on behalf of another person.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- <section class="mt-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Library Service Hours</h2>
                        <hr>
                    </div>
                    <div class="col-sm-12">
                        <div class="holder">
                            <div class="holder-content">
                                <table class="table-home-information">
                                <thead>
                                    <tr>
                                        <th>Day</th>
                                        <th>Open Time</th>
                                        <th>Recess</th>
                                        <th>Close Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Monday to Thursday</td>
                                        <td>09.00</td>
                                        <td>11.30 s/d 13.00</td>
                                        <td>19.00</td>
                                    </tr>
                                    <tr>
                                        <td>Friday</td>
                                        <td>09.00</td>
                                        <td>11.30 s/d 13.00</td>
                                        <td>19.00</td>
                                    </tr>
                                    <tr>
                                        <td>Saturday</td>
                                        <td>09.00</td>
                                        <td>11.30 s/d 13.00</td>
                                        <td>15.30</td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
    </div>
    <?php include('./home-footer.php'); ?>
</body>
</html>
<?php include('foot.php'); ?>