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
    const baseUrl = window.location.origin + '/';
    
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
        $('#addressModalLabel').text('Cập nhật địa chỉ');
        isEditing = true;
        
        // Lấy thông tin địa chỉ từ server
        $.ajax({
            url: baseUrl + 'account/getAddress',
            type: 'GET',
            data: {
                id: addressId
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    const address = response.address;
                    $('#addressId').val(address.id);
                    $('#addressName').val(address.ten_nguoi_nhan);
                    $('#addressAddress').val(address.dia_chi);
                    $('#addressPhone').val(address.so_dien_thoai);
                    $('#isDefault').prop('checked', address.is_default == 1);
                    $('#addressModal').modal('show');
                } else {
                    alert(response.message || 'Không thể lấy thông tin địa chỉ.');
                }
            },
            error: function() {
                alert('Đã xảy ra lỗi khi lấy thông tin địa chỉ.');
            }
        });
    });
    
    // Submit form (thêm hoặc sửa địa chỉ)
    $('#addressForm').submit(function(e) {
        e.preventDefault();
        
        // Validate phone number (Vietnamese format: 10 digits starting with 0)
        const phone = $('#addressPhone').val();
        const phoneRegex = /^0[0-9]{9}$/;
        if (!phoneRegex.test(phone)) {
            $('#errorMessage').text('Số điện thoại không hợp lệ. Vui lòng nhập số điện thoại 10 chữ số bắt đầu bằng 0.').show();
            return;
        }
        
        const url = isEditing ? baseUrl + 'account/updateAddress' : baseUrl + 'account/addAddress';
        const data = {
            id: $('#addressId').val(),
            name: $('#addressName').val(),
            address: $('#addressAddress').val(),
            phone: $('#addressPhone').val(),
            is_default: $('#isDefault').is(':checked') ? 1 : 0
        };
        
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('#addressModal').modal('hide');
                    location.reload(); // Làm mới trang để cập nhật danh sách địa chỉ
                } else {
                    $('#errorMessage').text(response.message || 'Đã xảy ra lỗi khi lưu địa chỉ.').show();
                }
            },
            error: function() {
                $('#errorMessage').text('Đã xảy ra lỗi khi lưu địa chỉ.').show();
            }
        });
    });
    
    // Xóa địa chỉ
    $(document).on('click', '.btn-delete', function() {
        deleteAddressId = $(this).data('id');
        $('#confirmDeleteModal').modal('show');
    });
    
    // Xác nhận xóa địa chỉ
    $('#confirmDeleteBtn').click(function() {
        $.ajax({
            url: baseUrl + 'account/deleteAddress',
            type: 'POST',
            data: {
                id: deleteAddressId
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('#confirmDeleteModal').modal('hide');
                    location.reload();
                } else {
                    alert(response.message || 'Đã xảy ra lỗi khi xóa địa chỉ.');
                }
            },
            error: function() {
                alert('Đã xảy ra lỗi khi xóa địa chỉ.');
            }
        });
    });
    
    // Đặt làm địa chỉ mặc định
    $(document).on('click', '.btn-default', function() {
        const addressId = $(this).data('id');
        $.ajax({
            url: baseUrl + 'account/setDefaultAddress',
            type: 'POST',
            data: {
                id: addressId
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    location.reload();
                } else {
                    alert(response.message || 'Đã xảy ra lỗi khi đặt địa chỉ mặc định.');
                }
            },
            error: function() {
                alert('Đã xảy ra lỗi khi đặt địa chỉ mặc định.');
            }
        });
    });
    
    // Hàm reset form
    function resetAddressForm() {
        $('#addressId').val('');
        $('#addressName').val('');
        $('#addressAddress').val('');
        $('#addressPhone').val('');
        $('#isDefault').prop('checked', false);
        $('#errorMessage').hide();
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

