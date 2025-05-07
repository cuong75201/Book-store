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
