<?php
class NhaCungCapModel extends dbconnect {
    public function getAllNCC() {
        $sql = "SELECT * FROM nha_cung_cap WHERE TrangThai = 1"; // Lọc chỉ nhà cung cấp hoạt động
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getNCC($id_ncc) {
        $sql = "SELECT * FROM nha_cung_cap WHERE ID_NCC = ? AND TrangThai = 1"; // Kiểm tra trạng thái
        $stmt = mysqli_prepare($this->con, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id_ncc);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($result);
    }

    public function addNCC($ten_ncc, $dchi, $sdt, $email) {
        // Thêm mới nhà cung cấp với trạng thái mặc định là 1 (hoạt động)
        $sql = "INSERT INTO nha_cung_cap (Ten_NCC, Dia_Chi, SDT, Email, TrangThai) VALUES (?, ?, ?, ?, 1)";
        $stmt = mysqli_prepare($this->con, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $ten_ncc, $dchi, $sdt, $email);
        return mysqli_stmt_execute($stmt);
    }

    public function updateNCC($id_ncc, $ten_ncc, $dchi, $sdt, $email) {
        $sql = "UPDATE nha_cung_cap SET Ten_NCC = ?, Dia_Chi = ?, SDT = ?, Email = ? WHERE ID_NCC = ?";
        $stmt = mysqli_prepare($this->con, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi", $ten_ncc, $dchi, $sdt, $email, $id_ncc);
        return mysqli_stmt_execute($stmt);
    }

    public function deleteNCC($id_ncc) {
        // Đánh dấu nhà cung cấp là không còn hợp tác thay vì xóa
        $sql = "UPDATE nha_cung_cap SET TrangThai = 0 WHERE ID_NCC = ?";
        $stmt = mysqli_prepare($this->con, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id_ncc);
        return mysqli_stmt_execute($stmt);
    }
}
?>