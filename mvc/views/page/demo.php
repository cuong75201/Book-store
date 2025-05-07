<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập & Đăng ký</title>
    <link rel="stylesheet" href="styles.css"> <!-- Liên kết CSS riêng nếu có -->
</head>
<body>
    <section id="new-login">
        <div class="fv-login">
            <div class="container">
            </div>
                <div class="liner-or">
                    
                </div>
                <div class="box-login-two">
                    <div class="auth-container">
                        <div class="auth-box">
                            <h1 class="title-box-login">Đăng nhập</h1>
                            <div class="content-cus-form cus-login">
                                <div id="login">
                                    <form accept-charset="UTF-8" action="/account/login" id="customer_login" method="post">
                                        <input name="form_type" type="hidden" value="customer_login">
                                        <input name="utf8" type="hidden" value="✓">
                                        <div class="col_full">
                                            <input type="email" id="login-form-username" name="customer[email]" placeholder="Email của bạn" class="form-control" required>
                                            <span class="not-null">*</span>
                                        </div>
                                        <div class="col_full">
                                            <input type="password" id="login-form-password" name="customer[password]" placeholder="Nhập mật khẩu" class="form-control" required>
                                            <span class="not-null">*</span>
                                        </div>
                                        <div class="col_full nobottommargin action">
                                            <button class="button button-3d button-black nomargin" type="submit">Đăng nhập</button>
                                            <a href="#" onclick="showRecoverPasswordForm();return false;">Quên mật khẩu?</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <span class = "liner-or">Hoặc</span>
                        <div class="auth-box">
                            <h1 class="title-box-login">Đăng ký thành viên mới</h1>
                            <div class="content-cus-form cus-reg">
                                <form accept-charset="UTF-8" action="/account" id="create_customer" method="post">
                                    <input name="form_type" type="hidden" value="create_customer">
                                    <input name="utf8" type="hidden" value="✓">
                                    <div class="col_full">
                                        <input type="text" name="customer[last_name]" placeholder="Họ" required>
                                        <span class="not-null">*</span>
                                    </div>
                                    <div class="col_full">
                                        <input type="text" name="customer[first_name]" placeholder="Tên" required>
                                        <span class="not-null">*</span>
                                    </div>
                                    <div class="col_full">
                                        <input type="email" name="customer[email]" placeholder="Email" required>
                                        <span class="not-null">*</span>
                                    </div>
                                    <div class="col_full">
                                        <input type="password" name="customer[password]" placeholder="Mật khẩu" required>
                                        <span class="not-null">*</span>
                                    </div>
                                    <div class="col_full">
                                        <input type="password" name="customer[repassword]" placeholder="Nhập lại mật khẩu" required>
                                        <span class="not-null">*</span>
                                    </div>
                                    <div class="col_full nobottommargin action">
                                        <button class="button button-3d button-black nomargin" type="submit">Đăng ký</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
