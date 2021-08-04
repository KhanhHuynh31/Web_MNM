<?php
include 'inc/header.php';
?>
<?php
if (!isset($_GET['orderid']) || $_GET['orderid'] == NULL) {
    $orderid = 0;
} else {
    $orderid = $_GET['orderid'];
}
$id = Session::get('customer_id');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {

    $UpdateCustomers = $cs->update_customers($_POST, $id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete-order'])) {

    $Delete_order = $cs->delete_order($orderid);
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['uname']);
    header('location:account.php');
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
                        <strong class="text-black">Thông tin cá nhân</strong>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="container light-style flex-grow-1 container-p-y">

            <div class="card overflow-hidden">
                <div class="row no-gutters row-bordered row-border-light">
                    <div class="col-md-3 pt-0">
                        <div class="list-group list-group-flush account-settings-links">
                            <a class="list-group-item list-group-item-action active" data-toggle="tab" href="#account-general">Thông tin cá nhân</a>
                            <a class="list-group-item list-group-item-action" data-toggle="tab" href="#account-change-password">Đổi mật khẩu</a>
                            <a class="list-group-item list-group-item-action" data-toggle="tab" href="#account-info">Hoá đơn của tôi</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="account-general">


                                <hr class="border-light m-0">

                                <div class="col-md-9 personal-info">
                                    <?php
                                    if (isset($UpdateCustomers)) {
                                        ?>
                                        <div class="alert alert-info alert-dismissable">
                                            <a class="panel-close close" data-dismiss="alert">×</a>
                                            <i class="fa fa-coffee"></i>
                                            <strong>thông báo: </strong><?php echo $UpdateCustomers ?>.
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <h3>Thông tin cá nhân<span class="dangxuat"><a href="user.php?logout">Đăng xuất</a></span></h3>
                                    <?php

                                    $get_customers = $cs->show_customers($id);
                                    if ($get_customers) {
                                        while ($result = $get_customers->fetch_assoc()) {

                                            ?>
                                            <form class="form-horizontal" role="form" method="post">
                                                <div class="form-group">
                                                    <label class="col-lg-3 control-label">Tên:</label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" type="text" name="name" value="<?php echo $result['name'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-3 control-label">Email:</label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" type="text" name="email" value="<?php echo $result['email'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Số điện thoại:</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control" type="number" name="phone" value="<?php echo $result['phone'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Địa chỉ:</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control" type="text" name="address" value="<?php echo $result['address'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"></label>
                                                    <div class="col-md-8">
                                                        <input type="submit" name="save" class="btn btn-primary" value="Lưu thay đổi">
                                                    </div>
                                                </div>
                                            </form>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="account-change-password">
                                <div class="card-body pb-2">
                                    <div class="rgresult"></div>
                                    <form action="" method="post">
                                        <input type="hidden" class="id_customer" name="id_customer" value="<?php echo $id ?>">
                                        <div class="form-group">
                                            <label class="form-label">Mật khẩu hiện tại</label>
                                            <input type="password" name="crpass" class="form-control crpass">
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Mật khẩu mới</label>
                                            <input type="password" name="newpass" class="form-control newpass">
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Nhập lại mật khẩu</label>
                                            <input type="password" name="repass" class="form-control repass">
                                        </div>
                                        <div class="col-md-8">
                                            <input type="submit" name="changepass" class="btn btn-primary updatepass" value="Lưu thay đổi">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-info">
                                <div class="card-body pb-2">

                                    <div class="form-group">
                                        <label class="form-label">
                                            <h5>Danh sách đơn đã mua</h5>
                                        </label>

                                        <div class="tableFixHead">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Mã Đơn</th>
                                                        <th>Ngày đặt</th>
                                                        <th>Tổng tiền</th>
                                                        <th>Trạng thái</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $order_all = $ct->get_order_by_customer($id);
                                                    if ($order_all) {
                                                        while ($result = $order_all->fetch_assoc()) {
                                                            ?>
                                                            <tr onclick="window.location='user.php?orderid=<?php echo $result['order_id'] ?>';">
                                                                <td><?php echo $result['order_id'] ?></td>
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
                                                                            } else {
                                                                                echo 'Đã huỷ';
                                                                            }

                                                                            ?></td>
                                                            </tr>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <?php
                                    if ($orderid !== 0) {
                                        ?>
                                        <div class="chitiethoadon">
                                            <div class="card">
                                                <?php
                                                    $order_by_id = $ct->get_order_by_id($orderid);
                                                    if ($order_by_id) {
                                                        while ($result = $order_by_id->fetch_assoc()) {
                                                            ?>
                                                        <div class="invoice p-5">
                                                            <h5>Thông tin đơn hàng<label class="trangthaidonhang">Tình trạng:

                                                                    <?php
                                                                                if ($result['order_status'] == 0) {
                                                                                    echo 'Chờ xác nhận';
                                                                                } else if ($result['order_status'] == 1) {
                                                                                    echo 'Đã xác nhận';
                                                                                } else if ($result['order_status'] == 2) {
                                                                                    echo 'Đang giao hàng';
                                                                                } else if ($result['order_status'] == 3) {
                                                                                    echo 'Đã thanh toán';
                                                                                } else {
                                                                                    echo 'Đã huỷ';
                                                                                }

                                                                                ?>
                                                                </label> </h5>
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
                                                                                    <td width="20%"> <img src="images/<?php echo $result['image'] ?>" width="90"> </td>
                                                                                    <td width="60%"> <span class="font-weight-bold"></span>
                                                                                        <div class="product-qty"> <span class="d-block">Tên sp: <?php echo $result['productName'] ?></span></div>
                                                                                        <div class="product-qty"> <span class="d-block">Số lượng: <?php echo $result['quantity'] ?></span> </div>
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
                                                            <p>Cảm ơn bạn đã mua hàng ở shop!</p>
                                                            <?php
                                                                $order_by_id = $ct->get_order_by_id($orderid);
                                                                if ($order_by_id) {
                                                                    while ($result = $order_by_id->fetch_assoc()) {
                                                                        if ($result['order_status'] == 0 || $result['order_status'] == 1 || $result['order_status'] == 2) {
                                                                            ?>
                                                                        <form action="" method="post">
                                                                            <div class="form-group">
                                                                            </div>
                                                                            <input class="btn btn-primary" type="submit" name="delete-order" Value="Huỷ Đơn" onClick="return confirm('Bạn có chắc muốn huỷ đơn?')" />
                                                                        </form>
                                                            <?php
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                        </div>

                                            </div>

                                        </div>
                                    <?php
                                    }
                                    ?>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('.updatepass').click(function(e) {
                    e.preventDefault();
                    var $crpass = $('.crpass').val();
                    var $newpass = $('.newpass').val();
                    var $repass = $('.repass').val();
                    var $id_customer = $('.id_customer').val();
                    $.ajax({
                        url: 'classes/ajax/ajax-pass.php',
                        type: 'post',
                        dataType: 'html',
                        data: {
                            crpass: $crpass,
                            newpass: $newpass,
                            repass: $repass,
                            id_customer: $id_customer
                        }
                    }).done(function(ketqua) {
                        if (ketqua == 1) {
                            location.replace("user.php?logout");
                        }
                        $('.rgresult').html(ketqua);
                    });

                });
            });
        </script>
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
    <script src="js/tab.js"></script>

</body>

</html>