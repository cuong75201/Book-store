<?php
class CheckoutController extends Controller
{
    private $cartModel;
    private $userModel;

    public function __construct()
    {
        $this->cartModel = $this->model("CartModel");
        $this->userModel = $this->model("UserModel");
    }

    public function index($productId = null, $quantity = 1)
    {
        if (!isset($_COOKIE['user_email'])) {
            header("Location: ../account/login");
            return;
        }

        $email = $_COOKIE['user_email'];
        //$customerId = $this->userModel->getCustomerIdByEmail($email);
        if (!$email) {
            $this->view("main_layout", [
                "page" => "404",
                "Title" => "Lỗi – MINH LONG BOOK"
            ]);
            return;
        }

        $products = [];
        $total = 0;
        $isFromCart = true;

        if ($productId) {
            // Trường hợp thanh toán trực tiếp từ sản phẩm
            $isFromCart = false;
            $product = $this->cartModel->getProductById($productId);
            if (empty($product)) {
                $this->view("main_layout", [
                    "page" => "404",
                    "Title" => "Sản phẩm không tồn tại – MINH LONG BOOK"
                ]);
                return;
            }
            $product = $product[0];
            $product['So_Luong'] = $quantity;
            $product['FinalPrice'] = $product['Gia_Ban'];
            $products[] = $product;
            $total = $product['FinalPrice'] * $quantity;
        } else {
            // Trường hợp thanh toán từ giỏ hàng
            $products = $this->cartModel->getCartItems($email);
            foreach ($products as $item) {
                $total += $item['FinalPrice'] * $item['So_Luong'];
            }
        }

        if (isset($_COOKIE['user_email'])) {
        $email = $_COOKIE['user_email'];
        $user = $this->userModel->getUserByEmail($email); // bạn cần có hàm này trong UserModel
        $defaultAddress = $this->userModel->getDefaultAddress($email);
        $addresses = $this->userModel->getAddresses($email);
        }
        $this->view("main_layout", [
            "Title" => "Thanh toán – MINH LONG BOOK",
            "page" => "checkout",
            "products" => $products,
            "total" => $total,
            "default_address" => $defaultAddress,
            "addresses" => $addresses,
            "plugin" => [
                "reset" => 1,
                "style" => 1,
            ],
            "script" => "checkout",
            "user" => $user,
        ]);
    }

   public function processCheckout()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = json_decode(file_get_contents('php://input'), true);
            $email = $_COOKIE['user_email'];
            $customerId = $this->userModel->getCustomerIdByEmail($_COOKIE['user_email'] ?? '');
            if (!$email) {
                echo json_encode(['status' => 'error', 'message' => 'Vui lòng đăng nhập']);
                return;
            }

            // Kiểm tra số lượng tồn kho dựa trên $data['products']
            $stockIssues = [];
            foreach ($data['products'] as $productId => $item) {
                $requestedQuantity = (int)$item['quantity'];
                $productStock = $this->cartModel->getProductStock($productId);
                if ($productStock && $requestedQuantity > $productStock['So_Luong_Ton']) {
                    $stockIssues[] = "Sản phẩm {$productStock['Ten_Sach']}: chỉ còn {$productStock['So_Luong_Ton']} cuốn (yêu cầu: {$requestedQuantity}).";
                }
                error_log("Requested Quantity for ID $productId: $requestedQuantity");
            }

            if (!empty($stockIssues)) {
                echo json_encode(['status' => 'error', 'message' => implode('<br>', $stockIssues)]);
                return;
            }

            // Nếu không có vấn đề về số lượng, tiếp tục xử lý đơn hàng
            $orderData = [
                'ID_Khach_Hang' => $customerId,
                'Ngay_Dat_Hang' => date('Y-m-d H:i:s'),
                'Tong_Tien' => $data['total'],
                'Trang_Thai' => 1,
                'Phuong_Thuc_Thanh_Toan' => $data['paymentMethod'],
                'Dia_Chi_Giao_Hang' => $this->userModel->getAddressById($data['addressId'], $_COOKIE['user_email'])['Dia_Chi'] ?? 'Không có địa chỉ',
                'Ghi_Chu' => $data['note'] ?? '',
                'isFromCart' => $data['isFromCart'] ?? false,
            ];

            $orderId = $this->userModel->createOrder($orderData);

            if ($orderId) {
                // Lưu chi tiết đơn hàng và giảm số lượng tồn
                foreach ($data['products'] as $productId => $item) {
                    $quantity = (int)$item['quantity'];
                    $price = (float)$item['price'];
                    $thanhTien = ($quantity * $price) + ($quantity * $price * 0.05);

                    $this->userModel->addOrderDetail($orderId, $productId, $quantity, $price, $thanhTien);
                    $success = $this->cartModel->reduceStock($productId, $quantity);
                    if (!$success) {
                        echo json_encode(['status' => 'error', 'message' => "Không thể giảm số lượng tồn cho sản phẩm ID $productId"]);
                        return;
                    }
                }

                // Xóa giỏ hàng nếu mua từ giỏ hàng
                if (isset($data['isFromCart']) && $data['isFromCart'] === true) {
                    $this->cartModel->clearCart($email);
                }

                echo json_encode(['status' => 'success', 'message' => 'Đơn hàng đã được đặt thành công']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Không thể tạo đơn hàng']);
            }
        }
    }
    public function updateCart()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_COOKIE['user_email'] ?? null;
        if (!$email) {
            echo json_encode(['status' => 'error', 'message' => 'Vui lòng đăng nhập']);
            return;
        }

        $customerId = $this->userModel->getCustomerIdByEmail($email);
        if (!$customerId) {
            echo json_encode(['status' => 'error', 'message' => 'Không tìm thấy thông tin khách hàng']);
            return;
        }

        $productId = $_POST['product_id'] ?? null;
        $quantity = $_POST['quantity'] ?? 1;

        if ($productId && $quantity >= 0) {
            $result = $this->cartModel->updateCartItem($customerId, $productId, $quantity);
            if (!$result) {
                echo json_encode(['status' => 'error', 'message' => 'Không thể cập nhật số lượng']);
            } 
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Dữ liệu không hợp lệ']);
        }
    }
}
}