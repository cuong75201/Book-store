

    <!-- Nội dung của trang PHP -->

    <div class="delete-confirm"></div>
    <div class="modifying"></div>
    <div class="modal" id="myModal">
        <div class="modal-content">
            <h2 id="modalTitle">Modal Title</h2>
            <div class="modal__product"></div>
            <button class="close-btn" onclick="closeModal()">Đóng</button>
            <button class="Save-btn" >Lưu </button>
        </div>
    </div>

    <div class="product-title">
        <h1>Danh sách nhà cung cấp</h1>
    </div>
    <div class="button-group">
        <button class="button add-button" onclick="openModal('Thêm')">Thêm</button>
        <button class="button edit-button" onclick="openModal('Sửa')">Sửa</button>
        <!-- <button class="button delete-button" onclick="khoaNhaCungCap()">Khóa</button> -->
        <!-- <button class="button delete-button" onclick="moNhaCungCap()">Mở</button> -->
         <button class="button delete-button" onclick="xoaNhaCungCap()">Xóa</button>
    </div>
    <div class="product-content">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Nhà cung cấp</th>
                    <th>Địa chỉ</th>
                    <th>Liên hệ</th>
                </tr>
            </thead>
            <tbody id="product-details">
                <?php
                require_once "mvc/models/NccModel.php";
                $model = new NccModel();
                $result = $model->getAllNCC();
                foreach ($result as $ncc) {
                    echo '
                    <tr id=' .  $ncc["ID_NCC"] . '>
                        <td>' . $ncc["ID_NCC"] . '</td>
                        <td>' . $ncc["Ten_NCC"] . '</td>
                        <td>' .  $ncc["DiaChi"] . '</td>
                        <td>' .  $ncc["LienHe"] . '</td>
                    </tr>
                    ';
                }
                ?>
            </tbody> 
        </table>
    </div>

    <ul id="page-select" class="page-select"></ul>


