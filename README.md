# Book-store
## ĐỒ ÁN MÔN HỌC: XÂY DỰNG WEBSITE QUẢN LÝ SÁCH
## Mô tả đề tài
- Mục tiêu đề tài: Một ứng dụng website giúp người sử dụng có thể sách trực tuyến.
- Môi trường sử dụng: Web browser
- 2 actors chính:Người dùng, Admin
- Dữ cần quản lý: Thông tin người dùng, thông tin của admin, thông tin của sản phẩm
- Chức năng của Người dùng:
    - Lưu sách vào danh sách yêu thích
    - Quản lý hồ sơ cá nhân
    - Đánh giá & phản hồi sản phẩm
    - Xem chi tiết sản phẩm
    - Mua sản phẩm trực tuyến
- Chức năng của Admin
    - Quản lý sản phẩm
    - Quản lý danh sách người dùng
    - Xem thống kê đơn hàng
- Các tính năng chung cho phân hệ Người dùng Admin
    - Đăng nhập/đăng xuất
    - Cập nhật thông tin cá nhân
    - Đổi mật khẩu
## Thông tin cho người đóng góp
- Sử dụng đơn vị rem cho font-size, hạn chế dùng pixel( 1rem=16px)
- File Admin: Chứa các chức năng và giao diện trang admin
- File database: Chứa database đồ án
- File media: Chứa hình ảnh sản phẩm
- File public: Chứa các file liên quan đến js và css, các thư viên frontend( bootstrap,...)
- .htaccess: Tạo link thân thiện
- config.php: Chứa các hằng số dùng chung
- index.php: Cửa vào, gọi route(app.php)
- File mvc: Chứa dữ liệu theo mô hình MVC
    + core:
        -app.php: Điều hướng url đến controller tương ứng
        -controller.php: Lớp cha  để các lớp trong folder controllers kế thừa
        -dbconnect: Kết nối database
    models: Chứa các model để giao tiếp với database
    views: Giao diện người dùng
        index.php: Giao diện bắt dầu
        main_layout.php: Include để hiển thị các giao diện sau này
    Controller: Gọi giữa views và models
## Mô tả cách hoạt động
- Nhận url từ trang web đi vào app.php, trong app.php nếu url không tồn tại thì sẽ gọi trang myerrol.php, trong app.php sẽ có 3 thuộc tính (controller: Tên class trong controller, action: Tên phương thức trong class, params: Tham số truyền vào). Mặc định mới vào app.php sẽ gọi controller home.php, home.php sẽ gọi đến index.php ở view để hiển thị.
- Nếu người dùng click vào url ở thẻ a thì app.php sẽ nhận và điều hướng đến controller tương ứng.
## Công nghệ được sử dụng trong đồ án
- BOOSTRAP  4.5
- PHP
- JS,CSS
