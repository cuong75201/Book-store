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
    <h1>Danh sách sản phẩm</h1>
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
                <th>ID</th>
                <th>Tên Sách</th>
                <th>Tác giả</th>
                <th>Nhà xuất bản</th>
                <th>Năm xuất bản</th>
                <th>Danh mục</th>
                <th>Thể loại</th>
                <th>Giá bán</th>
                <th>Giảm giá</th>
                <th>Số lượng</th>
            </tr>
        </thead>

        <tbody id="product-details">
            <?php
            foreach ($data['list_product'] as $product) {
                echo '
                <tr id=' . $product["ID_Sach"] . '>
                    <td>' . $product["ID_Sach"] . '</td>
                    <td>' . $product["Ten_Sach"] . '</td>
                    <td>' . $product["Tac_Gia"] . '</td>
                    <td>' . $product["Ten_Nha_Xuat_Ban"] . '</td>
                    <td>' . $product["Nam_Xuat_Ban"] . '</td>
                    <td>' . mb_strtolower($product["DanhMuc"]) . '</td>
                    <td>' . $product["TheLoai"] . '</td>
                    <td>' . (int) $product["Gia_Ban"] . '</td>
                    <td>' . $product["GiamGia(%)"] . '</td>
                    <td>' . $product["So_Luong_Ton"] . '</td>
                </tr>
                ';
            }
            ?>
        </tbody>
    </table>

</div>

<ul id="page-select" class="page-select"></ul>