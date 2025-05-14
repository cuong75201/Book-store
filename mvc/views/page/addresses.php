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
                    <li class="active"><a href="account/addresses">Sổ địa chỉ</a></li>
                    <li><a href="account/orders">Đơn hàng của tôi</a></li>
                </ul>
            </div>
         </div>

        <!-- Nội dung chính -->
        <div class="ctAccount">
            <div class="detailAccount bg_w">
                <div class="accountAddress">
                    <div class="address-header">
                        <h3>Địa chỉ của tôi</h3>
                        <button type="button" id="btn-add-address" class="btn btn-primary">
                            <i class="fa fa-plus" aria-hidden="false"></i> Thêm địa chỉ mới
                        </button>
                    </div>
                    
                    <?php if(empty($data['addresses'])): ?>
                    <div class="no-address">
                        <p>Bạn chưa có địa chỉ nào. Vui lòng thêm địa chỉ mới.</p>
                    </div>
                    <?php else: ?>
                    <div class="address-list row">
                        <?php foreach($data['addresses'] as $address): ?>
                        <div class="col-sm-6 col-xs-12 address-item" data-id="<?php echo $address['ID']; ?>">
                            <div class="address-box <?php echo $address['Mac_Dinh'] ? 'is-default' : ''; ?>">
                                <?php if($address['Mac_Dinh']): ?>
                                <span class="label-default">Mặc định</span>
                                <?php endif; ?>
                                
                                <p class="name"><?php echo htmlspecialchars($address['Ten_Nguoi_Nhan']); ?></p>
                                <p class="address">Địa chỉ: <?php echo htmlspecialchars($address['Dia_Chi']); ?></p>
                                <p class="phone">Điện thoại: <?php echo htmlspecialchars($address['So_Dien_Thoai']); ?></p>
                                
                                <div class="address-actions">
                                    <button type="button" class="btn-edit" data-id="<?php echo $address['ID']; ?>">
                                        <i class="fa fa-pencil" aria-hidden="true"></i> Sửa
                                    </button>
                                    <button type="button" class="btn-delete" data-id="<?php echo $address['ID']; ?>">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Xóa
                                    </button>
                                    <?php if(!$address['Mac_Dinh']): ?>
                                    <button type="button" class="btn-set-default" data-id="<?php echo $address['ID']; ?>">
                                        Thiết lập mặc định
                                    </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal thêm/sửa địa chỉ -->
<div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="addressModalLabel">Thêm địa chỉ mới</h4>
            </div>
            <div class="modal-body">
                <form id="addressForm">
                    <input type="hidden" id="address_id" name="id" value="0">
                    
                    <div class="form-group">
                        <label for="name">Họ tên</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="duong">Đường</label>
                        <input type="text" class="form-control" id="duong" name="duong" placeholder="Nhập đường">
                    </div>
                    <div class="form-group">
                        <label for="quan">Quận/Huyện</label>
                        <input type="text" class="form-control" id="quan" name="quan" placeholder="Nhập quận/huyện">
                    </div>
                    <div class="form-group">
                        <label for="thanhpho">Thành phố/Tỉnh</label>
                        <input type="text" class="form-control" id="thanhpho" name="thanhpho" placeholder="Nhập thành phố/tỉnh">
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="is_default" name="is_default" value="1">
                            Đặt làm địa chỉ mặc định
                        </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-primary" id="saveAddress">Lưu</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal xác nhận xóa -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Xác nhận xóa</h4>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc chắn muốn xóa địa chỉ này?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Xóa</button>
            </div>
        </div>
    </div>
</div>