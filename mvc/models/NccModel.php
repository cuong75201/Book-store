<?php
class NccModel extends dbconnect {
    public function getAllNCC () {
        $sql = "SELECT * FROM `ncc`";
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
        $sql = "INSERT INTO `ncc` (`Ten_NCC`, `DiaChi`, `LienHe`) VALUES ('$ten_ncc', '$dchi', '$lienhe')";
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
}