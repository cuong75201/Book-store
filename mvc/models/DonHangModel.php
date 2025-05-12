<?php
class DonHangModel extends dbconnect
{
    //   ID_Don_Hang	ID_Khach_Hang	Ngay_Dat_Hang	Tong_Tien	Trang_Thai	Phuong_Thuc_Thanh_Toan	Dia_Chi_Giao_Hang
    public function getAll()
    {
        $sql = "select * from don_hang";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    public function add($ID_Don_Hang, $ID_Khach_Hang, $Ngay_Dat_Hang, $Tong_Tien, $Trang_Thai, $Phuong_Thuc_Thanh_Toan, $Dia_Chi_Giao_Hang)
    {
        $sql = " insert into  don_hang  value ($ID_Don_Hang,$ID_Khach_Hang,'$Ngay_Dat_Hang',$Tong_Tien,'$Trang_Thai',$Phuong_Thuc_Thanh_Toan,'$Dia_Chi_Giao_Hang')";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function update($ID_Don_Hang, $ID_Khach_Hang, $Ngay_Dat_Hang, $Tong_Tien, $Trang_Thai, $Phuong_Thuc_Thanh_Toan, $Dia_Chi_Giao_Hang)
    {
        $sql = " update don_hang set ID_Khach_Hang = $ID_Khach_Hang , Ngay_Dat_Hang= '$Ngay_Dat_Hang', Tong_Tien=$Tong_Tien , Trang_Thai = '$Trang_Thai',Phuong_Thuc_Thanh_Toan= $Phuong_Thuc_Thanh_Toan, Dia_Chi_Giao_Hang ='$Dia_Chi_Giao_Hang' where ID_Don_Hang=$ID_Don_Hang ";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function remove($ID_Don_Hang)
    {
        $sql = "delete from don_hang where ID_Don_Hang = $ID_Don_Hang ";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function search($ID_Don_Hang)
    {
        $sql = "select * from don_hang where ID_Don_Hang = $ID_Don_Hang ";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }
    public function searchByKhachHang($ID_Khach_Hang)
    {
        $sql = "select * from don_hang where ID_Khach_Hang = $ID_Khach_Hang ";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    public function searchBySanPham($id)
    {
        $sql = "select * from don_hang where ID_Don_Hang = $id ";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
