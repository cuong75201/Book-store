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
    public function setTrangthai($id, $trangthai)
    {
        $sql = " update don_hang set Trang_Thai = '$trangthai' where ID_Don_Hang=$id";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function LocDonHang($donhang)
    {
        if (isset($donhang['Trang_Thai'])) {

            if (!empty($donhang['Trang_Thai'])) {
                $trangthai = $donhang['Trang_Thai'] . " AND";
            } else {
                $trangthai = $donhang['Trang_Thai'];
            }
            if (!empty($donhang['diachi'])) {
                $diachi = $donhang['diachi'] . " AND";
            } else {
                $diachi = $donhang['diachi'];
            }
            $ngaydathang = $donhang['Ngay_Dat_Hang'];
            $sql = "SELECT * FROM don_hang WHERE $trangthai $diachi $ngaydathang";
            if (empty($ngaydathang)) {
                $sql = substr($sql, 0, -4);
            }
            $result = mysqli_query($this->con, $sql);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
            // return $sql;
        }
    }
    public function getAllKH()
    {
        $sql = "SELECT ID_Khach_Hang, SUM(Tong_Tien) AS Tong_Tien 
            FROM don_hang 
            WHERE Trang_Thai = 3
            GROUP BY ID_Khach_Hang";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    public function getDonHangbyDate($id, $start, $end)
    {
        $sql = "SELECT * FROM don_hang WHERE ID_Khach_Hang = $id AND Ngay_Dat_Hang BETWEEN '$start 00:00:00' AND '$end 23:59:59'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    public function getIDdonhangbyDate($start, $end)
    {
        $sql = "SELECT ID_Don_Hang FROM don_hang WHERE Ngay_Dat_Hang BETWEEN '$start 00:00:00' AND '$end 23:59:59'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
