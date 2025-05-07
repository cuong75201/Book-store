<?php
class  UserModel extends dbconnect
{
    public function create($lastname, $fisrtname, $email, $password, $date)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $name = $lastname . " " . $fisrtname;
        $sql = "INSERT INTO `khach_hang`( `Ten_Khach_Hang`, `Email`, `Mat_Khau`, `Ngay_Dang_Ky`,`status`) VALUES ('$name','$email','$password','$date',0)";
        $result = mysqli_query($this->con, $sql);
        $check = true;
        if (!$result) {
            $check = false;
        }
        return $check;
    }
    public function checkLogin($email, $password)
    {
        if (empty($email) || empty($password)) {
            return json_encode(["message" => "Tài khoản hoặc mật khẩu không được để trống !", "valid" => "false"]);
        }
        $sql = "SELECT * FROM `khach_hang` WHERE `Email` = '$email'";
        $result = mysqli_query($this->con, $sql);
        $user = mysqli_fetch_assoc($result);
        if ($user == NULL) {
            return json_encode(["message" => "Tài khoản không tồn tại !", "valid" => "false"]);
        } else if ($user['status'] == 1) {
            return json_encode(["message" => "Tài khoản bị khóa !", "valid" => "false"]);
        } else {
            $result = password_verify($password, $user['Mat_Khau']);
            if ($result) {
                setcookie("user_email", $email, time() + 3600 * 248 * 30, "/");
                return json_encode(["message" => "Đăng nhập thành công !", "valid" => "true"]);
            } else {
                return json_encode(["message" => "Sai mật khẩu !", "valid" => "false"]);
            }
        }
    }
    public function getUserByEmail($email)
{
    $stmt = $this->con->prepare("SELECT * FROM `khach_hang` WHERE `Email` = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    return $user;
}
public function getAddresses($email)
    {
        $stmt = $this->con->prepare("SELECT * FROM `dia_chi` WHERE `email` = ? ORDER BY `Mac_Dinh` DESC");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $addresses = [];
        while ($row = $result->fetch_assoc()) {
            $addresses[] = $row;
        }
        $stmt->close();
        return $addresses;
    }

    public function addAddress($email, $name, $address, $phone, $is_default)
    {
        if ($is_default) {
            $stmt = $this->con->prepare("UPDATE `dia_chi` SET `Mac_Dinh` = 0 WHERE `email` = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->close();
        }

        $stmt = $this->con->prepare("INSERT INTO `dia_chi` (`email`, `ten_nguoi_nhan`, `dia_chi`, `so_dien_thoai`, `Mac_Dinh`) VALUES (?, ?, ?, ?, ?)");
        $Mac_Dinh = $is_default ? 1 : 0;
        $stmt->bind_param("ssssi", $email, $name, $address, $phone, $Mac_Dinh);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function updateAddress($id, $email, $name, $address, $phone, $is_default)
    {
        if ($is_default) {
            $stmt = $this->con->prepare("UPDATE `dia_chi` SET `Mac_Dinh` = 0 WHERE `email` = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->close();
        }

        $stmt = $this->con->prepare("UPDATE `dia_chi` SET `ten_nguoi_nhan` = ?, `dia_chi` = ?, `so_dien_thoai` = ?, `Mac_Dinh` = ? WHERE `id` = ? AND `email` = ?");
        $Mac_Dinh = $is_default ? 1 : 0;
        $stmt->bind_param("sssiss", $name, $address, $phone, $Mac_Dinh, $id, $email);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function deleteAddress($id, $email)
    {
        $stmt = $this->con->prepare("DELETE FROM `dia_chi` WHERE `id` = ? AND `email` = ?");
        $stmt->bind_param("is", $id, $email);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function setDefaultAddress($id, $email)
    {
        $stmt = $this->con->prepare("UPDATE `dia_chi` SET `Mac_Dinh` = 0 WHERE `email` = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->close();

        $stmt = $this->con->prepare("UPDATE `dia_chi` SET `Mac_Dinh` = 1 WHERE `id` = ? AND `email` = ?");
        $stmt->bind_param("is", $id, $email);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Thêm phương thức để lấy thông tin địa chỉ từ khach_hang (nếu cần)
    public function getUserAddress($email)
    {
        $stmt = $this->con->prepare("SELECT `Dia_Chi`, `So_Dien_Thoai` FROM `khach_hang` WHERE `Email` = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $address = $result->fetch_assoc();
        $stmt->close();
        return $address;
    }

    // Thêm phương thức để cập nhật địa chỉ trong khach_hang (nếu cần)
    public function updateUserAddress($email, $address, $phone)
    {
        $stmt = $this->con->prepare("UPDATE `khach_hang` SET `Dia_Chi` = ?, `So_Dien_Thoai` = ? WHERE `Email` = ?");
        $stmt->bind_param("sss", $address, $phone, $email);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}