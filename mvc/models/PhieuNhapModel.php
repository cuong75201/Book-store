<?php 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
require_once "SachModel.php";
class PhieuNhapModel extends dbconnect {
    public $sachModel;

public function __construct() {
    parent::__construct(); 
    $this->sachModel = new SachModel();
}

    public function getAllPhieuNhap() {
        $sql = "SELECT pn.*, ncc.Ten_NCC, nv.Ten_NV 
                FROM phieu_nhap pn
                LEFT JOIN nha_cung_cap ncc ON pn.ID_NCC = ncc.ID_NCC
                LEFT JOIN nhanvien nv ON pn.ID_NV = nv.ID_NV";               
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

public function addPhieuNhap($ngayNhap, $id_ncc, $chiTiet, $id_nv) {
    $con = $this->con;
    $con->query("SET innodb_lock_wait_timeout = 5");
    $con->begin_transaction();

    try {
        // 1. Thêm phiếu nhập
        $stmt1 = $con->prepare("INSERT INTO phieu_nhap (NgayNhap, ID_NCC, ID_NV) VALUES (?, ?, ?)");
        $stmt1->bind_param("sii", $ngayNhap, $id_ncc, $id_nv);
        $stmt1->execute();
        $id_phieunhap = $con->insert_id;

        // 2. Thêm chi tiết và tính tổng tiền
        $tongTien = 0;
        $stmt2 = $con->prepare("INSERT INTO chi_tiet_phieu_nhap (ID_PhieuNhap, ID_Sach, SoLuong, GiaNhap) VALUES (?, ?, ?, ?)");

        foreach ($chiTiet as $item) {
            $id_sach = (int)$item['ID_Sach'];
            $so_luong = (int)$item['SoLuong'];
            $gia_nhap = (float)$item['GiaNhap'];

            $stmt2->bind_param("iiid", $id_phieunhap, $id_sach, $so_luong, $gia_nhap);
            $stmt2->execute();

            $tongTien += $so_luong * $gia_nhap;

            if (!$this->sachModel->updateTonKho($id_sach, $so_luong, $con)) {
                throw new Exception("Cập nhật tồn kho thất bại cho sách ID: $id_sach");
            }
        }

        // 3. Cập nhật tổng tiền
        $stmt3 = $con->prepare("UPDATE phieu_nhap SET TongTien = ? WHERE ID_PhieuNhap = ?");
        $stmt3->bind_param("di", $tongTien, $id_phieunhap);
        $stmt3->execute();

        $con->commit();
        return true;
    } catch (Exception $e) {
        $con->rollback();
        error_log("Lỗi thêm phiếu nhập: " . $e->getMessage());

        echo json_encode([
            "success" => false,
            "message" => "Lỗi thêm phiếu nhập: " . $e->getMessage()
        ]);
        return false;
    }
}


public function deletePhieuNhap($id_phieunhap) {
    $con = $this->con;
    $con->begin_transaction();

    try {
        // Lấy chi tiết phiếu
        $stmt1 = $con->prepare("SELECT ID_Sach, SoLuong FROM chi_tiet_phieu_nhap WHERE ID_PhieuNhap = ?");
        $stmt1->bind_param("i", $id_phieunhap);
        $stmt1->execute();
        $result = $stmt1->get_result();
        $chiTiet = $result->fetch_all(MYSQLI_ASSOC);

        // Trừ tồn kho
        foreach ($chiTiet as $item) {
            $id_sach = (int)$item['ID_Sach'];
            $so_luong = (int)$item['SoLuong'];

            if (!$this->sachModel->giamTonKho($id_sach, $so_luong, $con)) {
                throw new Exception("Giảm tồn kho thất bại cho sách ID: $id_sach");
            }
        }

        // Đánh dấu phiếu nhập là đã hủy
        $stmt2 = $con->prepare("UPDATE phieu_nhap SET TrangThai = 0 WHERE ID_PhieuNhap = ?");
        $stmt2->bind_param("i", $id_phieunhap);
        $stmt2->execute();

        $con->commit();
        return true;
    } catch (Exception $e) {
        $con->rollback();
        error_log("Lỗi xóa phiếu nhập: " . $e->getMessage());
        return false;
    }
}


public function getChiTietPhieu($idPhieu) {
    $sql = "SELECT ct.ID_Sach, s.Ten_Sach, ct.SoLuong, ct.GiaNhap, pn.ID_NV 
            FROM chi_tiet_phieu_nhap ct
            JOIN sach s ON ct.ID_Sach = s.ID_Sach
            JOIN phieu_nhap pn ON ct.ID_PhieuNhap = pn.ID_PhieuNhap
            WHERE ct.ID_PhieuNhap = $idPhieu";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    
    public function searchPhieu($type, $keyword) {
    $sql = "SELECT pn.*, ncc.Ten_NCC, nv.Ten_NV 
            FROM phieu_nhap pn
            LEFT JOIN nha_cung_cap ncc ON pn.ID_NCC = ncc.ID_NCC
            LEFT JOIN nhanvien nv ON pn.ID_NV = nv.ID_NV";

    switch ($type) {
        case 'date':
            $sql .= " WHERE DATE(pn.NgayNhap) = ?";
            break;
        case 'staff':
            $sql .= " WHERE pn.ID_NV = ?";
            break;
        case 'product':
            $sql .= " JOIN chi_tiet_phieu_nhap ct ON pn.ID_PhieuNhap = ct.ID_PhieuNhap WHERE ct.ID_Sach = ?";
            break;
        default:
            return [];
    }

    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("s", $keyword);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}
}