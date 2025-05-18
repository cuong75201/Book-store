<?php
require_once 'mvc/core/Controller.php';
require_once 'mvc/models/CartModel.php';
require_once 'mvc/models/ctiet_cartModel.php';

class Cart extends Controller {
    private $cartModel;
    private $ctietCartModel;

    public function __construct() {
        $this->cartModel = $this->model('CartModel');
        $this->ctietCartModel = $this->model('ctiet_cartModel');
    }

    public function default() {
        $this->view('main_layout', [
            'page' => 'cart',
            'cart_items' => [],
            'cart_id' => null,
            'total_price' => 0,
            'plugin' => [
                'reset' => 1,
                'style' => 1,
            ],
        ]);
    }

    public function index() {
        $user_email = $_COOKIE['user_email'] ?? null;
        if (!$user_email) {
            // Nếu chưa login → chỉ báo alert và quay về trang trước
            echo "<script>
                    alert('Vui lòng đăng nhập để xem giỏ hàng!');
                    window.history.back();
                </script>";
            exit;
        }

        try {
            $user_id = $this->cartModel->getUserIdByEmail($user_email);
            if (!$user_id) {
                // Email không hợp lệ → alert rồi back
                echo "<script>
                        alert('Tài khoản không hợp lệ!');
                        window.history.back();
                    </script>";
                exit;
            }

            // Đã login & hợp lệ → load giỏ hàng
            $cart_id     = $this->cartModel->getOrCreateCart($user_id);
            $cart_items  = $this->cartModel->getCTCart($cart_id);
            $total_price = $this->cartModel->getTotalPrice($cart_id);

            $this->view('main_layout', [
                'page'        => 'cart',
                'cart_items'  => $cart_items,
                'cart_id'     => $cart_id,
                'total_price' => $total_price,
                'plugin'      => [
                    'reset' => 1,
                    'style' => 1,
                ],
            ]);
        } catch (Exception $e) {
            // Lỗi bất ngờ → alert rồi back
            error_log("Lỗi trong Cart::index: " . $e->getMessage());
            echo "<script>
                    alert('Có lỗi xảy ra: " . addslashes($e->getMessage()) . "');
                    window.history.back();
                </script>";
            exit;
        }
    }


    public function add() {
        header('Content-Type: application/json; charset=utf-8');
        $result = ['success' => false, 'message' => ''];

        error_log('Cart/add called: Method=' . $_SERVER['REQUEST_METHOD'] . ', POST=' . print_r($_POST, true));

        // 1) Check cookie login
        if (empty($_COOKIE['user_email'])) {
            $result['message'] = 'Vui lòng đăng nhập để thêm vào giỏ hàng.';
            error_log('Lỗi: Không có user_email cookie');
            echo json_encode($result);
            exit;
        }

        // 2) Lấy ID khách hàng
        $userEmail = $_COOKIE['user_email'];
        error_log('User email: ' . $userEmail);
        $userId = $this->cartModel->getUserIdByEmail($userEmail);
        if (!$userId) {
            $result['message'] = 'Tài khoản không hợp lệ.';
            error_log('Lỗi: Không tìm thấy ID_Khach_Hang cho email ' . $userEmail);
            echo json_encode($result);
            exit;
        }
        error_log('User ID: ' . $userId);

        // 3) Lấy dữ liệu POST
        $bookId = isset($_POST['book_id']) ? (int)$_POST['book_id'] : 0;
        $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
        error_log('Book ID: ' . $bookId . ', Quantity: ' . $quantity);

        if ($bookId <= 0 || $quantity <= 0) {
            $result['message'] = 'Dữ liệu sản phẩm không hợp lệ.';
            error_log('Lỗi: book_id hoặc quantity không hợp lệ');
            echo json_encode($result);
            exit;
        }

        // 4) Insert vào cart + ctiet_cart
        try {
            $cartId = $this->cartModel->getOrCreateCart($userId);
            error_log('Cart ID: ' . $cartId);
            $this->ctietCartModel->addToCTCart($cartId, $bookId, $quantity);
            $result['success'] = true;
            $result['message'] = 'Đã thêm vào giỏ hàng thành công.';
            error_log('Thêm vào giỏ hàng thành công: Cart ID=' . $cartId . ', Book ID=' . $bookId);
        } catch (Exception $e) {
            $result['message'] = 'Lỗi hệ thống: ' . $e->getMessage();
            error_log('Lỗi thêm giỏ hàng: ' . $e->getMessage());
        }

        echo json_encode($result);
        exit;
    }




    public function update() {
        $user_email = isset($_COOKIE['user_email']) ? $_COOKIE['user_email'] : null;
        if (!$user_email) {
            echo "<script>alert('Vui lòng đăng nhập để cập nhật giỏ hàng!'); window.location.href='/account/login';</script>";
            exit;
        }

        try {
            $user_id = $this->cartModel->getUserIdByEmail($user_email);
            if (!$user_id) {
                echo "<script>alert('Tài khoản không hợp lệ!'); window.location.href='/account/login';</script>";
                exit;
            }

            $book_id = isset($_POST['book_id']) ? (int)$_POST['book_id'] : null;
            $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : null;
            $cart_id = $this->cartModel->getOrCreateCart($user_id);

            if (!$book_id || $quantity < 1) {
                echo "<script>alert('Dữ liệu không hợp lệ!'); window.location.href='/cart';</script>";
                exit;
            }

            $result = $this->cartModel->updateCartItem($cart_id, $book_id, $quantity);

            if ($result) {
                echo "<script>alert('Cập nhật giỏ hàng thành công!'); window.location.href='/cart';</script>";
            } else {
                echo "<script>alert('Có lỗi xảy ra, vui lòng thử lại!'); window.location.href='/cart';</script>";
            }
        } catch (Exception $e) {
            error_log("Lỗi trong update: " . $e->getMessage());
            echo "<script>alert('Có lỗi xảy ra: " . addslashes($e->getMessage()) . "'); window.location.href='/cart';</script>";
            exit;
        }
    }

    public function delete() {
        $user_email = isset($_COOKIE['user_email']) ? $_COOKIE['user_email'] : null;
        if (!$user_email) {
            echo "<script>alert('Vui lòng đăng nhập để xóa khỏi giỏ hàng!'); window.location.href='/account/login';</script>";
            exit;
        }

        try {
            $user_id = $this->cartModel->getUserIdByEmail($user_email);
            if (!$user_id) {
                echo "<script>alert('Tài khoản không hợp lệ!'); window.location.href='/account/login';</script>";
                exit;
            }

            $book_id = isset($_POST['book_id']) ? (int)$_POST['book_id'] : null;
            $cart_id = $this->cartModel->getOrCreateCart($user_id);

            if (!$book_id) {
                echo "<script>alert('Sách không hợp lệ!'); window.location.href='/cart';</script>";
                exit;
            }

            $result = $this->cartModel->deleteFromCart($cart_id, $book_id);

            if ($result) {
                echo "<script>alert('Xóa khỏi giỏ hàng thành công!'); window.location.href='/cart';</script>";
            } else {
                echo "<script>alert('Có lỗi xảy ra, vui lòng thử lại!'); window.location.href='/cart';</script>";
            }
        } catch (Exception $e) {
            error_log("Lỗi trong delete: " . $e->getMessage());
            echo "<script>alert('Có lỗi xảy ra: " . addslashes($e->getMessage()) . "'); window.location.href='/cart';</script>";
            exit;
        }
    }
}
?>