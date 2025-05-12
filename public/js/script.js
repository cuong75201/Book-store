let i = 0;
// Chuyển cảnh trong list sách dọc
document.querySelectorAll('.owl-prev').forEach((element) => {
    element.onclick = () => {
        let getID = element.dataset.id;
        let list = document.getElementById(getID);
        let item = list.querySelectorAll('.owl-item');
        let a = 243 + (1215 - item.length * 243) / (item.length - 1);
        if (i > 0) {
            list.style.transform = `translate3d(${-i * a + a}px,0,0)`;
            i = i - 1;

        }
    }

});
document.querySelectorAll('.owl-next').forEach((element) => {
    element.onclick = () => {
        let getID = element.dataset.id;
        let list = document.getElementById(getID);
        let item = list.querySelectorAll('.owl-item');
        let a = 243 + (1215 - item.length * 243) / (item.length - 1);
        if (i < item.length - 1) {
            i = i + 1;
            list.style.transform = `translate3d(${-i * a}px,0,0)`;
        }
    }

});
function truncateText(text, maxLength) {
    if (text.length > maxLength) {
        return text.slice(0, maxLength) + "...";
    }
    return text;
}
document.querySelectorAll('.detail_product_combo a').forEach((element)=>{
    element.innerHTML=truncateText(element.innerHTML.trim(),50);
})


$(document).ready(function() {
    // Khai báo biến
    let isEditing = false;
    let deleteAddressId = 0;
    const baseUrl = window.location.origin + '/Book_store/';
    
    // Mở modal thêm địa chỉ
    $('#btn-add-address').click(function() {
        resetAddressForm();
        $('#addressModalLabel').text('Thêm địa chỉ mới');
        $('#addressModal').modal('show');
        isEditing = false;
    });
    
    // Mở modal sửa địa chỉ
    $(document).on('click', '.btn-edit', function() {
        const addressId = $(this).data('id');
        if (!addressId) {
            showNotification('error', 'Đã có lỗi xảy ra. Vui lòng thử lại sau.');
        } 
        $('#addressModalLabel').text('Cập nhật địa chỉ');
        isEditing = true;
        
        // Lấy thông tin địa chỉ từ server
        $.ajax({
            url: baseUrl + 'account/getAddress',
            type: 'GET',
            data: {
                ID: addressId
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    const address = response.address;
                    
                    // Điền thông tin vào form
                    $('#address_id').val(address.ID);
                    $('#name').val(address.Ten_Nguoi_Nhan);
                    $('#address').val(address.Dia_Chi);
                    $('#phone').val(address.So_Dien_Thoai);
                    $('#is_default').prop('checked', address.Mac_Dinh == 1);
                    
                    // Hiển thị modal
                    $('#addressModal').modal('show');
                } else {
                    showNotification('error', response.message);
                }
            },
            error: function() {
                showNotification('error', 'Đã có lỗi xảy ra. Vui lòng thử lại sau.');
            }
        });
    });
    
    // Lưu địa chỉ (thêm mới hoặc cập nhật)
    $('#saveAddress').click(function() {
        // Kiểm tra form
        if (!validateAddressForm()) {
            return;
        }
        
        // Chuẩn bị dữ liệu
        const formData = {
            ID: $('#address_id').val(),
            name: $('#name').val(),
            address: $('#address').val(),
            phone: $('#phone').val(),
            is_default: $('#is_default').is(':checked') ? '1' : '0'
        };
        
        console.log('Form Data:', formData);

        // Gửi request
        const endpoint = isEditing ? 'updateAddress' : 'addAddress';
        
        $.ajax({
            url: baseUrl + 'account/' + endpoint,
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                console.log('Response:', response); // Debug phản hồi
                if (response.status === 'success') {
                    // Đóng modal và reload trang
                    $('#addressModal').modal('hide');
                    showNotification('success', isEditing ? 'Cập nhật địa chỉ thành công' : 'Thêm địa chỉ mới thành công');
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                } else {
                    showNotification('error', response.message);
                }
            },
            error: function() {
                showNotification('error', 'Đã có lỗi xảy ra. Vui lòng thử lại sau.');
            }
        });
    });
    
    // Mở modal xác nhận xóa
    $(document).on('click', '.btn-delete', function() {
        deleteAddressId = $(this).data('id');
        $('#deleteModal').modal('show');
    });
    
    // Xác nhận xóa địa chỉ
    $('#confirmDelete').click(function() {
        if (!deleteAddressId) {
            return;
        }
        
        $.ajax({
            url: baseUrl + 'account/deleteAddress',
            type: 'POST',
            data: {
                ID: deleteAddressId
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Đóng modal và reload trang
                    $('#deleteModal').modal('hide');
                    showNotification('success', 'Xóa địa chỉ thành công');
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                } else {
                    showNotification('error', response.message);
                }
            },
            error: function() {
                showNotification('error', 'Đã có lỗi xảy ra. Vui lòng thử lại sau.');
            }
        });
    });
    
    // Thiết lập địa chỉ mặc định
    $(document).on('click', '.btn-set-default', function() {
        const addressId = $(this).data('id');
        
        $.ajax({
            url: baseUrl + 'account/setDefaultAddress',
            type: 'POST',
            data: {
                ID: addressId
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    showNotification('success', 'Đã thiết lập địa chỉ mặc định');
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                } else {
                    showNotification('error', response.message);
                }
            },
            error: function() {
                showNotification('error', 'Đã có lỗi xảy ra. Vui lòng thử lại sau.');
            }
        });
    });
    
    // Hàm reset form
    function resetAddressForm() {
        $('#address_id').val(0);
        $('#name').val('');
        $('#address').val('');
        $('#phone').val('');
        $('#is_default').prop('checked', false);
        
        // Xóa thông báo lỗi
        $('.form-group').removeClass('has-error');
        $('.error-message').remove();
    }
    
    // Hàm kiểm tra form
    function validateAddressForm() {
        let isValid = true;
        
        // Xóa thông báo lỗi cũ
        $('.form-group').removeClass('has-error');
        $('.error-message').remove();
        
        // Kiểm tra họ tên
        const name = $('#name').val().trim();
        if (!name) {
            isValid = false;
            $('#name').closest('.form-group').addClass('has-error')
                .append('<div class="error-message text-danger">Vui lòng nhập họ tên</div>');
        }
        
        // Kiểm tra địa chỉ
        const address = $('#address').val().trim();
        if (!address) {
            isValid = false;
            $('#address').closest('.form-group').addClass('has-error')
                .append('<div class="error-message text-danger">Vui lòng nhập địa chỉ</div>');
        }
        
        // Kiểm tra số điện thoại
        const phone = $('#phone').val().trim();
        if (!phone) {
            isValid = false;
            $('#phone').closest('.form-group').addClass('has-error')
                .append('<div class="error-message text-danger">Vui lòng nhập số điện thoại</div>');
        } else if (!isValidPhone(phone)) {
            isValid = false;
            $('#phone').closest('.form-group').addClass('has-error')
                .append('<div class="error-message text-danger">Số điện thoại không hợp lệ</div>');
        }
        
        return isValid;
    }
    
    // Hàm kiểm tra số điện thoại
    function isValidPhone(phone) {
        return /^(\+84|0)[0-9]{9,10}$/.test(phone);
    }
    
    // Hàm hiển thị thông báo
    function showNotification(type, message) {
        // Nếu có thư viện toastr
        if (typeof toastr !== 'undefined') {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                positionClass: 'toast-top-right',
                timeOut: 3000
            };
            
            if (type === 'success') {
                toastr.success(message);
            } else if (type === 'error') {
                toastr.error(message);
            }
        } else {
            // Fallback nếu không có toastr
            alert(message);
        }
    }
});
 document.getElementById('hienformtimkiem').addEventListener('click', function() {
   // alert("clieck vaof hop thoai tim kiem");
    const form = document.getElementById('advancedSearchForm');
     form.style.display = form.style.display == 'none' ? 'block' : 'none';
   // form.style.display = 'none';
    this.classList.toggle('active');
});
document.getElementById('resetAdvancedSearch').addEventListener('click', function() {
    const form = document.getElementById('advancedSearchForm');
    const inputs = form.querySelectorAll('input, select');
    inputs.forEach(input => input.value = '');
});

document.getElementById("timkiemnangcao").addEventListener("click", function (e) {
    e.preventDefault();
    var tenSach = document.getElementById("tenSach").value.trim();
    var tacGia = document.getElementById("tacGia").value.trim();
   // var tenNhaXuatBan = document.getElementById("tenNhaXuatBan").value.trim();
    var idDanhMuc = (document.getElementById("danhmuc").value !== '') ? document.getElementById("danhmuc").value : '';
    var giaBatDau = (document.getElementById("giaBatDau").value !== '') ? Number(document.getElementById("giaBatDau").value) : '';
    var giaKetThuc = (document.getElementById("giaKetThuc").value !== '') ? Number(document.getElementById("giaKetThuc").value) : '';
    var giamGia = (document.getElementById("giamGia").value !== '') ? Number(document.getElementById("giamGia").value) : '';
    var soLuongTon = (document.getElementById("soLuongTon").value !== '') ? Number(document.getElementById("soLuongTon").value) : '';
    var value = [];

    if (tenSach !== '') {
       value.push("Ten_Sach LIKE '%" + tenSach + "%'");

    }
    if (tacGia !== '') {
        value.push("Tac_Gia  LIKE '%" + tacGia + "%'");
    }
    // if (tenNhaXuatBan !== '') {
    //     value.push("Ten_Nha_Xuat_Ban = '" + tenNhaXuatBan + "'");
    // }
    if (idDanhMuc !== '') {
        value.push("ID_The_Loai = " + idDanhMuc);
    }
    if (giaBatDau !== '') {
        value.push("Gia_Ban >= " + giaBatDau);
    }
    if (giaKetThuc !== '') {
        value.push("Gia_Ban <= " + giaKetThuc);
    }
    if (giamGia !== '') {
        value.push("`GiamGia(%)` = " + giamGia);
    }
    if (soLuongTon !== '') {
        value.push("So_Luong_Ton = " + soLuongTon);
    }

    // Kiểm tra nếu mảng value rỗng
    if (value.length === 0) {
        alert("Vui lòng nhập ít nhất một tiêu chí tìm kiếm.");
        return;
    }

    var sql = "SELECT * FROM sach WHERE ";
    sql += value.join(' AND '); // Sử dụng AND để nối các điều kiện lại
    console.log(sql);

    $.ajax({
        url: "collections/searchSachNangCao",
        method: "POST",
        data: { truyVan: sql },
        dataType: "json",
        success: function (data) {
            if (data.length === 0) {
                $(".ins_main").html("<div>Không tìm thấy sách</div>");
                $("#phantrang").html("");
                return;
            }

            let sanPham1Trang = 6;
            let tongSoTrang = Math.ceil(data.length / sanPham1Trang);

            function hienThiTrang(trang) {
                let batDau = (trang - 1) * sanPham1Trang;
                let ketThuc = batDau + sanPham1Trang;
                let danhSachHienThi = data.slice(batDau, ketThuc);

                let html = `
                    <div class="col-13">
                         <div class="alert alert-info">Kết quả tìm kiếm: <strong>${tuKhoa}</strong></div>
                        <div class="content-list row">`;
                danhSachHienThi.forEach(function (product) {
                    var GiaGoc = parseFloat(product.Gia_Ban).toFixed(0);
                    var GiaGiam = (GiaGoc - GiaGoc * product.GiamGia / 100).toFixed(0);

                    html += `
                        <div class="item-product col-4">
                            <div class="chir_loop">
                                <div class="chir_img">
                                    <a href="#">
                                        <img src="media/img_product/${product.Images}" alt="${product.Ten_Sach}">
                                    </a>
                                    <div class="insActionloop">
                                        <a href="#"><img src="media/logo-banner/eye.png" alt="View"></a>
                                        <a href="#"><img src="media/logo-banner/cart.png" alt="Add to Cart"></a>
                                    </div>
                                </div>
                                <div class="chir_content">
                                    <h3><a href="#">${product.Ten_Sach}</a></h3>
                                    <p class="pro-price">
                                        <del>${GiaGoc}đ</del> ${GiaGiam}đ
                                        <span class="sale-price">
                                            <span>-${product.GiamGia}%</span>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>`;
                });

                html += `
                        </div>
                    </div>`; // đóng content-list và col-13

                $(".ins_main").html(html);
                if(tongSoTrang > 1){
                    if (!document.getElementById("phantrang")) {
                        $(".ins_main").after('<div id="phantrang" style="margin-top: 10px;"></div>');
                    }
                }
                 // hiển thị danh sách sản phẩm
            }

            function hienThiPhanTrang() {
                if (tongSoTrang <= 1) {
                     $("#phantrang").html("");
                    return;
                } else {
                    $("#phantrang").html("");
                     if (!document.getElementById("phantrang")) {
                        $(".ins_main").after('<div id="phantrang" style="margin-top: 10px;"></div>');
                    }

                    // Tạo CSS nếu chưa có
                    if (!document.getElementById('phantrang-style')) {
                        const style = document.createElement('style');
                        style.id = 'phantrang-style';
                        style.innerHTML = `
                            #phantrang {
                                text-align: center;
                                margin-top: 20px;
                            }
                            #phantrang .nut-trang {
                                background-color: #4CAF50;
                                color: white;
                                border: none;
                                padding: 8px 16px;
                                margin: 0 4px;
                                cursor: pointer;
                                border-radius: 4px;
                                transition: background-color 0.3s;
                            }
                            #phantrang .nut-trang:hover {
                                background-color: #45a049;
                            }
                            #phantrang .nut-trang.active {
                                background-color: #2e7d32;
                                font-weight: bold;
                            }`;
                        document.head.appendChild(style);
                    }

                    // Tạo HTML các nút trang
                let html = "";
                    for (let i = 1; i <= tongSoTrang; i++) {
                        html += `<button class="nut-trang" data-trang="${i}">${i}</button> `;
                    }
                    $("#phantrang").html(html);
                }
            }
  // Tạo các nút trước
            hienThiTrang(1);
            hienThiPhanTrang(); 
                 // Rồi mới hiển thị trang đầu
            // Bắt sự kiện chuyển trang
            $(document).off("click", ".nut-trang").on("click", ".nut-trang", function () {
                let trang = parseInt($(this).data("trang"));
                hienThiTrang(trang);
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Lỗi AJAX:", {
                status: jqXHR.status,
                message: textStatus,
                error: errorThrown,
                response: jqXHR.responseText
            });
            alert("Có lỗi xảy ra khi tìm kiếm.");
        }
    });
    document.getElementById("advancedSearchForm").style.display = 'none';
    document.querySelector(".owl-carousel").style.display = 'none';
});
document.getElementById("timkiem").addEventListener("click", function (e) {
    e.preventDefault();
    var tuKhoa = document.getElementById("tuKhoa").value.trim();
    if (tuKhoa === "") {
        alert("Vui lòng nhập từ khóa tìm kiếm");
        return;
    }

    $.ajax({
        url: "collections/searchSach",
        method: "POST",
        data: { ten: tuKhoa },
        dataType: "json",
        success: function (data) {
            if (data.length === 0) {
                $(".ins_main").html("<div>Không tìm thấy sách</div>");
                $("#phantrang").html("");
                return;
            }

            let sanPham1Trang = 6;
            let tongSoTrang = Math.ceil(data.length / sanPham1Trang);

            function hienThiTrang(trang) {
                let batDau = (trang - 1) * sanPham1Trang;
                let ketThuc = batDau + sanPham1Trang;
                let danhSachHienThi = data.slice(batDau, ketThuc);

                let html = `
                    <div class="col-13">
                         <div class="alert alert-info">Kết quả tìm kiếm: <strong>${tuKhoa}</strong></div>
                        <div class="content-list row">`;
                danhSachHienThi.forEach(function (product) {
                    var GiaGoc = parseFloat(product.Gia_Ban).toFixed(0);
                    var GiaGiam = (GiaGoc - GiaGoc * product.GiamGia / 100).toFixed(0);

                    html += `
                        <div class="item-product col-4">
                            <div class="chir_loop">
                                <div class="chir_img">
                                    <a href="#">
                                        <img src="media/img_product/${product.Images}" alt="${product.Ten_Sach}">
                                    </a>
                                    <div class="insActionloop">
                                        <a href="#"><img src="media/logo-banner/eye.png" alt="View"></a>
                                        <a href="#"><img src="media/logo-banner/cart.png" alt="Add to Cart"></a>
                                    </div>
                                </div>
                                <div class="chir_content">
                                    <h3><a href="#">${product.Ten_Sach}</a></h3>
                                    <p class="pro-price">
                                        <del>${GiaGoc}đ</del> ${GiaGiam}đ
                                        <span class="sale-price">
                                            <span>-${product.GiamGia}%</span>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>`;
                });

                html += `
                        </div>
                    </div>`; // đóng content-list và col-13

                $(".ins_main").html(html); // hiển thị danh sách sản phẩm
                if(tongSoTrang > 1){
                    if (!document.getElementById("phantrang")) {
                        $(".ins_main").after('<div id="phantrang" style="margin-top: 10px;"></div>');
                    }
                }
            }

            function hienThiPhanTrang() {
                if (tongSoTrang <= 1) {
                     $("#phantrang").html("");
                    return;
                } else {
                    $("#phantrang").html("");
                     if (!document.getElementById("phantrang")) {
                        $(".ins_main").after('<div id="phantrang" style="margin-top: 10px;"></div>');
                    }

                    // Tạo CSS nếu chưa có
                    if (!document.getElementById('phantrang-style')) {
                        const style = document.createElement('style');
                        style.id = 'phantrang-style';
                        style.innerHTML = `
                            #phantrang {
                                text-align: center;
                                margin-top: 20px;
                            }
                            #phantrang .nut-trang {
                                background-color: #4CAF50;
                                color: white;
                                border: none;
                                padding: 8px 16px;
                                margin: 0 4px;
                                cursor: pointer;
                                border-radius: 4px;
                                transition: background-color 0.3s;
                            }
                            #phantrang .nut-trang:hover {
                                background-color: #45a049;
                            }
                            #phantrang .nut-trang.active {
                                background-color: #2e7d32;
                                font-weight: bold;
                            }`;
                        document.head.appendChild(style);
                    }

                    // Tạo HTML các nút trang
                let html = "";
                    for (let i = 1; i <= tongSoTrang; i++) {
                        html += `<button class="nut-trang" data-trang="${i}">${i}</button> `;
                    }
                    $("#phantrang").html(html);
                }
            }
             hienThiTrang(1);
            hienThiPhanTrang();   // Tạo các nút trước
                 // Rồi mới hiển thị trang đầu
            



            // Bắt sự kiện chuyển trang
            $(document).off("click", ".nut-trang").on("click", ".nut-trang", function () {
                let trang = parseInt($(this).data("trang"));
                hienThiTrang(trang);
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("Lỗi AJAX:", {
                status: jqXHR.status,
                message: textStatus,
                error: errorThrown,
                response: jqXHR.responseText
            });
            alert("Có lỗi xảy ra khi tìm kiếm.");
        }
    });
    document.querySelector(".owl-carousel").style.display = 'none';
});

