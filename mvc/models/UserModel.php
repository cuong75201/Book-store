<?php
class  UserModel extends dbconnect
{
    public function create($lastname, $fisrtname, $email, $phone, $password, $date, $address)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $name = $lastname . " " . $fisrtname;
        $sql = "INSERT INTO `khach_hang`( `Ten_Khach_Hang`, `Email`,`So_Dien_Thoai`, `Mat_Khau`, `Ngay_Dang_Ky`,`Dia_Chi,`status`,`Trang_Thai) VALUES ('$name','$email','$password','$phone','$date',$address,1,1)";
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
    public function updateUserByAdmin($name, $email, $password, $phone)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE `khach_hang` SET `Ten_Khach_Hang`='$name',`Mat_Khau`='$password',`So_Dien_Thoai`='$phone', WHERE `Email`='$email'";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function xoaUserByAdmin($id)
    {
        $sql = "update khach_hang set  Trang_Thai = 0 where ID_Khach_Hang = $id ";
        $result = mysqli_query($this->con, $sql);
        if (!$result) {
            return false;
        }
        return true;
    }

    public function setStatusByAdmin($status, $id)
    {
        $sql = "UPDATE `khach_hang` SET `status`=$status WHERE ID_Khach_Hang = $id";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function setStatus($status, $email)
    {
        $sql = "UPDATE `khach_hang` SET `status`=$status WHERE `Email='$email'";
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
        $sql = "SELECT * FROM `khach_hang` where Trang_Thai = 1";
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

    public function getAddressById($id, $email)
    {
        $stmt = $this->con->prepare("SELECT * FROM `dia_chi` WHERE `ID` = ? AND `Email` = ?");
        $stmt->bind_param("is", $id, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $address = $result->fetch_assoc();
        $stmt->close();
        return $address;
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

        // Đảm bảo $address không rỗng
        if (empty($address)) {
            error_log("Update Address Failed: Address is empty for ID=$id, Email=$email");
            return false;
        }
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
    // Lấy ID_Khach_Hang từ email
    public function getCustomerIdByEmail($email)
    {
        $query = "SELECT ID_Khach_Hang FROM khach_hang WHERE Email = ?";
        $stmt = $this->con->prepare($query);
        if (!$stmt) {
            error_log("Prepare failed: " . $this->con->error);
            return null;
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            error_log("Found customer ID: " . $row['ID_Khach_Hang']);
            return $row['ID_Khach_Hang'];
        }

        error_log("No customer found for email: $email");
        return null;
    }
    public function getNamebyId($id)
    {
        $sql = "SELECT Ten_Khach_Hang FROM `khach_hang` where ID_Khach_Hang = $id";
        $result = mysqli_query($this->con, $sql);
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row['Ten_Khach_Hang'];
        }
        return $rows;
    }
    // Lấy danh sách đơn hàng dựa trên ID_Khach_Hang, sử dụng Dia_Chi_Giao_Hang
    public function getOrdersByCustomerId($customerId)
    {
        error_log("Fetching orders for customer ID: $customerId");
        $query = "SELECT dh.ID_Don_Hang, dh.ID_Khach_Hang, dh.Ngay_Dat_Hang, dh.Tong_Tien, dh.Trang_Thai, dh.Phuong_Thuc_Thanh_Toan, dh.Dia_Chi_Giao_Hang 
              FROM don_hang dh 
              WHERE dh.ID_Khach_Hang = ?";
        $stmt = $this->con->prepare($query);
        if (!$stmt) {
            error_log("Prepare failed: " . $this->con->error);
            return [];
        }

        $stmt->bind_param("i", $customerId);
        $stmt->execute();
        $result = $stmt->get_result();

        $orders = [];
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }
        error_log("Number of orders found: " . count($orders));
        return $orders;
    }

    // Lấy chi tiết đơn hàng từ ctiet_cart
    public function getOrderDetails($orderId)
    {
        $query = "SELECT ctdh.*, s.Ten_Sach, s.Images, s.Gia_Ban 
              FROM chi_tiet_don_hang ctdh 
              JOIN sach s ON ctdh.ID_Sach = s.ID_Sach 
              WHERE ctdh.ID_Don_Hang = ?";
        $stmt = $this->con->prepare($query);
        if (!$stmt) {
            error_log("Prepare failed: " . $this->con->error);
            return [];
        }

        $stmt->bind_param("i", $orderId);
        $stmt->execute();
        $result = $stmt->get_result();

        $details = [];
        while ($row = $result->fetch_assoc()) {
            $details[] = $row;
        }
        return $details;
    }
    public function createOrder($orderData)
    {
        $query = "INSERT INTO don_hang (ID_Khach_Hang, Ngay_Dat_Hang, Tong_Tien, Trang_Thai, Phuong_Thuc_Thanh_Toan, Dia_Chi_Giao_Hang) 
              VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param(
            "ississ",
            $orderData['ID_Khach_Hang'],
            $orderData['Ngay_Dat_Hang'],
            $orderData['Tong_Tien'],
            $orderData['Trang_Thai'],
            $orderData['Phuong_Thuc_Thanh_Toan'],
            $orderData['Dia_Chi_Giao_Hang']
        );
        $success = $stmt->execute();
        $orderId = $success ? $this->con->insert_id : null;
        $stmt->close();
        return $orderId;
    }
    public function addOrderDetail($orderId,  $productId, $quantity, $price, $thanhtien)
    {
        $query = "INSERT INTO chi_tiet_don_hang (ID_Don_Hang, ID_Sach, So_Luong, Don_Gia, Thanh_Tien) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param("iiidi", $orderId, $productId, $quantity, $price, $thanhtien);
        return $stmt->execute();
    }
}
