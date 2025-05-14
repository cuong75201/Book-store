<div class="delete-confirm">

</div>

<div class="modifying">

</div>
<div class="modal" id="myModal">
    <div class="modal-content" style="width:60%">
        <h2 id="modalTitle">Modal Title</h2>
        <div class="modal__product"></div>
        <button class="close-btn" onclick="closeModal()">Đóng</button>
        <button class="Save-btn">Lưu</button>
        <button class="delete-btn">Xóa</button>
    </div>
</div>


<div class="product-title">
    <h1>Danh sách nhân viên</h1>
</div>
<div class="button-group">
    <button class="button add-button" onclick="openModal('Thêm')">Thêm</button>
    <button class="button edit-button" onclick="openModal('Sửa')">Sửa</button>
    <button class="button delete-button" onclick="openModal('Xóa')">Xóa</button>
</div>
<div class="product-content">
    <table>
        <thead>
            <tr>
                <th>Mã quyền</th>
                <th>Tên quyền</th>
            </tr>
        </thead>

        <tbody id="product-details">
            <?php
            foreach ($data['list_quyen'] as $quyen) {
                echo '
                <tr id=' . $quyen["MaQuyen"] . '>
                    <td>' .  $quyen["MaQuyen"] . '</td>
                    <td>' .  $quyen["TenQuyen"] . '</td>
                  
                </tr>
                ';
            }
            ?>

        </tbody>
    </table>

</div>