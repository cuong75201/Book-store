<?php
class ctiet_cartModel extends dbconnect {
    public function getCTCart($id_cart) {
        $sql = "SELECT * FROM `ctiet_cart` WHERE `ID_Cart` = '$id_cart'";
        $result = mysqli_query($this->con, $sql);
        $ctcart = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $ctcart;
    }

    public function addCTCart($id_cart, $id_sach, $so_luong) {
        $sql = "INSERT INTO `ctiet_cart`(`ID_Cart`, `ID_Sach`, `So_Luong`) VALUES ('$id_cart', '$id_sach', '$so_luong')";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function updateCTCart($id_cart, $id_sach, $so_luong) {
        $sql = "UPDATE `ctiet_cart` SET `So_Luong`='$so_luong' WHERE `ID_Cart`='$id_cart' AND `ID_Sach`='$id_sach'";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function deleteCTCart($id_cart, $id_sach) {
        $sql = "DELETE FROM `ctiet_cart` WHERE `ID_Cart`='$id_cart' AND `ID_Sach`='$id_sach'";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function Thanh_tien($id_cart) {
        $sql = "SELECT (`So_Luong` * `Gia`) AS `Thanh_Tien` FROM `ctiet_cart` WHERE `ID_Cart` = '$id_cart'";
        $result = mysqli_query($this->con, $sql);
        $thanh_tien = mysqli_fetch_assoc($result);
        return $thanh_tien['Thanh_Tien'];
    }
   
}