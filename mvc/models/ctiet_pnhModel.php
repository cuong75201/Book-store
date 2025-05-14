<?php
class ctiet_pnhModel extends dbconnect
{
    public function getAll()
    {
        $sql = "SELECT * FROM `ctiet_pnh`";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function getById($id_pnh)
    {
        $sql = "SELECT * FROM `ctiet_pnh` WHERE `ID_pnh` = '$id_pnh'";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function getByIdSP($id_sp)
    {
        $sql = "SELECT * FROM `ctiet_pnh` WHERE `ID_sach` = '$id_sp'";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function add($id_pnh, $id_sp, $sl, $gia)
    {
        $sql = "INSERT INTO `ctiet_pnh` (`ID_pnh`, `ID_sach`, `so_luong`, `don_gia` VALUES ('$id_pnh', '$id_sp', '$sl', '$gia')";
        mysqli_query($this->con, $sql);
    }
    public function update($id_pnh, $id_sp, $sl, $gia)
    {
        $sql = "UPDATE `ctiet_pnh` SET `so_luong` = '$sl', `don_gia` = '$gia' WHERE `ID_pnh` = '$id_pnh' and `ID_sach` = '$id_sp'";
        mysqli_query($this->con, $sql);
    }
    public function delete($id_pnh)
    {
        $sql = "DELETE FROM ctiet_pnh WHERE ID_pnh = '$id_pnh'";
        mysqli_query($this->con, $sql);
    }
    public function deleteByIdSP($id_sp)
    {
        $sql = "DELETE FROM ctiet_pnh WHERE ID_sp = '$id_sp'";
        mysqli_query($this->con, $sql);
    }
    public function deleteByIdPNH($id_pnh)
    {
        $sql = "DELETE FROM ctiet_pnh WHERE ID_pnh = '$id_pnh'";
        mysqli_query($this->con, $sql);
    }
    public function getAllbyIDSach()
    {
        $sql = "SELECT ID_Sach,SUM(so_luong) as soluong,SUM(thanh_tien) as thanhtien FROM ctiet_pnh GROUP BY ID_sach";
        $result = mysqli_query($this->con, $sql);
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
}
