<?php
class CartModel extends dbconnect
{
    // Lấy thông tin sản phẩm từ ID
     public function getProductById($productId)
    {
        $sql = "SELECT * FROM sach WHERE ID_Sach = '$productId' AND TrangThai = '1'";
        $result = mysqli_query($this->con, $sql);
        $rows = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
            return $rows;
        }
        return [];
    }

    // Lấy danh sách sản phẩm trong giỏ hàng của khách hàng
    public function getCartItems($email)
    {
        $sql = "SELECT c.ID_Cart, c.ID_Sach, c.So_Luong, s.Ten_Sach, s.Gia_Ban, s.`GiamGia(%)`, s.Images
                FROM cart c
                JOIN sach s ON c.ID_Sach = s.ID_Sach
                WHERE c.Email_khachhang = '$email'";
        $result = mysqli_query($this->con, $sql);
        $rows = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $row['FinalPrice'] = $row['Gia_Ban'];
                $rows[] = $row;
            }
            return $rows;
        }
        return [];
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng
public function updateCartItem($customerId, $productId, $quantity)
{
    $query = "UPDATE cart SET So_Luong = ? WHERE ID_Khach_Hang = ? AND ID_Sach = ?";
    $stmt = $this->con->prepare($query);
    $stmt->bind_param("iii", $quantity, $customerId, $productId);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

    // Lấy địa chỉ mặc định của khách hàng
    public function getDefaultAddress($customerId)
    {
        $sql = "SELECT * FROM dia_chi WHERE ID_Khach_Hang = '$customerId' AND is_default = 1";
        $result = mysqli_query($this->con, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        }
        return null;
    }

    // Lấy tất cả địa chỉ của khách hàng
    public function getAddresses($customerId)
    {
        $sql = "SELECT * FROM dia_chi WHERE ID_Khach_Hang = '$customerId'";
        $result = mysqli_query($this->con, $sql);
        $rows = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
            return $rows;
        }
        return [];
    }

    // Tạo đơn hàng mới
    public function createOrder($orderData)
    {
        $query = "INSERT INTO don_hang (ID_Khach_Hang, Ngay_Dat_Hang, Tong_Tien, Trang_Thai, Phuong_Thuc_Thanh_Toan, Dia_Chi_Giao_Hang) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param("ississ", $orderData['ID_Khach_Hang'], $orderData['Ngay_Dat_Hang'], 
                          $orderData['Tong_Tien'], $orderData['Trang_Thai'], 
                          $orderData['Phuong_Thuc_Thanh_Toan'], $orderData['Dia_Chi_Giao_Hang']);
        $stmt->execute();
        $orderId = $this->con->insert_id;
        $stmt->close();
        return $orderId;
    }

    public function addOrderDetail($orderId, $productId, $quantity, $price)
    {
        $query = "INSERT INTO chi_tiet_don_hang (ID_Don_Hang, ID_Sach, So_Luong, Don_Gia) VALUES (?, ?, ?, ?)";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param("iiid", $orderId, $productId, $quantity, $price);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function clearCart($email)
    {
        $query = "DELETE FROM cart WHERE Email_khachhang = ?";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param("s", $email);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

public function getProductStock($productId) {
    $sql = "SELECT ID_Sach, Ten_Sach, So_Luong_Ton FROM sach WHERE ID_Sach = ?";
    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
    return $row;
}

public function reduceStock($productId, $quantity) {
    // Start transaction
    $this->con->begin_transaction();
    try {
        // Lock the row for update
        $sqlCheck = "SELECT So_Luong_Ton FROM sach WHERE ID_Sach = ? FOR UPDATE";
        $stmtCheck = $this->con->prepare($sqlCheck);
        $stmtCheck->bind_param("i", $productId);
        $stmtCheck->execute();
        $result = $stmtCheck->get_result();
        $stock = $result->fetch_assoc();
        $stmtCheck->close();

        if ($stock && $stock['So_Luong_Ton'] >= $quantity) {
            $sqlUpdate = "UPDATE sach SET So_Luong_Ton = So_Luong_Ton - ? WHERE ID_Sach = ?";
            $stmtUpdate = $this->con->prepare($sqlUpdate);
            $stmtUpdate->bind_param("ii", $quantity, $productId);
            $stmtUpdate->execute();
            $stmtUpdate->close();
            $this->con->commit();
            return true;
        } else {
            $this->con->rollback();
            return false;
        }
    } catch (Exception $e) {
        $this->con->rollback();
        return false;
    }
}
    public function addTocart($id, $email, $quantity)
    {
        $query="SELECT * FROM `cart` WHERE ID_Sach=$id AND Email_khachhang='$email'";
        $result = mysqli_query($this->con, $query);
        if($row=mysqli_fetch_assoc($result)){
            $quantity=$quantity+$row['So_Luong'];
           $result= $this->UpdateCart($id,$quantity,$email);
           return $result;
        }

        $sql = "INSERT INTO `cart`( `Email_khachhang`, `ID_Sach`, `So_Luong`) VALUES ('$email',$id,$quantity)";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function getProduct($email)
    {
        $sql = "SELECT c.ID_Sach,c.So_Luong,sach.Ten_Sach,sach.Gia_Ban,sach.So_Luong_Ton from cart c JOIN sach on c.ID_Sach=sach.ID_Sach WHERE c.Email_khachhang='$email'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    public function UpdateCart($id,$quantity,$email){
        $sql="UPDATE `cart` SET `So_Luong`=$quantity WHERE `Email_khachhang`='$email' AND `ID_Sach`=$id";
         $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function deleteCart($id,$email){
        $sql="DELETE FROM `cart` WHERE `Email_khachhang`='$email' AND `ID_Sach`=$id";
         $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function getAllProduct($email){
        $sql = "SELECT * from cart WHERE Email_khachhang='$email'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
