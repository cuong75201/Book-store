<?php 
// Thêm ở đầu file main.php
require_once 'mvc/models/SachModel.php'; // Đường dẫn đến file SachModel
$sachModel = new SachModel();
$products = $sachModel->getAllProducts(); // Lấy danh sách sản phẩm
// Lấy dữ liệu cho các phần
$newProducts = $sachModel->getNewProducts(6); // Sách mới
$comboProducts = $sachModel->getProductsByCategory(2); // Ví dụ: Combo (ID_DanhMuc = 2)
$skillBooks = $sachModel->getProductsByCategory(3); // Sách kỹ năng sống
$childBooks = $sachModel->getProductsByCategory(4); // Sách thiếu nhi
// ... Thêm các danh mục khác
?>
<?php require 'inc/head.php'; ?>


<body>
<?php require 'inc/header.php'; ?>
<?php require 'inc/navbar.php'; ?>
<?php require 'inc/carousel.php'; ?>

  
  
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
                                         <?php foreach ($newProducts as $product): ?>                                           
                                            <div class="chir_img">
                                                <a href="product/detail/<?= $sachModel->slugify($product['Ten_Sach']) . '-' . $product['ID_Sach'] ?>">
                                                    <img src="media/img_product/<?= $product['Images'] ?>" alt="<?= $product['Ten_Sach'] ?>">
                                                </a>
                                                <div class="insActionloop">
                                                    <a href="product/detail/<?= $sachModel->slugify($product['Ten_Sach']).'-'.$product['ID_Sach'] ?>">
                                                        <img src="media/logo-banner/eye.png" alt="">
                                                    </a>
                                                    <a href="#">
                                                        <img src="media/logo-banner/cart.png" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="chir_content">
                                            <h3><?= $product['Ten_Sach'] ?></h3>

                                                <p class="pro-price">
                                                <del><?= number_format($product['Gia_Ban'] * 1.2, 0, ',', '.') ?>đ</del>
                                                <?= number_format($product['Gia_Ban'], 0, ',', '.') ?>₫ 
                                                <span class="sale-price">-<?= $product['GiamGia(%)'] ?>%</span>
                                                </p>

                                            </div>
                                        <?php endforeach; ?>

                                </div>
                                    </div>
                                    <div class="owl-item">
                                        <div class="chir_loop">
                                            <div class="chir_img">
                                                <a href="#">
                                                    <img src="media/logo-banner/sach1.jpg" alt="">
                                                </a>
                                                <div class="insActionloop">
                                                    <a href="/product/detail/<?= $product['ID_Sach'] ?>">
                                                        <img src="media/logo-banner/eye.png" alt="">
                                                    </a>
                                                    <a href="#">
                                                        <img src="media/logo-banner/cart.png" alt="">
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
                                                    <img src="media/logo-banner/sach1.jpg" alt="">
                                                </a>
                                                <div class="insActionloop">
                                                    <a href="/product/detail/<?= $product['ID_Sach'] ?>">
                                                        <img src="media/logo-banner/eye.png" alt="">
                                                    </a>
                                                    <a href="#">
                                                        <img src="media/logo-banner/cart.png" alt="">
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
                                                    <img src="media/logo-banner/sach1.jpg" alt="">
                                                </a>
                                                <div class="insActionloop">
                                                    <a href="/product/detail/<?= $product['ID_Sach'] ?>">
                                                        <img src="media/logo-banner/eye.png" alt="">
                                                    </a>
                                                    <a href="#">
                                                        <img src="media/logo-banner/cart.png" alt="">
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
                                                    <img src="media/logo-banner/sach1.jpg" alt="">
                                                </a>
                                                <div class="insActionloop">
                                                    <a href="/product/detail/<?= $product['ID_Sach'] ?>">
                                                        <img src="media/logo-banner/eye.png" alt="">
                                                    </a>
                                                    <a href="#">
                                                        <img src="media/logo-banner/cart.png" alt="">
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
                                                    <img src="media/logo-banner/sach1.jpg" alt="">
                                                </a>
                                                <div class="insActionloop">
                                                    <a href="/product/detail/<?= $product['ID_Sach'] ?>">
                                                        <img src="media/logo-banner/eye.png" alt="">
                                                    </a>
                                                    <a href="#">
                                                        <img src="media/logo-banner/cart.png" alt="">
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
                                                    <img src="media/logo-banner/sach1.jpg" alt="">
                                                </a>
                                                <div class="insActionloop">
                                                    <a href="/product/detail/<?= $product['ID_Sach'] ?>">
                                                        <img src="media/logo-banner/eye.png" alt="">
                                                    </a>
                                                    <a href="#">
                                                        <img src="media/logo-banner/cart.png" alt="">
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
                                                    <img src="media/logo-banner/sach1.jpg" alt="">
                                                </a>
                                                <div class="insActionloop">
                                                    <a href="/product/detail/<?= $product['ID_Sach'] ?>">
                                                        <img src="media/logo-banner/eye.png" alt="">
                                                    </a>
                                                    <a href="#">
                                                        <img src="media/logo-banner/cart.png" alt="">
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
                                                    <img src="media/img_product/5.1.png" alt="">
                                                </a>
                                                <div class="insActionloop">
                                                    <a href="/product/detail/<?= $product['ID_Sach'] ?>">
                                                        <img src="media/logo-banner/eye.png" alt="">
                                                    </a>
                                                    <a href="#">
                                                        <img src="media/logo-banner/cart.png" alt="">
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
                                                    <img src="media/logo-banner/sach1.jpg" alt="">
                                                </a>
                                                <div class="insActionloop">
                                                    <a href="/product/detail/<?= $product['ID_Sach'] ?>">
                                                        <img src="media/logo-banner/eye.png" alt="">
                                                    </a>
                                                    <a href="#">
                                                        <img src="media/logo-banner/cart.png" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                                    <img src="media/logo-banner/sach2.jpg" alt="">
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
                                    <img src="media/logo-banner/banner4.png" alt="">
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="#">
                                    <img src="media/logo-banner/banner5.png" alt="">
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="#">
                                    <img src="media/logo-banner/banner6.png" alt="">
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
                                            <img src="media/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="media/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="media/logo-banner/cart.png" alt="">
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
                                            <img src="media/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="media/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="media/logo-banner/cart.png" alt="">
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
                                            <img src="media/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="media/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="media/logo-banner/cart.png" alt="">
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
                                            <img src="media/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="media/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="media/logo-banner/cart.png" alt="">
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
                                            <img src="media/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="media/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="media/logo-banner/cart.png" alt="">
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
                                            <img src="media/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="media/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="media/logo-banner/cart.png" alt="">
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
                                            <img src="media/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="media/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="media/logo-banner/cart.png" alt="">
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
                                            <img src="media/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="media/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="media/logo-banner/cart.png" alt="">
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
                                            <img src="media/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="media/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="media/logo-banner/cart.png" alt="">
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
                                            <img src="media/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="media/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="media/logo-banner/cart.png" alt="">
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
                                            <img src="media/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="media/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="media/logo-banner/cart.png" alt="">
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
                                            <img src="media/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="media/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="media/logo-banner/cart.png" alt="">
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
                                <img src="media/logo-banner/banner7.png" alt="">
                            </a>
                        </div>
                        <div class="col-6 pl-1 pr-0">
                            <a href="#">
                                <img src="media/logo-banner/banner8.png" alt="">
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
                                            <img src="media/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="media/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="media/logo-banner/cart.png" alt="">
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
                                            <img src="media/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="media/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="media/logo-banner/cart.png" alt="">
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
                                            <img src="media/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="media/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="media/logo-banner/cart.png" alt="">
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
                                            <img src="media/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="media/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="media/logo-banner/cart.png" alt="">
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
                                            <img src="media/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="media/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="media/logo-banner/cart.png" alt="">
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
                                            <img src="media/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="media/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="media/logo-banner/cart.png" alt="">
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
                                            <img src="media/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="media/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="media/logo-banner/cart.png" alt="">
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
                                            <img src="media/logo-banner/sach1.jpg" alt="">
                                        </a>
                                        <div class="insActionloop">
                                            <a href="#">
                                                <img src="media/logo-banner/eye.png" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="media/logo-banner/cart.png" alt="">
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
                                        <img src="media/logo-banner/post1.png" alt="">
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
                                        <img src="media/logo-banner/post2.png" alt="">
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
                                        <img src="media/logo-banner/post3.png" alt="">
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
                                        <img src="media/logo-banner/post4.png" alt="">
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
    <?php require 'inc/footer.php'; ?>

</body>

</html>