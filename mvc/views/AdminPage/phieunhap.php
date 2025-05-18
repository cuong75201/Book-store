<div class="product-title">
    <h1>Danh sách Phiếu nhập</h1>
</div>
<div class="button-group">
    <button type="button" class="button add-button">Thêm phiếu</button>
    <button type="button" class="button edit-button" id="btnViewDetail">Chi tiết</button>
    <button type="button" class="button delete-button" id="btnDelete">Xóa</button>
</div>
<div class="button-group">
    <div class="search-container">
        <select id="searchType">
            <option value="date">Ngày nhập (yyyy-mm-dd)</option>
            <option value="staff">Mã nhân viên</option>
            <option value="product">Mã hàng hóa</option>
        </select>
        <input type="text" id="searchInput" placeholder="Nhập từ khóa...">
        <button type="button" class="button reset-button" onclick="searchPhieu()">Tìm kiếm</button>
    </div>
</div>
<div class="product-content">
    <table>
        <thead>
            <tr>
                <th>Mã phiếu</th>
                <th>Nhân viên</th>
                <th>Ngày nhập</th>
                <th>Nhà cung cấp</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['listPhieu'] as $phieu): ?>
            <tr data-id="<?= $phieu['ID_PhieuNhap'] ?>">
                <td><?= $phieu['ID_PhieuNhap'] ?></td>
                <td><?= $phieu['Ten_NV'] ?? 'Không xác định'?></td>
                <td><?= date('d/m/Y', strtotime($phieu['NgayNhap'])) ?></td>
                <td><?= $phieu['Ten_NCC'] ?? 'Không xác định' ?></td>
                <td><?= number_format($phieu['TongTien']) ?>₫</td>
                <td><?= ($phieu['TrangThai'] == 1) ? 'Đã hoàn thành' : 'Đã hủy' ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- Modal Thêm phiếu -->
<div class="modal" id="myModal">
  <div class="modal-content">
    <h2 id="modalTitle">Thêm phiếu nhập</h2>
    <div class="modal__product"></div>
    <div class="modal-footer">
      <button class="Save-btn">Lưu</button>
      <button class="button delete-button" onclick="closeModal()">Đóng</button>
    </div>
  </div>
</div>
<div id="phieuModal" class="modal">
    <div class="modal-content">
        <div class="modal-body"></div>
    </div>
</div>

