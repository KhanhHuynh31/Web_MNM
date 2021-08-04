<?php
include '../lib/session.php';
Session::checkSession();
?>
<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
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

    <!-- BEGIN: load jquery -->
    <script type="assets/text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="assets/js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="assets/js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="assets/js/table/table.js"></script>
    <script src="assets/js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setupLeftMenu();
            setSidebarHeight();
        });
    </script>

</head>

<body>
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-right">
                        <a data-toggle="dropdown" class="header-icon" href="#">
                            <span class="user-avatar">
                                <label> Xin chào, </label>
                                <?php echo Session::get('adminName') ?>
                                <i class="ti-angle-down f-s-10"></i>
                            </span>
                        </a>
                        <div class="dropdown-content-body">
                            <ul class="dropdown-menu">
                                <li>
                                    <?php
                                    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
                                        Session::destroy();
                                        echo '<script type="text/javascript">
                                            window.location = "login.php";                                            
                                        </script>';
                                    }
                                    ?>
                                    <a href="{{URL::to('/logout')}}">
                                        <i class="ti-power-off"></i>
                                        <span><a href="?action=logout">Đăng xuất</a></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>