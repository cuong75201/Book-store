
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="https://kit.fontawesome.com/386fc72d72.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="sidebar">
        <div id="sidebar-brand">
            <span class="la la-running" style="font-size: 2rem;"></span>
            <span>ShopGiay</span>
        </div>
        <div id="sidebar-menu">
            <ul>
            <li><a href="sanpham.php"><span class="las la-shoe-prints"></span><span>Sản phẩm</span></a></li>
                <li><a href="donhang.php"><span class="las la-shopping-bag"></span><span>Đơn hàng</span></a></li>
                <li><a href="thuoctinh.php"><span class="las la-users"></span><span>Thuộc tính</span></a></li>
                <li><a href="phieunhap.php"><span class="las la-users"></span><span>Phiếu nhập</span></a></li>
                <li><a href="phieuxuat.php"><span class="las la-users"></span><span>Phiếu xuất</span></a></li>
                <li><a href="khachhang.php"><span class="las la-users"></span><span>Khách hàng</span></a></li>
                <li><a href="nhacungcap.php"><span class="las la-users"></span><span>Nhà cung cấp</span></a></li>
                <li><a href="nhanvien.php"><span class="las la-users"></span><span>Nhân viên</span></a></li>
                <li><a href="thongke.php"><span class="las la-chart-pie"></span><span>Thống kê</span></a></li>
                <li><a href="phanquyen.php"><span class="las la-users"></span><span>Phân quyền</span></a></li>
            </ul>
        </div>
    </div>

    <div id="main-content">
        <header>
            <h2>
                <label id="menu-toggle">
                    <span class="las la-bars"></span>
                </label>
                Dashboard
            </h2>
            <div id="user-wrapper">
                <img src="img.jpg" width="30px" height="30px" alt="">
                <div>
                    <h4>Brother Store</h4>
                    <small>SuperAdmin</small>
                </div>
            </div>
        </header>
        <div id="admin" class="modal">
            <div id="admin-infor">
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


        <main>
        </main>
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
                    <input type="email" id="adminemail" placeholder="Nhập email">
    
                    <label for="ageadmin">Tuổi:</label>
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
         
        <div id="bill-detail" class="info-modal">
            <div class="info-modal-content">
                <span class="close-btn" id="cls-btn">&times;</span>
                <h2 class="modal-title">Chi tiết</h2>
                <table class="bang" border = "1 " style="text-align: center;">
                </table>
            </div>
        </div>

</body>

<script>
    // Lấy tất cả các thẻ <a> trong sidebar-menu
    const menuItems = document.querySelectorAll('#sidebar-menu ul li a');

    // Thêm sự kiện nhấp chuột cho từng mục
    menuItems.forEach(item => {
        item.addEventListener('click', function() {
            // Xóa class 'active' khỏi tất cả các mục
            menuItems.forEach(i => i.classList.remove('active'));
            
            // Thêm class 'active' vào mục được nhấp
            this.classList.add('active');
        });
    });
</script>

<script src="../js/loginout_v2.js"></script>
<script src="../js/infoadmin.js"></script>
<script src="../js/sidebar_filter.js"></script>
</html>