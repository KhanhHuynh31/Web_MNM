<?php
include 'inc/header.php';
?>
<?php
if (isset($_GET['signout'])) {
    session_destroy();
    echo '<script type="text/JavaScript"> 
    location.replace("account.php"); 
        </script>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/acc.css">

</head>

<body>

    <div class="site-wrap">
        <div class="bg-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-0"><a href="index.php">Trang chủ</a> <span class="mx-2 mb-0">/</span>
                        <strong class="text-black">Tài Khoản</strong>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="cont">
            <form action="" method="post">

                <div class="form sign-in">
                    <h2>Đăng nhập ngay</h2>
                    <div style="text-align: center" class="result"></div>
                    <label>
                        <span>Email</span>
                        <input type="email" name="email" class="email" />
                    </label>
                    <label>
                        <span>Mật khẩu</span>
                        <input type="password" name="password" class="password" />
                    </label>
                    <button type="submit" name="login" class="submit login">Đăng nhập</button>
                </div>
            </form>
            <form action="" method="post">
                <div class="sub-cont">
                    <div class="img">
                        <div class="img__text m--up">

                            <p>Đăng ký và xem nhiều sản phẩm mới!</p>
                        </div>
                        <div class="img__text m--in">
                            <h2>Đăng nhập ngay!</h2>
                            <p>Nếu bạn đã có tài khoản, chỉ cần đăng nhập!</p>
                        </div>
                        <div class="img__btn">
                            <span class="m--up">Đăng ký</span>
                            <span class="m--in">Đăng nhập</span>
                        </div>
                    </div>
                    <div class="form sign-up">
                        <h2>Đăng ký tại đây</h2>
                        <div style="text-align: center" class="rgresult"></div>
                        <label>
                            <span>Tên*</span>
                            <input type="text" name="name" class="rgname" required="" />
                        </label>
                        <label>
                            <span>Email*</span>
                            <input type="email" name="email" class="rgemail" required="" />
                        </label>
                        <label>
                            <span>Mật khẩu*</span>
                            <input type="password" name="password" class="rgpassword" required="" />
                        </label>
                        <label>
                            <span>Điện thoại*</span>
                            <input type="number" name="phone" class="rgphone" />
                        </label>
                        <label>
                            <span>Địa chỉ</span>
                            <input type="text" name="address" class="rgaddress" />
                        </label>
                        <button type="submit" name="submit" class="submit register">Đăng ký</button>
                    </div>
                </div>
                <form action="" method="post">
        </div>
        <script>
            $(document).ready(function() {
                $('.login').click(function(e) {
                    e.preventDefault();
                    var $email = $('.email').val();
                    var $password = $('.password').val();

                    $.ajax({
                        url: 'classes/ajax/ajax-login.php',
                        type: 'post',
                        dataType: 'html',
                        data: {
                            email: $email,
                            pass: $password
                        }
                    }).done(function(ketqua) {
                        if (ketqua == 1) {
                            location.replace("index.php");
                        }
                        $('.result').html(ketqua);
                    });

                });
            });
            $(document).ready(function() {
                $('.register').click(function(e) {
                    e.preventDefault();
                    var $name = $('.rgname').val();
                    var $email = $('.rgemail').val();
                    var $password = $('.rgpassword').val();
                    var $phone = $('.rgphone').val();
                    var $address = $('.rgaddress').val();
                    $.ajax({
                        url: 'classes/ajax/ajax-register.php',
                        type: 'post',
                        dataType: 'html',
                        data: {
                            name: $name,
                            email: $email,
                            password: $password,
                            phone: $phone,
                            address: $address,
                        }
                    }).done(function(ketqua) {
                        if (ketqua == 1) {
                            alert('Đăng ký thành công!');
                            location.replace("account.php");
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

    <script src="js/acc.js"></script>

</body>

</html>