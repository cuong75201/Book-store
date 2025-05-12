<section id="content" bis_skin_checked="1">
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
                    <li class="active"><a href="account/information">Thông tin chung</a></li>
                    <li><a href="account/addresses">Sổ địa chỉ</a></li>
                    <li><a href="account/orders">Đơn hàng của tôi</a></li>
                </ul>
            </div>
         </div>

        <!-- Nội dung chính -->
         <div class="ctAccount">
            <div class="detailAccount bg_w">
                <div class="accountInfo relative">
                    <h3>Bảng thông tin của tôi</h3>
                    <div class="user_info">
                        <h3>Thông tin tài khoản</h3>
                        <div class="main">
                            <ul>
                                <li><span class="first">Họ và tên: </span><span class="last"><?php if (isset($data['user']) && isset($data['user']['Ten_Khach_Hang'])): ?>
                <?= htmlspecialchars($data['user']['Ten_Khach_Hang']) ?>
                    <?php else: ?>
                    <h3>Khách</h3>
                    <?php endif; ?></h3></span></li>
                                <li><span class="first">Email: </span><span class="last"><?php echo $_COOKIE['user_email'] ?? 'Không có thông tin'; ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <a href="account/logout" class="logout clickOut">Đăng xuất</a>
                </div>

                <div class="accountNeworder">
                    <div class="fancy-title title-bottom-border">
                        <h3>Các đơn hàng vừa đặt</h3>
                    </div>
                    <div class="table-responsive account-table">
                        <p>Bạn chưa đặt mua sản phẩm nào!...</p>
                    </div>
                </div>

                <div class="accountAddress">
                    <h3>
                        Sổ địa chỉ
                        <a href="account/addresses" class="viewADR">Xem tất cả <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </h3>
                    <div class="address row">
                        <div class="col-sm-6 col-xs-12 address_defaul">
                            <div class="main">
                                <div class="address_table">
                                    <div class="customer_address">
                                        <div class="view_address">
    <?php if (isset($data['default_address']) && $data['default_address']): ?>
        <span class="label_defaul">Mặc định</span>
        <p class="name"><?php echo htmlspecialchars($data['default_address']['Ten_Nguoi_Nhan']); ?></p>
        <p class="address">Địa chỉ: <?php echo htmlspecialchars($data['default_address']['Dia_Chi']); ?></p>
        <p class="phone">Điện thoại: <?php echo htmlspecialchars($data['default_address']['So_Dien_Thoai']); ?></p>
    <?php else: ?>
        <span class="label_defaul">Mặc định</span>
        <p class="name"><?php echo $_SESSION['username'] ?? 'Người dùng'; ?></p>
        <p class="address">Địa chỉ: Chưa có địa chỉ mặc định</p>
        <p class="phone">Điện thoại: </p>
        <p class="address_actions">
            <span class="action_link action_edit">
                <a href="account/addresses">Thêm địa chỉ</a>
            </span>
        </p>
    <?php endif; ?>
</div>
                                    </div>

                                    
                                </div> <!-- end address_table -->
                            </div> <!-- end main -->
                        </div> <!-- end address_defaul -->
                    </div> <!-- end address row -->
                </div> <!-- end accountAddress -->
            </div>

         </div>
    </div>
</div>
</section> <!-- content-wrap -->