<div class="cart-container" style="max-width: 1200px; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif;">
    <h2 style="text-align: center; color: #333; margin-bottom: 20px;">Giỏ Hàng Của Bạn</h2>

    <?php if (!empty($data['cart_items'])): ?>
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
                <?php foreach ($data['cart_items'] as $item): ?>
                    <tr>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;">
                            <?php echo htmlspecialchars($item['Ten_Sach']); ?>
                        </td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;">
                            <form action="/cart/update" method="post" style="display: inline;">
                                <input type="hidden" name="book_id" value="<?php echo $item['ID_Sach']; ?>">
                                <input type="number" name="quantity" value="<?php echo $item['So_Luong']; ?>" min="1" style="width: 60px; padding: 5px; border: 1px solid #ddd; border-radius: 4px;">
                                <button type="submit" style="padding: 5px 10px; background: #28a745; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Cập nhật</button>
                            </form>
                        </td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;">
                            <?php echo number_format($item['FinalPrice'], 0, ',', '.'); ?> VNĐ
                        </td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;">
                            <?php echo number_format($item['Thanh_Tien'], 0, ',', '.'); ?> VNĐ
                        </td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;">
                            <form action="/cart/delete" method="post" style="display: inline;">
                                <input type="hidden" name="book_id" value="<?php echo $item['ID_Sach']; ?>">
                                <button type="submit" style="padding: 5px 10px; background: #dc3545; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Xóa</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div style="margin-top: 20px; text-align: right;">
            <strong>Tổng tiền: <?php echo number_format($data['total_price'], 0, ',', '.'); ?> VNĐ</strong>
        </div>

        <div style="margin-top: 20px; text-align: right;">
            <a href="/checkout" style="display: inline-block; padding: 10px 20px; background: #007bff; color: #fff; text-decoration: none; border-radius: 4px;">Thanh Toán</a>
        </div>
    <?php else: ?>
        <p style="text-align: center; color: #666; font-size: 18px;">Giỏ hàng của bạn trống!</p>
        <div style="text-align: center; margin-top: 20px;">
            <a href="/Book-store/" style="display: inline-block; padding: 10px 20px; background: #007bff; color: #fff; text-decoration: none; border-radius: 4px;">Tiếp tục mua sắm</a>
        </div>
    <?php endif; ?>
</div>