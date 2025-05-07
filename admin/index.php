
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>AdminKKKKK</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style1.css">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    </head>
    <body>
        <div id="sidebar">
            <div id="sidebar-brand">
                <div>
                    <span class="la la-running" style="font-size: 2rem;"></span>
                    <span>ShopGiay</span>
                </div>
            </div>
            <div id="sidebar-menu">
                <ul id = menuADM>
                <li><a href="./menu_items/trangchu.html"><span class="las la-users"></span><span>Trang chủ</span></a></li>
                <li><a href="./menu_items/sanpham.html"><span class="las la-shoe-prints"></span><span>Sản phẩm</span></a></li>
                <li><a href="./menu_items/donhang.html"><span class="las la-shopping-bag"></span><span>Đơn hàng</span></a></li>
                <li><a href="./menu_items/thuoctinh.html"><span class="las la-users"></span><span>Thuộc tính</span></a></li>
                <li><a href="./menu_items/khuvuckho.html"><span class="las la-users"></span><span>Khu vực kho</span></a></li>
                <li><a href="./menu_items/phieunhap.html"><span class="las la-users"></span><span>Phiếu nhập</span></a></li>
                <li><a href="./menu_items/phieuxuat.html"><span class="las la-users"></span><span>Phiếu xuất</span></a></li>
                <li><a href="./menu_items/khachhang.html"><span class="las la-users"></span><span>Khách hàng</span></a></li>
                <li><a href="./menu_items/nhacungcap.html"><span class="las la-users"></span><span>Nhà cung cấp</span></a></li>
                <li><a href="./menu_items/nhanvien.html"><span class="las la-users"></span><span>Nhân viên</span></a></li>
                <li><a href="./menu_items/thongke.html"><span class="las la-chart-pie"></span><span>Thống kê</span></a></li>
                <li><a href="./menu_items/phanquyen.html"><span class="las la-users"></span><span>Phân quyền</span></a></li>
                </ul>
            </div>
        </div>
        <div id="main-content">
            <header>
                <h2 >
                    <label id="menu-toggle">
                        <span class="las la-bars"></span>
                    </label>
                    Dashboard
                </h2>
                <div id="user-wrapper" >
                    <img src="../../imgs/img.jpg" width="30px" height="30px" alt="">
                    <div>
                        <h4>Brother Store</h4>
                        <small>SuperAdmin</small>
                    </div>
                </div>
            </header>
    
            <main>
                
            </main>
        </div>
        <div id="admin" class="modal">
            <div id="admin-infor">
                <div clas = "modal-scrollable">
                <span class="close-btn">&times;</span>
                <p><strong>Họ và tên:</strong> <span id="fullName">Phạm Hồng Chí</span></p>
                <p><strong>Số điện thoại:</strong> <span id="phoneNumber">0862920522</span></p>
                <p><strong>Email:</strong> <span id="Email">chiautowin2225@gmail.com</span></p>
                <p><strong>Tuổi:</strong> <span id="age">19</span></p>
                <p><strong>Quê quán:</strong> <span id="hometown">Quảng Ngãi</span></p>
                <p><strong>Ngày vào làm:</strong> <span id="joinDate">01/01/2020</span></p>
                <button id = 'log-out'>Đăng xuất</button>    
                </div>
            </div>
        </div>

        <div id="admin-modal" class="modal3">
            <div class="modal-contentAdmin">
                <span class="close-btn3">&times;</span>
                <h2 id="modal-title3">Thêm admin</h2>
                <form id="admin-form">
                    <label for="adminname">Họ và tên:</label>
                    <input type="text" id="adminname" placeholder="Nhập họ và tên">
            
                    <label for="adminphone">Số điện thoại:</label>
                    <input type="text" id="adminphone" placeholder="Nhập số điện thoại">
            
                    <label for="adminemail">Email:</label>

                    <input type="number" id="ageadmin" placeholder="Nhập tuổi">
            
                    <label for="adminpassword">Mật khẩu:</label>
                    <input type="password" id="adminpassword" placeholder="Nhập mật khẩu">
            
                    <label for="adminaddress">Quê quán:</label>
                    <input type="text" id="adminaddress" placeholder="Nhập địa chỉ">
            
                    <label for="date-of-entry">Ngày vào làm:</label>
                    <input type="date" id="date-of-entry">
            
                    <button type="submit" id="submit-btn-admin">Lưu</button>
                </form>
            </div>
        </div>
        
        <div id="user-modal" class="modal1">
            <div class="modal-content">
                <span class="close-btn2">&times;</span>
                <h2 id="modal-title">Thêm người dùng</h2>
                <form id="user-form">
                    <label for="username">Tên người dùng:</label>
                    <input type="text" id="username" placeholder="Nhập tên người dùng">
        
                    <label for="phone">Số điện thoại:</label>
                    <input type="text" id="phone" placeholder="Nhập số điện thoại">
        
                    <label for="email">Email:</label>
                    <input type="email" id="email" placeholder="Nhập email">
        
                    <label for="password">Mật khẩu:</label>
                    <input type="password" id="password" placeholder="Nhập mật khẩu">
        
                    <label for="address">Địa chỉ:</label>
                    <input type="text" id="address" placeholder="Nhập địa chỉ">
        
                    <button type="submit" id = "submit-btn">Lưu người dùng</button>
                </form>
            </div>
        </div>
        
        </div>
        <div id="login_admin">
            <div id="login_content">
                <h2 style="text-align: center; margin-bottom: 15px;">Đăng nhập admin</h2><hr>
                <input type="text" id="adminlogin_name" placeholder="Tên đăng nhập" style=" margin-bottom: 15px; padding: 5px; width: 80%;">
                <input type="password" id="passwordlogin" placeholder="Mật khẩu" style="margin-bottom: 15px; padding: 5px; width: 80%;">
                <br><hr>
                <input type="button" style="padding: 5px 10px; width: 100%;" id="dangnhapadmin" value="Đăng Nhập" >
            </div>
        </div>
        <div id="product-modal" class="modal">
            <div class="modal-contentSP">
                <span class="close-btn1">&times;</span>
                <h2 id="modal-title">Thêm sản phẩm mới</h2>
                <form id="product-form">
                    <label for="product-name">Tên sản phẩm:</label>
                    <input type="text" id="product-name" placeholder="Nhập tên sản phẩm">
    
                    <label for="product-name">Tên thương hiệu:</label>
                    <input type="text" id="product-brand" placeholder="Nhập tên thương hiệu">
    
                    <label for="product-price">Giá tiền:</label>
                    <input type="number" id="product-price" placeholder="Nhập giá sản phẩm">
    
                    <label for="product-image">URL hình ảnh:</label>
                    <input type="text" id="product-image" placeholder="Nhập URL hình ảnh">
    
                    <button type="submit" id="submit-product">Lưu sản phẩm</button>
                </form>
            </div>
        </div>
        
        <script src="js/loginout_v2.js"></script>
        <!--<script src="../js/admin.js"></script>
        <script src="../js/admin1.js"></script>-->
    </body>
</html>
