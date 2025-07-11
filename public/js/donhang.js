function openModal(action) {
    const modal = document.getElementById('myModal');
    const title = document.getElementById('modalTitle');
    title.textContent = action + " đơn hàng";
    if (!$("tr").hasClass("selected")) {
        toast({ title: 'WARNING', message: "Vui lòng chọn dòng cần xem", type: 'warning', duration: 3000 });
    }
    else {
        modal.classList.add('active');
        $(".delete-btn").css("display", "none");
        $(".Save-btn").css("display", "inline-block");
        let id = $("tr.selected").attr("id");
        $.ajax({
            url: "donhangController/getDonhang",
            method: "POST",
            data: { id, id },
            dataType: "json",
            success: function (data) {
                console.log(data);
                let trangthai = "";
                let list_trangthai = { 1: "Đang xử lý", 2: "Đã xác nhận", 3: "Đã giao", 4: "Đã hủy" };
                for (let i = parseInt(data[0]['Trangthai']); i <= 4; i++) {
                    trangthai += `<option value="${i}">${list_trangthai[i]}</option>`;
                }


                row = "";
                for (let key of data) {
                    row += `
                    <tr>
                        <td>${key.ID_Sach}</td>
                        <td>${key.Ten_Sach}</td>
                        <td>${parseInt(key.Don_Gia)}</td>
                        <td>${key.So_Luong}</td>
                        <td>${key.Thanh_Tien}</td>
                    </tr>
                    `;
                }
                s = `
                <div class="tblproduct">
                    <table>
                        <tHead>
                            <th>ID sách</th>
                            <th>Tên sách</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                        </tHead>
                        <tBody>
                        ${row}
                        </tBody>
                    </table>
                </div>
                <hr>
                <div class="set_status">
                    <label>Trạng thái đơn hàng</label>
                    <select id="status">
            ${trangthai}
        </select>
                </div>
                `;
                $(".modal__product").html(s);
                $(".Save-btn").on("click", function () {
                    $.ajax({
                        url: "donhangController/setTrangthai",
                        method: "POST",
                        data: { id: id, trangthai: $("#status").val() },
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            toast({ title: 'SUCCESS', message: "Cập nhật thành công", type: 'success', duration: 3000 });
                        },
                        error: function (xhr, status, error) {
                            console.error("AJAX Error:", error);
                            console.log("XHR:", xhr);
                            console.log("Status:", status);
                        }
                    });

                });
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", error);
                console.log("XHR:", xhr);
                console.log("Status:", status);
            }
        });
    }

}


function closeModal() {
    const modal = document.getElementById('myModal');
    modal.classList.remove('active');
    location.reload();

}
$(document).ready(function () {
    $(".sort-submt span").on("click", function () {
        let startdate = new Date($("#start-date").val().trim());
        let enddate = new Date($("#end-date").val().trim());
        let status = $("#order-status").val().trim();
        let city = $("#thanhpho").val().trim();
        let district = $("#quan").val().trim();
        if (!$("#start-date").val().trim() && !$("#end-date").val().trim() && !city && !district) {
            return;
        }
        if (!city && district) {
            toast({ title: 'WARNING', message: "Vui lòng nhập tên thành phố", type: 'warning', duration: 3000 });
            return;
        }
        if (($("#start-date").val().trim() && !$("#end-date").val().trim()) || (!$("#start-date").val().trim() && $("#end-date").val().trim())) {
            toast({ title: 'WARNING', message: "Vui lòng chọn cả ngày bắt đầu và ngày kết thúc", type: 'warning', duration: 3000 });

            return;
        }
        if (enddate < startdate) {
            toast({ title: 'WARNING', message: "Ngày kết thúc phải lớn hơn ngày bắt đầu", type: 'warning', duration: 3000 });
            return;
        }
        let startDateString = "";
        let endDateString = "";

        if (!isNaN(startdate.getTime())) {  // Kiểm tra nếu startdate hợp lệ
            startDateString = `${startdate.getFullYear()}-${startdate.getMonth() + 1}-${startdate.getDate()}`;
        }

        if (!isNaN(enddate.getTime())) {  // Kiểm tra nếu enddate hợp lệ
            endDateString = `${enddate.getFullYear()}-${enddate.getMonth() + 1}-${enddate.getDate()}`;
        }


        let query = `admin/donhang?start=${startDateString}?end=${endDateString}?status=${status}?city=${city}?district=${district}`;
        history.pushState(null, "", query);
        $.ajax({
            url: "donhangController/locdonhang",
            method: "POST",
            data: { startdate: startDateString, enddate: endDateString, status: status, city: city, district: district },
            dataType: 'json',
            success: function (data) {
                console.log(data);
                let rowtb = "";
                let list_trangthai = { 1: "Đang xử lý", 2: "Đã xác nhận", 3: "Đã giao", 4: "Đã hủy" };
                let list_pttt = { 1: "Chuyển khoản ngân hàng", 2: "Thanh toán khi nhận hàng" };
                for (key of data) {
                    rowtb += `
                <tr id=${key.ID_Don_Hang}>
                    <td> ${key.ID_Don_Hang}</td>
                    <td>${key.ID_Khach_Hang}</td>
                    <td>${key.Ngay_Dat_Hang}</td>
                    <td>${key.Tong_Tien}</td>
                    <td>${key.Dia_Chi_Giao_Hang}</td>
                    <td>${list_pttt[key.Phuong_Thuc_Thanh_Toan]}</td>
                    <td>${list_trangthai[key.Trang_Thai]}</td>

                </tr>
                `
                }
                $("#product-details").html(rowtb);
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", error);
                console.log("XHR:", xhr);
                console.log("Status:", status);
            }
        })
    })
})

$(document).ready(function () {
    let params = {};
    let query = window.location.href.split("?");
    for (let i = 1; i < query.length; i++) {
        let arr = query[i].split("=");
        params[arr[0]] = arr[1];
    }
    console.log(params);
    if (!params.start && !params.end && !params.city && !params.district) {
        return;
    }
    $.ajax({
        url: "donhangController/locdonhang",
        method: "POST",
        data: { startdate: params.start, enddate: params.end, status: params.status, city: params.city, district: params.district },
        dataType: 'json',
        success: function (data) {
            console.log(data);
            let rowtb = "";
            let list_trangthai = { 1: "Đang xử lý", 2: "Đã xác nhận", 3: "Đã giao", 4: "Đã hủy" };
            let list_pttt = { 1: "Chuyển khoản ngân hàng", 2: "Thanh toán khi nhận hàng" };
            for (key of data) {
                rowtb += `
                <tr id=${key.ID_Don_Hang}>
                    <td> ${key.ID_Don_Hang}</td>
                    <td>${key.ID_Khach_Hang}</td>
                    <td>${key.Ngay_Dat_Hang}</td>
                    <td>${key.Tong_Tien}</td>
                    <td>${key.Dia_Chi_Giao_Hang}</td>
                    <td>${list_pttt[key.Phuong_Thuc_Thanh_Toan]}</td>
                    <td>${list_trangthai[key.Trang_Thai]}</td>

                </tr>
                `
            }
            $("#product-details").html(rowtb);
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", error);
            console.log("XHR:", xhr);
            console.log("Status:", status);
        }
    })
})
$(document).ready(function () {
    $(".reset-button").on("click", function () {
        history.pushState(null, "", "admin/donhang");
        location.reload();
    })
})
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
document.querySelectorAll('.detail_product_combo a').forEach((element) => {
    element.innerHTML = truncateText(element.innerHTML.trim(), 50);
})


$(document).ready(function () {
    // Khai báo biến
    let isEditing = false;
    let deleteAddressId = 0;
    let products = []; // Lưu trữ danh sách sản phẩm
    const baseUrl = window.location.origin + '/Book_store/';

    // Mở modal thêm địa chỉ
    $('#btn-add-address').click(function () {
        resetAddressForm();
        $('#addressModalLabel').text('Thêm địa chỉ mới');
        $('#addressModal').modal('show');
        isEditing = false;
    });

    // Mở modal sửa địa chỉ
    $(document).on('click', '.btn-edit', function () {
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
            success: function (response) {
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
            error: function () {
                showNotification('error', 'Đã có lỗi xảy ra. Vui lòng thử lại sau.');
            }
        });
    });

    // Lưu địa chỉ (thêm mới hoặc cập nhật)
    $('#saveAddress').click(function () {
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
            success: function (response) {
                console.log('Response:', response); // Debug phản hồi
                if (response.status === 'success') {
                    // Đóng modal và reload trang
                    $('#addressModal').modal('hide');
                    showNotification('success', isEditing ? 'Cập nhật địa chỉ thành công' : 'Thêm địa chỉ mới thành công');
                    setTimeout(function () {
                        window.location.reload();
                    }, 1000);
                } else {
                    showNotification('error', response.message);
                }
            },
            error: function () {
                showNotification('error', 'Đã có lỗi xảy ra. Vui lòng thử lại sau.');
            }
        });
    });

    // Mở modal xác nhận xóa
    $(document).on('click', '.btn-delete', function () {
        deleteAddressId = $(this).data('id');
        $('#deleteModal').modal('show');
    });

    // Xác nhận xóa địa chỉ
    $('#confirmDelete').click(function () {
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
            success: function (response) {
                if (response.status === 'success') {
                    // Đóng modal và reload trang
                    $('#deleteModal').modal('hide');
                    showNotification('success', 'Xóa địa chỉ thành công');
                    setTimeout(function () {
                        window.location.reload();
                    }, 1000);
                } else {
                    showNotification('error', response.message);
                }
            },
            error: function () {
                showNotification('error', 'Đã có lỗi xảy ra. Vui lòng thử lại sau.');
            }
        });
    });

    // Thiết lập địa chỉ mặc định
    $(document).on('click', '.btn-set-default', function () {
        const addressId = $(this).data('id');

        $.ajax({
            url: baseUrl + 'account/setDefaultAddress',
            type: 'POST',
            data: {
                ID: addressId
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    showNotification('success', 'Đã thiết lập địa chỉ mặc định');
                    setTimeout(function () {
                        window.location.reload();
                    }, 1000);
                } else {
                    showNotification('error', response.message);
                }
            },
            error: function () {
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
            toast({ title: 'WARNING', message: message, type: 'warning', duration: 3000 });
        }
    }




    $(document).on('click', '.btn-view-details', function () {
        const orderId = $(this).data('id');
        console.log('View Details - Order ID:', orderId);

        if (!orderId) {
            showNotification('error', 'Mã đơn hàng không hợp lệ');
            return;
        }

        // Gửi yêu cầu AJAX để lấy chi tiết đơn hàng
        $.ajax({
            url: baseUrl + 'account/getOrderDetails',
            type: 'POST',
            data: { order_id: orderId },
            dataType: 'json',
            beforeSend: function () {
                $('#order-details-content').html('<p>Đang tải...</p>');
                $('#orderDetailsModal').modal('show');
            },
            success: function (response) {
                console.log('Order Details Response:', response);
                if (response.status === 'success') {
                    let detailsHtml = '<table class="table table-bordered">';
                    detailsHtml += '<thead><tr><th>Hình ảnh</th><th>Tên sách</th><th>Số lượng</th><th>Đơn giá</th><th>Thành tiền</th></tr></thead>';
                    detailsHtml += '<tbody>';
                    response.details.forEach(function (item) {
                        const totalPrice = item.So_Luong * item.Don_Gia; // Sử dụng Don_Gia từ bảng chi_tiet_don_hang
                        const imageName = item.Images ? item.Images.replace('.png', '.jpg') : 'default_book.jpg';
                        detailsHtml += '<tr>';
                        detailsHtml += `<td><img src="media/img_product/${imageName}" alt="${item.Ten_Sach}" style="width: 50px; height: 50px;"></td>`;
                        detailsHtml += '<td>' + item.Ten_Sach + '</td>';
                        detailsHtml += '<td>' + item.So_Luong + '</td>';
                        detailsHtml += '<td>' + item.Don_Gia.toLocaleString('vi-VN') + ' VNĐ</td>';
                        detailsHtml += '<td>' + totalPrice.toLocaleString('vi-VN') + ' VNĐ</td>';
                        detailsHtml += '</tr>';
                    });

                    detailsHtml += '</tbody></table>';
                    $('#order-details-content').html(detailsHtml);
                } else {
                    $('#order-details-content').html('<p>' + (response.message || 'Không thể tải chi tiết đơn hàng') + '</p>');
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', status, error);
                console.error('Response Text:', xhr.responseText);
                $('#order-details-content').html('<p>Đã có lỗi xảy ra. Vui lòng thử lại sau.</p>');
            }
        });
    });


    function formatCurrency(amount) {
        return amount.toLocaleString('vi-VN') + ' VNĐ';
    }

    // Khởi tạo danh sách sản phẩm từ dữ liệu ban đầu
    function initializeProducts() {
        const initialProducts = $('#checkout-btn').data('products');
        if (initialProducts && Array.isArray(initialProducts)) {
            products = initialProducts.map(product => ({
                ID_Sach: product.ID_Sach,
                Ten_Sach: product.Ten_Sach,
                Images: product.Images,
                So_Luong: product.So_Luong,
                FinalPrice: product.FinalPrice
            }));
        } else {
            console.error('Không tìm thấy dữ liệu sản phẩm hợp lệ:', initialProducts);
            products = [];
        }
        updateAllDisplays();
    }

    document.querySelectorAll('.payment-option').forEach(option => {
        option.addEventListener('click', function () {
            // Remove selected class from all options
            document.querySelectorAll('.payment-option').forEach(opt => {
                opt.classList.remove('selected');
            });

            // Add selected class to clicked option
            this.classList.add('selected');

            // Check the radio button
            const radio = this.querySelector('.payment-radio');
            radio.checked = true;

            // Show/hide bank details
            const bankDetails = document.getElementById('bank-details');
            if (this.dataset.payment === 'bank') {
                bankDetails.classList.add('active');
            } else {
                bankDetails.classList.remove('active');
            }
        });
    });

    // Lấy danh sách sản phẩm
    function getProducts() {
        return products;
    }

    // Cập nhật hiển thị cho một sản phẩm
    function updateProductDisplay(product) {
        const quantityControl = document.querySelector(`.quantity-control[data-product-id="${product.ID_Sach}"]`);
        if (quantityControl) {
            const quantityInput = quantityControl.querySelector('.quantity-input');
            const priceDisplay = quantityControl.closest('.product-item').querySelector('.product-price');
            quantityInput.value = product.So_Luong;
            priceDisplay.textContent = formatCurrency(product.FinalPrice * product.So_Luong);
        }
    }

    // Cập nhật tóm tắt đơn hàng
    function updateOrderSummary(productsList) {
        let total = 0;
        productsList.forEach(product => {
            total += product.So_Luong * product.FinalPrice;
        });
        $('.summary-value').eq(0).text(formatCurrency(total)); // Tổng tiền hàng
        $('.summary-value').eq(3).text(formatCurrency(total)); // Tổng thanh toán
        $('#checkout-btn').data('total', total);
    }

    // Cập nhật tất cả hiển thị
    function updateAllDisplays() {
        products.forEach(product => updateProductDisplay(product));
        updateOrderSummary(products);
    }

    // Tăng số lượng sản phẩm
    function increaseQuantity(productId) {
        const product = products.find(p => p.ID_Sach === productId);
        if (product) {
            product.So_Luong++;
            updateProductDisplay(product);
            updateOrderSummary(products);
        }
    }

    $(document).ready(function () {
        $('#address-select').on('change', function () {
            const selectedOption = $(this).find('option:selected');
            const name = selectedOption.data('name');
            const address = selectedOption.data('address');
            const phone = selectedOption.data('phone');

            if (name && address && phone) {
                $('#selected-address-info').show();
                $('#selected-address-info .name').text(name);
                $('#selected-address-info .address').text('Địa chỉ: ' + address);
                $('#selected-address-info .phone').text('Điện thoại: ' + phone);
            } else {
                $('#selected-address-info').hide();
            }
        });

        // Gọi ngay khi trang vừa load (nếu có địa chỉ mặc định)
        $('#address-select').trigger('change');
    });

    // Giảm số lượng sản phẩm
    function decreaseQuantity(productId) {
        const product = products.find(p => p.ID_Sach === productId);
        if (product && product.So_Luong > 1) {
            product.So_Luong--;
            updateProductDisplay(product);
            updateOrderSummary(products);
        }
    }

    // Gắn sự kiện cho nút tăng/giảm
    $(document).on('click', '.increase-btn', function () {
        const productId = $(this).closest('.quantity-control').data('product-id');
        increaseQuantity(productId);
    });

    $(document).on('click', '.decrease-btn', function () {
        const productId = $(this).closest('.quantity-control').data('product-id');
        decreaseQuantity(productId);
    });

    // Xử lý thanh toán
    $('#checkout-btn').click(function (e) {
        e.preventDefault();

        if (products.length === 0) {
            showNotification('error', 'Không có sản phẩm trong giỏ hàng.');
            return;
        }

        const addressId = $('#address-select').val(); // Lấy giá trị từ #address-select
        if (!addressId) {
            showNotification('error', 'Vui lòng chọn địa chỉ giao hàng.');
            return;
        }

        const orderData = {
            products: products.reduce((acc, product) => {
                acc[product.ID_Sach] = {
                    quantity: product.So_Luong,
                    price: product.FinalPrice
                };
                return acc;
            }, {}),
            total: $('#checkout-btn').data('total') || 0,
            addressId: addressId, // Sử dụng giá trị từ #address-select
            paymentMethod: $('input[name="payment-method"]:checked').val() || 'cod',
            note: $('textarea[name="order-note"]').val() || ''
        };

        console.log('Order Data:', orderData);

        $.ajax({
            url: baseUrl + 'checkout/processCheckout',
            type: 'POST',
            data: JSON.stringify(orderData),
            contentType: 'application/json',
            dataType: 'json',
            beforeSend: function () {
                $('#checkout-btn').prop('disabled', true).text('Đang xử lý...');
            },
            success: function (response) {
                if (response.status === 'success') {
                    showNotification('success', 'Đơn hàng đã được đặt thành công!');
                    setTimeout(function () {
                        window.location.href = baseUrl + 'account/orders';
                    }, 2000);
                } else {
                    showNotification('error', response.message || 'Đã xảy ra lỗi khi đặt hàng.');
                }
            },
            error: function (xhr, status, error) {
                showNotification('error', 'Đã xảy ra lỗi. Vui lòng thử lại sau.');
                console.error('AJAX Error:', status, error, xhr.responseText);
            },
            complete: function () {
                $('#checkout-btn').prop('disabled', false).text('Xác nhận đặt hàng');
            }
        });
    });

    // Hàm hiển thị thông báo
    function showNotification(type, message) {
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
            toast({ title: 'WARNING', message: message, type: 'warning', duration: 3000 });
        }
    }

    // Khởi tạo khi trang load
    initializeProducts();

});

document.getElementById('hienformtimkiem').addEventListener('click', function () {
    // alert("clieck vaof hop thoai tim kiem");
    const form = document.getElementById('advancedSearchForm');
    form.style.display = form.style.display == 'none' ? 'block' : 'none';
    // form.style.display = 'none';
    this.classList.toggle('active');
});
document.getElementById('resetAdvancedSearch').addEventListener('click', function () {
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
        toast({ title: 'WARNING', message: "Vui lòng nhập ít nhất một tiêu chí tìm kiếm.", type: 'warning', duration: 3000 });
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
                if (tongSoTrang > 1) {
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
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("Lỗi AJAX:", {
                status: jqXHR.status,
                message: textStatus,
                error: errorThrown,
                response: jqXHR.responseText
            });
            toast({ title: 'WARNING', message: "Có lỗi xảy ra khi tìm kiếm.", type: 'warning', duration: 3000 });
        }
    });
    document.getElementById("advancedSearchForm").style.display = 'none';
    document.querySelector(".owl-carousel").style.display = 'none';
});
document.getElementById("timkiem").addEventListener("click", function (e) {
    e.preventDefault();
    var tuKhoa = document.getElementById("tuKhoa").value.trim();
    if (tuKhoa === "") {
        toast({ title: 'WARNING', message: "Vui lòng nhập từ khóa tìm kiếm", type: 'warning', duration: 3000 });
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
                if (tongSoTrang > 1) {
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
            toast({ title: 'ERROL', message: 'Có lỗi xảy ra khi tìm kiếm.', type: 'errol', duration: 3000 });

        }
    });
    document.querySelector(".owl-carousel").style.display = 'none';
});


