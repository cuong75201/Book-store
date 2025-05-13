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
                <th>Địa chỉ giao hàng</th>
                <th>Phương thức thanh toán</th>
                <th>Trạng thái</th>
            </tr>
        </thead>

        <tbody id="product-details">
            <?php
            foreach ($data['list_donhang'] as $donhang) {
                echo '
                <tr id=' . $donhang["ID_Don_Hang"] . '>
                    <td>' .  $donhang["ID_Don_Hang"] . '</td>
                    <td>' .  $donhang["ID_Khach_Hang"] . '</td>
                    <td>' .  $donhang["Ngay_Dat_Hang"] . '</td>
                    <td>' .  $donhang["Tong_Tien"] . '</td>
                    <td>' .  $donhang["Dia_Chi_Giao_Hang"] . '</td>
                    <td>' .  $donhang["Phuong_Thuc_Thanh_Toan"] . '</td>
                    <td>' .  $donhang["Trang_Thai"] . '</td>

                </tr>
                ';
            }
            ?>
        </tbody>
    </table>

</div>

<ul id="page-select" class="page-select"></ul>