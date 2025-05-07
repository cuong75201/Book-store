<?php
class TheLoaiModel extends dbconnect
{
    public function getTenbyID($id)
    {
        $sql = "SELECT `TenTheLoai` from `theloai` WHERE `id_danhmuc`='$id'";
        $result = mysqli_query($this->con, $sql);
        $rows = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row["TenTheLoai"];
            }
            return $rows;
        }
    }
    public function getIDbyIDdanhmuc($id)
    {
        $sql = "SELECT `id_theloai` from `theloai` WHERE `id_danhmuc`='$id'";
        $result = mysqli_query($this->con, $sql);
        $rows = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row["id_theloai"];
            }
            return $rows;
        }
    }
    public function getIDDanhMucbyIDTL($id)
    {
        $sql = "SELECT `id_danhmuc` from `theloai` WHERE `id_theloai`='$id'";
        $result = mysqli_query($this->con, $sql);
        $rows = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row["id_danhmuc"];
            }
            return $rows;
        }
    }
    public function getNamebyIDTL($id)
    {
        $sql = "SELECT `TenTheLoai` from `theloai` WHERE `id_theloai`='$id'";
        $result = mysqli_query($this->con, $sql);
        $rows = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row["TenTheLoai"];
            }
            return $rows;
        }
    }
}
