
function openModal(action) {
    const modal = document.getElementById('myModal');
    const title = document.getElementById('modalTitle');
    title.textContent = action + " đơn hàng";
    if (!$("tr").hasClass("selected")) {
        alert("Vui lòng chọn dòng cần xem");
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
                            alert("Cập nhật thành công");
                            location.reload();
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
            alert("Vui lòng nhập tên thành phố");
            return;
        }
        if (($("#start-date").val().trim() && !$("#end-date").val().trim()) || (!$("#start-date").val().trim() && $("#end-date").val().trim())) {
            alert("Vui lòng chọn cả ngày bắt đầu và ngày kết thúc");
            return;
        }
        if (enddate < startdate) {
            alert("Ngày kết thúc phải lớn hơn ngày bắt đầu");
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
