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
        $stmt->bind_param(
            "ississ",
            $orderData['ID_Khach_Hang'],
            $orderData['Ngay_Dat_Hang'],
            $orderData['Tong_Tien'],
            $orderData['Trang_Thai'],
            $orderData['Phuong_Thuc_Thanh_Toan'],
            $orderData['Dia_Chi_Giao_Hang']
        );
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
}
