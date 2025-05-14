<div class="delete-confirm">

</div>

<div class="modifying">

</div>
<div class="modal" id="myModal">
    <div class="modal-content">
        <h2 id="modalTitle">Modal Title</h2>
        <div class="modal__product"></div>
        <button class="close-btn" onclick="closeModal()">Đóng</button>

    </div>
</div>
<div class="product-title">
    <h1>Thống kê khách hàng</h1>
</div>
<div class="section-one">
    <div class="section-one-title">
        <h3>Lọc khách hàng</h3>
    </div>
    <div class="section-one-info">
        <div class="startday">
            <label for="start-date">Chọn ngày bắt đầu: </label>
            <input type="date" id="start-date" placeholder="Nhập tháng">
        </div>
        <div class="endday">
            <label for="end-date">Chọn ngày kết thúc: </label>
            <input type="date" id="end-date" placeholder="Nhập năm">
        </div>
        <div class="btn-grp">
            <button class="search-btn">
                Tìm kiếm
            </button>
            <button class="reset-btn">
                Tải lại
            </button>
        </div>

    </div>

</div>
<div class="product-content">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên khách hàng</th>
                <th>Tổng tiền</th>
                <th>Chi tiết</th>
            </tr>
        </thead>

        <tbody id="product-details" class="thongkekh">
            <?php
            foreach ($data['list_kh'] as $donhang) {
                echo '
                <tr id=' . $donhang["ID_Khach_Hang"] . '>
                    <td>' .  $donhang["ID_Khach_Hang"] . '</td>
                    <td>' .  $donhang["nameKH"] . '</td>
                    <td>' . $donhang["Tong_Tien"] . '</td>
                    <td ><button class="detail-btn" id=' . $donhang["ID_Khach_Hang"] . ' onclick=detail(this)>Chi tiết</button></td>

                    
                  
                </tr>
                ';
            }
            ?>
        </tbody>
    </table>

</div>
<div class="product-title">
    <h1>Thống kê đơn hàng theo ngày</h1>
</div>
<div class="product-content">
    <table>
        <thead>
            <tr>
                <th>Ngày</th>
                <th>Vốn</th>
                <th>Doanh thu</th>
                <th>Lợi nhuận</th>
            </tr>
        </thead>

        <tbody id="product-details" class="tkdonhang">

        </tbody>
    </table>

</div>
<div class="product-title">
    <h1>Thống kê sản phẩm</h1>
</div>
<div class="product-content">
    <table>
        <thead>
            <tr>
                <th>ID Sản phẩm</th>
                <th>Tên Sản phẩm</th>
                <th>Số lượng bán ra</th>
                <th>Doanh thu</th>
            </tr>
        </thead>

        <tbody id="product-details" class="tksanpham">
            <?php
            foreach ($data['list_sach'] as $sach) {
                echo '
                <tr>
                     <td>' .  $sach["ID_Sach"] . '</td>
                     <td>' .  $sach["name_sach"]['Ten_Sach'] . '</td>
                     <td>' .  $sach["soluong"] . '</td>
                     <td>' .  $sach["thanhtien"] . '</td>
                </tr>
                ';
            }
            ?>
        </tbody>
    </table>

</div>