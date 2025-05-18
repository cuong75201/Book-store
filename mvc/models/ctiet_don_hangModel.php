<?php
class ctiet_don_hangModel extends dbconnect
{
    public function getCTDH($id_don_hang)
    {
        $sql = "SELECT * FROM `chi_tiet_don_hang` WHERE `ID_Don_Hang` = '$id_don_hang'";
        $result = mysqli_query($this->con, $sql);
        $ctdh = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $ctdh;
    }

    public function addCTDH($id_don_hang, $id_sach, $so_luong)
    {
        $sql = "INSERT INTO `chi_tiet_don_hang`(`ID_Don_Hang`, `ID_Sach`, `So_Luong`) VALUES ('$id_don_hang', '$id_sach', '$so_luong')";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function updateCTDH($id_don_hang, $id_sach, $so_luong)
    {
        $sql = "UPDATE `chi_tiet_don_hang` SET `So_Luong`='$so_luong' WHERE `ID_Don_Hang`='$id_don_hang' AND `ID_Sach`='$id_sach'";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function deleteCTDH($id_don_hang, $id_sach)
    {
        $sql = "DELETE FROM `chi_tiet_don_hang` WHERE `ID_Don_Hang`='$id_don_hang' AND `ID_Sach`='$id_sach'";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function Thanh_tien($id_don_hang)
    {
        $sql = "SELECT (`So_Luong` * `Gia`) AS `Thanh_Tien` FROM `chi_tiet_don_hang` WHERE `ID_Don_Hang` = '$id_don_hang'";
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
    public function getProduct($ids)
    {
        $values = "";
        foreach ($ids as $id) {
            $values .= $id . ",";
        }
        $values = substr($values, 0, -1);
        $sql = "SELECT ct.ID_Sach, sach.Ten_Sach, SUM(ct.So_Luong) as soluong, SUM(ct.Thanh_Tien) as thanhtien  
FROM chi_tiet_don_hang ct  
JOIN sach ON ct.ID_Sach = sach.ID_Sach  
WHERE ct.ID_Don_Hang IN ($values)
GROUP BY ct.ID_Sach, sach.Ten_Sach";

        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    public function getAllbyIDSach()
    {
        $sql = "SELECT ID_Sach,SUM(So_Luong) as soluong,SUM(Thanh_Tien) as thanhtien FROM chi_tiet_don_hang GROUP BY ID_sach";
        $result = mysqli_query($this->con, $sql);
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
}
