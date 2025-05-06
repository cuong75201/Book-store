<?php
class SachModel extends dbconnect
{
    public function create($name, $tacgia, $nxb, $namxb, $idTheLoai, $giaban, $giamgia, $Soluong, $Mo_ta, $image)
    {
        $mota = mysqli_real_escape_string($this->con, $Mo_ta);
        $sql = "INSERT INTO `sach`( `Ten_Sach`, `Tac_Gia`, `Ten_Nha_Xuat_Ban`, `Nam_Xuat_Ban`, `ID_The_Loai`, `Gia_Ban`, `GiamGia(%)`, 
        `So_Luong_Ton`, `Mo_Ta`, `Images`) VALUES ('$name','$tacgia','$nxb','$namxb','$idTheLoai','$giaban','$giamgia','$Soluong','$mota','$image')";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function update($id_sach, $name, $tacgia, $nxb, $namxb, $idTheLoai, $giaban, $giamgia, $Soluong, $Mo_ta, $image)
    {
        $mota = mysqli_real_escape_string($this->con, $Mo_ta);
        $sql = "UPDATE `sach` SET ,`Ten_Sach`='$name',`Tac_Gia`='$tacgia',`Ten_Nha_Xuat_Ban`='$nxb',`Nam_Xuat_Ban`='$namxb',`ID_The_Loai`='$idTheLoai',`Gia_Ban`='$giaban',`GiamGia(%)`='$giamgia',`So_Luong_Ton`='$Soluong',`Mo_Ta`='$mota',`Images`='$image' WHERE `ID_Sach`='$id_sach'";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function getIDfromDanhMuc($id_danhmuc)
    {
        $sql = "SELECT `ID_Sach` FROM `sach` WHERE `ID_DanhMuc` = '$id_danhmuc'";
        $result = mysqli_query($this->con, $sql);
        $rows = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row["ID_Sach"];
            }
            return $rows;
        }
        return mysqli_error($this->con);
    }
    public function getSachfromID($id)
    {
        $sql = "SELECT * FROM `sach` WHERE `ID_Sach`='$id'";
        $result = mysqli_query($this->con, $sql);
        $rows = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
            return $rows;
        }
    }
    public function getToTalPageDanhMuc($id_dm, $limit)
    {
        $total = count($this->getIDfromDanhMuc($id_dm));
        return ceil($total / $limit);
    }
    public function getSachfromTheLoai($id)
    {
        $sql = "SELECT `ID_Sach` FROM `sach` WHERE `ID_TheLoai`='$id'";
        $result = mysqli_query($this->con, $sql);
        $rows = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row['ID_Sach'];
            }
            return $rows;
        }
    }
    public function getIDfromTheLoai($id_tl)
    {
        $sql = "SELECT `ID_Sach` FROM `sach` WHERE `ID_TheLoai` = '$id_tl'";
        $result = mysqli_query($this->con, $sql);
        $rows = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row["ID_Sach"];
            }
            return $rows;
        }
        return mysqli_error($this->con);
    }
    public function getToTalPageTheLoai($id_tl, $limit)
    {
        $total = count($this->getIDfromTheLoai($id_tl));
        return ceil($total / $limit);
    }
}
