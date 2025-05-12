<?php

class NhomQuyenModel extends dbconnect
{

    public function getAll()
    {
        $sql = "SELECT * FROM nhomquyen";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function add($MaQuyen, $TenQuyen)
    {
        $sql = "INSERT INTO nhomquyen (MaQuyen, TenQuyen) VALUES (?, ?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("is", $MaQuyen, $TenQuyen);
        return $stmt->execute();
    }

    public function update($MaQuyen, $TenQuyen)
    {
        $sql = "UPDATE nhomquyen SET TenQuyen = ? WHERE MaQuyen = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("si", $TenQuyen, $MaQuyen);
        return $stmt->execute();
    }

    public function remove($MaQuyen)
    {
        $sql = "DELETE FROM nhomquyen WHERE MaQuyen = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("i", $MaQuyen);
        return $stmt->execute();
    }

    public function search($MaQuyen)
    {
        $sql = "SELECT * FROM nhomquyen WHERE MaQuyen = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("i", $MaQuyen);
        $stmt->execute();
        $result = $stmt->get_result();
        return mysqli_fetch_assoc($result);
    }
    public function getNamebyId($id)
    {
        $sql = "SELECT `TenQuyen` FROM `nhomquyen` WHERE `MaQuyen`='$id'";
        $result = mysqli_query($this->con, $sql);
        $rows = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row['TenQuyen'];
            }
            return $rows;
        }
    }
}
