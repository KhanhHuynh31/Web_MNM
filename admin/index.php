<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/analysis.php'; ?>
<?php include_once '../helpers/format.php'; ?>

<?php
$aly = new analysis;
$fm = new Format();
?>
<?php
if (isset($_GET['month'])) {
    $month = $_GET['month'];
} else {
    $month = date("m");
}
?>
<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Web Giày</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="assets/images/favicon.png">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/lib/weather-icons.css" rel="stylesheet" />
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart'],
            'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
        });
        google.charts.setOnLoadCallback(drawRegionsMap);

        function drawRegionsMap() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Doanh Thu'],
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                    $start_date = $_POST['startdate'];
                    $end_date = $_POST['enddate'];
                    $chart = $aly->line_chart($start_date, $end_date);
                } else {
                    $chart = $aly->line_chart_7();
                }

                while ($row = mysqli_fetch_assoc($chart)) {

                    echo "['" . $row['date_order'] . "'," . $row['total_price'] . "],";
                }
                ?>
            ]);

            var options = {};

            var chart = new google.visualization.LineChart(document.getElementById('regions_div'));

            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript">
        $("#month").change(function() {
            alert(this.options[this.selectedIndex].id);
        })
    </script>

</head>

<body>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Trang chủ</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">

                    <div class="row">
                        <?php
                        if (Session::get('adminlevel') == 0) {
                            ?>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-money color-success border-success"></i>
                                        </div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Tổng doanh thu
                                                <select name="month" onchange="location = this.value; selected = 'index.php?month=07'" aria-label="Default select example">
                                                    <option <?php if ($month == '01') echo 'selected' ?> value="index.php?month=01">Tháng 1</option>
                                                    <option <?php if ($month == '02') echo 'selected' ?> value="index.php?month=02">Tháng 2</option>
                                                    <option <?php if ($month == '03') echo 'selected' ?> value="index.php?month=03">Tháng 3</option>
                                                    <option <?php if ($month == '04') echo 'selected' ?> value="index.php?month=04">Tháng 4</option>
                                                    <option <?php if ($month == '05') echo 'selected' ?> value="index.php?month=05">Tháng 5</option>
                                                    <option <?php if ($month == '06') echo 'selected' ?> value="index.php?month=06">Tháng 6</option>
                                                    <option <?php if ($month == '07') echo 'selected' ?> value="index.php?month=07">Tháng 7</option>
                                                    <option <?php if ($month == '08') echo 'selected' ?> value="index.php?month=08">Tháng 8</option>
                                                    <option <?php if ($month == '09') echo 'selected' ?> value="index.php?month=09">Tháng 9</option>
                                                    <option <?php if ($month == '10') echo 'selected' ?> value="index.php?month=10">Tháng 10</option>
                                                    <option <?php if ($month == '11') echo 'selected' ?> value="index.php?month=11">Tháng 11</option>
                                                    <option <?php if ($month == '12') echo 'selected' ?> value="index.php?month=12">Tháng 12</option>
                                                </select></div>
                                            <?php
                                                $show_total_price = $aly->get_total_price_order_by_month($month);
                                                if ($show_total_price) {
                                                    while ($result = $show_total_price->fetch_assoc()) {
                                                        ?>
                                                    <div class="stat-digit"><?php echo $fm->format_currency($result['total']) . " " . "VNĐ"; ?></div>
                                            <?php
                                                    }
                                                }
                                                ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-user color-primary border-primary"></i>
                                        </div>
                                        <div class="stat-content dib">

                                            <div class="stat-text">Khách hàng</div>
                                            <?php
                                                $show_total_customer = $aly->get_total_customer();
                                                if ($show_total_customer) {
                                                    while ($result = $show_total_customer->fetch_assoc()) {
                                                        ?>
                                                    <div class="stat-digit"><?php echo $result['total'] ?></div>
                                            <?php
                                                    }
                                                }
                                                ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-layout-grid2 color-pink border-pink"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Hoá đơn mới</div>
                                        <?php
                                        $show_total_status = $aly->get_total_status_order();
                                        if ($show_total_status) {
                                            while ($result = $show_total_status->fetch_assoc()) {
                                                ?>
                                                <div class="stat-digit"><?php echo $result['total'] ?></div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </section>
                <?php
                if (Session::get('adminlevel') == 0) {
                    ?>
                    <div class="row">
                        <div class="col-lg-8 p-r-0 title-margin-right">
                            <div class="page-header">
                                <div class="page-title">
                                    <h1>Thống kê doanh thu</h1>
                                </div>
                                <form method="post">
                                    Từ ngày <input type="datetime-local" name="startdate"> đến ngày <input type="datetime-local" name="enddate"> <input type="submit" name="submit" value="Lọc">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="regions_div" style="width: auto; height: 500px;"></div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    </div>


    <!-- jquery vendor -->
    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <script src="assets/js/lib/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!-- bootstrap -->

    <script src="assets/js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="assets/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="assets/js/lib/calendar-2/pignose.init.js"></script>


    <script src="assets/js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/lib/weather/weather-init.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="assets/js/lib/chartist/chartist.min.js"></script>
    <script src="assets/js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="assets/js/lib/sparklinechart/sparkline.init.js"></script>
    <script src="assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <!-- scripit init-->
    <script src="assets/js/dashboard2.js"></script>
</body>

</html>