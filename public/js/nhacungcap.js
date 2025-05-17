a
function openModal(action) {
    const modal = document.getElementById('myModal');
    const title = document.getElementById('modalTitle');
    title.textContent = action + " Nhà cung cấp";
    if (action === "Thêm") {
        $(".Save-btn").off("click").on("click", function () {
             AddNhaCungCap();
        });

        modal.classList.add('active');
                
                      var  html = `
        <div class="adding-content">
        <form>
            <div class="inner-left">

                <div class="adding-content-item">
                    <label for="tenkhachhang">Tên Nhà cung cấp:</label>
                    <input type="text" id="name" placeholder="Nhập tên nhà cung cấp">
                    <br>
                </div>
                <div class="adding-content-item">
                    <label for="tenkhachhang">Địa chỉ:</label>
                    <input type="text" id="diachi" placeholder="Nhập địa chỉ">
                    <br>
                </div>
                <div class="adding-content-item">
                    <label for="name">Liên hệ:</label>
                    <input type="text" id="lienhe" placeholder="Nhập Liên hệ">
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
            url: "admin/getNCCap",
            method: "POST",
            data: { id: id}, // dùng id thực tế chứ không fix 36
            dataType: "json",
            success: function (ncc) {
                // Mở modal ở đây sau khi có dữ liệu
               console.log(ncc);
                modal.classList.add('active');
               $(".Save-btn").off("click").on("click", function () {
                    UpdateNhaCungCap(id);
                });

                 var  html = `
        <div class="adding-content">
        <form>
            <div class="inner-left">

                <div class="adding-content-item">
                    <label for="tenkhachhang">Tên Nhà cung cấp:</label>
                    <input type="text" id="name" placeholder="Nhập tên nhà cung cấp">
                    <br>
                </div>
                <div class="adding-content-item">
                    <label for="tenkhachhang">Địa chỉ:</label>
                    <input type="text" id="diachi" placeholder="Nhập địa chỉ">
                    <br>
                </div>
                <div class="adding-content-item">
                    <label for="name">Liên hệ:</label>
                    <input type="text" id="lienhe" placeholder="Nhập Liên hệ">
                    <br>
                </div>      
            </div>
        </form>
    </div>


        `;

                 $(".modal__product").html(html);

                 //Đổ dữ liệu vào form
                $("#name").val(ncc.Ten_NCC);
                $("#diachi").val(ncc.DiaChi);
                $("#lienhe").val(ncc.LienHe);
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
function AddNhaCungCap() {
        let name = $("#name").val().trim();
        let diachi = $("#diachi").val().trim();
        let lienhe = $("#lienhe").val().trim();   
    if ( !name  || !lienhe || !diachi ) {
        alert("Vui lòng điền đầy đủ thông tin!");
        return;
    }
     const regexPhone = /^0(3|5|7|8|9)\d{8}$/;
      if (!regexPhone.test(lienhe)) {
        alert("Số điện thoại liên hệ không hợp lệ");
        return;
    }
    $.ajax({
        url: "admin/themNhaCungCap",
        method: "POST",
        data: {
            name : name,
            diaChi : diachi,
            lienHe : lienhe,
        
        },
        success: function (data) {
            loadDanhSachNCC();
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
function UpdateNhaCungCap(id) {
        let name = $("#name").val().trim();
        let diachi = $("#diachi").val().trim();
        let lienhe = $("#lienhe").val().trim();    
    if (!name   || !lienhe || !diachi) {
        alert("Vui lòng điền đầy đủ thông tin!");
        return;
    }

     const regexPhone = /^0(3|5|7|8|9)\d{8}$/;
      if (!regexPhone.test(lienhe)) {
        alert("Số điện thoại liên hệ không hợp lệ");
        return;
    }
    $.ajax({
        url: "admin/suaNhaCungCap",
        method: "POST",
        data: {
            name : name,
            diaChi : diachi,
            lienHe : lienhe,
            id : id
        
            

        },
        success: function (data) {
            console.log(data);
             loadDanhSachNCC();
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
 function khoaNhaCungCap(){
    if (!$("tr").hasClass("selected")) {
        alert("Vui lòng chọn dòng cần khóa");
    }
    else{
        let id = $("tr.selected").attr("id");
        $.ajax({
            url : "admin/setStatusNCC",
            method : "POST",
            data : {
                id : id,
                status : 0
            },
            success: function(data){
                console.log(data);
                 loadDanhSachNCC();
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
function moNhaCungCap(){
    if (!$("tr").hasClass("selected")) {
        alert("Vui lòng chọn dòng cần khóa");
    }
    else{
        let id = $("tr.selected").attr("id");
        $.ajax({
            url : "admin/setStatusNCC",
            method : "POST",
            data : {
                id : id,
                status : 1
            },
            success: function(data){
                console.log(data);
                loadDanhSachNCC();
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
function xoaNhaCungCap(){
    if (!$("tr").hasClass("selected")) {
        alert("Vui lòng chọn dòng cần khóa");
    }
    else{
        let id = $("tr.selected").attr("id");
        $.ajax({
            url : "admin/xoaNhaCungCap",
            method : "POST",
            data : {
                id : id,

            },
            //console.log("xóa thằng  "+id),
            success: function(data){
                console.log(data);
                 loadDanhSachNCC();
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
function loadDanhSachNCC(){
    $.ajax({
        url : "admin/layDanhSachNCC",
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
