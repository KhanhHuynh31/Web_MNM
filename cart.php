<?php
include 'inc/header.php';
?>
<?php
if (isset($_GET['cartid'])) {
    $cartid = $_GET['cartid'];
    $delcart = $ct->del_product_cart($cartid);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $cartId = $_POST['cartId'];
    $quantity = $_POST['quantity'];
    $update_quantity_cart = $ct->update_quantity_cart($quantity, $cartId);
    if ($quantity <= 0) {
        $delcart = $ct->del_product_cart($cartId);
    }
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
                    <div class="col-md-12 mb-0"><a href="index.php">Trang chủ</a> <span class="mx-2 mb-0">/</span>
                        <strong class="text-black">Giỏ hàng</strong>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section">
            <div class="container">
                <div class="row mb-5">

                    <div class="site-blocks-table">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Hình ảnh</th>
                                    <th class="product-name">Tên sản phẩm</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-total">Đơn giá</th>
                                    <th class="product-remove">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $get_product_cart = $ct->get_product_cart();
                                if ($get_product_cart) {
                                    $subtotal = 0;
                                    $qty = 0;
                                    while ($result = $get_product_cart->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <form action="" method="post">
                                                <input type="hidden" name="cartId" value="<?php echo $result['cartId'] ?>" />
                                                <td class="product-thumbnail">
                                                    <img src="images/<?php echo $result['image'] ?>" alt="Image" class="img-fluid">
                                                </td>
                                                <td class="product-name">
                                                    <h2 class="h5 text-black"><?php echo $result['productName'] ?></h2>

                                                </td>
                                                <td>
                                                    <center>
                                                        <div class="input-group mb-3" style="max-width: 120px;">
                                                            <div class="input-group-prepend">
                                                                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                                            </div>
                                                            <input type="text" class="form-control text-center" name="quantity" value="<?php echo $result['quantity'] ?>" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                                            </div>
                                                            <input type="submit" name="update" value="Cập nhật" class="btn btn-primary btn-sm btn-block"></input>
                                                        </div>

                                                    </center>
                                                </td>
                                                <td><?php
                                                            $total = $result['price'] * $result['quantity'];
                                                            echo $fm->format_currency($total) . " " . "VNĐ";
                                                            ?></td>
                                                </td>
                                                <td><a class="btn btn-primary btn-sm" href="?cartid=<?php echo $result['cartId'] ?>">X</a></td>
                                            </form>
                                        </tr>
                                <?php
                                        $subtotal += $total;
                                        $qty = $qty + $result['quantity'];
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="row mb-5">
                            <div class="col-md-6 mb-3 mb-md-0">

                            </div>
                            <div class="col-md-6">
                                <a href="index.php" class="btn btn-outline-primary btn-sm btn-block">Tiếp tục xem sản
                                    phẩm</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pl-5">
                        <div class="row justify-content-end">
                            <div class="col-md-7">
                                <?php
                                $check_cart = $ct->check_cart();
                                if ($check_cart) {
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12 text-right border-bottom mb-5">
                                            <h3 class="text-black h4 text-uppercase">Đơn hàng</h3>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col-md-6">
                                            <span class="text-black">Tổng tiền</span>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <strong class="text-black"><?php
                                                                            echo $fm->format_currency($subtotal) . " " . "VNĐ";
                                                                            Session::set('sum', $subtotal);
                                                                            Session::set('qty', $qty);
                                                                            ?></strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
                                                if (Session::get('customer_id') == true && $check_cart) {
                                                    ?>
                                                <a href="checkout.php" class="btn btn-primary btn-lg py-3 btn-block">Tiến hành
                                                    mua hàng</a>
                                            <?php
                                                } else {
                                                    ?>
                                                <a href="account.php">Vui lòng đăng nhập
                                                    để mua hàng</a>
                                            <?php
                                                }
                                                ?>
                                        </div>
                                    </div>
                                <?php
                                } else {
                                    echo 'Bạn chưa có hàng trong giỏ hàng!';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>

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