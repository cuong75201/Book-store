<?php
class NccModel extends dbconnect {
    public function getAllNCC () {
        $sql = "SELECT * FROM `ncc` WHERE Trang_Thai = 1";
        $query = mysqli_query($this->con, $sql);
        $result = array();
        while ($row = mysqli_fetch_assoc($query)) {
            $result[] = $row;
        }
        return $result;
    }
    public function getNCC ($id_ncc) {
        $sql = "SELECT * FROM `ncc` WHERE `ID_NCC` = '$id_ncc'";
        $query = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($query);
    }
    public function addNCC ($ten_ncc, $dchi, $lienhe) {
        $sql = "INSERT INTO `ncc` (`Ten_NCC`, `DiaChi`, `LienHe`,`Trang_Thai`) VALUES ('$ten_ncc', '$dchi', '$lienhe',1)";
        return mysqli_query($this->con, $sql);
    }
    public function updateNCC ($id_ncc, $ten_ncc, $dchi, $lienhe) {
        $sql = "UPDATE `ncc` SET `Ten_NCC` = '$ten_ncc', `DiaChi` = '$dchi', `LienHe` = '$lienhe' WHERE `ID_NCC` = '$id_ncc'";
        return mysqli_query($this->con, $sql);
    }
    public function deleteNCC ($id_ncc) {
        $sql = "DELETE FROM `ncc` WHERE `ID_NCC` = '$id_ncc'";
        return mysqli_query($this->con, $sql);
    }
    // public function setStatus ($id_ncc,$status) {
    //     $sql = "update ncc set `status` = $status  WHERE `ID_NCC` = $id_ncc";
    //     return mysqli_query($this->con, $sql);
    // }
     public function xoaNhaCungCap ($id_ncc) {
        $sql = "update ncc set `Trang_Thai` = 0  WHERE `ID_NCC` = $id_ncc";
        return mysqli_query($this->con, $sql);
    }
}
