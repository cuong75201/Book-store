<div class="delete-confirm">

</div>

<div class="modifying">

</div>
<div class="modal" id="myModal">
    <div class="modal-content">
        <h2 id="modalTitle">Modal Title</h2>
        <div class="modal__product"></div>
        <button class="close-btn" onclick="closeModal()">Đóng</button>
        <button class="Save-btn">Lưu</button>
        <button class="delete-btn">Xóa</button>

    </div>
</div>


<div class="product-title">
    <h1>Danh sách đơn hàng</h1>
</div>
<div class="button-group">
    <button class="button detail-button" onclick="openModal('Chi tiết')">Chi tiết</button>
    <button class="button reset-button">Làm mới</button>
</div>
<div class="sort-content">
    <div class="sort-left">
        <input type="date" id="start-date">
        <p>đến</p>
        <input type="date" id="end-date">
    </div>
    <div class="sort-center">
        <label>Trạng thái</label>
        <select id="order-status">
            <option value="0">Chọn tình trạng</option>
            <option value="1">Đang xử lý</option>
            <option value="2">Đã xác nhận</option>
            <option value="3">Đã giao thành công</option>
            <option value="4">Đã hủy</option>
        </select>
    </div>
    <div class="sort-right">
        <label>Thành phố</label>
        <input type="text" id="thanhpho">
        <label>Quận</label>
        <input type="text" id="quan">
    </div>
    <div class="sort-submt">
        <span>Lọc</span>
    </div>
</div>
<div class="product-content">
    <table>
        <thead>
            <tr>
                <th>ID đơn hàng</th>
                <th>ID khách hàng</th>
                <th>Ngày đặt hàng</th>
                <th>Tổng tiền</th>
                <th>Địa chỉ giao hàng</th>
                <th>Phương thức thanh toán</th>
                <th>Trạng thái</th>
            </tr>
        </thead>

        <tbody id="product-details">
            <?php
            $list_pttt = array(1 => "Chuyển khoản ngân hàng", 2 => "Thanh toán khi nhận hàng");
            $list_TrangThai = array(1 => "Đang xử lý", 2 => "Đã xác nhận", 3 => "Đã giao", 4 => "Đã hủy");
            foreach ($data['list_donhang'] as $donhang) {
                echo '
                <tr id=' . $donhang["ID_Don_Hang"] . '>
                    <td>' .  $donhang["ID_Don_Hang"] . '</td>
                    <td>' .  $donhang["ID_Khach_Hang"] . '</td>
                    <td>' .  $donhang["Ngay_Dat_Hang"] . '</td>
                    <td>' .  $donhang["Tong_Tien"] . '</td>
                    <td>' .  $donhang["Dia_Chi_Giao_Hang"] . '</td>
                    <td>' .  $list_pttt[$donhang["Phuong_Thuc_Thanh_Toan"]] . '</td>
                    <td>' .  $list_TrangThai[$donhang["Trang_Thai"]] . '</td>

                </tr>
                ';
            }
            ?>
        </tbody>
    </table>

</div>

<ul id="page-select" class="page-select"></ul>