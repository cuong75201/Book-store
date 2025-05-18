<?php
require_once 'mvc/core/Controller.php';
require_once 'mvc/models/CartModel.php';
require_once 'mvc/models/ctiet_cartModel.php';

class Cart extends Controller
{
    private $cartModel;
    private $ctietCartModel;

    public function __construct()
    {
        $this->cartModel = $this->model('CartModel');
        $this->ctietCartModel = $this->model('ctiet_cartModel');
    }

    public function default()
    {
        $user_email = $_COOKIE['user_email'] ?? null;
        if (!$user_email) {
            // Nếu chưa login → chỉ báo alert và quay về trang trước
            echo "<script>
                    alert('Vui lòng đăng nhập để xem giỏ hàng!');
                    window.history.back();
                </script>";
            exit;
        }
        $cart_item = $this->cartModel->getProduct($user_email);
        $this->view('main_layout', [
            "Title" => "Giỏ hàng - MINH LONG BOOKS",
            'page'        => 'cart',
            'cart_item' => $cart_item,
            'plugin'      => [
                'reset' => 1,
                'style' => 1,
            ],
            'script' => 'cart'
        ]);
    }

    public function index()
    {
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


            $this->view('main_layout', [
                "Title" => "Giỏ hàng - MINH LONG BOOKS",
                'page'        => 'cart',
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


    public function add()
    {
        if (!isset($_COOKIE['user_email'])) {
            echo json_encode(false);
            return;
        }
        $id = $_POST['id'];
        $quantity = $_POST['quantity'];
        $email = $_COOKIE['user_email'];
        $result = $this->cartModel->addTocart($id, $email, $quantity);
        echo json_encode($result);
    }




    public function update()
    {
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

    public function delete()
    {
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
    function KTSoLuong()
    {
        $quantity = $_POST['quantity'];
        $id = $_POST['id'];
        $user_email = $_COOKIE['user_email'] ?? null;
        $cart_item = $this->cartModel->getProduct($user_email);
        foreach ($cart_item as $item) {
            if ($id == $item['ID_Sach']) {
                if ($quantity <= $item['So_Luong_Ton']) {
                    $result = $this->cartModel->UpdateCart($id, $quantity, $user_email);
                    if (!$result) {
                        echo json_encode("Lỗi khi cập nhật giỏ hàng");
                        return;
                    }
                    echo json_encode((int) $quantity * $item['Gia_Ban']);
                    return;
                }
            }
        }
        echo json_encode(false);
    }
    function delItem(){
        $id = $_POST['id'];
        $user_email = $_COOKIE['user_email'] ?? null;
       $result=$this->cartModel->deleteCart($id,$user_email);
       echo json_encode($result);
    }
}
