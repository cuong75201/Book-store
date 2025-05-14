<?php
class ctiet_quyenModel extends dbconnect
{
    public function getAll()
    {
        $sql = "SELECT * FROM chi_tiet_quyen";
        $query = mysqli_query($this->con, $sql);
        $result = array();
        while ($row = mysqli_fetch_assoc($query)) {
            $result[] = $row;
        }
        return $result;
    }
    public function getById($id)
    {
        $sql = "SELECT * FROM chi_tiet_quyen WHERE MaQuyen = '$id'";
        $query = mysqli_query($this->con, $sql);

        if (!$query) {
            die("Lỗi truy vấn MySQL: " . mysqli_error($this->con));
        }

        $rows = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $rows[] = $row;
        }

        return $rows;
    }
    public function add($action, $maquyen)
    {
        $stmt = $this->con->prepare("INSERT INTO chi_tiet_quyen (MaQuyen,hanhdong) VALUES (?,?)");

        if ($stmt === false) {
            die('MySQL prepare failed: ' . $this->con->error);
        }

        $stmt->bind_param("ii", $maquyen, $action);

        if (!$stmt->execute()) {
            die('Execute failed: ' . $stmt->error);
        }

        return true;  // Trả về true nếu thành công
    }
    public function delete($maquyen)
    {
        $stmt = $this->con->prepare("DELETE FROM chi_tiet_quyen WHERE `MaQuyen`=?");

        if ($stmt === false) {
            die('MySQL prepare failed: ' . $this->con->error);
        }

        $stmt->bind_param("i", $maquyen);

        if (!$stmt->execute()) {
            die('Execute failed: ' . $stmt->error);
        }

        return true;
    }
}
