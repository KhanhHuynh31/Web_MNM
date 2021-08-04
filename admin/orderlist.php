<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/cart.php' ?>

<?php
$ct = new cart();
if (isset($_GET['delid'])) {
    $id = $_GET['delid'];
    $delorder = $ct->del_order($id);
}
?>
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
                                <h2>Order List</h2>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Danh sách thương hiệu</li>
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
                                <div class="block">
                                    <?php
                                    if (isset($delorder)) {
                                        echo $delorder;
                                    }
                                    ?>
                                    <table class="table table-striped" id="example">
                                        <thead>
                                            <tr>
                                                <th scope="col">Mã đơn</th>
                                                <th scope="col">Ngày đặt</th>
                                                <th scope="col">Tổng tiền</th>
                                                <th scope="col">Trạng thái</th>
                                                <th scope="col">Xử lý</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $show_order = $ct->show_all_order();
                                            if ($show_order) {

                                                while ($result = $show_order->fetch_assoc()) {

                                                    ?>
                                                    <tr class="odd gradeX">
                                                        <td><?php echo $result['order_id']; ?></td>
                                                        <td><?php echo $result['date_order'] ?></td>
                                                        <td><?php echo $result['total_price'] ?></td>
                                                        <td><?php
                                                                    if ($result['order_status'] == 0) {
                                                                        echo 'Chờ xác nhận';
                                                                    } else if ($result['order_status'] == 1) {
                                                                        echo 'Đã xác nhận';
                                                                    } else if ($result['order_status'] == 2) {
                                                                        echo 'Đang giao hàng';
                                                                    } else if ($result['order_status'] == 3) {
                                                                        echo 'Đã thanh toán';
                                                                    } else if ($result['order_status'] == 5) {
                                                                        echo 'Khách hàng huỷ đơn';
                                                                    } else {
                                                                        echo 'Đã huỷ';
                                                                    }

                                                                    ?></td>
                                                        <td><a href="orderdetails.php?orderid=<?php echo $result['order_id'] ?>">Xem</a>
                                                            <!--|| <a onclick="return confirm('Are you want to delete?')" href="?delid=<?php echo $result['order_id'] ?>">Huỷ</a></td>-->
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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