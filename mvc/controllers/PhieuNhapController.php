<?php
public function getAll() {
    $phieuNhapModel = new PhieuNhapModel();
    echo json_encode($phieuNhapModel->getAllphieunhap());
}

public function delete() {
    $id = $_POST['id'];
    $phieuNhapModel = new PhieuNhapModel();
    $result = $phieuNhapModel->deletephieunhap($id);
    echo json_encode(['success' => $result]);
}
public function save() {
    // Đọc JSON đầu vào
    $data = json_decode(file_get_contents('php://input'), true);

    // Kiểm tra dữ liệu cơ bản
    if (!isset($data['Ngay_Nhap']) || !isset($data['ID_NCC']) || !isset($data['ChiTiet'])) {
        echo json_encode(['success' => false, 'message' => 'Thiếu dữ liệu']);
        return;
    }

    try {
        $phieuNhapModel = new PhieuNhapModel();

        // Thêm phiếu nhập mới, trả về ID mới
        $idPhieu = $phieuNhapModel->addphieunhap($data['Ngay_Nhap'], $data['ID_NCC']);

        // Thêm từng chi tiết
        foreach ($data['ChiTiet'] as $chiTiet) {
            $phieuNhapModel->addChiTiet($idPhieu, $chiTiet['ID_Sach'], $chiTiet['SoLuong'], $chiTiet['GiaNhap']);
        }

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
}

?>