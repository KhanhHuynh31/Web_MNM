<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/brand.php'; ?>
<?php include '../classes/category.php'; ?>
<?php include '../classes/product.php'; ?>
<?php include_once '../helpers/format.php'; ?>
<?php
$pd = new product();
$fm = new Format();
if (isset($_GET['productid'])) {
    $id = $_GET['productid'];
    $delpro = $pd->del_product($id);
}
?>
<body> 
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                            <h2>Danh sách sản phẩm</h2>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Danh sách sản phẩm</li>
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
                                
                                    
       
        <div >
            <?php
            if (isset($delpro)) {
                echo $delpro;
            }
            ?>

            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Category</th>
                    <th scope="col">>Brand</th>
                    <th scope="col">Description</th>
                    <th scope="col">Type</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $pdlist = $pd->show_product();
                    if ($pdlist) {
                        $i = 0;
                        while ($result = $pdlist->fetch_assoc()) {
                            $i++;
                    ?>
                            <tr >
                                <td><?php echo $i ?></td>
                                <td><?php echo $result['productName'] ?></td>
                                <td><?php echo $result['price'] ?></td>
                                <td><img src="../images/<?php echo $result['image'] ?>" width="80"></td>
                                <td><?php echo $result['catName'] ?></td>
                                <td><?php echo $result['brandName'] ?></td>
                                <td><?php
                                    echo $fm->textShorten($result['product_desc'], 20);
                                    ?></td>
                                <td><?php
                                    if ($result['type'] == 0) {
                                        echo 'Feathered';
                                    } else {
                                        echo 'Non-Feathered';
                                    }

                                    ?></td>

                                <td><a href="productedit.php?productid=<?php echo $result['productId'] ?>">Edit</a> || <a href="?productid=<?php echo $result['productId'] ?>">Delete</a></td>
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
<script src="js1/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                        
                    </div>
                    <!-- /# row -->
                    <script type="text/javascript">
    $(document).ready(function() {
        setupLeftMenu();
        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
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

    <script src="assets/js/lib/bootstrap.min.js"></script><script src="assets/js/scripts.js"></script>
    <!-- scripit init-->
<!-- Load TinyMCE -->

<!-- Load TinyMCE -->
</body>

</html>