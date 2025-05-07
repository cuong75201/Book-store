document.addEventListener("DOMContentLoaded", function () {
    let admins = JSON.parse(localStorage.getItem('admins')) || [];

    // Hiển thị trang đăng nhập
    function taiTrang() {
        const url = document.location.href;
        const params = url.split('?')[1];

        if (!params) {
            // Hiển thị form đăng nhập admin
            document.getElementById('login_admin').style.display = 'flex';
            document.getElementById('dangnhapadmin').addEventListener('click', dangNhap);
        }
    }

    // Hàm xử lý đăng nhập
    function dangNhap() {
        var adminlogin_name = document.getElementById('adminlogin_name').value;
        var passwordlogin = document.getElementById('passwordlogin').value;

        // Khởi tạo admin mặc định nếu chưa có
        let admin = JSON.parse(localStorage.getItem('admins')) || [
            {
                adminaddress: 'Quảng Ngãi',
                adminemail: 'chiautowin2225@gmail.com',
                adminname: 'Phạm Hồng Chí',
                adminpassword: 'hongchi257',
                age: '19',
                dateofentry: '2024-12-05',
                adminphone: '0862920522'
            }
        ];
        localStorage.setItem('admins', JSON.stringify(admin));

        // Lấy danh sách admin từ Local Storage
        const admins = JSON.parse(localStorage.getItem("admins"));

        if (!admins || admins.length === 0) {
            alert('Không có dữ liệu admin để kiểm tra');
            return;
        }

        // Tìm admin phù hợp với thông tin đăng nhập
        const foundAdmin = admins.find(admin =>
            admin.adminphone === adminlogin_name && admin.adminpassword === passwordlogin
        );

        if (foundAdmin) {
            alert('Đăng nhập thành công');
            localStorage.setItem("currentAdmin", JSON.stringify(foundAdmin)); // Lưu admin hiện tại vào Local Storage
            window.location.href = '/Book-store/admin/php/donhang.php'; // Chuyển hướng đến trang admin.php
        } else if (adminlogin_name === '' || passwordlogin === '') {
            alert('Vui lòng nhập đầy đủ thông tin');
        } else {
            alert('Thông tin đăng nhập không đúng');
        }
    }

    // Xem thông tin admin
    document.getElementById('user-wrapper').addEventListener('click', admin_infor);
    function admin_infor() {
        const adminmodal = document.getElementById('admin');

        // Lấy thông tin admin đang đăng nhập từ Local Storage
        const foundAdmin = JSON.parse(localStorage.getItem("currentAdmin"));

        if (foundAdmin) {
            updateAdminInfo(foundAdmin); // Cập nhật thông tin admin vào giao diện
            adminmodal.style.display = 'flex';
        } else {
            alert("Không tìm thấy thông tin admin đang đăng nhập!");
        }
    }

    // Cập nhật thông tin admin vào giao diện
    function updateAdminInfo(data) {
        document.getElementById("fullName").innerText = data.adminname;
        document.getElementById("phoneNumber").innerText = data.adminphone;
        document.getElementById("Email").innerText = data.adminemail;
        document.getElementById("age").innerText = data.age;
        document.getElementById("hometown").innerText = data.adminaddress;
        document.getElementById("joinDate").innerText = data.dateofentry;
    }

    // Đóng modal thông tin admin
    const closeAdmin = document.querySelector('.close-btn');
    closeAdmin.addEventListener("click", function () {
        const adminmodal = document.getElementById('admin');
        adminmodal.style.display = 'none';
    });

    // Đăng xuất
    const logOut = document.getElementById('log-out');
    logOut.addEventListener('click', function () {
        localStorage.removeItem("currentAdmin"); // Xóa thông tin admin hiện tại khỏi Local Storage
        alert('Đăng xuất thành công');
        window.location.href = '/Book-store/admin/php/admin.php'; // Chuyển hướng đến trang admin.php
    });

    // Gọi hàm hiển thị trang đăng nhập
    taiTrang();
});