document.addEventListener("DOMContentLoaded", function () {

    let users = JSON.parse(localStorage.getItem('users')) || [];    
    let admins = JSON.parse(localStorage.getItem('admins')) || [];
    let editingUserId = null;
    


    // Tạo menu động
    function taoMenu() {
        const menu = ['Khách hàng', 'Sản phẩm'];
        const menuHref = ['khachhang', 'sanpham'];
        const icons = ['las la-users', 'las la-shoe-prints'];
        const listMenu = document.getElementById('menuADM');
        // const loginAdmin = document.getElementById('login_admin');
        let s = '';
        for (let i = 0; i < menu.length; i++) {
            s += `<li><a href="admin.html?${menuHref[i]}"><span class="${icons[i]}"></span><span>${menu[i]}</span></a></li>`;
        }
        s += `
                <li><a href="./private/donhang.html"><span class="las la-shopping-bag"></span><span>Đơn hàng</span></a></li>
                <li><a href="./private/thongke.html"><span class="las la-chart-pie"></span><span>Thống kê</span></a></li>
        `;
        listMenu.innerHTML = s;
    }
    // Hiển thị trang sản phẩm
    function taiTrang() {
        const url = document.location.href;
        const params = url.split('?')[1];
        
        if (params) {
            const args = params.split('&');
            if(args[0] === 'khachhang'){
                trangKhachHang();
            }
        } else {
            // Hiển thị login admin
            document.getElementById('login_admin').style.display = 'flex';
            document.getElementById('dangnhapadmin').addEventListener('click', dangNhap);    
        }
    }
    function dangNhap() {
        var adminlogin_name = document.getElementById('adminlogin_name').value;
        var passwordlogin = document.getElementById('passwordlogin').value;
        
         let admin = JSON.parse(localStorage.getItem('admins')) || [  
            {adminaddress: 'Quảng Ngãi', adminemail: 'chiautowin2225@gmail.com', adminname: 'Phạm Hồng Chí', adminpassword: 'hongchi257', age: '19', dateofentry: '2024-12-05', adminphone: '0862920522'}
         ]
         localStorage.setItem('admins',JSON.stringify(admin));

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
            window.location.href = 'admin.html?sanpham&0';
        }
        else if (adminlogin_name === '' || passwordlogin === '') {
            alert('Vui lòng nhập đầy đủ thông tin');
        } else {
            alert('Thông tin đăng nhập không đúng');
        }
    }
    
    
    const logOut = document.getElementById('log-out');
    logOut.addEventListener('click' ,function(){
        window.location.href = 'admin.html';
    });
    const closeAdmin =document.querySelector('.close-btn');
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
    
    closeAdmin.addEventListener("click", function () {
        const adminmodal = document.getElementById('admin');
       adminmodal.style.display = 'none';
    });

// Sản Phẩm-----------------------------------------------------------------------------------------------------------------

    // Khach hang-------------------------------------------------------------------------------------------------
   
    function trangKhachHang(){
        const mainElement = document.querySelector('main');
        mainElement.innerHTML = `
                <div>
                    <h3>Quản lý người dùng</h3>
                    <button class="add-user-btn" id="add-user-btn">
                        <i class="las la-plus-circle"></i> Thêm người dùng
                    </button>
                    <button class="add-admin-btn" id="add-admin-btn">
                        <i class="las la-plus-circle"></i> Thêm admin
                    </button>
                </div>
    
                <div id="user-list">
                    <table>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên người dùng</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Mật khẩu</th>
                                <th>Địa chỉ</th>
                                <th>Vai trò</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </section>
        `;
        khachHang();
    }
    
    function khachHang() {
        const userList = document.querySelector('#user-list tbody');
        if (!userList) {
            console.error('Không tìm thấy phần tử <tbody>');
            return;
        }
        userList.innerHTML = ''; 
    
        for (let i = 0; i < users.length; i++) {
            const user = users[i];
            let statusClass = user.status === 'active' ? 'active' : 'blocked';
            let statusText = user.status === 'active' ? 'Hoạt động' : 'Đã Khóa';
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${i + 1}</td>
                <td>${user.username}</td>
                <td>${user.phone}</td>
                <td>${user.email}</td>
                <td>${user.password}</td>
                <td>${user.address}</td>
                <td>${user.role}</td>
                <td><span class="status_KH ${statusClass}">${statusText}</span></td>
                <td>
                    <button class="edit-btn2" data-id="${i}">Sửa</button>
                    <button class="delete-btn" data-id="${i}">Xóa</button>
                    <button class="block-btn" data-id="${i}">Khóa</button>
                </td>
            `;
    
            // Kiểm tra sự tồn tại của button trước khi gắn sự kiện
            const editButton = row.querySelector('.edit-btn2');
            const deleteButton = row.querySelector('.delete-btn');
            const blockButton = row.querySelector('.block-btn');
    
            if (editButton) {
                editButton.addEventListener('click', () => suaNguoiDung(i));
            }
            if (deleteButton) {
                deleteButton.addEventListener('click', () => xoaNguoiDung(i));
            }
            if (blockButton) {
                blockButton.addEventListener('click', () => trangThai(i));
            }
    
            userList.appendChild(row);
        }
    }
    
    taoMenu();
    taiTrang();

    const addUserBtn = document.getElementById('add-user-btn');
    const userModal = document.getElementById('user-modal');
    const closeUserModalBtn = document.querySelector('.close-btn2');
    const userForm = document.getElementById('user-form');
    //////////////////////
    const addAdminBtn = document.getElementById('add-admin-btn');
    const adminModal = document.getElementById('admin-modal');
    const closeModalAdmin = document.querySelector('.close-btn3');
    const adminForm = document.getElementById('admin-form');
    
    addAdminBtn.addEventListener('click', () =>{
        document.getElementById('adminname').value ="";
        document.getElementById("adminphone").value = "";
        document.getElementById("adminemail").value = "";
        document.getElementById("ageadmin").value = "";
        document.getElementById("adminpassword").value = "";
        document.getElementById("adminaddress").value = "";
        adminModal.style.display = 'flex';
    });
    closeModalAdmin.addEventListener('click', () =>{
        adminModal.style.display ='none';
    });
    adminForm.addEventListener('submit', function(event){
        event.preventDefault(event);
        const adminname =document.getElementById('adminname').value;
        const adminphone =  document.getElementById("adminphone").value;
        const adminemail = document.getElementById("adminemail").value ;
        const age = document.getElementById("ageadmin").value;
        const adminpassword =document.getElementById("adminpassword").value;
        const adminaddress =document.getElementById("adminaddress").value;
        const dateofentry = document.getElementById("date-of-entry").value;
        console.log(adminname, adminphone, adminemail, adminpassword, adminaddress, dateofentry, age);
        if (adminname === '' || adminphone === '' || adminemail === '' || adminpassword === '' || adminaddress === ''||  dateofentry==='' || age==='') {
            alert("Vui lòng nhập đầy đủ thông tin!");
            return;
        }
        const phoneRegex = /^0\d{9}$/;  // Đảm bảo số điện thoại có 10 chữ số và bắt đầu bằng 0
        if (!phoneRegex.test(adminphone)) {
            alert("Số điện thoại phải có 10 chữ số và bắt đầu bằng 0!");
            return;
        }
        admins.push({ adminname, adminphone, adminemail,age, adminpassword, adminaddress, dateofentry});
        localStorage.setItem('admins', JSON.stringify(admins));
        alert("Thêm thành công");
        khachHang();  
        adminModal.style.display = 'none';  

    });
    
    function updateAdminInfo(data) {
        document.getElementById("fullName").innerText = data.adminname;
        document.getElementById("phoneNumber").innerText = data.adminphone;
        document.getElementById("Email").innerText = data.adminemail;
        document.getElementById("age").innerText = data.age;
        document.getElementById("hometown").innerText = data.adminaddress;
        document.getElementById("joinDate").innerText = data.dateofentry;
    }
    addUserBtn.addEventListener('click', () =>{
        editingUserId = null; 
        document.getElementById("username").value = "";
        document.getElementById("phone").value = "";
        document.getElementById("email").value = "";
        document.getElementById("password").value = "";
        document.getElementById("address").value = "";
        userModal.style.display = 'flex';
        document.getElementById('modal-title').textContent = "Thêm người dùng";
    });
    closeUserModalBtn.addEventListener('click', () =>{
        userModal.style.display ='none';
    });
    userForm.addEventListener('submit', function(event) {
        event.preventDefault();
    
        const username = document.getElementById('username').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value.trim();
        const address = document.getElementById('address').value.trim();
        const role = 'Người dùng';
        const spent = 0 ;
    
        // Kiểm tra nếu có trường nào rỗng sau khi loại bỏ khoảng trắng
        if (username === '' || phone === '' || email === '' || password === '' || address === '') {
            alert("Vui lòng nhập đầy đủ thông tin!");
            return;
        }
    
        // Kiểm tra số điện thoại
        const phoneRegex = /^0\d{9}$/;  // Đảm bảo số điện thoại có 10 chữ số và bắt đầu bằng 0
        if (!phoneRegex.test(phone)) {
            alert("Số điện thoại phải có 10 chữ số và bắt đầu bằng 0!");
            return;
        }
    
        if (editingUserId !== null) {
            users[editingUserId] = { username, phone, email, password, address, role, status: 'active', spent };
            editingUserId = null;  
        } else {
            users.push({ username, phone, email, password, address, role, status: 'active', spent });
        }
        alert("Thao tác thành công");
        localStorage.setItem('users', JSON.stringify(users));
        khachHang();  
        userModal.style.display = 'none';  
    });
    
    function suaNguoiDung(index) {
        const user = users[index];
        editingUserId = index;  

        document.getElementById('username').value = user.username;
        document.getElementById('phone').value = user.phone;
        document.getElementById('email').value = user.email;
        document.getElementById('password').value = user.password;
        document.getElementById('address').value = user.address;
        userModal.style.display = 'flex';
        document.getElementById('modal-title').textContent = "Sửa người dùng";
    }
    function xoaNguoiDung(index) {
        const isConfirmed = confirm("Bạn có chắc chắn muốn xóa người dùng này?");
        if (isConfirmed) {
            users.splice(index, 1);  
            localStorage.setItem('users', JSON.stringify(users)); 
            khachHang();
        } 
    }
    function trangThai(index) {
        // Lấy user từ danh sách users dựa trên index
        const user = users[index];
    
        // Đổi trạng thái của user trong mảng users
        if (user.status === 'active') {
            user.status = 'blocked';
        } else {
            user.status = 'active';
        }
    
        // Lưu lại mảng users vào localStorage
        localStorage.setItem('users', JSON.stringify(users));
    
        // Cập nhật local user nếu trùng khớp
        const localUser = JSON.parse(localStorage.getItem('user')); // Lấy local user
        if (localUser && localUser.id === user.id) {
            localUser.status = user.status; // Đồng bộ trạng thái
            localStorage.setItem('user', JSON.stringify(localUser)); // Lưu lại local user
        }
    
        // Cập nhật giao diện hoặc xử lý khác
        khachHang();
    }
    


});