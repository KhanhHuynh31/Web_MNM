<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/admin.php' ?>

<?php
$ad = new admin();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $insertAdmin = $ad->insert_user($_POST);
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
                                <h2>Thêm Tài khoản quản lý</h2>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Thêm admin</li>
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
                                    <?php
                                    if (isset($insertAdmin)) {
                                        echo $insertAdmin;
                                    }
                                    ?>
                                    <form action="useradd.php" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" placeholder="Tên nhân viên" class="medium" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="email" placeholder="Email" class="medium" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="phone" placeholder="Điện thoại" class="medium" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="user" placeholder="Tên đăng nhập" class="medium" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="password" placeholder="Mật khẩu" class="medium" />
                                        </div>
                                        <select class="form-control" name="level" aria-label="Default select example">
                                            <option selected>Phân quyền</option>
                                            <option value="1">Quản lý</option>
                                            <option value="2">Nhân viên</option>

                                        </select>
                                        <br>
                                        <input type="submit" class="btn btn-primary" name="submit" Value="Save" />
                                    </form>
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

</html>