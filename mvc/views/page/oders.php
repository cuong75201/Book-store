
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
                    <h3><?php echo $_SESSION['username'] ?? 'Khách'; ?></h3>
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
                        <p>Bạn chưa đặt mua sản phẩm nào!...</p>
                    </div>
                </div>

                


											
											
                                        </div>
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- accountAddress -->
            </div> <!-- detailAccount -->
        </div> <!-- ctAccount -->
    </div> <!-- container -->
</div> <!-- content-wrap --> 
