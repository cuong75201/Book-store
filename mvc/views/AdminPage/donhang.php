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
    <button class="button edit-button" onclick="openModal('Sửa')">Sửa</button>
    <button class="button delete-button" onclick="openModal('Xóa')">Xóa</button>
</div>
<div class="product-content">
    <table>
        <thead>
            <tr>
                <th>ID đơn hàng</th>
                <th>ID khách hàng</th>
                <th>Ngày đặt hàng</th>
                <th>Tông tiền</th>
                <th>Trạng thái</th>
                <th>Phương thức thanh toán</th>
                <th>Địa chỉ giao hàng</th>
            </tr>
        </thead>

        <tbody id="product-details">
            <?php
            foreach ($data['list_nhanvien'] as $nhanvien) {
                if ($nhanvien['TrangThai'] == 1) $status = "Đang hoạt động";
                else $status = "Đã khóa";
                echo '
                <tr id=' . $nhanvien["ID_NV"] . '>
                    <td>' .  $nhanvien["ID_NV"] . '</td>
                    <td>' .  $nhanvien["Ten_NV"] . '</td>
                    <td>' . $nhanvien["DiaChi"] . '</td>
                    <td>' . $nhanvien["SDT"] . '</td>
                    <td>' . $nhanvien["Luong"] . '</td>
                    <td>' . $nhanvien["TenQuyen"] . '</td>
                    <td>' . $status . '</td>
                    
                  
                </tr>
                ';
            }
            ?>
        </tbody>
    </table>

</div>

<ul id="page-select" class="page-select"></ul>