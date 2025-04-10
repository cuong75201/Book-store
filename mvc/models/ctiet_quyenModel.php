<?php
class ctiet_quyenModel extends dbconnect {
    public function getAll() {
        $sql = "SELECT * FROM ctiet_quyen";
        $query = mysqli_query($this->con, $sql);
        $result = array();
        while ($row = mysqli_fetch_assoc($query)) {
            $result[] = $row;
        }
        return $result;
    }
    public function getById($id) {
        $sql = "SELECT * FROM ctiet_quyen WHERE MaQuyen = '$id'";
        $query = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($query);
    }
    public function add($id_quyen, $id_chucnang) {
        $sql = "INSERT INTO ctiet_quyen (MaQuyen, ID_ChucNang) VALUES ('$id_quyen', '$id_chucnang')";
        return mysqli_query($this->con, $sql);
    }
}