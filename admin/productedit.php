<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/brand.php'; ?>
<?php include '../classes/category.php'; ?>
<?php include '../classes/product.php'; ?>
<?php
$pd = new product();
if (!isset($_GET['productid']) || $_GET['productid'] == NULL) {
    echo "<script>window.location ='productlist.php'</script>";
} else {
    $id = $_GET['productid'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    $updateProduct = $pd->update_product($_POST, $_FILES, $id);
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
                                <h2>Sửa sản phẩm</h2>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Sửa sản phẩm</li>
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

                                    if (isset($updateProduct)) {
                                        echo $updateProduct;
                                    }

                                    ?>
                                    <?php
                                    $get_product_by_id = $pd->getproductbyId($id);
                                    if ($get_product_by_id) {
                                        while ($result_product = $get_product_by_id->fetch_assoc()) {
                                            ?>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <table class="form">

                                                    <tr>
                                                        <td>
                                                            <label>Name</label>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="text" name="productName" value="<?php echo  $result_product['productName'] ?>" class="medium" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>Category</label>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" id="select" name="category">
                                                                <option>--------Select Category--------</option>
                                                                <?php
                                                                        $cat = new category();
                                                                        $catlist = $cat->show_category();

                                                                        if ($catlist) {
                                                                            while ($result = $catlist->fetch_assoc()) {
                                                                                ?>


                                                                        <option <?php
                                                                                                if ($result['catId'] == $result_product['catId']) {
                                                                                                    echo 'selected';
                                                                                                }
                                                                                                ?> value="<?php echo $result['catId'] ?>">
                                                                            <?php echo $result['catName'] ?></option>



                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>Brand</label>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" id="select" name="brand">
                                                                <option>--------Select Brand-------</option>

                                                                <?php
                                                                        $brand = new brand();
                                                                        $brandlist = $brand->show_brand();

                                                                        if ($brandlist) {
                                                                            while ($result = $brandlist->fetch_assoc()) {
                                                                                ?>

                                                                        <option <?php
                                                                                                if ($result['brandId'] == $result_product['brandId']) {
                                                                                                    echo 'selected';
                                                                                                }
                                                                                                ?> value="<?php echo $result['brandId'] ?>">
                                                                            <?php echo $result['brandName'] ?></option>

                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>

                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="vertical-align: top; padding-top: 9px;">
                                                            <label>Description</label>
                                                        </td>
                                                        <td>
                                                            <textarea name="product_desc" class="tinymce" value="<?php echo $result_product['product_desc'] ?>"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>Price</label>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="text" value="<?php echo $result_product['price'] ?>" name="price" class="medium" />
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <label>Upload Image</label>
                                                        </td>
                                                        <td>
                                                            <img src="uploads/<?php echo $result_product['image'] ?>" width="90"><br>
                                                            <input class="form-control" type="file" name="image" />
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <label>Product Type</label>
                                                        </td>
                                                        <td>
                                                            <select id="select" name="type" class="form-control">
                                                                <option>Select Type</option>
                                                                <?php
                                                                        if ($result_product['type'] == 0) {
                                                                            ?>
                                                                    <option selected value="0">Featured</option>
                                                                    <option value="1">Non-Featured</option>
                                                                <?php
                                                                        } else {
                                                                            ?>
                                                                    <option value="0">Featured</option>
                                                                    <option selected value="1">Non-Featured</option>
                                                                <?php
                                                                        }
                                                                        ?>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <input class="btn btn-primary" type="submit" name="submit" value="Update" />
                                                        </td>
                                                    </tr>
                                                </table>
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
    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
    <!-- jquery vendor -->
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
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