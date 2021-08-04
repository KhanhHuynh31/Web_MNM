<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/cart.php' ?>
<?php include_once '../helpers/format.php' ?>
<?php

if (!isset($_GET['orderid']) || $_GET['orderid'] == NULL) {
    echo "<script>window.location ='orderlist.php'</script>";
} else {
    $orderid = $_GET['orderid'];
}
$fm = new Format();
$ct = new cart();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = $_POST['order-status'];
    $updateStatus = $ct->update_order_status($orderid, $status);
}

?>
<?php  ?>

<!DOCTYPE html>
<html lang="en">

<body>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h2>Sửa Đơn hàng</h2>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Sửa đơn hàng</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <div id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="block copyblock">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <select class="form-control" name="order-status" aria-label="Default select example">
                                                <option selected>Chọn tình trạng đơn hàng</option>
                                                <option value="0">Chờ xác nhận</option>
                                                <option value="1">Đã xác nhận</option>
                                                <option value="2">Đang giao hàng</option>
                                                <option value="3">Đã thanh toán</option>
                                                <option value="4">Admin huỷ đơn</option>
                                            </select>
                                        </div>
                                        <input class="btn btn-primary" type="submit" name="submit" Value="Lưu" />

                                        <a href="orderlist.php" class="btn btn-primary">Quay lại</a>

                                    </form>
                                    <div class="chitiethoadon">
                                        <div class="card">
                                            <?php
                                            $order_by_id = $ct->get_order_by_id($orderid);
                                            if ($order_by_id) {
                                                while ($result = $order_by_id->fetch_assoc()) {
                                                    ?>
                                                    <div class="invoice p-5">
                                                        <h5>Thông tin đơn hàng<label class="trangthaidonhang">Tình trạng: <?php if ($result['order_status'] == 0) {
                                                                                                                                        echo 'Chờ xác nhận';
                                                                                                                                    } else if ($result['order_status'] == 1) {
                                                                                                                                        echo 'Đã xác nhận';
                                                                                                                                    } else if ($result['order_status'] == 2) {
                                                                                                                                        echo 'Đang giao hàng';
                                                                                                                                    } else if ($result['order_status'] == 3) {
                                                                                                                                        echo 'Đã thanh toán';
                                                                                                                                    } else if ($result['order_status'] == 4) {
                                                                                                                                        echo 'Admin huỷ đơn';
                                                                                                                                    } else {
                                                                                                                                        echo 'Khách hàng huỷ đơn';
                                                                                                                                    } ?></label> </h5>
                                                        <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                                                            <table class="table table-borderless">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="py-2"> <span class="d-block text-muted">
                                                                                    <h6>Ngày mua</h6>
                                                                                </span> <span><?php echo $result['date_order'] ?></span> </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="py-2"> <span class="d-block text-muted">
                                                                                    <h6>Mã đơn</h6>
                                                                                </span> <span><?php echo $result['order_id'] ?></span> </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="py-2"> <span class="d-block text-muted">
                                                                                    <h6>Tên người nhận</h6>
                                                                                </span> <span><?php echo $result['customer_name'] ?></span> </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="py-2"> <span class="d-block text-muted">
                                                                                    <h6>Số điện thoại</h6>
                                                                                </span> <span><?php echo $result['customer_phone'] ?></span> </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="py-2"> <span class="d-block text-muted">
                                                                                    <h6>Địa chỉ nhận hàng</h6>
                                                                                </span> <span><?php echo $result['customer_address'] ?></span> </div>
                                                                        </td>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="product border-bottom table-responsive">
                                                            <table class="table table-borderless">
                                                                <tbody>
                                                                    <?php
                                                                    $order_details_by_id = $ct->get_order_deatils($orderid);
                                                                    if ($order_details_by_id) {
                                                                        while ($result = $order_details_by_id->fetch_assoc()) {
                                                                            ?>
                                                                            <tr>
                                                                                <td width="20%"> <img src="../images/<?php echo $result['image'] ?>" width="90"> </td>
                                                                                <td width="60%"> <span class="font-weight-bold"></span>
                                                                                    <div class="product-qty"> <span class="d-block">Tên sp: <?php echo $result['quantity'] ?></span></div>
                                                                                    <div class="product-qty"> <span class="d-block">Số lượng: <?php echo $result['quantity'] ?></span></div>
                                                                                </td>
                                                                                <td width="20%">
                                                                                    <div class="text-right"> <span class="font-weight-bold"><?php echo $fm->format_currency($result['order_price']) . " " . "VNĐ"; ?></span> </div>
                                                                                </td>
                                                                            </tr>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                        <?php
                                                        $order_by_id = $ct->get_order_by_id($orderid);
                                                        if ($order_by_id) {
                                                            while ($result = $order_by_id->fetch_assoc()) {
                                                                ?>
                                                                <div class="product-qty"> <span class="d-block">Ghi chú: <?php echo $result['customer_note'] ?></span></div>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        <div class="row d-flex justify-content-end">

                                                            <div class="col-md-5">

                                                                <table class="table table-borderless">
                                                                    <tbody class="totals">

                                                                        <tr class="border-top border-bottom">
                                                                            <td>
                                                                                <div class="text-left"> <span class="font-weight-bold">Tổng tiền</span> </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="text-right"> <span class="font-weight-bold">
                                                                                        <?php
                                                                                        $order_by_id = $ct->get_order_by_id($orderid);
                                                                                        if ($order_by_id) {
                                                                                            $result = $order_by_id->fetch_assoc();
                                                                                            echo $fm->format_currency($result['total_price']) . " " . "VNĐ";
                                                                                        }
                                                                                        ?>
                                                                                    </span> </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                                                    </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /# card -->
    </div>
    <!-- /# column -->

    </div>
    <!-- /# row -->

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

    <!-- bootstrap -->



    <!-- JS Grid Scripts Start-->
    <script src="assets/js/lib/jsgrid/db.js"></script>
    <script src="assets/js/lib/jsgrid/jsgrid.core.js"></script>
    <script src="assets/js/lib/jsgrid/jsgrid.load-indicator.js"></script>
    <script src="assets/js/lib/jsgrid/jsgrid.load-strategies.js"></script>
    <script src="assets/js/lib/jsgrid/jsgrid.sort-strategies.js"></script>
    <script src="assets/js/lib/jsgrid/jsgrid.field.js"></script>
    <script src="assets/js/lib/jsgrid/fields/jsgrid.field.text.js"></script>
    <script src="assets/js/lib/jsgrid/fields/jsgrid.field.number.js"></script>
    <script src="assets/js/lib/jsgrid/fields/jsgrid.field.select.js"></script>
    <script src="assets/js/lib/jsgrid/fields/jsgrid.field.checkbox.js"></script>
    <script src="assets/js/lib/jsgrid/fields/jsgrid.field.control.js"></script>
    <script src="assets/js/lib/jsgrid/jsgrid-init.js"></script>
    <!-- JS Grid Scripts End-->

    <script src="assets/js/lib/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!-- scripit init-->

</body>