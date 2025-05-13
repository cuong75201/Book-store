let nhanvien;

function openModal(action) {

    const modal = document.getElementById('myModal');
    const title = document.getElementById('modalTitle');
    title.textContent = action + " nhân viên";
    if (action === "Thêm") {
        $(".Save-btn").on("click", function () {
            AddNhanvien();
        })
        modal.classList.add('active');
        $(".delete-btn").css("display", "none");
        $(".Save-btn").css("display", "inline-block");
        $.ajax({
            url: "admin/getQuyen",
            method: "POST",
            data: { quyen: "1" },
            dataType: "json",
            success: function (data) {
                let cbquyen = '';
                for (let key of data) {
                    cbquyen += `
                    <option id ="${key.MaQuyen}"value="${key.MaQuyen}">${key.TenQuyen}</option>
                    `;
                }
                s = `
                    <div class="adding-content">
                    <form>
                        <div class="inner-left">

                            <div class="adding-content-item">
                                <label for="name">Tên nhân viên:</label>
                                <input type="text" id="name" placeholder="Nhập tên nhân viên">
                                <br>
                            </div>
                            <div class="adding-content-item">
                                <label for="name">Thành phố:</label>
                                <input type="text" id="thanhpho" placeholder="Nhập địa chỉ thành phố">
                                <br>
                            </div>
                            <div class="adding-content-item">
                                <label for="name">Tên quận/huyện/phường:</label>
                                <input type="text" id="quan">
                                <br>
                            </div>
                            <div class="adding-content-item">
                                <label for="name">Tên đường:</label>
                                <input type="text" id="tenduong" placeholder="Nhập tên đường">
                                <br>
                            </div>
                             <div class="adding-content-item">
                                <label for="name">Mật khẩu:</label>
                                <input type="password" id="pass">
                                <br>
                            </div>
                                  
                        </div>
                         <div class="inner-right">
                         <div class="adding-content-item">
                                <label for="name">Nhập số điện thoại:</label>
                                    <input type="number" id="phone" name="phone" placeholder="0123456789" >

                                <br>
                            </div>
                          <div class="adding-content-item">
                                <label for="name">Lương:</label>
                                <input type="number" id="luong" placeholder="Nhập lương">
                                <br>
                            </div>

                            <div class="adding-content-item">
                                <label for="quyen-select">Quyền hạn: </label>
                                <select id="quyen-select">
                                    ${cbquyen}
                                </select>
                                <br>
                            </div>
                             <div class="adding-content-item">
                                <label for="status-select">Trạng thái: </label>
                                <select id="status-select">
                                    <option id ="0" value="0">Khóa</option>
                                    <option id ="1"value="1">Hoạt động</option>
                                </select>
                                <br>
                            </div>
                            </div>

                    </form>
                </div>


                    `;
                $(".modal__product").html(s);
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", error);
                console.log("XHR:", xhr);
                console.log("Status:", status);
            }
        })



    }
    else if (action === "Sửa") {
        if (!$("tr").hasClass("selected")) {
            alert("Vui lòng chọn dòng cần sửa");
        }
        else {
            let id = $("tr.selected").attr("id");
            $(".Save-btn").on("click", function () {
                UpdateNhanVien();
            })
            $.ajax({
                url: "admin/getNhanvien",
                method: "POST",
                data: { id: id },
                dataType: "json",
                success: function (data) {
                    nhanvien = data;
                    $.ajax({
                        url: "admin/getQuyen",
                        method: "POST",
                        data: { quyen: "1" },
                        dataType: "json",
                        success: function (data) {
                            let cbquyen = '';
                            for (let key of data) {
                                cbquyen += `
                    <option id ="${key.MaQuyen}"value="${key.MaQuyen}">${key.TenQuyen}</option>
                    `;
                            }
                            s = `
                    <div class="adding-content">
                    <form>
                        <div class="inner-left">

                            <div class="adding-content-item">
                                <label for="name">Tên nhân viên:</label>
                                <input type="text" id="name" placeholder="Nhập tên nhân viên">
                                <br>
                            </div>
                            <div class="adding-content-item">
                                <label for="name">Thành phố:</label>
                                <input type="text" id="thanhpho" placeholder="Nhập địa chỉ thành phố">
                                <br>
                            </div>
                            <div class="adding-content-item">
                                <label for="name">Tên quận/huyện/phường:</label>
                                <input type="text" id="quan">
                                <br>
                            </div>
                            <div class="adding-content-item">
                                <label for="name">Tên đường:</label>
                                <input type="text" id="tenduong" placeholder="Nhập tên đường">
                                <br>
                            </div>
                             <div class="adding-content-item">
                                <label for="name">Mật khẩu mới (để trống nếu không thay đổi):</label>
                                <input type="password" id="pass">
                                <br>
                            </div>
                                  
                        </div>
                         <div class="inner-right">
                         <div class="adding-content-item">
                                <label for="name">Nhập số điện thoại:</label>
                                    <input type="number" id="phone" name="phone" placeholder="0123456789" >

                                <br>
                            </div>
                          <div class="adding-content-item">
                                <label for="name">Lương:</label>
                                <input type="number" id="luong" placeholder="Nhập lương">
                                <br>
                            </div>

                            <div class="adding-content-item">
                                <label for="quyen-select">Quyền hạn: </label>
                                <select id="quyen-select">
                                    ${cbquyen}
                                </select>
                                <br>
                            </div>
                             <div class="adding-content-item">
                                <label for="status-select">Trạng thái: </label>
                                <select id="status-select">
                                    <option id ="0" value="0">Khóa</option>
                                    <option id ="1"value="1">Hoạt động</option>
                                </select>
                                <br>
                            </div>
                            </div>

                    </form>
                </div>


                    `;
                            $(".modal__product").html(s);
                            $("#name").val(nhanvien[0].Ten_NV);
                            $("#phone").val(nhanvien[0].SDT);
                            $("#luong").val(nhanvien[0].Luong);
                            diachi = nhanvien[0].DiaChi.split(",");
                            console.log(diachi);
                            $("#quan").val(diachi[1].trim());
                            $("#tenduong").val(diachi[0].trim());
                            $("#thanhpho").val(diachi[2].trim());
                            $("#quyen-select").val(nhanvien[0].MaQuyen);
                            $("#status-select").val(nhanvien[0].TrangThai);
                        },
                        error: function (xhr, status, error) {
                            console.error("AJAX Error:", error);
                            console.log("XHR:", xhr);
                            console.log("Status:", status);
                        }
                    })
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", error);
                    console.log("XHR:", xhr);
                    console.log("Status:", status);
                }
            });
            modal.classList.add('active');
            $(".delete-btn").css("display", "none");
            $(".Save-btn").css("display", "inline-block");

        }
    }
    else {
        if (!$("tr").hasClass("selected")) {
            alert("Vui lòng chọn dòng cần xóa");
        }
        else {
            modal.classList.add('active');
            $(".delete-btn").css("display", "inline-block");
            $(".Save-btn").css("display", "none");
            let s = `
             <div class ="delete_product">
                <p>Bạn có chắc chắn muốn xóa nhân viên này không? Hành động này không thể hoàn tác.</p>
             </div>
             `
            $(".modal__product").html(s);
            $(".delete-btn").on("click", function () {
                let id = $("tr.selected").attr("id");
                $.ajax({
                    url: "admin/XoaNhanVien",
                    data: { id: id },
                    method: "POST",
                    dataType: "json",
                    success: function (data) {
                        alert("Xóa thành công");
                        closeModal();
                        $("tr.selected").remove();
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX Error:", error);
                        console.log("XHR:", xhr);
                        console.log("Status:", status);
                    }
                })
            })

        }
    }
}


function closeModal() {
    const modal = document.getElementById('myModal');
    modal.classList.remove('active');
}
function AddNhanvien() {
    let name = $("#name").val();
    let diachi = $("#tenduong").val() + ", " + $("#quan").val() + "," + $("#thanhpho").val();
    let sdt = $("#phone").val();
    let luong = $("#luong").val();
    let quyen = $("#quyen-select").val();
    let status = $("#status-select").val();
    let pass = $("#pass").val();
    if (!name || !$("#thanhpho").val() || !$("#quan").val() || !$("#tenduong").val() || !sdt || !luong || !pass) {
        data = { name: name, diachi: diachi, sdt: sdt, luong: luong, quyen: quyen, status: status, pass: pass };
        alert("Các trường không được để trống");
        return;
    }
    let pattern = /^(03|05|07|08|09)[0-9]{8}$/;
    if (!pattern.test(sdt)) {
        alert("Số điện thoại không hợp lệ (Chỉ chấp nhận đầu số 03,05,07,08,09)");
        return;
    }
    $.ajax({
        url: "admin/addNhanVien",
        method: "POST",
        data: { name: name, diachi: diachi, sdt: sdt, luong: luong, quyen: quyen, status: status, pass: pass },
        dataType: "json",
        success: function (data) {
            alert("Thêm thành công");
            closeModal();
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", error);
            console.log("XHR:", xhr);
            console.log("Status:", status);
        }
    })
};
function UpdateNhanVien() {
    let id = nhanvien[0].ID_NV;
    let name = $("#name").val();
    let diachi = $("#tenduong").val() + ", " + $("#quan").val() + "," + $("#thanhpho").val();
    let sdt = $("#phone").val();
    let luong = $("#luong").val();
    let quyen = $("#quyen-select").val();
    let status = $("#status-select").val();
    let pass = $("#pass").val();
    if (!name || !$("#thanhpho").val() || !$("#quan").val() || !$("#tenduong").val() || !sdt || !luong) {
        alert("Các trường không được để trống");
        return;
    }
    let pattern = /^(03|05|07|08|09)[0-9]{8}$/;
    if (!pattern.test(sdt)) {
        alert("Số điện thoại không hợp lệ (Chỉ chấp nhận đầu số 03,05,07,08,09)");
        return;
    }
    $.ajax({
        url: "admin/udtNhanVien",
        method: "POST",
        data: { id: id, name: name, diachi: diachi, sdt: sdt, luong: luong, quyen: quyen, status: status, pass: pass },
        dataType: "json",
        success: function (data) {
            console.log(data);
            // alert("Sửa thành công");
            // closeModal();
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", error);
            console.log("XHR:", xhr);
            console.log("Status:", status);
        }
    })
}