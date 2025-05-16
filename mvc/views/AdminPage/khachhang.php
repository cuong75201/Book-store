

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
        <h1>Danh sách khách hàng</h1>
    </div>
    <div class="button-group">
        <button class="button add-button" onclick="openModal('Thêm')">Thêm</button>
        <button class="button edit-button" onclick="openModal('Sửa')">Sửa</button>
        <button class="button delete-button" onclick="khoaKhachHang()">Khóa</button>
        <button class="button delete-button" onclick="moKhachHang()">Mở</button>
        <button class="button delete-button" onclick="xoaKhachHang()">Xóa</button>
    </div>
    <div class="product-content">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Khách hàng</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Ngày đăng kí</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody id="product-details">
                <?php
                require_once "mvc/models/UserModel.php";
                $model = new UserModel();
                //$result = $model->getAllUser();
                $result = $data['list_khachhang'];
                foreach ($result as $user) {
                    $trangThai = ( $user["status"] == 0) ? "bị khóa" : "hoạt động";
                    echo '
                    <tr id=' .  $user["ID_Khach_Hang"] . '>
                        <td>' . $user["ID_Khach_Hang"] . '</td>
                        <td>' . $user["Ten_Khach_Hang"] . '</td>
                        <td>' . $user["Email"] . '</td>
                        <td>' . $user["So_Dien_Thoai"] . '</td>
                        <td>' . $user["Dia_Chi"] . '</td>
                        <td>' . $user["Ngay_Dang_Ky"] . '</td>
                        <td>' . $trangThai . '</td>
                    </tr>
                    ';
                }
                ?>
            </tbody> 
        </table>
    </div>

    <ul id="page-select" class="page-select"></ul>


