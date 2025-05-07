<?php
    class AddressModel extends dbconnect {
    public function getByUserEmail($Email) {
        $stmt = $this->con->prepare("SELECT Ten_Khach_Hang, diachi, dienthoai FROM khach_hang WHERE Email = ?");
        $stmt->bind_param("i", $Email);
        $stmt->execute();
        $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}

    public function add($id, $diachi, $dienthoai) {
        $stmt = $this->con->prepare("INSERT INTO khachhang (id, diachi, dienthoai) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $id, $diachi, $dienthoai);
        return $stmt->execute();
    }

    public function update($Email, $diachi, $dienthoai) {
        $stmt = $this->con->prepare("UPDATE khach_hang SET Dia_Chi = ?, So_Dien_Thoai = ? WHERE Email = ?");
        $stmt->bind_param("ssi", $diachi, $dienthoai, $Email);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id) {
        $stmt = $this->con->prepare("DELETE FROM khachhang WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}