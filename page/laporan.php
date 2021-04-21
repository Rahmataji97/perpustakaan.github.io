<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LIBRARY | REPORT</title>
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
                                    <span class="small">Data</span>
                                    <h3 class="h3">Report</h3>
                                </span>
                                <form action="../print/cetak-laporan.php" method="POST" target="_blank">
                                <div class="holder-content">
                                    <div class="form-row">
                                        <div class="form-group col-sm-6">
                                            <label for="">Form Date</label>
                                            <input class="form-control datepicker" type="text" name="tgl_awal" required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="">To Date</label>
                                            <input class="form-control datepicker" type="text" name="tgl_akhir" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Report Type</label>
                                        <select class="form-control" name="jenis" required>
                                            <option value="">Type</option>
                                            <option value="Peminjaman">Ordered Book</option>
                                            <option value="Pengembalian">Returned Book</option>
                                        <select>
                                    </div>
                                </div>
                                <span class="footer">
                                    <button class="btn btn-primary w-100" type="submit"><i class="print icon"></i>Print Report</button>
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