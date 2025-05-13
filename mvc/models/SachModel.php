<?php
class SachModel extends dbconnect
{
    public function getSach()
    {
        $sql = "SELECT * FROM `sach` WHERE `TrangThai`='1'";
        $result = mysqli_query($this->con, $sql);
        $rows = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
            return $rows;
        }
        return mysqli_error($this->con);
    }
    public function delete($id)
    {
        $sql = "DELETE FROM `chi_tiet_don_hang` WHERE `ID_Sach`='$id'";
        $result = mysqli_query($this->con, $sql);
        if (!$result) {
            // Nếu truy vấn thất bại, trả về lỗi
            return "Lỗi truy vấn: " . mysqli_error($this->con);
        }
        return $result;
    }
    public function setTrangThai($id)
    {
        $sql = "UPDATE `sach` SET `TrangThai`='0' WHERE `ID_Sach`='$id' ";
        $result = mysqli_query($this->con, $sql);
        if (!$result) {
            // Nếu truy vấn thất bại, trả về lỗi
            return "Lỗi truy vấn: " . mysqli_error($this->con);
        }
        return $result;
    }
    public function create($name, $tacgia, $nxb, $namxb, $id_danhmuc, $idTheLoai, $giaban, $giamgia, $Soluong, $Mo_ta, $image)
    {
        $mota = mysqli_real_escape_string($this->con, $Mo_ta);
        $sql = "INSERT INTO `sach`( `Ten_Sach`, `Tac_Gia`, `Ten_Nha_Xuat_Ban`, `Nam_Xuat_Ban`, `ID_DanhMuc`, `ID_TheLoai`, `Gia_Ban`, `GiamGia(%)`, `So_Luong_Ton`, `Mo_Ta`, `Images`, `TrangThai`) VALUES ('$name','$tacgia','$nxb','$namxb','$id_danhmuc','$idTheLoai','$giaban','$giamgia','$Soluong','$mota','$image','1')";
        $result = mysqli_query($this->con, $sql);
        if (!$result) {
            // Nếu truy vấn thất bại, trả về lỗi
            return "Lỗi truy vấn: " . mysqli_error($this->con);
        }
        return $result;
    }
    public function update($id_sach, $name, $tacgia, $nxb, $namxb, $id_danhmuc, $idTheLoai, $giaban, $giamgia, $Soluong, $Mo_ta, $image)
    {
        $mota = mysqli_real_escape_string($this->con, $Mo_ta);
        $sql = "UPDATE `sach` SET `Ten_Sach`='$name',`Tac_Gia`='$tacgia',`Ten_Nha_Xuat_Ban`='$nxb',`Nam_Xuat_Ban`='$namxb',`ID_DanhMuc`='$id_danhmuc',`ID_TheLoai`='$idTheLoai',`Gia_Ban`='$giaban',`GiamGia(%)`='$giamgia',`So_Luong_Ton`='$Soluong',`Mo_Ta`=' $mota',`Images`='$image' ,`TrangThai`='1' WHERE `ID_Sach`='$id_sach' ";
        $result = mysqli_query($this->con, $sql);
        if (!$result) {
            // Nếu truy vấn thất bại, trả về lỗi
            return "Lỗi truy vấn: " . mysqli_error($this->con);
        }
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
                // Thêm slug vào mỗi sản phẩm
                $row['slug'] = $this->slugify($row['Ten_Sach']);
                $rows[] = $row;
            }
            return $rows;
        }
        return [];
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
    public function searchTheoTenSach($keyword)
    {
        $sql = "SELECT * FROM sach WHERE Ten_Sach LIKE '%$keyword%'";

        $result = mysqli_query($this->con, $sql);

        // Kiểm tra nếu có lỗi trong truy vấn
        if (!$result) {
            die('Lỗi truy vấn: ' . mysqli_error($this->con));
        }

        // Trả về kết quả
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function searchSachNangCao($sql)
    {
        $result = mysqli_query($this->con, $sql);

        // Kiểm tra nếu có lỗi trong truy vấn
        if (!$result) {
            die('Lỗi truy vấn: ' . mysqli_error($this->con));
        }

        // Trả về kết quả
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllProducts()
    {
        $sql = "SELECT * FROM sach"; // Truy vấn tất cả sách
        $result = mysqli_query($this->con, $sql);

        $products = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }

        return $products;
    }
    public function slugify($string)
    {
        $string = trim($string);
        $string = mb_strtolower($string, 'UTF-8');
        $string = preg_replace('/[%]/u', '', $string);
        $string = preg_replace('/[\s-]+/', '-', $string);
        return $string;
    }
    // SachModel.php
    public function getProductsByCategory($categoryId)
    {
        $sql = "SELECT * FROM sach WHERE ID_TheLoai = $categoryId LIMIT 8"; // Lấy 8 sản phẩm
        $result = mysqli_query($this->con, $sql);
        $products = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
        return $products;
    }

    public function getNewProducts($limit = 6)
    {
        $sql = "SELECT * FROM sach ORDER BY ID_Sach DESC LIMIT $limit"; // Sách mới nhất
        $result = mysqli_query($this->con, $sql);
        $products = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
        return $products;
    }
}
