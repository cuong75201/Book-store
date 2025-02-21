<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book store</title>
    <link rel="icon" type="image/jpg" href="../data/logo-banner/logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <link rel="stylesheet" href="../bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <!-- HEADER  -->
    <header>
        <div class="w-75 mx-auto">
            <div class="row">
                <div class="header__logo col-3">
                    <img src="../data/logo-banner/logo.jpg" alt="Logo">
                </div>
                <div class="input-group mb-3 col-7 header__search">
                    <input type="text" class="form-control" placeholder="Tìm kiếm...">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
                <div class="col-2">
                    <div class="header__item d-flex justify-content-between text-center ">
                        <div class="header__cart">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="d-block">Giỏ hàng</span>
                        </div>
                        <div class="header__user">
                            <a>
                                <i class="fa fa-user"></i>
                                <span class="d-block">Tài khoản</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <i class="fa fa-sign-in-alt"></i>
                                    <a href="#">Đăng nhập</a>
                                </li>
                                <li>
                                    <i class="fa fa-registered"></i>
                                    <a href="#">Đăng ký</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- NAVBAR  -->
    <nav>
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <div class="box-vertical-megamenus">
                        <h4>
                            <i class="fa fa-bars"></i>
                            <span>DANH MỤC SÁCH</span>
                        </h4>
                        <div class="vertical-menu-content">
                            <ul class="vertical-menu-list">
                                <li class="liChild">
                                    <a href="#">
                                        <img src="../data/logo-banner/s2.jpg" alt="">
                                        <span>SÁCH MẦM NON</span>
                                    </a>
                                </li>
                                <li class="liChild">
                                    <a href="#">
                                        <img src="../data/logo-banner/s3.jpg" alt="">
                                        <span>SÁCH THIẾU NHI</span>
                                    </a>
                                </li>
                                <li class="liChild">
                                    <a href="#">
                                        <img src="../data/logo-banner/s4.jpg" alt="">
                                        <span>SÁCH KĨ NĂNG</span>
                                    </a>
                                </li>
                                <li class="liChild">
                                    <a href="#">
                                        <img src="../data/logo-banner/s5.jpg" alt="">
                                        <span>SÁCH KINH DOANH</span>
                                    </a>
                                </li>
                                <li class="liChild">
                                    <a href="#">
                                        <img src="../data/logo-banner/s6.jpg" alt="">
                                        <span>SÁCH MẸ VÀ BÉ</span>
                                    </a>
                                </li>
                                <li class="liChild">
                                    <a href="#">
                                        <img src="../data/logo-banner/s7.jpg" alt="">
                                        <span>SÁCH VĂN HỌC</span>
                                    </a>
                                </li>
                                <li class="liChild">
                                    <a href="#">
                                        <img src="../data/logo-banner/s8.jpg" alt="">
                                        <span>SÁCH THAM KHẢO</span>
                                    </a>
                                </li>
                                <li class="liChild">
                                    <a href="#">
                                        <img src="../data/logo-banner/s9.jpg" alt="">
                                        <span>NOTEBOOL</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-10 d-flex navbar-menu">
                    <div class="item">
                        <img src="../data/logo-banner/ship.png" alt="">
                        <p>Ship COD Trên Toàn Quốc</p>
                    </div>
                    <div class="item">
                        <img src="../data/logo-banner/freeship.png" alt="">
                        <p>Free Ship Đơn Hàng Trên 300k</p>
                    </div>
                    <div class="item">
                        <img src="../data/logo-banner/support_phone.png" alt="">
                        <p>0966160925/ 0989 849 396</p>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- CAROUSEL -->
    <section class="owl-carousel">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../data/logo-banner/banner1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../data/logo-banner/banner2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../data/logo-banner/banner3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <!-- PRODUCT  -->
    <div class="ins_main  col-12">
        <div class="container">
            <div class="row">
                <div class="col-3 sidebar-home">
                    <div class="information-blocks product_top_bestseller">
                        <div class="tabs-container">
                            <div>
                                <h2>
                                    <a href="#">Sách mới phát hành</a>
                                </h2>
                            </div>
                            <div class="control-owl">
                                <div class="owl-prev" data-id='1'>
                                    <i class="fa fa-angle-left"></i>
                                </div>
                                <div class="owl-next" data-id='1'>
                                    <i class="fa fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="article-container">
                            <div class="content-product-list">
                                <div class="owl-stage" id='1' style=" transform: translate3d(0px, 0px, 0px);
                                transition: all .5s;">
                                    <div class="owl-item">
                                        <div class="chir_loop">
                                            <div class="chir_img">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach1.jpg" alt="">
                                                </a>
                                                <div class="insActionloop">
                                                    <a href="#">
                                                        <img src="../data/logo-banner/eye.png" alt="">
                                                    </a>
                                                    <a href="#">
                                                        <img src="../data/logo-banner/cart.png" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="chir_content">
                                                <h3>
                                                    <a href="#">
                                                        Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                                    </a>
                                                </h3>
                                                <p class="pro-price">
                                                    <del>74,000đ</del>
                                                    59,200₫ <span class="sale-price">
                                                        <span>-20%</span>
                                                    </span>
                                                </p>

                                            </div>



                                        </div>
                                        <div class="chir_loop">
                                            <div class="chir_img">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach1.jpg" alt="">
                                                </a>
                                                <div class="insActionloop">
                                                    <a href="#">
                                                        <img src="../data/logo-banner/eye.png" alt="">
                                                    </a>
                                                    <a href="#">
                                                        <img src="../data/logo-banner/cart.png" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="chir_content">
                                                <h3>
                                                    <a href="#">
                                                        Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                                    </a>
                                                </h3>
                                                <p class="pro-price">
                                                    <del>74,000đ</del>
                                                    59,200₫ <span class="sale-price">
                                                        <span>-20%</span>
                                                    </span>
                                                </p>

                                            </div>



                                        </div>
                                        <div class="chir_loop">
                                            <div class="chir_img">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach1.jpg" alt="">
                                                </a>
                                                <div class="insActionloop">
                                                    <a href="#">
                                                        <img src="../data/logo-banner/eye.png" alt="">
                                                    </a>
                                                    <a href="#">
                                                        <img src="../data/logo-banner/cart.png" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="chir_content">
                                                <h3>
                                                    <a href="#">
                                                        Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                                    </a>
                                                </h3>
                                                <p class="pro-price">
                                                    <del>74,000đ</del>
                                                    59,200₫ <span class="sale-price">
                                                        <span>-20%</span>
                                                    </span>
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item">
                                        <div class="chir_loop">
                                            <div class="chir_img">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach1.jpg" alt="">
                                                </a>
                                                <div class="insActionloop">
                                                    <a href="#">
                                                        <img src="../data/logo-banner/eye.png" alt="">
                                                    </a>
                                                    <a href="#">
                                                        <img src="../data/logo-banner/cart.png" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="chir_content">
                                                <h3>
                                                    <a href="#">
                                                        Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                                    </a>
                                                </h3>
                                                <p class="pro-price">
                                                    <del>74,000đ</del>
                                                    59,200₫ <span class="sale-price">
                                                        <span>-20%</span>
                                                    </span>
                                                </p>

                                            </div>



                                        </div>
                                        <div class="chir_loop">
                                            <div class="chir_img">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach1.jpg" alt="">
                                                </a>
                                                <div class="insActionloop">
                                                    <a href="#">
                                                        <img src="../data/logo-banner/eye.png" alt="">
                                                    </a>
                                                    <a href="#">
                                                        <img src="../data/logo-banner/cart.png" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="chir_content">
                                                <h3>
                                                    <a href="#">
                                                        Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                                    </a>
                                                </h3>
                                                <p class="pro-price">
                                                    <del>74,000đ</del>
                                                    59,200₫ <span class="sale-price">
                                                        <span>-20%</span>
                                                    </span>
                                                </p>

                                            </div>



                                        </div>
                                        <div class="chir_loop">
                                            <div class="chir_img">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach1.jpg" alt="">
                                                </a>
                                                <div class="insActionloop">
                                                    <a href="#">
                                                        <img src="../data/logo-banner/eye.png" alt="">
                                                    </a>
                                                    <a href="#">
                                                        <img src="../data/logo-banner/cart.png" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="chir_content">
                                                <h3>
                                                    <a href="#">
                                                        Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                                    </a>
                                                </h3>
                                                <p class="pro-price">
                                                    <del>74,000đ</del>
                                                    59,200₫ <span class="sale-price">
                                                        <span>-20%</span>
                                                    </span>
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item">
                                        <div class="chir_loop">
                                            <div class="chir_img">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach1.jpg" alt="">
                                                </a>
                                                <div class="insActionloop">
                                                    <a href="#">
                                                        <img src="../data/logo-banner/eye.png" alt="">
                                                    </a>
                                                    <a href="#">
                                                        <img src="../data/logo-banner/cart.png" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="chir_content">
                                                <h3>
                                                    <a href="#">
                                                        Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                                    </a>
                                                </h3>
                                                <p class="pro-price">
                                                    <del>74,000đ</del>
                                                    59,200₫ <span class="sale-price">
                                                        <span>-20%</span>
                                                    </span>
                                                </p>

                                            </div>



                                        </div>
                                        <div class="chir_loop">
                                            <div class="chir_img">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach1.jpg" alt="">
                                                </a>
                                                <div class="insActionloop">
                                                    <a href="#">
                                                        <img src="../data/logo-banner/eye.png" alt="">
                                                    </a>
                                                    <a href="#">
                                                        <img src="../data/logo-banner/cart.png" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="chir_content">
                                                <h3>
                                                    <a href="#">
                                                        Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                                    </a>
                                                </h3>
                                                <p class="pro-price">
                                                    <del>74,000đ</del>
                                                    59,200₫ <span class="sale-price">
                                                        <span>-20%</span>
                                                    </span>
                                                </p>

                                            </div>



                                        </div>
                                        <div class="chir_loop">
                                            <div class="chir_img">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach1.jpg" alt="">
                                                </a>
                                                <div class="insActionloop">
                                                    <a href="#">
                                                        <img src="../data/logo-banner/eye.png" alt="">
                                                    </a>
                                                    <a href="#">
                                                        <img src="../data/logo-banner/cart.png" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="chir_content">
                                                <h3>
                                                    <a href="#">
                                                        Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                                    </a>
                                                </h3>
                                                <p class="pro-price">
                                                    <del>74,000đ</del>
                                                    59,200₫ <span class="sale-price">
                                                        <span>-20%</span>
                                                    </span>
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item">
                                        <div class="chir_loop">
                                            <div class="chir_img">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach1.jpg" alt="">
                                                </a>
                                                <div class="insActionloop">
                                                    <a href="#">
                                                        <img src="../data/logo-banner/eye.png" alt="">
                                                    </a>
                                                    <a href="#">
                                                        <img src="../data/logo-banner/cart.png" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="chir_content">
                                                <h3>
                                                    <a href="#">
                                                        Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                                    </a>
                                                </h3>
                                                <p class="pro-price">
                                                    <del>74,000đ</del>
                                                    59,200₫ <span class="sale-price">
                                                        <span>-20%</span>
                                                    </span>
                                                </p>

                                            </div>



                                        </div>
                                        <div class="chir_loop">
                                            <div class="chir_img">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach1.jpg" alt="">
                                                </a>
                                                <div class="insActionloop">
                                                    <a href="#">
                                                        <img src="../data/logo-banner/eye.png" alt="">
                                                    </a>
                                                    <a href="#">
                                                        <img src="../data/logo-banner/cart.png" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="chir_content">
                                                <h3>
                                                    <a href="#">
                                                        Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                                    </a>
                                                </h3>
                                                <p class="pro-price">
                                                    <del>74,000đ</del>
                                                    59,200₫ <span class="sale-price">
                                                        <span>-20%</span>
                                                    </span>
                                                </p>

                                            </div>



                                        </div>
                                        <div class="chir_loop">
                                            <div class="chir_img">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach1.jpg" alt="">
                                                </a>
                                                <div class="insActionloop">
                                                    <a href="#">
                                                        <img src="../data/logo-banner/eye.png" alt="">
                                                    </a>
                                                    <a href="#">
                                                        <img src="../data/logo-banner/cart.png" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="chir_content">
                                                <h3>
                                                    <a href="#">
                                                        Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                                    </a>
                                                </h3>
                                                <p class="pro-price">
                                                    <del>74,000đ</del>
                                                    59,200₫ <span class="sale-price">
                                                        <span>-20%</span>
                                                    </span>
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="information-blocks product_combo">
                        <div class="tabs-container">
                            <div>
                                <h2>
                                    <a href="#">combo bán chạy</a>
                                </h2>
                            </div>
                            <div class="control-owl">
                                <div class="owl-prev" data-id='2'>
                                    <i class="fa fa-angle-left"></i>
                                </div>
                                <div class="owl-next" data-id='2'>
                                    <i class="fa fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="article-container">
                            <div class="content-product-list">
                                <div class="owl-stage" id='2' style=" transform: translate3d(0px, 0px, 0px);
                                transition: all .5s;">
                                    <div class="owl-item">
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item">
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item">
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="information-blocks focus_product_combo">
                        <div class="tabs-container">
                            <div>
                                <h2>
                                    <a href="#">tiêu điểm sách hay</a>
                                </h2>
                            </div>
                            <div class="control-owl">
                                <div class="owl-prev" data-id='3'>
                                    <i class="fa fa-angle-left"></i>
                                </div>
                                <div class="owl-next" data-id='3'>
                                    <i class="fa fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="article-container">
                            <div class="content-product-list">
                                <div class="owl-stage" id='3' style=" transform: translate3d(0px, 0px, 0px);
                                transition: all .5s;">
                                    <div class="owl-item">
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item">
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item">
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="chir_loop2">
                                            <div class="img_product_combo col-4">
                                                <a href="#">
                                                    <img src="../data/logo-banner/sach2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="detail_product_combo col-8">
                                                <h3>
                                                    <a href="#" title="Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang ">
                                                        Sách: Combo Tri Thức Cho Một Thai Kì Khỏe Mạnh + Thai Giáo Theo Chuyên Gia 280 Ngày - Mỗi Ngày Đọc Một Trang
                                                    </a>
                                                </h3>
                                                <div class="compair-price d-flex justify-content-between flex-wrap">
                                                    <p class="pro-price">
                                                        191,250₫
                                                    </p>
                                                    <div class="sale-price">
                                                        <span>-25%</span>
                                                    </div>
                                                    <del class="compare-price "> 255,000₫</del>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-9">
                    <div class="banner_bottom_home">
                        <div class="row">
                            <div class="col-4">
                                <a href="#">
                                    <img src="../data/logo-banner/banner4.png" alt="">
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="#">
                                    <img src="../data/logo-banner/banner5.png" alt="">
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="#">
                                    <img src="../data/logo-banner/banner6.png" alt="">
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 skill-books px-0 list-book">
                        <div class="books_title">
                            <h3>SÁCH KỸ NĂNG SỐNG</h3>
                        </div>
                        <div class="content_product">
                            <div class="list_product  d-flex">
                                <div class="chir_loop">
                                    <div class="chir_img">
                                        <a href="#">
                                            <img src="../data/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="../data/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="../data/logo-banner/cart.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="chir_content">
                                        <h3>
                                            <a href="#">
                                                Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                            </a>
                                        </h3>
                                        <p class="pro-price">
                                            <del>74,000đ</del>
                                            59,200₫ <span class="sale-price">
                                                <span>-20%</span>
                                            </span>
                                        </p>

                                    </div>



                                </div>
                                <div class="chir_loop">
                                    <div class="chir_img">
                                        <a href="#">
                                            <img src="../data/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="../data/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="../data/logo-banner/cart.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="chir_content">
                                        <h3>
                                            <a href="#">
                                                Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                            </a>
                                        </h3>
                                        <p class="pro-price">
                                            <del>74,000đ</del>
                                            59,200₫ <span class="sale-price">
                                                <span>-20%</span>
                                            </span>
                                        </p>

                                    </div>



                                </div>
                                <div class="chir_loop">
                                    <div class="chir_img">
                                        <a href="#">
                                            <img src="../data/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="../data/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="../data/logo-banner/cart.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="chir_content">
                                        <h3>
                                            <a href="#">
                                                Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                            </a>
                                        </h3>
                                        <p class="pro-price">
                                            <del>74,000đ</del>
                                            59,200₫ <span class="sale-price">
                                                <span>-20%</span>
                                            </span>
                                        </p>

                                    </div>



                                </div>
                                <div class="chir_loop">
                                    <div class="chir_img">
                                        <a href="#">
                                            <img src="../data/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="../data/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="../data/logo-banner/cart.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="chir_content">
                                        <h3>
                                            <a href="#">
                                                Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                            </a>
                                        </h3>
                                        <p class="pro-price">
                                            <del>74,000đ</del>
                                            59,200₫ <span class="sale-price">
                                                <span>-20%</span>
                                            </span>
                                        </p>

                                    </div>



                                </div>

                            </div>
                            <div class="show-all">
                                <a href="#">Xem tất cả</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 bestseller-books px-0 list-book">
                        <div class="books_title">
                            <h3>TOP SÁCH BÁN CHẠY</h3>
                        </div>
                        <div class="content_product">
                            <div class="list_product  d-flex">
                                <div class="chir_loop">
                                    <div class="chir_img">
                                        <a href="#">
                                            <img src="../data/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="../data/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="../data/logo-banner/cart.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="chir_content">
                                        <h3>
                                            <a href="#">
                                                Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                            </a>
                                        </h3>
                                        <p class="pro-price">
                                            <del>74,000đ</del>
                                            59,200₫ <span class="sale-price">
                                                <span>-20%</span>
                                            </span>
                                        </p>

                                    </div>



                                </div>
                                <div class="chir_loop">
                                    <div class="chir_img">
                                        <a href="#">
                                            <img src="../data/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="../data/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="../data/logo-banner/cart.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="chir_content">
                                        <h3>
                                            <a href="#">
                                                Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                            </a>
                                        </h3>
                                        <p class="pro-price">
                                            <del>74,000đ</del>
                                            59,200₫ <span class="sale-price">
                                                <span>-20%</span>
                                            </span>
                                        </p>

                                    </div>



                                </div>
                                <div class="chir_loop">
                                    <div class="chir_img">
                                        <a href="#">
                                            <img src="../data/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="../data/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="../data/logo-banner/cart.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="chir_content">
                                        <h3>
                                            <a href="#">
                                                Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                            </a>
                                        </h3>
                                        <p class="pro-price">
                                            <del>74,000đ</del>
                                            59,200₫ <span class="sale-price">
                                                <span>-20%</span>
                                            </span>
                                        </p>

                                    </div>



                                </div>
                                <div class="chir_loop">
                                    <div class="chir_img">
                                        <a href="#">
                                            <img src="../data/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="../data/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="../data/logo-banner/cart.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="chir_content">
                                        <h3>
                                            <a href="#">
                                                Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                            </a>
                                        </h3>
                                        <p class="pro-price">
                                            <del>74,000đ</del>
                                            59,200₫ <span class="sale-price">
                                                <span>-20%</span>
                                            </span>
                                        </p>

                                    </div>



                                </div>

                            </div>
                            <div class="show-all">
                                <a href="#">Xem tất cả</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 child-books px-0 list-book">
                        <div class="books_title">
                            <h3>SÁCH THIẾU NHI </h3>
                        </div>
                        <div class="content_product">
                            <div class="list_product  d-flex">
                                <div class="chir_loop">
                                    <div class="chir_img">
                                        <a href="#">
                                            <img src="../data/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="../data/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="../data/logo-banner/cart.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="chir_content">
                                        <h3>
                                            <a href="#">
                                                Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                            </a>
                                        </h3>
                                        <p class="pro-price">
                                            <del>74,000đ</del>
                                            59,200₫ <span class="sale-price">
                                                <span>-20%</span>
                                            </span>
                                        </p>

                                    </div>



                                </div>
                                <div class="chir_loop">
                                    <div class="chir_img">
                                        <a href="#">
                                            <img src="../data/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="../data/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="../data/logo-banner/cart.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="chir_content">
                                        <h3>
                                            <a href="#">
                                                Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                            </a>
                                        </h3>
                                        <p class="pro-price">
                                            <del>74,000đ</del>
                                            59,200₫ <span class="sale-price">
                                                <span>-20%</span>
                                            </span>
                                        </p>

                                    </div>



                                </div>
                                <div class="chir_loop">
                                    <div class="chir_img">
                                        <a href="#">
                                            <img src="../data/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="../data/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="../data/logo-banner/cart.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="chir_content">
                                        <h3>
                                            <a href="#">
                                                Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                            </a>
                                        </h3>
                                        <p class="pro-price">
                                            <del>74,000đ</del>
                                            59,200₫ <span class="sale-price">
                                                <span>-20%</span>
                                            </span>
                                        </p>

                                    </div>



                                </div>
                                <div class="chir_loop">
                                    <div class="chir_img">
                                        <a href="#">
                                            <img src="../data/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="../data/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="../data/logo-banner/cart.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="chir_content">
                                        <h3>
                                            <a href="#">
                                                Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                            </a>
                                        </h3>
                                        <p class="pro-price">
                                            <del>74,000đ</del>
                                            59,200₫ <span class="sale-price">
                                                <span>-20%</span>
                                            </span>
                                        </p>

                                    </div>



                                </div>

                            </div>
                            <div class="show-all">
                                <a href="#">Xem tất cả</a>
                            </div>
                        </div>
                    </div>
                    <div class="banner_bottom_module_product">
                        <div class="col-6 pr-1 pl-0">
                            <a href="#">
                                <img src="../data/logo-banner/banner7.png" alt="">
                            </a>
                        </div>
                        <div class="col-6 pl-1 pr-0">
                            <a href="#">
                                <img src="../data/logo-banner/banner8.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-12 business-books px-0 list-book">
                        <div class="books_title">
                            <h3>SÁCH KINH DOANH </h3>
                        </div>
                        <div class="content_product">
                            <div class="list_product  d-flex">
                                <div class="chir_loop">
                                    <div class="chir_img">
                                        <a href="#">
                                            <img src="../data/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="../data/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="../data/logo-banner/cart.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="chir_content">
                                        <h3>
                                            <a href="#">
                                                Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                            </a>
                                        </h3>
                                        <p class="pro-price">
                                            <del>74,000đ</del>
                                            59,200₫ <span class="sale-price">
                                                <span>-20%</span>
                                            </span>
                                        </p>

                                    </div>



                                </div>
                                <div class="chir_loop">
                                    <div class="chir_img">
                                        <a href="#">
                                            <img src="../data/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="../data/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="../data/logo-banner/cart.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="chir_content">
                                        <h3>
                                            <a href="#">
                                                Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                            </a>
                                        </h3>
                                        <p class="pro-price">
                                            <del>74,000đ</del>
                                            59,200₫ <span class="sale-price">
                                                <span>-20%</span>
                                            </span>
                                        </p>

                                    </div>



                                </div>
                                <div class="chir_loop">
                                    <div class="chir_img">
                                        <a href="#">
                                            <img src="../data/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="../data/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="../data/logo-banner/cart.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="chir_content">
                                        <h3>
                                            <a href="#">
                                                Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                            </a>
                                        </h3>
                                        <p class="pro-price">
                                            <del>74,000đ</del>
                                            59,200₫ <span class="sale-price">
                                                <span>-20%</span>
                                            </span>
                                        </p>

                                    </div>



                                </div>
                                <div class="chir_loop">
                                    <div class="chir_img">
                                        <a href="#">
                                            <img src="../data/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="../data/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="../data/logo-banner/cart.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="chir_content">
                                        <h3>
                                            <a href="#">
                                                Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                            </a>
                                        </h3>
                                        <p class="pro-price">
                                            <del>74,000đ</del>
                                            59,200₫ <span class="sale-price">
                                                <span>-20%</span>
                                            </span>
                                        </p>

                                    </div>



                                </div>

                            </div>
                            <div class="show-all">
                                <a href="#">Xem tất cả</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 literature-books px-0 list-book">
                        <div class="books_title">
                            <h3>SÁCH VĂN HỌC </h3>
                        </div>
                        <div class="content_product">
                            <div class="list_product  d-flex">
                                <div class="chir_loop">
                                    <div class="chir_img">
                                        <a href="#">
                                            <img src="../data/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="../data/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="../data/logo-banner/cart.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="chir_content">
                                        <h3>
                                            <a href="#">
                                                Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                            </a>
                                        </h3>
                                        <p class="pro-price">
                                            <del>74,000đ</del>
                                            59,200₫ <span class="sale-price">
                                                <span>-20%</span>
                                            </span>
                                        </p>

                                    </div>



                                </div>
                                <div class="chir_loop">
                                    <div class="chir_img">
                                        <a href="#">
                                            <img src="../data/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="../data/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="../data/logo-banner/cart.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="chir_content">
                                        <h3>
                                            <a href="#">
                                                Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                            </a>
                                        </h3>
                                        <p class="pro-price">
                                            <del>74,000đ</del>
                                            59,200₫ <span class="sale-price">
                                                <span>-20%</span>
                                            </span>
                                        </p>

                                    </div>



                                </div>
                                <div class="chir_loop">
                                    <div class="chir_img">
                                        <a href="#">
                                            <img src="../data/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="../data/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="../data/logo-banner/cart.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="chir_content">
                                        <h3>
                                            <a href="#">
                                                Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                            </a>
                                        </h3>
                                        <p class="pro-price">
                                            <del>74,000đ</del>
                                            59,200₫ <span class="sale-price">
                                                <span>-20%</span>
                                            </span>
                                        </p>

                                    </div>
                                </div>
                                <div class="chir_loop">
                                    <div class="chir_img">
                                        <a href="#">
                                            <img src="../data/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="../data/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="../data/logo-banner/cart.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="chir_content">
                                        <h3>
                                            <a href="#">
                                                Sách: Đặt Nỗi Lo Âu Của Bạn Vào Đây
                                            </a>
                                        </h3>
                                        <p class="pro-price">
                                            <del>74,000đ</del>
                                            59,200₫ <span class="sale-price">
                                                <span>-20%</span>
                                            </span>
                                        </p>

                                    </div>



                                </div>

                            </div>
                            <div class="show-all">
                                <a href="#">Xem tất cả</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 newspaper-books px-0 list-book pb-2">
                    <div class="books_title">
                        <h3>BÀI VIẾT</h3>
                    </div>
                    <div class="content_product mt-1 d-flex">
                        <div class="col-3">
                            <div class="article-item">
                                <div class="blog-img">
                                    <a href="https://minhlongbook.vn/blogs/sach-ky-nang/biet-la-duong-gap-ghenh-nhung-ta-van-chon-buoc-di">
                                        <img src="../data/logo-banner/post1.png" alt="">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-heading">
                                        <h2>BIẾT LÀ ĐƯỜNG GẬP GHỀNH, NHƯNG TA VẪN CHỌN BƯỚC ĐI!</h2>
                                        <p>Đăng bởi: Hằng haravan</p>
                                    </div>

                                    <div class="blog-end">
                                        <p> Cuộc đời là tập hợp của muôn nẻo đường khó khăn Mỗi dịp Tết đến, thực...</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-3">

                            <div class="article-item">
                                <div class="blog-img">
                                    <a href="https://minhlongbook.vn/blogs/sach-ky-nang/cai-goi-la-hy-sinh-doi-khi-la-nguy-tao-cho-su-ich-ky">
                                        <img src="../data/logo-banner/post2.png" alt="">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-heading">
                                        <a href="https://minhlongbook.vn/blogs/sach-ky-nang/cai-goi-la-hy-sinh-doi-khi-la-nguy-tao-cho-su-ich-ky">
                                            <h2>CÁI GỌI LÀ "HY SINH" ĐÔI KHI LÀ NGỤY TẠO CHO SỰ ÍCH KỶ!</h2>
                                        </a>

                                        <p>Đăng bởi: KDOL Tâm Anh</p>
                                    </div>

                                    <div class="blog-end">
                                        <p> Có phải không hy sinh vì người khác sẽ trở thành một kẻ ích kỷ? Rất...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">

                            <div class="article-item">
                                <div class="blog-img">
                                    <a href="https://minhlongbook.vn/blogs/sach-ky-nang/bai-hoc-danh-cho-ke-hieu-thang-trong-tinh-yeu">
                                        <img src="../data/logo-banner/post3.png" alt="">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-heading">
                                        <a href="https://minhlongbook.vn/blogs/sach-ky-nang/bai-hoc-danh-cho-ke-hieu-thang-trong-tinh-yeu">
                                            <h2>BÀI HỌC DÀNH CHO KẺ "HIẾU THẮNG" TRONG TÌNH YÊU</h2>
                                        </a>

                                        <p>Đăng bởi: KDOL Tâm Anh</p>
                                    </div>

                                    <div class="blog-end">
                                        <p> Bạn có phải người hơn thua trong tình yêu? Trong một mối quan hệ, người có....</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">

                            <div class="article-item">
                                <div class="blog-img">
                                    <a href="https://minhlongbook.vn/blogs/sach-ky-nang/loi-nhan-danh-tang-nhung-ai-da-quen-kim-nen-cam-xuc">
                                        <img src="../data/logo-banner/post4.png" alt="">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-heading">
                                        <a href="https://minhlongbook.vn/blogs/sach-ky-nang/loi-nhan-danh-tang-nhung-ai-da-quen-kim-nen-cam-xuc">
                                            <h2>LỜI NHẮN DÀNH TẶNG NHỮNG AI ĐÃ QUEN KÌM NÉN CẢM XÚC...</h2>
                                        </a>
                                        <p>Đăng bởi: KDOL Tâm Anh</p>
                                    </div>

                                    <div class="blog-end">
                                        <p> Kìm nén cảm xúc có phải là thói quen của bạn không? Đã bao giờ bạn...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- FOOTER -->
    <footer>
        <div class="footer_promotion">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-3 item-policy">
                        <div class="footer-icon">
                            <span>
                                <i class="fa fa-truck"></i>
                            </span>

                        </div>
                        <div class="info-footer">
                            <h3>MIỄN PHÍ VẬN CHUYỂN</h3>
                            <p>cho đơn hàng trên 300,000 VNĐ</p>
                        </div>
                    </div>
                    <div class="col-3 item-policy">
                        <div class="footer-icon">
                            <span>
                                <i class="fa fa-money-bill-alt"></i>
                            </span>

                        </div>
                        <div class="info-footer">
                            <h3>SHIP COD TOÀN QUỐC </h3>
                            <p>Thanh toán khi nhận sách</p>
                        </div>
                    </div>
                    <div class="col-3 item-policy">
                        <div class="footer-icon">
                            <span>
                                <i class="fa fa-smile"></i>
                            </span>

                        </div>
                        <div class="info-footer">
                            <h3>MIỄN PHÍ ĐỔI TRẢ HÀNG</h3>
                            <p>trong vòng 10 ngày</p>
                        </div>
                    </div>
                    <div class="col-3 item-policy">
                        <div class="footer-icon">
                            <span>
                                <i class="fa fa-phone"></i>
                            </span>

                        </div>
                        <div class="info-footer">
                            <h3>HOTLINE:</h3>
                            <p>0966160925 - 0989849396</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="footer__main">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <div class="ft-logo mb-2">
                            <img src="../data/logo-banner/logo_ft.png" alt="">
                        </div>
                        <div class="ft-content">
                            <p style="text-align: justify; font-weight: bold;">
                                Công ty TNHH Một Thành viên Thương mại & Dịch vụ Văn hóa Minh Long
                            </p>
                            <br>
                            <p style="text-align: justify; ">
                                Mã Số Thuế: 0102726224</p>
                            <p style="text-align: justify;">

                                <i class="fa fa-map-marker" aria-hidden="true"></i> Văn phòng: 273 An Dương Vương, QUận 5, Thành phố Hồ Chí Minh. <br><br>


                                <i class="fa fa-phone" aria-hidden="true"></i> 0966160925 - 0989849396

                                <br> <i class="fa fa-envelope" aria-hidden="true"></i> cskh@minhlongbook.vn
                                <br>
                                <br>
                                <i class="fa fa-map-marker" aria-hidden="true"></i> Chi nhánh Miền Nam:
                                33 Đỗ Thừa Tự, Tân Quý, Tân Phú, Thành phố Hồ Chí Minh, Việt Nam

                                <br>
                                <br> <i class="fa fa-phone" aria-hidden="true"></i> 0286 675 1142
                            </p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="ft-title">
                            TIN TỨC
                        </div>
                        <div class="ft-content">
                            <ul class="grid__item one-whole">
                                <li>
                                    <a href="https://minhlongbook.vn/pages/about-us"><span>Giới thiệu</span></a>
                                </li>
                                <li>
                                    <a href="/blogs/all"><span>Điểm sách</span></a>
                                </li>
                                <li>
                                    <a href="https://minhlongbook.vn/blogs/tuyen-dung"><span>Tuyển dụng</span></a>
                                </li>
                                <li>
                                    <a href="/blogs/su-kien"><span>Sự kiện</span></a>
                                </li>
                                <li>
                                    <a href="/blogs/tin-khuyen-mai"><span>Tin khuyến mại</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="ft-title">
                            HỖ TRỢ KHÁCH HÀNG
                        </div>
                        <div class="ft-content">
                            <ul class="grid__item one-whole">

                                <li>
                                    <a href="/pages/dieu-khoan-su-dung"><span>Điều khoản sử dụng</span></a>
                                </li>
                                <li>
                                    <a href="/pages/huong-dan-mua-hang"><span>Hướng dẫn mua hàng</span></a>
                                </li>
                                <li>
                                    <a href="/pages/phuong-thuc-thanh-toan"><span>Phương thức thanh toán</span></a>
                                </li>
                                <li>
                                    <a href="/pages/phuong-thuc-van-chuyen-1"><span>Phương thức giao hàng</span></a>
                                </li>
                                <li>
                                    <a href="https://minhlongbook.vn/pages/chinh-sach-tra-hang"><span>Chính sách đổi trả</span></a>
                                </li>
                                <li>
                                    <a href="https://minhlongbook.vn/pages/chinh-sach-bao-mat-thong-tin"><span>Bảo mật thông tin</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-3">
                    <div class="ft-title">
                           THÔNG TIN
                        </div>
                        <div class="ft-content">
                            <ul class="grid__item one-whole">
                               	
								<li>
									<a href="/account/login"><span>Đăng nhập</span></a>
								</li>
								<li>
									<a href="/account/register"><span>Đăng ký</span></a>
								</li>					
								<li>
									<a href="/pages/tra-cuu-don-hang"><span>Tra cứu đơn hàng</span></a>
								</li>
								<li>
									<a href="https://minhlongbook.vn/pages/lien-he"><span>Liên hệ</span></a>
								</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="../bootstrap-4.5.3-dist/jquery-3.7.1.min.js"></script>
    <script src="../bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>