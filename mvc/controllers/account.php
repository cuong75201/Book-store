<?php
class Account extends Controller
{
    private $userModel;
    function __construct()
    {
        $this->userModel = $this->model("UserModel");
    }
    function addUser($lastname, $fisrtname, $email, $password, $date)
    {
        $result = $this->userModel->creatUserLog($lastname, $fisrtname, $email, $password, $date);
        return $result;
    }
    function default()
    {
        $this->view('main_layout', [
            'Title' => 'Tài khoản – MINH LONG BOOK',
            'page' => 'information',

            "script" => "AjaxLogin"
        ]);
    }
    function Signup()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $last_name = $_POST["lastname"];
            $first_name = $_POST["firstname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confirmpassword = $_POST["confirmpassword"];
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $date = date("Y-m-d");
            $error = [];
            if (empty($last_name)) {
                $error["last_name"] = "Không được để trống";
            }
            if (empty($first_name)) {
                $error["first_name"] = "Không được để trống";
            }
            if (empty($email)) {
                $error["email"] = "Không được để trống";
            } else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error["email"] = "Định dạng email không hợp lệ";
                }
            }
            if (empty($password)) {
                $error['password'] = "Không được để trống";
            } else {
                $pattern = '/^(?=.*[\W_]).{6,}$/';
                if (!preg_match($pattern, $password)) {
                    $error['password'] = "Mật khẩu không hợp lệ! Mật khẩu bao gồm 6 ký tự và có ít nhất 1 ký tự đặc biệt";
                }
            }
            if (empty($confirmpassword)) {
                $error['confirmpassword'] = "Không được để trống";
            } else {
                if ($password !== $confirmpassword) {
                    $error['confirmpassword'] = "Mật khẩu không khớp";
                }
            }
            if (empty($error)) {
                $result = $this->addUser($last_name, $first_name, $email, $password, $date);
                if (!$result) {
                    echo json_encode(['status' => 'same_email', 'errors' => $result]);
                } else {
                    setcookie("user_email", $email, time() + 3600 * 248 * 30, "/");
                    echo json_encode(['status' => 'success']);
                }
            } else {
                echo json_encode(['status' => 'valid', 'errors' => $error]);
            }
        }
    }

    function login()
    {
        $this->view('main_layout', [
            'Title' => 'Tài khoản – MINH LONG BOOK',
            'page' => 'login',
            "plugin" => [
                "reset" => 1,
                "style" => 1,
            ],
            "script" => "AjaxLogin"
        ]);
    }
    function logout()
    {
        setcookie("user_email", "", time() - 3600, "/");
        header("Location: ../account/login");
    }
    public function checkLogin()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $password = $_POST['password'];
            $email = $_POST['email'];

            $result = $this->userModel->checkLogin($email, $password);
            if ($result === "success") {
                setcookie("user_email", $email, time() + 3600 * 24 * 30, "/");
            }
            echo $result;
        }
    }
    function information()
    {
        $user = null;

        if (isset($_COOKIE['user_email'])) {
            $email = $_COOKIE['user_email'];
            $user = $this->userModel->getUserByEmail($email); // bạn cần có hàm này trong UserModel
            $default_address = $this->userModel->getDefaultAddress($email);
            $addresses = $this->userModel->getAddresses($email);
        }
        $this->view('main_layout', [
            'Title' => 'Thông tin tài khoản – MINH LONG BOOK',
            'page' => 'information',
            "plugin" => [
                "reset" => 1,
                "style" => 1,
            ],
            "script" => "AjaxLogin",
            "user" => $user, // truyền sang view
            "default_address" => $default_address,
            "addresses" => $addresses

        ]);
    }
    function addresses()
    {
        // Kiểm tra người dùng đã đăng nhập chưa
        if (!isset($_COOKIE['user_email'])) {
            header("Location: ../account/login");
            return;
        }

        $email = $_COOKIE['user_email'];
        $user = $this->userModel->getUserByEmail($email);
        $addresses = $this->userModel->getAddresses($email);

        $this->view('main_layout', [
            'Title' => 'Sổ địa chỉ – MINH LONG BOOK',
            'page' => 'addresses',
            "plugin" => [
                "reset" => 1,
                "style" => 1,
            ],
            "script" => "address",
            "user" => $user,
            "addresses" => $addresses
        ]);
    }

    function orders()
    {
        $user = null;
        $email = $_COOKIE['user_email'] ?? null;

        if ($email) {
            $customerId = $this->userModel->getCustomerIdByEmail($email);
            if (!$customerId) {
                echo json_encode(['status' => 'error', 'message' => 'Không tìm thấy thông tin khách hàng']);
                return;
            }
            if ($customerId) {
                $user = $this->userModel->getUserByEmail($email); // Giả định getUserByEmail trả về thông tin khách hàng
                $order = $this->userModel->getOrdersByCustomerId($customerId);
            }
        }

        $data['user'] = $user;
        $this->view('main_layout', [
            'Title' => 'Đơn hàng của tôi – MINH LONG BOOK',
            'page' => 'orders',
            "plugin" => [
                "reset" => 1,
                "style" => 1,
            ],
            "script" => "orders",
            "user" => $user,
            "orders" => $order
        ]);
    }

    function addAddress()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_COOKIE['user_email'] ?? null;
            $name = $_POST['name'] ?? '';
            $duong = $_POST['duong'] ?? '';
            $phuong = $_POST['phuong'] ?? '';
            $quan = $_POST['quan'] ?? '';
            $thanhpho = $_POST['thanhpho'] ?? '';
            $diachi = $_POST['address'];
            $address = trim("$duong, $phuong, $quan, $thanhpho"); // Nối 4 ô
            $phone = $_POST['phone'] ?? '';
            $is_default = isset($_POST['is_default']) && $_POST['is_default'] == '1';

            if (!$email) {
                echo json_encode(['status' => 'error', 'message' => 'Vui lòng đăng nhập']);
                return;
            }
            if (empty($name) || empty($diachi) || empty($phone)) {
                echo json_encode(['status' => 'error', 'message' => 'Vui lòng điền đầy đủ thông tin']);
                return;
            }
            if (!preg_match('/^(\+84|0)[0-9]{9,10}$/', $phone)) {
                echo json_encode(['status' => 'error', 'message' => 'Số điện thoại không hợp lệ']);
                return;
            }

            $result = $this->userModel->addAddress($email, $name, $diachi, $phone, $is_default);
            if ($result) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Không thể thêm địa chỉ']);
            }
        }
    }

    function updateAddress()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['ID'] ?? 0;
            $email = $_COOKIE['user_email'] ?? null;
            $name = $_POST['name'] ?? '';
            $duong = $_POST['duong'] ?? '';
            $quan = $_POST['quan'] ?? '';
            $thanhpho = $_POST['thanhpho'] ?? '';
            $diachi = $_POST['address'];
            $address = trim("$duong, $quan, $thanhpho"); // Nối 4 ô
            $phone = $_POST['phone'] ?? '';
            $is_default = isset($_POST['is_default']) && $_POST['is_default'] == '1';

            error_log("updateAddress: ID=$id, Email=$email");

            if (!$email) {
                echo json_encode(['status' => 'error', 'message' => 'Vui lòng đăng nhập']);
                return;
            }
            if (empty($name) || empty($diachi) || empty($phone)) {
                echo json_encode(['status' => 'error', 'message' => 'Vui lòng điền đầy đủ thông tin']);
                return;
            }
            if (!preg_match('/^(\+84|0)[0-9]{9,10}$/', $phone)) {
                echo json_encode(['status' => 'error', 'message' => 'Số điện thoại không hợp lệ']);
                return;
            }

            $result = $this->userModel->updateAddress($id, $email, $name, $diachi, $phone, $is_default);
            if ($result) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Không thể cập nhật địa chỉ']);
            }
        }
    }

    function deleteAddress()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['ID'] ?? 0;
            $email = $_COOKIE['user_email'] ?? null;

            if (!$email) {
                echo json_encode(['status' => 'error', 'message' => 'Vui lòng đăng nhập']);
                return;
            }
            if (!$id) {
                echo json_encode(['status' => 'error', 'message' => 'ID địa chỉ không hợp lệ']);
                return;
            }

            $result = $this->userModel->deleteAddress($id, $email);
            if ($result) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Không thể xóa địa chỉ']);
            }
        }
    }

    function setDefaultAddress()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['ID'] ?? 0;
            $email = $_COOKIE['user_email'] ?? null;

            if (!$email) {
                echo json_encode(['status' => 'error', 'message' => 'Vui lòng đăng nhập']);
                return;
            }
            if (!$id) {
                echo json_encode(['status' => 'error', 'message' => 'ID địa chỉ không hợp lệ']);
                return;
            }

            $result = $this->userModel->setDefaultAddress($id, $email);
            if ($result) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Không thể đặt địa chỉ mặc định']);
            }
        }
    }

    function getAddress()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = $_GET['ID'] ?? 0;
            $email = $_COOKIE['user_email'] ?? null;
            if (!$email) {
                echo json_encode(['status' => 'error', 'message' => 'Vui lòng đăng nhập']);
                return;
            }
            if (!$id) {
                echo json_encode(['status' => 'error', 'message' => 'ID địa chỉ không hợp lệ']);
                return;
            }

            $address = $this->userModel->getAddressById($id, $email);
            if ($address) {
                echo json_encode(['status' => 'success', 'address' => $address]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Không tìm thấy địa chỉ']);
            }
        }
    }
    function getOrderDetails()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $orderId = $_POST['order_id'] ?? 0;
            $email = $_COOKIE['user_email'] ?? null;
            $customerId = $this->userModel->getCustomerIdByEmail($email);

            if (!$email || !$customerId) {
                echo json_encode(['status' => 'error', 'message' => 'Vui lòng đăng nhập']);
                return;
            }
            if (!$orderId) {
                echo json_encode(['status' => 'error', 'message' => 'Mã đơn hàng không hợp lệ']);
                return;
            }

            // Kiểm tra đơn hàng thuộc về người dùng
            $query = "SELECT ID_Don_Hang FROM don_hang WHERE ID_Don_Hang = ? AND ID_Khach_Hang = ?";
            $stmt = $this->userModel->con->prepare($query);
            $stmt->bind_param("ii", $orderId, $customerId);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows == 0) {
                echo json_encode(['status' => 'error', 'message' => 'Đơn hàng không tồn tại']);
                return;
            }

            $details = $this->userModel->getOrderDetails($orderId);
            echo json_encode(['status' => 'success', 'details' => $details]);
        }
    }
}
