<div class="container">
    <div class="chir_breadcrumb">
        <a href="">Trang chủ</a>
        <span>/ <?php echo $data['name'] ?></span>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="product_top_bestseller">
                <div class="tabs-container">
                    <div>
                        <h2 style="text-align: center; font-weight:bold">
                            <a href="#">THỂ LOẠI SÁCH</a>
                        </h2>
                    </div>
                </div>
                <div class="article-container">
                    <div class="content-product-list">
                        <ul class="category">
                            <li class="active col_tl" data-tl="0"><a href=<?php echo "collections/".$data['path_dm']?>>▶ Tất cả</a></li>
                            <?php
                            $i = 0;
                            foreach ($data['list_category'] as $category) {

                                echo '<li class="col_tl" data-tl=' . $data['id_theloai'][$i] . '><a href="#" > ▶ ' . $category . '</a></li>';
                                $i++;
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="content-list row" data-dm=<?php echo $data['id_danhmuc'] ?>>
                <?php
                foreach ($data['list_product'] as $product) {
                    $GiaGiam = (int)((float) $product['Gia_Ban'] - ((float)$product['Gia_Ban'] * (float) $product['GiamGia(%)'] / 100));
                    $GiaGoc = (int) $product['Gia_Ban'];
                    $GiaGiam = number_format($GiaGiam, 0, '', '.') . 'đ';
                    $GiaGoc = number_format($GiaGoc, 0, '', '.') . 'đ';
                        $slug = $this->bookModel->slugify($product['Ten_Sach']);

                    echo '
                 <div class="item-product col-4">
                    <div class="chir_loop">
                        <div class="chir_img">
                <a href="product/detail/' . $slug . '-' . $product['ID_Sach'] . '">
                                <img src="media/img_product/' . $product['Images'] . '" alt="">
                            </a>
                            <div class="insActionloop">
                    <a href="product/detail/' . $slug . '-' . $product['ID_Sach'] . '">
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
                                    ' . $product['Ten_Sach'] . '
                                </a>
                            </h3>
                            <p class="pro-price">
                                <del>' . $GiaGoc . '</del>
                                ' . $GiaGiam . ' <span class="sale-price">
                                    <span>-' . $product['GiamGia(%)'] . '%</span>
                                </span>
                            </p>

                        </div>



                    </div>
                </div>
                ';
                }
                ?>
            </div>
            <div class="col-12 pagi">
                <ul class="pagination">
                    <?php
                    for ($i = 0; $i < $data['total_page']; $i++) {
                        echo '<li class ="page"><a  href="collections/' . $data['params'] . '?page=' . ($i + 1) . '" title="">' . ($i + 1) . '</a></li>';
                    }
                    ?>
                </ul>
            </div>

        </div>
    </div>
</div>
