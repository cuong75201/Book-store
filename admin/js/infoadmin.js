document.addEventListener("DOMContentLoaded", function () {
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
    /*const logOut = document.getElementById('log-out');
    logOut.addEventListener('click', function () {
        window.location.href = '/Book-store/admin/php/admin.php'; // Chuyển hướng đến trang admin.php
    });*/

    taiTrang();
});