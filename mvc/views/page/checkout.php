<?php
$products = $data['products'] ?? [];
$total = $data['total'] ?? 0;
$defaultAddress = $data['default_address'] ?? null;
$addresses = $data['addresses'] ?? [];
?>
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --accent-color: #3b82f6;
            --light-gray: #f3f4f6;
            --border-color: #e5e7eb;
            --text-dark: #111827;
            --text-light: #4b5563;
            --danger: #ef4444;
            --success: #10b981;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f9fafb;
            color: var(--text-dark);
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }
        
        .checkout-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
        }
        
        @media (min-width: 768px) {
            .checkout-grid {
                grid-template-columns: 2fr 1fr;
            }
        }
        
        .card {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .card-header {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid var(--border-color);
        }
        
        .card-header i {
            margin-right: 0.75rem;
            color: var(--primary-color);
            font-size: 1.25rem;
        }
        
        .card-header h2 {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-dark);
            margin: 0;
        }
        
        .coproduct-item {
            display: flex;
            padding: 1rem 0;
            border-bottom: 1px solid var(--border-color);
        }
        
        .coproduct-item:last-child {
            border-bottom: none;
        }
        
        .coproduct-image {
            width: 80px;
            height: 100px;
            object-fit: cover;
            border-radius: 0.25rem;
            margin-right: 1rem;
        }
        
        .coproduct-details {
            flex: 1;
        }
        
        .coproduct-title {
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 0.25rem;
        }
        
        .coproduct-meta {
            color: var(--text-light);
            font-size: 0.875rem;
            margin-bottom: 0
        }
        
        .quantity-control {
            display: flex;
            align-items: center;
            margin-top: 0.5rem;
        }
        
        .quantity-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            border: 1px solid var(--border-color);
            background: white;
            cursor: pointer;
            font-weight: bold;
            border-radius: 4px;
            transition: all 0.2s;
        }
        
        .quantity-btn:hover {
            background-color: var(--light-gray);
        }
        
        .quantity-input {
            width: 40px;
            height: 28px;
            text-align: center;
            border: 1px solid var(--border-color);
            margin: 0 0.5rem;
            border-radius: 4px;
        }
        
        .coproduct-price {
            font-weight: 600;
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            white-space: nowrap;
        }
        
        .address-section {
            margin-bottom: 1rem;
        }
        
        .address-card {
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            padding: 1rem;
            margin-bottom: 1rem;
        }
        
        .address-card.selected {
            border-color: var(--primary-color);
            background-color: rgba(37, 99, 235, 0.05);
        }
        
        .address-name {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }
        
        .address-details, .address-phone {
            color: var(--text-light);
            font-size: 0.875rem;
            margin-bottom: 0.25rem;
        }
        
        .address-actions {
            margin-top: 0.75rem;
            display: flex;
            gap: 1rem;
        }
        
        .address-link {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 0.875rem;
            display: inline-flex;
            align-items: center;
        }
        
        .address-link i {
            margin-right: 0.25rem;
        }
        
        .address-link:hover {
            text-decoration: underline;
        }
        
        .address-select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            background-color: white;
            font-size: 0.875rem;
            color: var(--text-dark);
            margin-bottom: 0.75rem;
        }
        
        .payment-option {
            display: flex;
            align-items: center;
            padding: 1rem;
            margin-bottom: 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .payment-option:hover {
            background-color: rgba(37, 99, 235, 0.05);
        }
        
        .payment-option.selected {
            border-color: var(--primary-color);
            background-color: rgba(37, 99, 235, 0.05);
        }
        
        .payment-radio {
            margin-right: 0.75rem;
        }
        
        .payment-icon {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.75rem;
            color: var(--primary-color);
            font-size: 1.25rem;
        }
        
        .payment-details {
            flex: 1;
        }
        
        .payment-title {
            font-weight: 500;
            margin-bottom: 0.25rem;
        }
        
        .payment-description {
            font-size: 0.875rem;
            color: var(--text-light);
        }
        
        .bank-details {
            font-size: 0.875rem;
            background-color: var(--light-gray);
            padding: 1rem;
            margin-top: 0.75rem;
            border-radius: 0.5rem;
            display: none;
        }
        
        .bank-details.active {
            display: block;
        }
        
        .order-summary {
            position: sticky;
            top: 1rem;
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid var(--border-color);
        }
        
        .summary-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        
        .summary-label {
            color: var(--text-light);
        }
        
        .summary-value {
            font-weight: 600;
        }
        
        .summary-total {
            font-size: 1.125rem;
            font-weight: 700;
            color: var(--primary-color);
        }
        
        .promo-input {
            display: flex;
            margin-bottom: 1rem;
        }
        
        .promo-field {
            flex: 1;
            padding: 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem 0 0 0.5rem;
            font-size: 0.875rem;
        }
        
        .promo-btn {
            padding: 0.75rem 1rem;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 0 0.5rem 0.5rem 0;
            cursor: pointer;
            font-weight: 500;
            transition: background-color 0.2s;
        }
        
        .promo-btn:hover {
            background-color: var(--secondary-color);
        }
        
        .checkout-btn {
            display: block;
            width: 100%;
            padding: 1rem;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
            margin-top: 1rem;
        }
        
        .checkout-btn:hover {
            background-color: var(--secondary-color);
        }
        
        .note-textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            min-height: 80px;
            font-size: 0.875rem;
            resize: vertical;
        }
        
        .badge {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
            margin-left: 0.5rem;
        }
        
        .badge-success {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }
        
        .badge-danger {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }
    </style>
    <div class="container">
    <div class="row">
        <!-- Cột bên trái: Sản phẩm, địa chỉ, phương thức thanh toán, ghi chú -->
        <div class="col-md-8">
            <!-- Sản phẩm -->
<div class="card">
    <div class="card-header">
        <i class="fas fa-shopping-cart"></i>
        <h3>Sản phẩm</h3>
    </div>
    <div class="card-body">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="product-item" data-product-id="<?= htmlspecialchars($product['ID_Sach']) ?>">
                    <img src="media/img_product/<?= htmlspecialchars($product['Images']) ?>" alt="<?= htmlspecialchars($product['Ten_Sach']) ?>" style="width: 80px; height: 100px; object-fit: cover; margin-right: 1rem;">
                    <div class="product-details">
                        <h4><?= htmlspecialchars($product['Ten_Sach']) ?></h4>
                    </div>
                    <div class="quantity-control" data-product-id="<?= htmlspecialchars($product['ID_Sach']) ?>">
                        <button class="quantity-btn decrease">-</button>
                        <input type="text" class="quantity-input" value="<?= htmlspecialchars($product['So_Luong']) ?>" data-price="<?= htmlspecialchars($product['FinalPrice']) ?>">
                        <input type="hidden" class="quantity-hidden" value="<?= htmlspecialchars($product['So_Luong']) ?>">
                        <button class="quantity-btn increase">+</button>
                    </div>
                    <div class="coproduct-price product-price">
                        <?= number_format($product['FinalPrice'] * $product['So_Luong'], 0, ',', '.') ?> VNĐ
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Không có sản phẩm nào trong giỏ hàng.</p>
        <?php endif; ?>
    </div>
</div>

            <!-- Địa chỉ giao hàng -->
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-map-marker-alt"></i>
                    <h3>Địa chỉ giao hàng</h3>
                </div>
                <div class="card-body">
                    <select id="address-select" name="address_id">
                        <option value="">Chọn địa chỉ</option>
                        <?php foreach ($addresses as $address): ?>
                            <option value="<?= htmlspecialchars($address['ID']) ?>" 
                                    data-name="<?= htmlspecialchars($address['Ten_Nguoi_Nhan']) ?>" 
                                    data-address="<?= htmlspecialchars($address['Dia_Chi']) ?>" 
                                    data-phone="<?= htmlspecialchars($address['So_Dien_Thoai']) ?>"
                                    <?= $address['Mac_Dinh'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($address['Ten_Nguoi_Nhan']) ?> - <?= htmlspecialchars($address['Dia_Chi']) ?>
                                </option>
                        <?php endforeach; ?>
                    </select>
                    <div id="selected-address-info" class="view_address" style="margin-top: 10px; display: none;">
                        <p class="name"></p>
                        <p class="address"></p>
                        <p class="phone"></p>
                        </div>
                    <input type="hidden" id="address-id" name="address_id">
                    <div class="address-actions">
                        <a href="account/addresses" id="btn-add-address">
                            <i class="fas fa-plus"></i> Thêm địa chỉ mới
                        </a>
                        <a href="account/addresses">
                            <i class="fas fa-cog"></i> Quản lý địa chỉ
                        </a>
                    </div>
                </div>
            </div>

            <!-- Phương thức thanh toán -->
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-credit-card"></i>
                        <h2>Phương thức thanh toán</h2>
                    </div>
                    <div class="card-body">
                        <div class="payment-option selected" data-payment="cod">
                            <input type="radio" name="payment" id="payment-cod" class="payment-radio" checked>
                            <div class="payment-icon">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <div class="payment-details">
                                <div class="payment-title">Thanh toán khi giao hàng (COD)</div>
                                <div class="payment-description">Bạn chỉ phải thanh toán khi nhận được hàng</div>
                            </div>
                        </div>
                        
                        <div class="payment-option" data-payment="bank">
                            <input type="radio" name="payment" id="payment-bank" class="payment-radio">
                            <div class="payment-icon">
                                <i class="fas fa-university"></i>
                            </div>
                            <div class="payment-details">
                                <div class="payment-title">Chuyển khoản qua ngân hàng</div>
                                <div class="payment-description">Chuyển khoản trực tiếp đến tài khoản của chúng tôi</div>
                            </div>
                        </div>
                        
                        <div class="bank-details" id="bank-details">
            <p><strong>a. Ngân hàng Eximbank - chi nhánh Thủ Đô - Hà Nội</strong></p>

            <p>Chủ tài khoản: Công ty TNHH MTV TM và DV Văn Hóa Minh Long</p>
            <p>Số tài khoản: 1702 1485 1003 641</p>
            <p>Nội dung: &lt;Tên người chuyển&gt; &lt;Mã đơn hàng&gt; &lt;Số tiền&gt;</p>

            <p><strong>b. Ngân hàng BIDV - Chi nhánh Hoàn Kiếm - Hà Nội</strong></p>

            <p>Chủ tài khoản: Công ty TNHH MTV TM và DV Văn Hóa Minh Long</p>
            <p>Số tài khoản: 1241 000 5555 686</p>
            <p>Nội dung: &lt;Tên người chuyển&gt; &lt;Mã đơn hàng&gt; &lt;Số tiền&gt;</p>

            <p><strong>1.</strong> Ngay sau khi chuyển khoản thành công, Quý khách vui lòng thông báo đến minhlongbook.vn thông qua một trong 2 hình thức sau:</p>

            <p>- Thông báo đến hotline: 0989 849 396 (8 giờ 30 – 17 giờ 30)</p>
            <p>- Soạn tin nhắn theo dạng: &lt;Tên người chuyển&gt; &lt;Mã đơn hàng&gt; &lt;Số tiền&gt;</p>

            <p>Ví dụ: Thanh Huyền gửi 215,000 cho đơn hàng MLB0002159 gửi đến hotline: 0989 849 396</p>

            <p><strong>2.</strong> Thời gian minhlongbook.vn nhận được tiền chuyển trong ngày (đối với cùng ngân hàng) và từ 1 đến 3 ngày (đối với chuyển khác ngân hàng).</p>

            <p><strong>3.</strong> Phí chuyển tiền sẽ do khách hàng chịu phí. Quý khách vui lòng kiểm tra với ngân hàng trước khi chuyển.</p>
                        </div>
                        
                        <div class="payment-option" data-payment="qr">
                            <input type="radio" name="payment" id="payment-qr" class="payment-radio">
                            <div class="payment-icon">
                                <i class="fas fa-qrcode"></i>
                            </div>
                            <div class="payment-details">
                                <div class="payment-title">Chuyển khoản qua QR - BIDV</div>
                                <div class="payment-description">Quét mã QR để thanh toán qua ứng dụng ngân hàng</div>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- Ghi chú đơn hàng -->
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-sticky-note"></i>
                    <h3>Ghi chú đơn hàng</h3>
                </div>
                <div class="card-body">
                    <textarea name="order-note" placeholder="Ghi chú của bạn (nếu có)"></textarea>
                </div>
            </div>
        </div>

        <!-- Cột bên phải: Tóm tắt đơn hàng -->
        <div class="col-md-4">
            <div class="card">
    <div class="card-header">
        <i class="fas fa-receipt"></i>
        <h3>Tóm tắt đơn hàng</h3>
    </div>
    <div class="card-body">
        <div class="summary-row">
            <span class="summary-label">Tổng tiền hàng</span>
            <span class="summary-value"><?= number_format($total, 0, ',', '.') ?> VNĐ</span>
        </div>
        <div class="summary-row">
            <span class="summary-label">Phí vận chuyển(5% Tổng tiền hàng)</span>
            <span class="summary-value">0 VNĐ</span> <!-- Sẽ được cập nhật bởi JavaScript -->
        </div>
        <div class="summary-row">
            <span class="summary-label">Giảm giá</span>
            <span class="summary-value">0 VNĐ</span> <!-- Sẽ được cập nhật bởi JavaScript -->
        </div>
        <div class="summary-row">
            <span class="summary-label">Tổng thanh toán</span>
            <span class="summary-value"><?= number_format($total, 0, ',', '.') ?> VNĐ</span> <!-- Sẽ được cập nhật bởi JavaScript -->
        </div>
        <div class="promo-input">
            <input type="text" placeholder="Mã giảm giá" class="promo-field">
            <button class="promo-btn">Áp dụng</button>
        </div>
        <button class="promo-btn" id="checkout-btn" data-products='<?= json_encode($products) ?>' data-total="<?= $total ?>">
            Xác nhận đặt hàng
        </button>
    </div>
</div>
        </div>
    </div>
</div>