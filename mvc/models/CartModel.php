<?php
class CartModel extends dbconnect
{
<<<<<<< Updated upstream
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
    public function getCartItems($customerId)
    {
        $sql = "SELECT c.ID_Cart, c.ID_Sach, c.So_Luong, s.Ten_Sach, s.Gia_Ban, s.`GiamGia(%)`, s.Images
                FROM cart c
                JOIN sach s ON c.ID_Sach = s.ID_Sach
                WHERE c.ID_Khach_Hang = '$customerId'";
        $result = mysqli_query($this->con, $sql);
        $rows = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $row['FinalPrice'] = $row['Gia_Ban'] * (1 - $row[`GiamGia(%)`] / 100);
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

=======
    public function getUserIdByEmail($email)
    {
        $sql = "SELECT ID_Khach_Hang FROM users WHERE email = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        return $user ? $user['ID_Khach_Hang'] : null;
    }

    public function getCart($user_id)
    {
        $sql = "SELECT * FROM `cart` WHERE `ID_Khach_Hang` = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrCreateCart($user_id)
    {
        $carts = $this->getCart($user_id);
        if (empty($carts)) {
            $sql = "INSERT INTO `cart` (`ID_Khach_Hang`) VALUES (?)";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            return $this->con->insert_id;
        }
        return $carts[0]['ID'];
    }

    public function addToCTCart($cart_id, $book_id, $quantity = 1)
    {
        $sql = "INSERT INTO `ctiet_cart` (`ID_Cart`, `ID_Sach`, `So_Luong`) VALUES (?, ?, ?) 
                ON DUPLICATE KEY UPDATE `So_Luong` = `So_Luong` + ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("iiii", $cart_id, $book_id, $quantity, $quantity);
        return $stmt->execute();
    }

    public function getCTCart($cart_id)
    {
        $sql = "SELECT ct.*, b.Ten_Sach, b.Gia 
                FROM `ctiet_cart` ct 
                JOIN `books` b ON ct.ID_Sach = b.ID 
                WHERE ct.ID_Cart = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("i", $cart_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateCTCart($cart_id, $book_id, $quantity)
    {
        $sql = "UPDATE `ctiet_cart` SET `So_Luong` = ? WHERE `ID_Cart` = ? AND `ID_Sach` = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("iii", $quantity, $cart_id, $book_id);
        return $stmt->execute();
    }

    public function deleteFromCart($cart_id, $book_id)
    {
        $sql = "DELETE FROM `ctiet_cart` WHERE `ID_Cart` = ? AND `ID_Sach` = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ii", $cart_id, $book_id);
        return $stmt->execute();
    }

    public function getTotalPrice($cart_id)
    {
        $sql = "SELECT SUM(ct.So_Luong * b.Gia) AS Thanh_Tien 
                FROM `ctiet_cart` ct 
                JOIN `books` b ON ct.ID_Sach = b.ID 
                WHERE ct.ID_Cart = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("i", $cart_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $total = $result->fetch_assoc();
        return $total['Thanh_Tien'] ?? 0;
    }
>>>>>>> Stashed changes
}