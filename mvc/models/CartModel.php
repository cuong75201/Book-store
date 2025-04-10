<?php
class CartModel extends dbconnect
{
    public function getCart($user_id)
    {
        $sql = "SELECT * FROM `cart` WHERE `ID_Khach_Hang` = '$user_id'";
        $result = mysqli_query($this->con, $sql);
        $cart = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $cart;
    }

    public function addToCart($user_id)
    {
        $sql = "INSERT INTO `cart`(`ID_Khach_Hang`) VALUES ('$user_id')";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }

    /*public function updateCart($user_id, $book_id, $quantity)
    {
        $sql = "UPDATE `gio_hang` SET `so_luong`='$quantity' WHERE `id_khach_hang`='$user_id' AND `id_sach`='$book_id'";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }*/

    public function deleteFromCart($user_id, $book_id)
    {
        $sql = "DELETE FROM `gio_hang` WHERE `id_khach_hang`='$user_id' AND `id_sach`='$book_id'";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    /*public function getTotalPrice($user_id)
    {
        $sql = "SELECT SUM(`so_luong` * `gia`) AS `Tong_tien` FROM `ctiet_cart` WHERE `id_khach_hang` = '$user_id'";
        $result = mysqli_query($this->con, $sql);
        $total_price = mysqli_fetch_assoc($result);
        return $total_price['thanh_tien'];
    }*/
}
