<?php
include 'inc/header.php';
?>
<?php
if (!isset($_GET['catId']) || $_GET['catId'] == NULL) {
    $catId = 0;
} else {
    $catId = $_GET['catId'];
}
?>
<?php
if (!isset($_GET['brandId']) || $_GET['brandId'] == NULL) {
    $brandId = 0;
} else {

    $brandId = $_GET['brandId'];
}
?>
<?php
if (!isset($_GET['tukhoa']) || $_GET['tukhoa'] == NULL) {
    $tukhoa = 0;
    $flag = false;
} else {
    $flag = true;
    $tukhoa = $_GET['tukhoa'];
}
?>
<?php
if (!isset($_GET['price']) || $_GET['price'] == NULL) {
    $price = 0;
} else {
    $price = $_GET['price'];
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
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="index.php">Trang chủ</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Sản Phẩm</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">

            <div class="row mb-5">
                <div class="col-md-9 order-2">

                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div class="d-flex">
                                <div class="btn-group" style="position: absolute; right: 15px;">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Sắp xếp</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                        <a class="dropdown-item" href="shop.php?price=1">Giá thấp đến cao</a>
                                        <a class="dropdown-item" href="shop.php?price=2">Giá cao đến thấp</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <?php
                        if ($catId == 0 && $brandId == 0 && $tukhoa == 0 && $price == 0 && $flag !== true) {
                            $product_all = $product->get_product_by_pages();
                            if ($product_all) {
                                while ($result = $product_all->fetch_assoc()) {
                                    ?>
                                    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                                        <div class="block-4 text-center border">
                                            <a href="shop-single.php?proid=<?php echo $result['productId'] ?>">
                                                <figure class="block-4-image">
                                                    <img src="images/<?php echo $result['image'] ?>" alt="Image placeholder" class="img-fluid">
                                                </figure>
                                                <div class="block-4-text p-4">

                                                    <p class="mb-0"><?php echo $result['productName'] ?></p>
                                                    <p class="text-primary font-weight-bold"><?php echo $fm->format_currency($result['price']) . " " . "VNĐ" ?></p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                <?php
                                        }
                                    }
                                } else if ($catId !== 0) {
                                    $cat_all = $cat->get_product_by_cat($catId);
                                    if ($cat_all) {
                                        while ($result = $cat_all->fetch_assoc()) {
                                            ?>

                                    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                                        <div class="block-4 text-center border">
                                            <a href="shop-single.php?proid=<?php echo $result['productId'] ?>">
                                                <figure class="block-4-image">
                                                    <img src="images/<?php echo $result['image'] ?>" alt="Image placeholder" class="img-fluid">
                                                </figure>
                                                <div class="block-4-text p-4">

                                                    <p class="mb-0"><?php echo $result['productName'] ?></p>
                                                    <p class="text-primary font-weight-bold"><?php echo $fm->format_currency($result['price']) . " " . "VNĐ" ?></p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php
                                        }
                                    }
                                } else if ($price !== 0) {
                                    $get_product_price = $product->get_product_by_price($price);
                                    if ($get_product_price) {
                                        while ($result = $get_product_price->fetch_assoc()) {
                                            ?>
                                    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                                        <div class="block-4 text-center border">
                                            <a href="shop-single.php?proid=<?php echo $result['productId'] ?>">
                                                <figure class="block-4-image">
                                                    <img src="images/<?php echo $result['image'] ?>" alt="Image placeholder" class="img-fluid">
                                                </figure>
                                                <div class="block-4-text p-4">

                                                    <p class="mb-0"><?php echo $result['productName'] ?></p>
                                                    <p class="text-primary font-weight-bold"><?php echo $fm->format_currency($result['price']) . " " . "VNĐ" ?></p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                <?php
                                        }
                                    }
                                } else if ($brandId !== 0) {
                                    $brand_all = $br->get_product_by_brand($brandId);
                                    if ($brand_all) {
                                        while ($result = $brand_all->fetch_assoc()) {
                                            ?>

                                    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                                        <div class="block-4 text-center border">
                                            <a href="shop-single.php?proid=<?php echo $result['productId'] ?>">
                                                <figure class="block-4-image">
                                                    <img src="images/<?php echo $result['image'] ?>" alt="Image placeholder" class="img-fluid">
                                                </figure>
                                                <div class="block-4-text p-4">

                                                    <p class="mb-0"><?php echo $result['productName'] ?></p>
                                                    <p class="text-primary font-weight-bold"><?php echo $fm->format_currency($result['price']) . " " . "VNĐ" ?></p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                <?php
                                        }
                                    }
                                } else {
                                    $search_product = $product->search_product($tukhoa);
                                    if ($search_product) {
                                        while ($result = $search_product->fetch_assoc()) {
                                            ?>
                                    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                                        <div class="block-4 text-center border">
                                            <a href="shop-single.php?proid=<?php echo $result['productId'] ?>">
                                                <figure class="block-4-image">
                                                    <img src="images/<?php echo $result['image'] ?>" alt="Image placeholder" class="img-fluid">
                                                </figure>
                                                <div class="block-4-text p-4">

                                                    <p class="mb-0"><?php echo $result['productName'] ?></p>
                                                    <p class="text-primary font-weight-bold"><?php echo $fm->format_currency($result['price']) . " " . "VNĐ" ?></p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                        <?php
                                }
                            }
                        }
                        ?>

                    </div>
                    <?php
                    if ($catId == 0 && $brandId == 0 && $tukhoa == 0 && $price == 0 && $flag !== true) {
                        ?>
                        <div class="row" data-aos="fade-up">
                            <div class="col-md-12 text-center">
                                <div class="site-block-27">
                                    <ul>
                                        <?php
                                            if (isset($_GET['trang'])) {
                                                $trang = $_GET['trang'];
                                            } else {
                                                $trang = 1;
                                            }
                                            $product_all = $product->get_all_product();
                                            $product_count = mysqli_num_rows($product_all);
                                            $product_button = ceil($product_count / 8);
                                            $i = 1;
                                            for ($i = 1; $i <= $product_button; $i++) {
                                                ?>
                                            <li <?php if ($i == $trang) {
                                                            echo 'class="active"';
                                                        } ?>><a href="shop.php?trang=<?php echo $i ?>"><?php echo $i ?></a></li>
                                        <?php

                                            }
                                            ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>



                <div class="col-md-3 order-1 mb-5 mb-md-0">
                    <div class="border p-4 rounded mb-4">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Loại sản phẩm</h3>
                        <?php
                        $cate_all = $cat->show_category();
                        if ($cate_all) {
                            while ($result = $cate_all->fetch_assoc()) {
                                ?>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-1"><a href="shop.php?catId=<?php echo $result['catId'] ?>" class="d-flex"><span><?php echo $result['catName'] ?></span>
                                        </a></li>
                                </ul>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="border p-4 rounded mb-4">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Thương hiệu</h3>
                        <?php
                        $brand_all = $br->show_brand();
                        if ($brand_all) {
                            while ($result = $brand_all->fetch_assoc()) {
                                ?>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-1"><a href="shop.php?brandId=<?php echo $result['brandId'] ?>" class="d-flex"><span><?php echo $result['brandName'] ?></span>
                                        </a></li>
                                </ul>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include 'inc/footer.php';
    ?>

    </div>
    </div>
    </footer>
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