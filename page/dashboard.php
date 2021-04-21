<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no,shrink-to-fit=no">
    <title>LIBRARY | DASHBOARD</title>
    <?php include('head.php'); ?>
</head>
<body>
    <div class="app-wrapper">
        <?php include('nav.php'); ?>
        <div class="app-main">
            <?php include('top-nav.php'); ?>
            <div class="app-content">
                <div class="app-content-inner">
                    <section class="title">
                        <h3>Monitoring Dashboard</h3>
                        <span class="title-description">
                            <p class="smal">Live monitoring of your current activities.</p>
                        </span>
                    </section>
                    <div class="row mt-5 mb-5">
                        <div class="col-sm-4">
                            <div class="card-info">
                                <span class="title title-bg-blue">
                                    <span class="title-icon"><i class="user icon"></i></span>
                                    <span class="title-text">
                                        <span class="small">TOTAL</span>
                                        <h3>MEMBER</h3>
                                    </span>
                                </span>
                                <span class="card-info-body body-bg-blue">
                                    <?php
                                        include('../api/config.php');
                                        $query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM anggota");
                                        while($data = mysqli_fetch_array($query)) {
                                    ?>
                                    <h3><?= $data['total']; ?></h3>
                                    <?php } ?>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card-info">
                                <span class="title title-bg-red">
                                    <span class="title-icon"><i class="user icon"></i></span>
                                    <span class="title-text">
                                        <span class="small">TOTAL</span>
                                        <h3>BOOK</h3>
                                    </span>
                                </span>
                                <span class="card-info-body body-bg-red">
                                    <?php
                                        include('../api/config.php');
                                        $query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM buku");
                                        while($data = mysqli_fetch_array($query)) {
                                    ?>
                                    <h3><?= $data['total']; ?></h3>
                                    <?php } ?>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card-info">
                                <span class="title title-bg-green">
                                    <span class="title-icon"><i class="user icon"></i></span>
                                    <span class="title-text">
                                        <span class="small">TOTAL</span>
                                        <h3>TRANSACTION</h3>
                                    </span>
                                </span>
                                <span class="card-info-body body-bg-green">
                                    <?php
                                        include('../api/config.php');
                                        $query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM transaksi");
                                        while($data = mysqli_fetch_array($query)) {
                                    ?>
                                    <h3><?= $data['total']; ?></h3>
                                    <?php } ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="holder">
                                <span class="title">
                                    <span class="small">Graph</span>
                                    <h3>Ordered Book</h3>
                                </span>
                                <div class="holder-content">
                                    <canvas id="orderChart" style="height:75vh; width:100vw;"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="holder">
                                <span class="title">
                                    <span class="small">Graph</span>
                                    <h3>Returned Book</h3>
                                </span>
                                <div class="holder-content">
                                    <canvas id="returnChart" style="height:75vh; width:100vw;"></canvas>
                                </div>
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
<script>
$(document).ready(function() {
    // AJAX ORDER BOOK
    $.ajax({
        url: "../api/graph-order.php",
        method: "POST",
        success: function(data) {
            var tgl  = [];
            var trans = [];
            var coloR = [];

            var dynamicColors = function() {
                var r = Math.floor(Math.random() * 255);
                var g = Math.floor(Math.random() * 255);
                var b = Math.floor(Math.random() * 255);
                return "rgba(" + r + "," + g + "," + b + ", 0.75)";
            };

            for (var i in data) {
                tgl.push(data[i].tgl_pinjam);
                trans.push(data[i].total);
                coloR.push(dynamicColors());
            }
            var chartData = {
                labels: tgl,
                datasets: [{
                    label: 'Total',
                    backgroundColor: coloR,
                    borderColor: 'rgba(200, 200, 200, 0.75)',
                    hoverBorderColor: 'rgba(200, 200, 200, 1)',
                    data: trans
                }]
            };

            var ctx = $("#orderChart");
            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartData,
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                min: 0
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.4
                        }]
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.yLabel;
                            }
                        }
                    }
                }
            })
        },
        error: function(data) {
            console.log(data);
        },
    });

    // AJAX RETURN BOOK
    $.ajax({
        url: "../api/graph-return.php",
        method: "POST",
        success: function(data) {
            var tgl  = [];
            var trans = [];
            var coloR = [];

            var dynamicColors = function() {
                var r = Math.floor(Math.random() * 255);
                var g = Math.floor(Math.random() * 255);
                var b = Math.floor(Math.random() * 255);
                return "rgba(" + r + "," + g + "," + b + ", 0.75)";
            };

            for (var i in data) {
                tgl.push(data[i].tgl_kembali);
                trans.push(data[i].total);
                coloR.push(dynamicColors());
            }
            var chartData = {
                labels: tgl,
                datasets: [{
                    label: 'Total',
                    backgroundColor: coloR,
                    borderColor: 'rgba(200, 200, 200, 0.75)',
                    hoverBorderColor: 'rgba(200, 200, 200, 1)',
                    data: trans
                }]
            };

            var ctx = $("#returnChart");
            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartData,
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                min: 0
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.4
                        }]
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.yLabel;
                            }
                        }
                    }
                }
            })
        },
        error: function(data) {
            console.log(data);
        },
    });
});
</script>