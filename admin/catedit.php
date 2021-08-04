<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/category.php' ?>
<?php

if (!isset($_GET['catid']) || $_GET['catid'] == NULL) {
    echo "<script>window.location ='catlist.php'</script>";
} else {
    $id = $_GET['catid'];
}
$cat = new category();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $catName = $_POST['catName'];
    $updateCat = $cat->update_category($catName, $id);
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
                                <h2>Sửa danh mục</h2>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Sửa danh mục</li>
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
            if (isset($updateCat)) {
                echo $updateCat;
            }
            ?>
                                    <?php
            $get_cate_name = $cat->getcatbyId($id);
            if ($get_cate_name) {
                while ($result = $get_cate_name->fetch_assoc()) {

            ?>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <input class="form-control" type="text"
                                                value="<?php echo $result['catName'] ?>" name="catName"
                                                placeholder="Sửa danh mục sản phẩm..." class="medium" />
                                        </div>
                                        <input class="btn btn-primary" type="submit" name="submit" Value="Update" />
                                    </form>

                                    <?php
                }
            }


            ?>

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
    <!-- Load TinyMCE -->
    <script src="js1/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
    </script>
    <!-- Load TinyMCE -->
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
