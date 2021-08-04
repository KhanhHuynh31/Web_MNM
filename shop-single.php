<?php
include 'inc/header.php';
?>
<?php

if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
    echo "<script>window.location ='index.php'</script>";
} else {
    $id = $_GET['proid'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    $quantity = $_POST['quantity'];
    $insertCart = $ct->add_to_cart($quantity, $id);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="site-wrap">

        <div class="bg-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-0"><a href="index.html">Trang chủ</a> <span class="mx-2 mb-0">/</span>
                        <strong class="text-black">Chi tiết sản phẩm</strong>
                    </div>
                </div>
            </div>
        </div>

        <form action="" method="post">
            <div class="site-section">
                <div class="container">
                    <div class="row">
                        <?php
                        $get_product_details = $product->get_details($id);
                        if ($get_product_details) {
                            while ($result = $get_product_details->fetch_assoc()) {
                                ?>
                                <div class="col-md-6">
                                    <img src="images/<?php echo $result['image'] ?>" alt="Image" class="img-fluid">
                                </div>
                                <div class="col-md-6">
                                    <h2 class="text-black" name="tenhang"><?php echo $result['productName'] ?></h2>
                                    <p class="mb-4"><?php echo $result['product_desc'] ?></p>
                                    <p name="gia"><strong class="text-primary h4">Giá: <?php echo $fm->format_currency($result['price']) . " " . "VNĐ" ?></strong>
                                    </p>
                                    
                                    <div class="mb-5">
                                    <h6>Số lượng:</h6>
                                        <div class="input-group mb-3" style="max-width: 120px;">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                            </div>
                                            <input type="text" name="quantity" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                            </div>
                                        </div>

                                    </div>
                            <?php
                                }
                            }
                            ?>
                            <input type="submit" name="submit" value="Thêm vào giỏ" class="buy-now btn btn-sm btn-primary"></input>

                                </div>
                    </div>
                </div>
            </div>
        </form>
        <?php
        include 'inc/footer.php';
        ?>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

</body>

</html>