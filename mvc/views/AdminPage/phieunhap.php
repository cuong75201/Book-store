<div class="product-title">
    <h1>Danh sách Phiếu nhập</h1>
</div>
<div class="button-group">
<button type="button" class="button add-button">Thêm phiếu</button>
</div>
<div class="product-content">
    <table>
        <thead>
            <tr>
                <th>Mã phiếu</th>
                <th>Ngày nhập</th>
                <th>Nhà cung cấp</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>

        </thead>
        <tbody>
            <?php foreach ($data['listPhieu'] as $phieu): ?>
            <tr data-id="<?= $phieu['ID_PhieuNhap'] ?>">
                <td><?= $phieu['ID_PhieuNhap'] ?></td>
                <td><?= date('d/m/Y', strtotime($phieu['NgayNhap'])) ?></td>
                <td><?= $phieu['Ten_NCC'] ?? 'Không xác định' ?></td>
                <td><?= number_format($phieu['TongTien']) ?>₫</td>
                <td><?= ($phieu['TrangThai'] == 1) ? 'Đã hoàn thành' : 'Đã hủy' ?></td>
                <td>
                    <button class="button edit-button" onclick="viewDetail(<?= $phieu['ID_PhieuNhap'] ?>)">Chi tiết</button>
                    <button class="button delete-button" onclick="deletePhieu(<?= $phieu['ID_PhieuNhap'] ?>)">Xóa</button>
                </td>
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

