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
    public function updateUser($lastname, $firstname, $email, $password, $phone, $address)
    {
        $name = $lastname . " " . $firstname;
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE `khach_hang` SET `Ten_Khach_Hang`='$name',`Mat_Khau`='$password',`So_Dien_Thoai`='$phone',`Dia_Chi`='$address' WHERE `Email`='$email'";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function setStatus($status, $email)
    {
        $sql = "UPDATE `khach_hang` SET `status`='$status' WHERE `Email='$email'";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function deleteUser($email)
    {
        $sql = "DELETE FROM `khach_hang` WHERE `Email`='$email'";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function getAllUser()
    {
        $sql = "SELECT * FROM `khach_hang`";
        $result = mysqli_query($this->con, $sql);
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
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
        $query = "SELECT * FROM dia_chi WHERE Email = ? ORDER BY Mac_Dinh DESC";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $addresses = [];
        while ($row = $result->fetch_assoc()) {
            $addresses[] = $row;
        }
        
        return $addresses;
    }

    // Lấy địa chỉ mặc định của người dùng
    public function getDefaultAddress($email)
    {
        $query = "SELECT * FROM dia_chi WHERE Email = ? AND Mac_Dinh = 1";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        
        return null;
    }

    // Thêm địa chỉ mới
    public function addAddress($email, $name, $address, $phone, $is_default = false)
    {
        // Nếu đây là địa chỉ mặc định, hủy mặc định của các địa chỉ khác
        if ($is_default) {
            $this->resetDefaultAddresses($email);
        }
        
        $query = "INSERT INTO dia_chi (Email, Ten_Nguoi_Nhan, Dia_Chi, So_Dien_Thoai, Mac_Dinh) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->con->prepare($query);
        $default = $is_default ? 1 : 0;
        $stmt->bind_param("ssssi", $email, $name, $address, $phone, $default);
        
        return $stmt->execute();
    }

    // Cập nhật địa chỉ
    public function updateAddress($id, $email, $name, $address, $phone, $is_default = false)
{
    if ($is_default) {
        $this->resetDefaultAddresses($email);
    }
    
    $query = "UPDATE dia_chi SET Ten_Nguoi_Nhan = ?, Dia_Chi = ?, So_Dien_Thoai = ?, Mac_Dinh = ? 
              WHERE ID = ? AND Email = ?";
    $stmt = $this->con->prepare($query);
    if (!$stmt) {
        error_log("Prepare failed: " . $this->con->error);
        return false;
    }
    
    $default = $is_default ? 1 : 0;
    $stmt->bind_param("sssiss", $name, $address, $phone, $default, $id, $email);
    
    if (!$stmt->execute()) {
        error_log("SQL Error in updateAddress: " . $stmt->error);
        return false;
    }
    
    $affected_rows = $stmt->affected_rows;
    error_log("updateAddress: affected_rows=$affected_rows, ID=$id, Email=$email");
    return $affected_rows > 0;
}

    public function getDefaultAddressbyEmail($email)
{
    $query = "SELECT * FROM dia_chi WHERE Email = ? AND Mac_Dinh = 1 LIMIT 1";
    $stmt = $this->con->prepare($query);
    if (!$stmt) {
        error_log("Prepare failed in getDefaultAddress: " . $this->con->error);
        return null;
    }
    
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $address = $result->fetch_assoc();
        error_log("getDefaultAddress: Email=$email, Address=" . json_encode($address));
        return $address;
    }
    
    error_log("getDefaultAddress: No default address found for Email=$email");
    return null;
}

    // Xóa địa chỉ
    public function deleteAddress($id, $email)
    {
        // Kiểm tra xem địa chỉ có phải là mặc định không
        $query = "SELECT Mac_Dinh FROM dia_chi WHERE ID = ? AND Email = ?";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param("is", $id, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        // Nếu địa chỉ là mặc định, đặt địa chỉ đầu tiên khác làm mặc định (nếu có)
        if ($row && $row['is_default'] == 1) {
            $query = "UPDATE dia_chi SET Mac_Dinh = 1 
                      WHERE Email = ? AND ID != ? LIMIT 1";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("si", $email, $id);
            $stmt->execute();
        }
        
        // Xóa địa chỉ
        $query = "DELETE FROM dia_chi WHERE ID = ? AND Email = ?";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param("is", $id, $email);
        
        return $stmt->execute();
    }

    // Thiết lập địa chỉ mặc định
    public function setDefaultAddress($id, $email)
    {
        // Hủy mặc định của các địa chỉ khác
        $this->resetDefaultAddresses($email);
        
        // Đặt địa chỉ được chọn làm mặc định
        $query = "UPDATE Dia_Chi SET Mac_Dinh = 1 WHERE ID = ? AND Email = ?";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param("is", $id, $email);
        
        return $stmt->execute();
    }

    // Hủy đánh dấu mặc định của tất cả địa chỉ
    private function resetDefaultAddresses($email)
    {
        $query = "UPDATE dia_chi SET Mac_Dinh = 0 WHERE Email = ?";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param("s", $email);
        
        return $stmt->execute();
    }

    // Lấy thông tin một địa chỉ cụ thể
    public function getAddressById($id, $email)
    {
        $query = "SELECT * FROM dia_chi WHERE ID = ? AND Email = ?";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param("is", $id, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        
        return null;
    }
}