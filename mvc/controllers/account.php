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
        $result = $this->userModel->create($lastname, $fisrtname, $email, $password, $date);
        return $result;
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
            $date = date("Y-m-d H:i:s");
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
            echo $result;
        }
    }
}
