<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title']; ?></title>
    <link rel="icon" type="image/jpg" href="media/logo-banner/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <base href="<?php echo app_path ?>">
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/admin.css">
</head>

<body>
    <div class="container " style="display: flex;">
        <div class="sidebar">
            <div class="top-sidebar">
                <div class="logo">
                    <a href="#"><img src="media/logo-banner/logo-nobg.png" alt=" logo"></a>
                </div>
                <div class="mini-logo">
                    <a href="#"><img src="assets/image/logo/logo-shop-2.png" alt="mini-logo"></a>
                </div>
                <div class="exit-button">
                    <a href="#"><i class=" fa-solid fa-xmark"></i></a>
                </div>
            </div>
            <div class="sidebar-content">
                <div class="sidebar-item">
                    <a href="admin/product">
                        <i class="fa-solid fa-bag-shopping"></i>
                        <h3>Sản phẩm</h3>
                    </a>
                </div>
                <div class="sidebar-item">
                    <a href="admin/nhacungcap">
                        <i class="fa fa-briefcase"></i>
                        <h3>Nhà cung cấp</h3>
                    </a>
                </div>
                <div class="sidebar-item">
                    <a href="admin/nhanvien">
                        <i class="fa fa-user-tie"></i>
                        <h3>Nhân viên</h3>
                    </a>
                </div>

                <div class="sidebar-item">
                    <a href="admin/khachhang">
                        <i class="fa-solid fa-user"></i>
                        <h3>Khách hàng</h3>
                    </a>
                </div>
                <div class="sidebar-item">
                    <a href="admin/donhang">
                        <i class="fa-solid fa-receipt"></i>
                        <h3>Đơn hàng</h3>
                    </a>
                </div>
                <div class="sidebar-item">
                    <a href="admin/thongke">
                        <i class="fa-solid fa-chart-simple"></i>
                        <h3>Thống kê</h3>
                    </a>
                </div>
                <div class="sidebar-item">
                    <a href="admin/phanquyen">
                        <i class="fab fa-500px"></i>
                        <h3>Phân quyền</h3>
                    </a>
                </div>


                <div class="sidebar-item">
                    <a href="#">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <h3>Đăng xuất</h3>
                    </a>
                </div>

            </div>
        </div>



        <div class="body">
            <div class="header-bar">
                <div class="sidebar-button">
                    <a href="#"><i class="fa-solid fa-bars"></i></a>
                </div>

                <div class="bar-content" id="bar-title">
                    <h2><?php echo $data['content'] ?></h2>
                </div>

                <div class="admin-info">
                    <div class="admin-content">
                        <h4>Xin chào, Admin</h4>
                    </div>
                    <div class="admin-logo">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>
                </div>
            </div>

            <div class="content">
                <?php include 'AdminPage/' . $data['Page'] . '.php'; ?>
            </div>
        </div>
    </div>
    <script src="public/lib/jquery-3.7.1.min.js"></script>
    <script src="public/js/admin.js"></script>
    <?php if (isset($data['script'])) echo '<script src="public/js/' . $data['script'] . '.js"></script>' ?>

</body>

</html>