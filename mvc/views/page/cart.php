<div class="cart-container" style="max-width: 1200px; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif;">
    <h2 style="text-align: center; color: #333; margin-bottom: 20px;">Giỏ Hàng Của Bạn</h2>
    <?php if (!empty($data['cart_item'])) {
        echo '  
        <table style="width: 100%; border-collapse: collapse; background: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
            <thead>
                <tr style="background: #f5f5f5; text-align: left;">
                    <th style="padding: 12px; border-bottom: 2px solid #ddd;">Sách</th>
                    <th style="padding: 12px; border-bottom: 2px solid #ddd;">Số lượng</th>
                    <th style="padding: 12px; border-bottom: 2px solid #ddd;">Giá</th>
                    <th style="padding: 12px; border-bottom: 2px solid #ddd;">Thành tiền</th>
                    <th style="padding: 12px; border-bottom: 2px solid #ddd;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
            ';
    }; ?>
    <?php foreach ($data['cart_item'] as $item): ?>
        <tr id=<?php echo $item['ID_Sach'] ?>>
            <td style="padding: 12px; border-bottom: 1px solid #ddd;">
                <?php echo $item['Ten_Sach']; ?>
            </td>
            <td style="padding: 12px; border-bottom: 1px solid #ddd;">
                <input type="number" id=<?php echo $item['ID_Sach'] ?> class="quantity" value="<?php echo $item['So_Luong']; ?>" min="1" style="width: 60px; padding: 5px; border: 1px solid #ddd; border-radius: 4px;">
                <button class="btn-update" id=<?php echo $item['ID_Sach'] ?> style="padding: 5px 10px; background: #28a745; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Cập nhật</button>
            </td>
            <td style="padding: 12px; border-bottom: 1px solid #ddd;">
                <?php echo (int) $item['Gia_Ban']; ?> VNĐ
            </td>
            <td style="padding: 12px; border-bottom: 1px solid #ddd;" class="td-total" id=<?php echo $item['ID_Sach'] ?>>
                <?php echo (int) $item['Gia_Ban'] * (int)$item['So_Luong']; ?> VNĐ
            </td>
            <td style="padding: 12px; border-bottom: 1px solid #ddd;">
                <button class="delete-btn" id=<?php echo $item['ID_Sach'] ?> style="padding: 5px 10px; background: #dc3545; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Xóa</button>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>

    <div style="margin-top: 20px; text-align: right;">
        <strong class="total">Tổng tiền: <?php
                                            $total = 0;
                                            foreach ($data['cart_item'] as $item) {
                                                $total += (int) $item['Gia_Ban'] * (int)$item['So_Luong'];
                                            }
                                            echo number_format($total, 0, ',', '.');

                                            ?> VNĐ</strong>
    </div>

    <div style="margin-top: 20px; text-align: right;">
        <a href="/checkout" style="display: inline-block; padding: 10px 20px; background: #007bff; color: #fff; text-decoration: none; border-radius: 4px;">Thanh Toán</a>
    </div>
    <?php if (empty($data['cart_item'])): ?>
        <p style="text-align: center; color: #666; font-size: 18px;">Giỏ hàng của bạn trống!</p>
        <div style="text-align: center; margin-top: 20px;">
            <a href="/Book-store/" style="display: inline-block; padding: 10px 20px; background: #007bff; color: #fff; text-decoration: none; border-radius: 4px;">Tiếp tục mua sắm</a>
        </div>
    <?php endif; ?>
</div>