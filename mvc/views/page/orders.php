<div class="content-wrap">
    <div class="container">
        <!-- Sidebar -->
        <div class="accountSidebar bg_w">
            <div class="feature_user">
                <div class="icon">
                    <img src="//theme.hstatic.net/1000237375/1000756917/14/icon_avatar.png?v=1731" alt="Avatar">
                </div>
                <div class="user">
                    <span>Tài khoản của</span>
                    <h3><?php if (isset($data['user']) && isset($data['user']['Ten_Khach_Hang'])): ?>
                <?= htmlspecialchars($data['user']['Ten_Khach_Hang']) ?>
                    <?php else: ?>
                    <h3>Khách</h3>
                    <?php endif; ?></h3>
                </div>
            </div>
            <div class="link_account">
                <ul>
                    <li><a href="account/information">Thông tin chung</a></li>
                    <li><a href="account/addresses">Sổ địa chỉ</a></li>
                    <li class="active"><a href="account/orders">Đơn hàng của tôi</a></li>
                </ul>
            </div>
        </div>

        <!-- Nội dung chính -->
        <div class="ctAccount">
            <div class="detailAccount bg_w">
                <div class="accountNeworder">
                    <div class="fancy-title title-bottom-border">
                        <h3>Danh sách đơn hàng của tôi</h3>
                    </div>
                    <div class="table-responsive account-table">
                        <?php if (empty($data['orders'])): ?>
                            <p>Bạn chưa đặt mua sản phẩm nào!...</p>
                        <?php else: ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Ngày đặt</th>
                                        <th>Địa chỉ giao hàng</th>
                                        <th>Tổng tiền</th>
                                        <th>Trạng thái</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['orders'] as $order): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($order['ID_Don_Hang']); ?></td>
                                            <td><?php echo htmlspecialchars($order['Ngay_Dat_Hang']); ?></td>
                                            <td>
                                                <?php if ($order['Dia_Chi_Giao_Hang']): ?>
                                                    <?php echo nl2br(htmlspecialchars($order['Dia_Chi_Giao_Hang'])); ?>
                                                <?php else: ?>
                                                    Không có địa chỉ
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo number_format($order['Tong_Tien'], 0, ',', '.') . ' VNĐ'; ?></td>
                                            <td><?php echo htmlspecialchars($order['Trang_Thai']); ?></td>
                                            <td>
                                                <button type="button" class="btn-view-details" data-id="<?php echo $order['ID_Don_Hang']; ?>">
                                                    Xem chi tiết
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal chi tiết đơn hàng -->
<div class="modal fade" id="orderDetailsModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Chi tiết đơn hàng</h4>
            </div>
            <div class="modal-body">
                <div id="order-details-content">
                    <!-- Nội dung chi tiết sẽ được điền bằng JavaScript -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>