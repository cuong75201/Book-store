<?php
class pnhModel extends dbconnect
{
    public function getPNH($id_pnh)
    {
        $sql = "SELECT * FROM `pnh` WHERE `ID_PNH` = '$id_pnh'";
        $query = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($query);
    }
    public function getAllPNH()
    {
        $sql = "SELECT * FROM `pnh`";
        $query = mysqli_query($this->con, $sql);
        $result = array();
        while ($row = mysqli_fetch_assoc($query)) {
            $result[] = $row;
        }
        return $result;
    }
    public function addPNH($id_pnh, $id_ncc, $ngaynhap, $tongtien, $id_nhanvien)
    {
        $sql = "INSERT INTO `pnh` (`ID_PNH`, `ID_NCC`, `NgayNhap`, `TongTien`, `ID_NV`) VALUES ('$id_pnh', '$id_ncc', '$ngaynhap', '$tongtien', '$id_nhanvien')";
        return mysqli_query($this->con, $sql);
    }
    public function updatePNH($id_pnh, $id_ncc, $ngaynhap, $tongtien, $id_nhanvien)
    {
        $sql = "UPDATE `pnh` SET `ID_NCC` = '$id_ncc', `NgayNhap` = '$ngaynhap', `TongTien` = '$tongtien', `ID_NV` = `$id_nhanvien` WHERE `ID_PNH` = '$id_pnh'";
        return mysqli_query($this->con, $sql);
    }
    public function deletePNH($id_pnh)
    {
        $sql = "DELETE FROM `pnh` WHERE `ID_PNH` = '$id_pnh'";
        return mysqli_query($this->con, $sql);
    }
    public function getPNHByNCC($id_ncc)
    {
        $sql = "SELECT * FROM `pnh` WHERE `ID_NCC` = '$id_ncc'";
        $query = mysqli_query($this->con, $sql);
        $result = array();
        while ($row = mysqli_fetch_assoc($query)) {
            $result[] = $row;
        }
        return $result;
    }
    public function getPNHByDate($date)
    {
        $sql = "SELECT * FROM `pnh` WHERE `Ngay_Nhap` = '$date'";
        $query = mysqli_query($this->con, $sql);
        $result = array();
        while ($row = mysqli_fetch_assoc($query)) {
            $result[] = $row;
        }
        return $result;
    }
    public function getPNHByDateRange($start_date, $end_date)
    {
        $sql = "SELECT * FROM `pnh` WHERE `Ngay_Nhap` BETWEEN '$start_date' AND '$end_date'";
        $query = mysqli_query($this->con, $sql);
        $result = array();
        while ($row = mysqli_fetch_assoc($query)) {
            $result[] = $row;
        }
        return $result;
    }
    public function getPNHByNV($id_nhanvien)
    {
        $sql = "SELECT * FROM `pnh` WHERE `ID_NV` = '$id_nhanvien'";
        $query = mysqli_query($this->con, $sql);
        $result = array();
        while ($row = mysqli_fetch_assoc($query)) {
            $result[] = $row;
        }
        return $result;
    }
}
