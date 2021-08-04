<?php
include 'lib/session.php';
Session::init();
?>

<?php
include 'lib/database.php';
include 'helpers/format.php';

spl_autoload_register(function ($class) {
    include_once "classes/" . $class . ".php";
});

$db = new Database();
$fm = new Format();
$ct = new cart();
$br = new brand();
$cat = new category();
$cs = new customer();
$product = new product();
?>
<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>

<head>
    <title>Shop Giày Xinh</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">



    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

</head>

<body>

    <div class="site-wrap">
        <header class="site-navbar" role="banner">
            <div class="site-navbar-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                            <form action="shop.php?timkiem=<?php echo $_GET['tukhoa'] ?>" method="get" class="site-block-top-search">
                                <span class="icon icon-search2"></span>
                                <input type="text" name="tukhoa" class="form-control border-0" placeholder="Tìm kiếm">
                            </form>
                        </div>

                        <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                            <div class="site-logo">
                                <a href="index.php" class="js-logo-clone">Shop Bán giày</a>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                            <div class="site-top-icons">
                                <ul>
                                    <li>
                                        <?php
                                        if (Session::get('customer_login') == true) {
                                            ?>
                                            <a href="user.php">
                                            <?php
                                            } else {
                                                ?>
                                                <a href="account.php">
                                                <?php
                                                }
                                                ?>

                                                <?php
                                                echo Session::get('customer_name');
                                                ?>
                                                <span class="icon icon-person"></span></a>
                                    </li>
                                    <li>
                                        <a href="cart.php" class="site-cart">
                                            <span class="icon icon-shopping_cart"></span>
                                            <?php
                                            $check_cart = $ct->check_cart();
                                            if ($check_cart) {
                                                ?>
                                                <span class="count"><?php echo Session::get("qty") ?></span>
                                            <?php
                                            }
                                            ?>

                                        </a>
                                    </li>
                                    <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <nav class="site-navigation text-right text-md-center" role="navigation">
                <div class="container">
                    <ul class="site-menu js-clone-nav d-none d-md-block">
                        <li><a href="index.php">TRANG CHỦ</a></li>
                        <li><a href="shop.php">SẢN PHẨM</a></li>
                        <li><a href="about.php">GIỚI THIỆU</a></li>
                        <li><a href="contact.php">LIÊN HỆ</a></li>
                    </ul>
                </div>
            </nav>
        </header>