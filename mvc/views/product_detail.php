<!-- product_detail.php -->
<?php
if (!isset($data['product'])) {
    echo "Không có dữ liệu sản phẩm.";
    return;
}
$product = $data['product'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['Title'] ?></title>
    <link rel="icon" type="image/jpg" href="media/logo-banner/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <base href="<?php echo app_path ?>">
    <link rel="stylesheet" href="public/lib/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/reset.css">
</head>
<body>
<?php require 'inc/header.php'; ?>

    <div id="product-container">
        <div class="left-section">
            <img class="product-image" src="media/img_product/<?= htmlspecialchars($product['Images']) ?>" alt="<?= htmlspecialchars($product['Ten_Sach']) ?>">
            <div class="action-buttons">
                <button class="btn-outline" >Thêm vào giỏ hàng</button>
                <button class="btn-solid"><a href="/Book_store/checkout/index/<?= $product['ID_Sach'] ?>/1">Mua ngay</a></button>
            </div>
        </div>
        <div class="right-section">
            <div class="product-info">
            <h1><?= htmlspecialchars($product['Ten_Sach'])?></h1>
            <div class="info-row">
            <div class="meta-info">
                <span><strong>Tác giả:</strong> <?= htmlspecialchars($product['Tac_Gia']) ?></span>
                <span><strong>Nhà xuất bản:</strong> <?= htmlspecialchars($product['Ten_Nha_Xuat_Ban']) ?></span>
            </div>
            </div>
            <div class="price">
                <?= number_format($product['Gia_Ban'], 0, ',', '.') ?>₫
                <del><?= number_format($product['Gia_Ban'] * 1.2, 0, ',', '.') ?>₫</del>
            </div>
            <span class="discount">-<?= htmlspecialchars($product['GiamGia(%)']) ?>%</span>
            </div>
            <div class="product-description">
                <h2>Mô tả sản phẩm</h2>
                <div>
                <?= $product['Mo_Ta'] ?>
                </div>
            </div>
        </div>
    </div>
    <script src="public/js/script.js"></script>
    </body>
</html>
<?php require 'inc/footer.php'; ?>