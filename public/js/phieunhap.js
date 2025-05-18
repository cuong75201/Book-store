function openModal() {
    const modal = document.getElementById('myModal');
    const title = document.getElementById('modalTitle');
    title.textContent = "Thêm phiếu nhập";

    $(".Save-btn").off("click").on("click", function () {
        savePhieu(); // Gọi hàm lưu phiếu nhập
    });

    modal.classList.add('active');
    $(".delete-btn").hide();
    $(".Save-btn").show();

    $.ajax({
        url: "admin/getNCC",
        method: "GET",
        dataType: "json",
        success: function (nccList) {
            let optionNCC = nccList.map(ncc => `
                <option value="${ncc.ID_NCC}">${ncc.Ten_NCC}</option>
            `).join("");

            const modalContent = `
                <div class="adding-content">
                        <div class="adding-content-item">
                            <label for="ngayNhap">Ngày nhập:</label>
                            <input type="datetime-local" id="ngayNhap" required>
                        </div>
                        <div class="adding-content-item">
                            <label for="nccSelect">Nhà cung cấp:</label>
                            <select id="nccSelect">${optionNCC}</select>
                        </div>
                        <button type="button" class="button add-button" onclick="themDongChiTiet()">Thêm chi tiết</button>
                        <div class="adding-content-item">
                            <div id="chiTietContainer" class="chi-tiet-container"></div>
                        </div>
                </div>
            `;
            $(".modal__product").html(modalContent);

            // Tự động thêm dòng đầu tiên
            themDongChiTiet();
        },
        error: function (xhr) {
            console.error("Lỗi khi tải danh sách nhà cung cấp:", xhr.responseText);
        }
    });
}


// Thêm dòng chi tiết
function themDongChiTiet() {
    $.ajax({
        url: 'admin/getSach',
        method: 'POST',
        data: { id: 'all' }, // chỉ cần truyền gì đó nếu cần
        dataType: 'json',
        success: function (sachList) {
            let options = sachList.map(s => `
                <option value="${s.ID_Sach}">${s.Ten_Sach}</option>
            `).join('');

            const newRow = `
            <div class="chi-tiet-row">
                <div>
                    <label>Sách:</label>
                    <select class="select-sach">${options}</select>
                </div>
                <div>
                    <label>Số lượng:</label>
                    <input type="number" class="soLuong" min="1" value="1">
                </div>
                <div>
                    <label>Giá nhập:</label>
                    <input type="number" class="giaNhap" min="0" value="0">
                </div>
                <div>
                    <button type="button" onclick="xoaDong(this)">Xóa</button>
                </div>
            </div>
        `;
            $("#chiTietContainer").append(newRow)
        },

        error: function (xhr) {
            console.error("Lỗi khi lấy danh sách sách:", xhr.responseText);
        }
    });
}

function xoaDong(btn) {
    $(btn).closest('.chi-tiet-row').remove();
}

// Lưu phiếu
function savePhieu() {
    const data = {
        NgayNhap: $('#ngayNhap').val(),
        ID_NCC: $('#nccSelect').val(),
        ChiTiet: []
    };

    $(".chi-tiet-container .chi-tiet-row").each(function () {
        const row = {
            ID_Sach: $(this).find('.select-sach').val(),
            SoLuong: $(this).find('.soLuong').val(),
            GiaNhap: $(this).find('.giaNhap').val()
        };
        if (row.SoLuong <= 0 || row.GiaNhap <= 0) {
            alert("Số lượng và giá nhập phải lớn hơn 0!");
            return;
        }
        data.ChiTiet.push(row);
    });

    if (!data.NgayNhap || !data.ID_NCC || data.ChiTiet.length === 0) {
        alert("Vui lòng nhập đầy đủ thông tin!");
        return;
    }
    console.log("Dữ liệu gửi đi:", JSON.stringify(data, null, 2)); // Debug

    $.ajax({
        url: 'admin/addPhieuNhap',
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(data),
        success: function (response) {
            console.log(response); // In ra để kiểm tra phản hồi từ server
            if (!response.success) {
                alert('Them phieu nhap thanh cong');
                closeModal();

            } else {
                alert('Thêm thất bại: ' + (response.message || 'Có lỗi xảy ra'));
            }
        },
        error: function (xhr) {
            alert('Lỗi khi gửi dữ liệu: ' + xhr.responseText);
        }
    });

}

// Xem chi tiết
function viewDetail(idPhieu) {
    $.ajax({
        url: 'admin/getChiTietPhieu',
        method: 'POST',
        dataType: 'json',
        data: { id: idPhieu },
        success: function (chiTiet) {
            const idNv = chiTiet.length > 0 ? chiTiet[0].ID_NV : 'Không xác định';
            
            let html = `
                <div class="detail-header">
                    <h2>Chi tiết phiếu nhập #${idPhieu}</h2>
                    <button class="close-btn" onclick="closePhieuModal()" style="margin: 10px">Đóng</button>
                </div>
                <ul class="detail-list">
                    <p><strong>Mã nhân viên:</strong> ${idNv}</p>
                    <table class="detail-table">
                        <tr>
                            <th>Mã sách</th>
                            <th>Tên sách</th>
                            <th>Số lượng</th>
                            <th>Giá nhập</th>
                        </tr>
            `;
            
            chiTiet.forEach(ct => {
                html += `
                    <tr>
                        <td>${ct.ID_Sach}</td>
                        <td>${ct.Ten_Sach}</td>
                        <td>${ct.SoLuong}</td>
                        <td>${ct.GiaNhap.toLocaleString()}₫</td>
                    </tr>
                `;
            });
            
            html += `</table></ul>`;
            $("#phieuModal .modal-body").html(html);
            $("#phieuModal").addClass('active');
        },
        error: function (xhr) {
            alert('Không thể lấy chi tiết phiếu.');
        }
    });
}
// Thêm hàm ẩn modal
function closePhieuModal() {
    $('#phieuModal').removeClass('active');
}
function closeModal() {
    $('#phieuModal').removeClass('active');
}

function deletePhieu(id) {
    if (confirm('Xóa phiếu này?')) {
        $.ajax({
            url: 'admin/deletePhieu',
            method: 'POST',
            data: { id: id },
            success: function (response) {
                if (response.success) {
                    $(`tr[data-id="${id}"]`).remove();
                }
            }
        });
    }
    location.reload(); // Reload lại trang
}
function closeModal() {
    const modal = document.getElementById('myModal');
    modal.classList.remove('active');
    location.reload();
}

document.addEventListener("DOMContentLoaded", function () {
    document.querySelector(".add-button").addEventListener("click", openModal);
});
// Thêm sự kiện chọn hàng
function attachRowClickEvent() {
    document.querySelectorAll('tbody tr').forEach(row => {
        row.addEventListener('click', function() {
            document.querySelectorAll('tr').forEach(r => r.classList.remove('selected'));
            this.classList.add('selected');
        });
    });
}

// Gán sự kiện khi trang tải xong
document.addEventListener('DOMContentLoaded', function() {
    attachRowClickEvent();
    
    // Gán sự kiện cho nút Chi tiết và Xóa
    document.getElementById('btnViewDetail').addEventListener('click', handleViewDetail);
    document.getElementById('btnDelete').addEventListener('click', handleDelete);
});

// Xử lý xem chi tiết
function handleViewDetail() {
    const selectedRow = document.querySelector('tr.selected');
    if (!selectedRow) {
        alert('Vui lòng chọn một phiếu từ bảng.');
        return;
    }
    const id = selectedRow.getAttribute('data-id');
    viewDetail(id);
}

// Xử lý xóa
function handleDelete() {
    const selectedRow = document.querySelector('tr.selected');
    if (!selectedRow) {
        alert('Vui lòng chọn một phiếu từ bảng.');
        return;
    }
    const id = selectedRow.getAttribute('data-id');
    deletePhieu(id);
}

// Cập nhật hàm searchPhieu để gán lại sự kiện
function searchPhieu() {
    const searchType = $('#searchType').val();
    const keyword = $('#searchInput').val().trim();

    $.ajax({
        url: 'admin/searchPhieuNhap',
        method: 'POST',
        data: { type: searchType, keyword: keyword },
        dataType: 'json',
        success: function (data) {
            $('tbody').empty();
            data.forEach(phieu => {
                const row = `
                    <tr data-id="${phieu.ID_PhieuNhap}">
                        <td>${phieu.ID_PhieuNhap}</td>
                        <td>${phieu.Ten_NV || 'Không xác định'}</td>
                        <td>${phieu.NgayNhap}</td>
                        <td>${phieu.Ten_NCC || 'Không xác định'}</td>
                        <td>${phieu.TongTien}₫</td>
                        <td>${phieu.TrangThai == 1 ? 'Đã hoàn thành' : 'Đã hủy'}</td>
                    </tr>
                `;
                $('tbody').append(row);
            });
            attachRowClickEvent(); // Gán lại sự kiện sau khi tải dữ liệu mới
        },
        error: function (xhr) {
            alert('Lỗi tìm kiếm: ' + xhr.responseText);
        }
    });
}