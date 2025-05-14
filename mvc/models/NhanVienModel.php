<?php
class NhanVienModel extends dbconnect
{

    public function getAll()
    {
        $sql = "SELECT * FROM nhanvien";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function add($Ten_NV, $DiaChi, $SDT, $Luong, $MaQuyen, $Mat_khau, $TrangThai)
    {
        $sql = "INSERT INTO nhanvien ( Ten_NV, DiaChi, SDT, Luong, MaQuyen, Mat_khau,TrangThai) VALUES ( ?, ?, ?, ?, ?, ?,?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("sssiisi", $Ten_NV, $DiaChi, $SDT, $Luong, $MaQuyen, $Mat_khau, $TrangThai);
        return $stmt->execute();
    }

    public function update($ID_NV, $Ten_NV, $DiaChi, $SDT, $Luong, $MaQuyen, $Mat_khau, $TrangThai)
    {
        if (empty($Mat_khau)) {
            $sql = "UPDATE nhanvien SET Ten_NV = ?, DiaChi = ?, SDT = ?, Luong = ?, MaQuyen = ?, TrangThai = ? WHERE ID_NV = ?";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("sssiiii", $Ten_NV, $DiaChi, $SDT, $Luong, $MaQuyen, $TrangThai, $ID_NV);
            return $stmt->execute();
        }
        $sql = "UPDATE nhanvien SET Ten_NV = ?, DiaChi = ?, SDT = ?, Luong = ?, MaQuyen = ?, Mat_khau = ?, TrangThai = ? WHERE ID_NV = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("sssiisii", $Ten_NV, $DiaChi, $SDT, $Luong, $MaQuyen, $Mat_khau, $TrangThai, $ID_NV);
        return $stmt->execute();
    }

    public function remove($ID_NV)
    {
        $sql = "DELETE FROM nhanvien WHERE ID_NV = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("i", $ID_NV);
        return $stmt->execute();
    }

    public function search($ID_NV)
    {
        $sql = "SELECT * FROM nhanvien WHERE ID_NV = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("i", $ID_NV);
        $stmt->execute();
        $result = $stmt->get_result();
        return mysqli_fetch_assoc($result);
    }
    public function KiemTraNhanVien($sdt, $password)
    {
        $password = md5($password);
        $sql = "SELECT * FROM `nhanvien` WHERE `SDT`='$sdt' AND `Mat_Khau`='$password'";
        $result = mysqli_query($this->con, $sql);
        if ($result->num_rows > 0) {
            return true;
        }

        return false;
    }
    public function getNhanVienfromID($id)
    {
        $sql = "SELECT * FROM nhanvien WHERE ID_NV ='$id'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    public function getNVfromSDT($sdt)
    {
        $sql = "SELECT * FROM nhanvien WHERE SDT ='$sdt'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }
}
