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

    // 👉 Lấy ID_NV từ session
    session_start();
    if (!isset($_SESSION['nhanvien']['ID_NV'])) {
        echo json_encode(['success' => false, 'message' => 'Chưa đăng nhập hoặc thiếu ID nhân viên']);
        return;
    }
    $id_nv = $_SESSION['nhanvien']['ID_NV'];

    try {
        $phieuNhapModel = new PhieuNhapModel();

        // ✅ Gọi đúng hàm có cả danh sách chi tiết
        $result = $phieuNhapModel->addPhieuNhap(
            $data['Ngay_Nhap'],
            $data['ID_NCC'],
            $data['ChiTiet'],
            $id_nv
        );

        if ($result === true) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Không thể lưu phiếu nhập']);
        }

    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
}


?>