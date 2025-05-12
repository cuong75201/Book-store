<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - Admin</title>
    <style>
        .text-danger {
            color: red;
        }

        .login-container {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: whitesmoke;
        }

        .login-container .login-form {
            background-color: white;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            height: 80vh;
            padding: 20px;
            width: 80%;

            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-container .login-form .top-form {
            width: 30%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .login-container .login-form .top-form img {
            width: 100%;
        }

        .login-container .login-form .form-content {
            /* background-color: black; */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container .login-form .form-content form {
            width: 35%;
        }

        .login-container .login-form .form-content form input {
            padding: 10px;
            margin: 10px 0;
            width: 100%;
            font-size: 15px;
        }

        .login-container .login-form .bottom-form {
            /* background-color:aquamarine; */
            margin-top: 20px;
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container .login-form .bottom-form .login-btn {
            background-color: #026e36;
            padding: 10px 50px;
            color: whitesmoke;
        }

        .login-container .login-form .bottom-form .login-btn:hover {
            background-color: rgb(14, 70, 41);
        }
    </style>
</head>

<body>
    <div class="container">

    </div>
    <div class="login">
        <div class="login-container">
            <div class="login-form">
                <div class="top-form">
                    <img src="../media/logo-banner/logo.jpg" alt="logo">
                </div>

                <div class="form-content">
                    <form>
                        <input type="text" id="username" name="username" placeholder="Số điện thoại">
                        <span class="text-danger" id="errol_user_disabled"></span>
                        <br>
                        <input type="password" id="password" name="password" placeholder="Mật khẩu">
                        <span class="text-danger" id="errol_pass_disabled"></span>

                    </form>
                </div>

                <div class="bottom-form">
                    <a href="#" class="login-btn">
                        <div>Đăng nhập</div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <script src="../public/lib/jquery-3.7.1.min.js"></script>
    <script src="../public/js/admin.js"></script>

</body>

</html>