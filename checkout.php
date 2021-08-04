<?php
include 'inc/header.php';
?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $id = Session::get('customer_id');
    $total_price = Session::get('sum');
    $insertOrder = $ct->insertOrder($id, $total_price, $_POST);
    $insertOrderDetails = $ct->insertOrderDetails();
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
                    <div class="col-md-12 mb-0"><a href="index.php">Trang chủ</a> <span class="mx-2 mb-0">/</span> <a href="cart.php">Giỏ hàng</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Kiểm tra</strong></div>
                </div>
            </div>
        </div>

        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mb-5 mb-md-0">
                        <h2 class="h3 mb-3 text-black">Chi tiết thanh toán</h2>
                        <div class="p-3 p-lg-5 border">
                            <?php
                            $id = Session::get('customer_id');
                            $get_customers = $cs->show_customers($id);
                            if ($get_customers) {
                                while ($result = $get_customers->fetch_assoc()) {

                                    ?>
                                    <form method="post">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="c_companyname" class="text-black">Tên người nhận<span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control" id="c_companyname" name="c_companyname" value="<?php echo $result['name'] ?>" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="c_address" class="text-black">Địa chỉ<span class="text-danger">*</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="address" class="form-control" placeholder="Địa chỉ người nhận" value="<?php echo $result['address'] ?>" required>
                                        </div>
                                        <div class="form-group row mb-5">
                                            <div class="col-md-6">
                                                <label for="c_phone" class="text-black">Số điện thọai <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="c_phone" name="phone" placeholder="Số điện thoại người nhận" value="<?php echo $result['phone'] ?>" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="c_order_notes" class="text-black">Ghi chú đơn hàng</label>
                                            <input type="text" class="form-control" id="c_order_notes" name="note" placeholder="Ghi chú" value="">
                                        </div>

                                <?php
                                    }
                                }
                                ?>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="row mb-5">
                            <div class="col-md-12">
                                <h2 class="h3 mb-3 text-black">Đơn hàng của bạn</h2>
                                <div class="p-3 p-lg-5 border">
                                    <table class="table site-block-order-table mb-5">
                                        <thead>
                                            <th>Sản phẩm</th>
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
                                                        <td><?php echo $result['productName'] ?><label class="mx-2">x</label> <?php echo $result['quantity'] ?></td>
                                                        <td><?php
                                                                    $total = $result['price'] * $result['quantity'];
                                                                    echo $fm->format_currency($total) . " " . "VNĐ"
                                                                    ?></td>
                                                    </tr>
                                            <?php
                                                    $subtotal += $total;
                                                }
                                            }
                                            ?>
                                            <tr>
                                                <td class="text-black font-weight-bold">Tổng tiền</td>
                                                <td class="text-black font-weight-bold"><strong>
                                                        <?php
                                                        echo $fm->format_currency($subtotal) . " " . "VNĐ";
                                                        ?></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>


                                    <div class="border p-3 mb-3">
                                        <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Thanh toán khi nhận hàng</a></h3>

                                        <div class="collapse" id="collapsecheque">
                                            <div class="py-2">
                                                <p class="mb-0">Thực hiện thanh toán của bạn trực tiếp vào tài khoản
                                                    ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn đặt hàng của bạn
                                                    làm tham chiếu thanh toán. Đơn đặt hàng của bạn sẽ không được giao
                                                    cho đến khi tiền hết trong tài khoản của chúng tôi.</p>
                                            </div>
                                        </div>
                                    </div>


                                    <input type="submit" name="submit" class="btn btn-primary btn-lg py-3 btn-block submit" value="Đặt Hàng"></input>
                                    </form>
                                    <?php
                                    if (isset($insertOrder) && isset($insertOrderDetails) && $insertOrder == "Thêm đơn thành công" && $insertOrderDetails == "Thêm chi tiết đơn thành công") {
                                        $dell_cart = $ct->del_all_data_cart();
                                        echo '<script type="text/javascript">
                                            window.location = "thankyou.php";                                            
                                        </script>';
                                    } else if (isset($insertOrder)) {
                                        echo '<script type="text/javascript">
                                            window.alert("' . $insertOrder . '");
                                        </script>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- </form> -->
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