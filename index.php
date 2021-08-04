<?php
include 'inc/header.php';
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
<div class="site-blocks-cover" style="background-image: url(images/hero_1.jpg);" data-aos="fade">
    <div class="container">
        <div class="row align-items-start align-items-md-center justify-content-end">
            <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
                <h1 class="mb-2">Giày là phong cách</h1>
                <div class="intro-text text-center text-md-left">
                    <p class="mb-4">Bạn là tín đồ của những mẫu giày thể thao? Bạn đang kiếm tìm những mẫu giày thể thao
                        đang hot hiện nay? Những mẫu mã đẹp mắt, cá tính xuất hiện ngày càng nhiều. Hãy đến với Shop để
                        cùng trải nghiệm nhé!!!</p>
                    <p>

                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section site-section-sm site-blocks-1">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                <div class="icon mr-4 align-self-start">
                    <span class="icon-truck"></span>
                </div>
                <div class="text">
                    <h2 class="text-uppercase">Miễn phí giao hàng</h2>
                    <p>Vận chuyển khắp Việt Nam. Được hỗ trợ hoàn toàn phí giao hàng. Nhận hàng tại nhà rồi thanh toán.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                <div class="icon mr-4 align-self-start">
                    <span class="icon-refresh2"></span>
                </div>
                <div class="text">
                    <h2 class="text-uppercase">Trả hàng miễn phí</h2>
                    <p>Bảo hành lên đến 60 ngày. Đổi hàng thoải mái trong 30 ngày</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
                <div class="icon mr-4 align-self-start">
                    <span class="icon-help"></span>
                </div>
                <div class="text">
                    <h2 class="text-uppercase">Hỗ trợ khách hàng</h2>
                    <p>Supporting 24/24.</p>
                    <p>Gọi ngay 0909300746</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section site-blocks-2">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                <a class="block-2-item" href="shop.php?catId=3">
                    <figure class="image">
                        <img src="images/shoe7.jpg" alt="" class="img-fluid">
                    </figure>
                    <div class="text">
                        <span class="text-uppercase">Bộ sưu tập</span>
                        <h3>Thể thao</h3>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
                <a class="block-2-item" href="shop.php?catId=2">
                    <figure class="image">
                        <img src="images/shoe8.jpg" alt="" class="img-fluid">
                    </figure>
                    <div class="text">
                        <span class="text-uppercase">Bộ sưu tập</span>
                        <h3>Lịch lãm</h3>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
                <a class="block-2-item" href="shop.php?catId=4">
                    <figure class="image">
                        <img src="images/shoe9.jpg" alt="" class="img-fluid">
                    </figure>
                    <div class="text">
                        <span class="text-uppercase">Bộ sưu tập</span>
                        <h3>Trẻ em</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="site-section block-3 site-blocks-2 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 site-section-heading text-center pt-4">
                <h2>Sản phẩm nổi bật</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="nonloop-block-3 owl-carousel">
                    <?php
                    $product_featured = $product->getproduct_feathered();
                    if ($product_featured) {
                        while ($result = $product_featured->fetch_assoc()) {
                            ?>
                            <div class="item">
                                <div class="block-4 text-center">
                                    <a href="shop-single.php?proid=<?php echo $result['productId'] ?>">
                                        <figure class="block-4-image">
                                            <img src="images/<?php echo $result['image'] ?>" alt="Image placeholder" class="img-fluid">
                                        </figure>
                                        <div class="block-4-text p-4">
                                            <h3><?php echo $result['productName'] ?></h3>
                                            <p class="text-primary"><?php echo $result['price'] . "$" ?></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section block-8">
    <div class="container">
        <div class="row justify-content-center  mb-5">
            <div class="col-md-7 site-section-heading text-center pt-4">
                <h2>Khuyến mãi </h2>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-12 col-lg-7 mb-5">
                <a href="#"><img src="images/blog123.jpg" alt="Image placeholder" class="img-fluid rounded"></a>
            </div>
            <div class="col-md-12 col-lg-5 text-center pl-md-5">
                <h2><a href="#">50% tất cả các mặt hàng</a></h2>
                <p class="post-meta mb-4">Bởi <a href="#">Carl Smith</a> <span class="block-8-sep">&bullet;</span> Tháng
                    3, 2018</p>
                <p>Cùng ngắm nghía bộ sưu tập dép siêu hot trong tháng 3 này của Shop nhé, với giá cực kỳ ưu đãi.</p>
                <p><a href="#" class="btn btn-primary btn-sm">Xem ngay</a></p>
            </div>
        </div>
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