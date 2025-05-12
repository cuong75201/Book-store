<?php
class ctiet_don_hangModel extends dbconnect
{
    public function getCTDH($id_don_hang)
    {
        $sql = "SELECT * FROM `ctiet_don_hang` WHERE `ID_Don_Hang` = '$id_don_hang'";
        $result = mysqli_query($this->con, $sql);
        $ctdh = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $ctdh;
    }

    public function addCTDH($id_don_hang, $id_sach, $so_luong)
    {
        $sql = "INSERT INTO `ctiet_don_hang`(`ID_Don_Hang`, `ID_Sach`, `So_Luong`) VALUES ('$id_don_hang', '$id_sach', '$so_luong')";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function updateCTDH($id_don_hang, $id_sach, $so_luong)
    {
        $sql = "UPDATE `ctiet_don_hang` SET `So_Luong`='$so_luong' WHERE `ID_Don_Hang`='$id_don_hang' AND `ID_Sach`='$id_sach'";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function deleteCTDH($id_don_hang, $id_sach)
    {
        $sql = "DELETE FROM `ctiet_don_hang` WHERE `ID_Don_Hang`='$id_don_hang' AND `ID_Sach`='$id_sach'";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function Thanh_tien($id_don_hang)
    {
        $sql = "SELECT (`So_Luong` * `Gia`) AS `Thanh_Tien` FROM `ctiet_don_hang` WHERE `ID_Don_Hang` = '$id_don_hang'";
        $result = mysqli_query($this->con, $sql);
        $thanh_tien = mysqli_fetch_assoc($result);
        return $thanh_tien['Thanh_Tien'];
    }
    public function searchBySanPham($id)
    {
        $sql = "select * from chi_tiet_don_hang where ID_Sach = $id ";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
