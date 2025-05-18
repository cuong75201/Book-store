
function openModal(action) {
    const modal = document.getElementById('myModal');
    const title = document.getElementById('modalTitle');
    title.textContent = action + " khách hàng";
    if (action === "Thêm") {
        $(".Save-btn").off("click").on("click", function () {
             AddKhachHang();
        });

        modal.classList.add('active');
                
                      var  html = `
        <div class="adding-content">
        <form>
            <div class="inner-left">

                <div class="adding-content-item">
                    <label for="tenkhachhang">Last name:</label>
                    <input type="text" id="lastName" placeholder="Nhập last name">
                    <br>
                </div>
                <div class="adding-content-item">
                    <label for="tenkhachhang">First name:</label>
                    <input type="text" id="firstName" placeholder="Nhập first name">
                    <br>
                </div>
                <div class="adding-content-item">
                    <label for="name">Email:</label>
                    <input type="text" id="email" placeholder="Nhập email">
                    <br>
                </div>     
            </div>
        </form>
    </div>


        `;
    $(".modal__product").html(html);        
            
    }
    else if (action === "Sửa") {
    if (!$("tr").hasClass("selected")) {
        alert("Vui lòng chọn dòng cần sửa");
    } else {
        let id = $("tr.selected").attr("id");

        $.ajax({
            url: "admin/getUser",
            method: "POST",
            data: { idkhachhang: id}, // dùng id thực tế chứ không fix 36
            dataType: "json",
            success: function (khachhang) {
                // Mở modal ở đây sau khi có dữ liệu
               console.log(khachhang);
                modal.classList.add('active');
               $(".Save-btn").off("click").on("click", function () {
                    UpdateKhachHang(id);
                });

                var html = `
                <div class="adding-content">
                    <form>
                        <div class="inner-left">
                            <div class="adding-content-item">
                                <label for="tenkhachhang">Tên khách hàng:</label>
                                <input type="text" id="tenkhachhang" placeholder="Nhập tên khách hàng">
                                <br>
                            </div>
                            <div class="adding-content-item">
                                <label for="email">Email:</label>
                                <input type="text" id="email" placeholder="Nhập email">
                                <br>
                            </div>     
                        </div>
                    </form>
                </div>`;

                 $(".modal__product").html(html);

                 //Đổ dữ liệu vào form
                $("#tenkhachhang").val(khachhang[0].Ten_Khach_Hang);
                $("#email").val(khachhang[0].Email);
                // $("#sodienthoai").val(khachhang[0].So_Dien_Thoai);
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", error);
                console.log("XHR:", xhr.responseText); // Xem chi tiết lỗi
                console.log("Status:", status);
            }
        });
    }
}
}


function closeModal() {
    const modal = document.getElementById('myModal');
    modal.classList.remove('active');
}
async function AddKhachHang() {
        let lastName = $("#lastName").val().trim();
        let firstName = $("#firstName").val().trim();
        let email = $("#email").val().trim();
        let matkhau = "12345678";
        // let sodienthoai = $("#sodienthoai").val().trim();
        // let diachi = $("#diachi").val().trim();
        const ngayHienTai = new Date();    
        let ngaydangky = ngayHienTai.toISOString().split('T')[0];
    if (!lastName||!firstName || !email   || !ngaydangky) {
        alert("Vui lòng điền đầy đủ thông tin!");
        return;
    }
    const regexEmail = /^[^\s@]+@(gmail\.com|sgu\.edu\.vn)$/;
    if (!regexEmail.test(email)) {
        alert("Email không hợp lệ không hợp lệ");
        return;
    }
    //  const regexPhone = /^0(3|5|7|8|9)\d{8}$/;
    //   if (!regexPhone.test(sodienthoai)) {
    //     alert("Số điện thoại không hợp lệ");
    //     return;
    // }

    const checkEmail = await $.ajax({
        url : "admin/checkEmail",
        method : "POST",
        data : {
            email : email,
            id : ''
        },
    })
    if(checkEmail == 1){
        alert("Email đã tồn tại");
        return;
    }
    // const checkPhone = await $.ajax({
    //     url : "admin/checkPhone",
    //     method : "POST",
    //     data : {
    //         phone : phone,
    //         id : ''
    //     },
    // })
      if(checkPhone == 1){
        alert("Số điện thoại đã tồn tại");
        return;
    }
    $.ajax({
        url: "admin/themKhachHang",
        method: "POST",
        data: {
            lastName : lastName,
            firstName : firstName,
            email : email,
            matKhau : matkhau,
            // phone : sodienthoai,
            // diaChi : diachi,
            ngayDangKy : ngaydangky
            

        },
        success: function (data) {
            loadDanhSachKhachHang();
           // location.reload();
            console.log(data);
            closeModal();
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", error);
            console.log("XHR:", xhr);
            console.log("Status:", status);
        }
    })
};
async function UpdateKhachHang(id) {
        let name = $("#tenkhachhang").val().trim();
        let email = $("#email").val().trim(); 
    if (!name   || !email ) {
        alert("Vui lòng điền đầy đủ thông tin!");
        return;
    }
    const regexEmail = /^[^\s@]+@(gmail\.com|sgu\.edu\.vn)$/;
    if (!regexEmail.test(email)) {
        alert("Email không hợp lệ");
        return;
    }
   // const regexEmail = /^[^\s@]+@(gmail\.com|sgu\.edu\.vn)$/;
    //  const regexPhone = /^0(3|5|7|8|9)\d{8}$/;
    //   if (!regexPhone.test(sodienthoai)) {
    //     alert("Số điện thoại không hợp lệ");
    //     return;
    // }
     const checkEmail = await $.ajax({
        url : "admin/checkEmail",
        method : "POST",
        data : {
            email : email,
            id : id
        },
    })
    if(checkEmail == 1){
        alert("Email đã tồn tại");
        return;
    }
    $.ajax({
        url: "admin/suaKhachHang",
        method: "POST",
        data: {
            name : name,
            email : email,
            id : id
        
            

        },
        success: function (data) {
            console.log(data);
             loadDanhSachKhachHang();
           // location.reload();
           closeModal();
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", error);
            console.log("XHR:", xhr);
            console.log("Status:", status);
        }
    })
}
 function khoaKhachHang(){
    if (!$("tr").hasClass("selected")) {
        alert("Vui lòng chọn dòng cần khóa");
    }
    else{
        let id = $("tr.selected").attr("id");
        $.ajax({
            url : "admin/setStatusKhachHang",
            method : "POST",
            data : {
                id : id,
                status : 0
            },
            success: function(data){
                console.log(data);
                 loadDanhSachKhachHang();
                //location.reload();
            },
             error: function (xhr, status, error) {
            console.error("AJAX Error:", error);
            console.log("XHR:", xhr);
            console.log("Status:", status);
        }

        })
    }
}
function moKhachHang(){
    if (!$("tr").hasClass("selected")) {
        alert("Vui lòng chọn dòng cần mở");
    }
    else{
        let id = $("tr.selected").attr("id");
        $.ajax({
            url : "admin/setStatusKhachHang",
            method : "POST",
            data : {
                id : id,
                status : 1
            },
            success: function(data){
                console.log(data);
                loadDanhSachKhachHang();
                //location.reload();
            },
             error: function (xhr, status, error) {
            console.error("AJAX Error:", error);
            console.log("XHR:", xhr);
            console.log("Status:", status);
        }

        })
    }
}
function xoaKhachHang(){
    if (!$("tr").hasClass("selected")) {
        alert("Vui lòng chọn dòng cần xóa");
    }
    else{
        let id = $("tr.selected").attr("id");
        $.ajax({
            url : "admin/xoaKhachHang",
            method : "POST",
            data : {
                id : id,

            },
            //console.log("xóa thằng  "+id),
            success: function(data){
                console.log(data);
                 loadDanhSachKhachHang();
                //location.reload();
            },
             error: function (xhr, status, error) {
            console.error("AJAX Error:", error);
            console.log("XHR:", xhr);
            console.log("Status:", status);
        }

        })
    }
}
function loadDanhSachKhachHang(){
    $.ajax({
        url : "admin/layDanhSachKhachHang",
        method : "GET",
        success : function(data){
            console.log(data);
            $("#product-details").html(data);
             $("#product-details tr").off("click").on("click", function() {
                // Xử lý khi click vào dòng
                $(this).toggleClass("selected");
            });
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", error);
            console.log("XHR:", xhr);
            console.log("Status:", status);
        }
    })
}

