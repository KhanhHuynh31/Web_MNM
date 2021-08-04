<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo">
                    <a href="index.php">
                        <span>ADMIN</span>
                    </a>
                </div>
                <li class="label">Thống Kê</li>
                <li><a href="index.php" class="sidebar"><i class="ti-home"></i> Home</a></li>
                <?php
                if (Session::get('adminlevel') == 0) {
                    ?>
                    <li class="label">Quản lý Admin</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid4-alt"></i>TÀI KHOẢN<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="useradd.php">Thêm tài khoản</a></li>
                            <li><a href="userlist.php">Danh sách tài khoản</a></li>
                        </ul>
                    </li>
                <?php
                }
                ?>
                <li class="label">Quản lý Cửa Hàng</li>
                <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid4-alt"></i>DANH MỤC<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="catadd.php">Thêm danh mục</a></li>
                        <li><a href="catlist.php">Danh sách danh mục </a></li>
                    </ul>
                </li>

                <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid4-alt"></i>THƯƠNG HIỆU<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="brandadd.php">Thêm thương hiệu</a></li>
                        <li><a href="brandlist.php">Danh sách thương hiệu </a></li>
                    </ul>
                </li>

                <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid4-alt"></i>SẢN PHẨM<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="productadd.php">Thêm sản phẩm</a></li>
                        <li><a href="productlist.php">Danh sách sản phẩm </a></li>
                    </ul>
                </li>

                <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid4-alt"></i>ĐƠN HÀNG<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="orderlist.php">Danh sách đơn hàng</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /# sidebar -->