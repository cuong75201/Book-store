<h3>Chi tiết Phiếu #<?= htmlspecialchars($pn['ID_PhieuNhap']) ?></h3>
<p>Ngày Nhập: <?= htmlspecialchars($pn['NgayNhap']) ?></p>
<p>Nhà Cung Cấp: <?= htmlspecialchars($pn['ID_NCC']) ?></p>
<table>
    <thead><tr><th>Sách</th><th>Số Lượng</th><th>Giá Nhập</th></tr></thead>
    <tbody>
    <?php foreach ($ct as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['TenSach']) ?></td>
            <td><?= htmlspecialchars($row['SoLuong']) ?></td>
            <td><?= htmlspecialchars($row['GiaNhap']) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>