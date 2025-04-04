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
}
