<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/admin.php'; ?>

<?php
$ad = new admin();
if (isset($_GET['delid'])) {
    $id = $_GET['delid'];
    $deluser = $ad->del_user($id);
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
                                <h2>User List</h2>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Danh sách tài khoản</li>
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
                                    if (isset($deluser)) {
                                        echo $deluser;
                                    }
                                    ?>
                                    <table class="table table-striped" id="example">
                                        <thead>
                                            <tr>
                                                <th scope="col">Tên</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Điện thoại</th>
                                                <th scope="col">Tên tài khoản</th>
                                                <th scope="col">Mật khẩu</th>
                                                <th scope="col">Phân quyền</th>
                                                <th scope="col">Xử lý</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $show_user = $ad->show_all_user();
                                            if ($show_user) {

                                                while ($result = $show_user->fetch_assoc()) {

                                                    ?>
                                                    <tr class="odd gradeX">

                                                        <td><?php echo $result['adminName'] ?></td>
                                                        <td><?php echo $result['adminEmail'] ?></td>
                                                        <td><?php echo $result['adminPhone'] ?></td>
                                                        <td><?php echo $result['adminUser'] ?></td>
                                                        <td><?php echo $result['adminPass'] ?></td>
                                                        <td><?php echo $result['adminLevel'] ?></td>
                                                        <td><a href="useredit.php?userid=<?php echo $result['adminid'] ?>">Edit</a>
                                                            || <a onclick="return confirm('Are you want to delete?')" href="?delid=<?php echo $result['adminid'] ?>">Delete</a></td>
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