let product;

function openModal(action) {

    const modal = document.getElementById('myModal');
    const title = document.getElementById('modalTitle');
    title.textContent = action + " sản phẩm";
    if (action === "Thêm") {
        $(".Save-btn").on("click", function () {
            AddProduct();
        })
        modal.classList.add('active');
        $(".delete-btn").css("display", "none");
        $(".Save-btn").css("display", "inline-block");

        let cbtheloai = "";
        let list_tl;
        $.ajax({
            url: "admin/getDanhMuc",
            method: "POST",
            data: { danhmuc: "1" },
            dataType: "json",
            success: function (data) {
                $.ajax({
                    url: "admin/getTheLoai",
                    method: "POST",
                    data: { theloai: "1" },
                    dataType: "json",
                    success: function (responsive) {
                        list_tl = responsive;
                        let cbdanhmuc = "";
                        for (let key of data) {
                            cbdanhmuc += `
                        <option id ="${key.ID_The_Loai}"value="${key.ID_The_Loai}">${key.Ten_The_Loai.toLowerCase()}</option>
                `
                        }
                        for (let key of responsive) {
                            if (key.id_danhmuc == 1) {
                                cbtheloai += `
                     <option id ="${key.id_theloai}"value="${key.id_theloai}">${key.TenTheLoai}</option>
                    `
                            }

                        }
                        s = `
        <div class="adding-content">
        <form>
            <div class="inner-left">

                <div class="adding-content-item">
                    <label for="name">Tên sản phẩm:</label>
                    <input type="text" id="name" placeholder="Nhập tên sản phẩm">
                    <br>
                </div>
                <div class="adding-content-item">
                    <label for="name">Tác giả:</label>
                    <input type="text" id="tacgia" placeholder="Nhập tên tác giả">
                    <br>
                </div>
                <div class="adding-content-item">
                    <label for="name">Tên nhà xuất bản:</label>
                    <input type="text" id="name_nxb" placeholder="Nhập tên nhà xuất bản">
                    <br>
                </div>
                <div class="adding-content-item">
                    <label for="name">Năm xuất bản:</label>
                    <input type="number" id="namxb" placeholder="Nhập năm xuất bản">
                    <br>
                </div>
                <div class="adding-content-item">
                    <label for="name">Giá bán:</label>
                    <input type="number" id="giaban" placeholder="Nhập giá bán">
                    <br>
                </div>
                <div class="adding-content-item">
                    <label for="name">Giảm giá(%):</label>
                    <input type="number" id="giamgia" placeholder="Nhập giảm giá">
                    <br>
                </div>
                
                <div class="adding-content-item">
                    <label for="danhmuc-select">Danh mục: </label>
                    <select id="danhmuc-select">
                        ${cbdanhmuc}
                    </select>
                    <br>
                </div>        
                <div class="adding-content-item">
                    <label for="theloai-select">Thể loại: </label>
                    <select id="theloai-select">
                        ${cbtheloai}
                    </select>
                    <br>
                </div>        
            </div>
             <div class="inner-right">
             <div class="adding-content-item">
                    <label for="name">Mô tả sản phẩm:</label>
                    <textarea id="message" name="message" rows="5" cols="40" placeholder="Mô tả sản phẩm"></textarea>
                    <br>
                </div>
                 <div class="adding-content-item">
                    <label for="main-img">Ảnh chính:</label>
                    <input type="file" id="main-img" accept="image/*">
                    <br>
                </div>
                <img id="previewImage" src="" alt="Preview" style="display:none;max-width: 200px; margin-top: 10px;">
                </div>

        </form>
    </div>


        `;
                        $(".modal__product").html(s);
                        $("#danhmuc-select").on("change", function () {
                            let id = $(this).val();
                            cbtheloai = "";
                            for (let key of list_tl) {
                                if (key.id_danhmuc == id) {
                                    cbtheloai += `
                     <option id ="${key.id_theloai}"value="${key.TenTheLoai}">${key.TenTheLoai}</option>
                    `
                                }

                            }
                            $("#theloai-select").html(cbtheloai);

                        })
                        $("#main-img").on("change", function () {
                            const file = this.files[0];
                            if (file) {
                                const objectURL = URL.createObjectURL(file);
                                // console.log("Object URL:", objectURL);
                                previewImage.src = objectURL;
                                $("#previewImage").css("display", "block");
                            }
                        })
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX Error:", error);
                        console.log("XHR:", xhr);
                        console.log("Status:", status);
                    }
                });
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
                UpdateProduct();
            })
            $.ajax({
                url: "admin/getSach",
                method: "POST",
                data: { id: id },
                dataType: "json",
                success: function (data) {
                    product = data;
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", error);
                    console.log("XHR:", xhr);
                    console.log("Status:", status);
                }
            })
            modal.classList.add('active');
            $(".delete-btn").css("display", "none");
            $(".Save-btn").css("display", "inline-block");
            let cbtheloai = "";
            let list_tl;
            $.ajax({
                url: "admin/getDanhMuc",
                method: "POST",
                data: { danhmuc: "1" },
                dataType: "json",
                success: function (data) {
                    $.ajax({
                        url: "admin/getTheLoai",
                        method: "POST",
                        data: { theloai: "1" },
                        dataType: "json",
                        success: function (responsive) {
                            list_tl = responsive;
                            let cbdanhmuc = "";
                            for (let key of data) {
                                cbdanhmuc += `
                        <option id ="${key.ID_The_Loai}"value="${key.ID_The_Loai}">${key.Ten_The_Loai.toLowerCase()}</option>
                `
                            }
                            for (let key of responsive) {
                                if (key.id_danhmuc == 1) {
                                    cbtheloai += `
                     <option id ="${key.id_theloai}"value="${key.id_theloai}">${key.TenTheLoai}</option>
                    `
                                }

                            }
                            s = `
        <div class="adding-content">
        <form>
            <div class="inner-left">

                <div class="adding-content-item">
                    <label for="name">Tên sản phẩm:</label>
                    <input type="text" id="name" placeholder="Nhập tên sản phẩm">
                    <br>
                </div>
                <div class="adding-content-item">
                    <label for="name">Tác giả:</label>
                    <input type="text" id="tacgia" placeholder="Nhập tên tác giả">
                    <br>
                </div>
                <div class="adding-content-item">
                    <label for="name">Tên nhà xuất bản:</label>
                    <input type="text" id="name_nxb" placeholder="Nhập tên nhà xuất bản">
                    <br>
                </div>
                <div class="adding-content-item">
                    <label for="name">Năm xuất bản:</label>
                    <input type="number" id="namxb" placeholder="Nhập năm xuất bản">
                    <br>
                </div>
                <div class="adding-content-item">
                    <label for="name">Giá bán:</label>
                    <input type="number" id="giaban" placeholder="Nhập giá bán">
                    <br>
                </div>
                <div class="adding-content-item">
                    <label for="name">Giảm giá(%):</label>
                    <input type="number" id="giamgia" placeholder="Nhập giảm giá">
                    <br>
                </div>
                <div class="adding-content-item">
                    <label for="name">Số lượng:</label>
                    <input type="number" id="soluong" placeholder="Nhập số lượng">
                    <br>
                </div>
                
                <div class="adding-content-item">
                    <label for="danhmuc-select">Danh mục: </label>
                    <select id="danhmuc-select">
                        ${cbdanhmuc}
                    </select>
                    <br>
                </div>        
                <div class="adding-content-item">
                    <label for="theloai-select">Thể loại: </label>
                    <select id="theloai-select">
                        ${cbtheloai}
                    </select>
                    <br>
                </div>        
            </div>
             <div class="inner-right">
             <div class="adding-content-item">
                    <label for="name">Mô tả sản phẩm:</label>
                    <textarea id="message" name="message" rows="5" cols="40" placeholder="Mô tả sản phẩm"></textarea>
                    <br>
                </div>
                 <div class="adding-content-item">
                    <label for="main-img">Ảnh chính:</label>
                    <input type="file" id="main-img" accept="image/*">
                    <br>
                </div>
                <img id="previewImage" src="" alt="Preview" style="display:none;max-width: 200px; margin-top: 10px;">
                </div>

        </form>
    </div>


        `;
                            $(".modal__product").html(s);
                            $("#name").val(product[0].Ten_Sach);
                            $("#tacgia").val(product[0].Tac_Gia);
                            $("#name_nxb").val(product[0].Ten_Nha_Xuat_Ban);
                            $("#namxb").val(product[0].Nam_Xuat_Ban);
                            $("#giaban").val(parseInt(product[0].Gia_Ban));
                            $("#giamgia").val(product[0]['GiamGia(%)']);
                            $("#message").val(product[0].Mo_Ta);
                            $("#soluong").val(product[0].So_Luong_Ton);
                            $('#danhmuc-select').val(product[0].ID_DanhMuc);
                            let html_tl = "";
                            for (let key of list_tl) {
                                if (key.id_danhmuc == $("#danhmuc-select").val()) {
                                    html_tl += `
                     <option id ="${key.id_theloai}"value="${key.id_theloai}">${key.TenTheLoai}</option>
                    `
                                }
                            }
                            $("#theloai-select").html(html_tl);
                            $("#theloai-select").val(product[0].ID_TheLoai);
                            $("#previewImage").attr("src", "media/img_product/" + product[0].Images);
                            $("#previewImage").css("display", "block");
                            $("#danhmuc-select").on("change", function () {
                                let id = $(this).val();
                                cbtheloai = "";
                                for (let key of list_tl) {
                                    if (key.id_danhmuc == id) {
                                        cbtheloai += `
                     <option id ="${key.id_theloai}"value="${key.TenTheLoai}">${key.TenTheLoai}</option>
                    `
                                    }

                                }
                                $("#theloai-select").html(cbtheloai);

                            })
                            $("#main-img").on("change", function () {
                                const file = this.files[0];
                                if (file) {
                                    const objectURL = URL.createObjectURL(file);
                                    // console.log("Object URL:", objectURL);
                                    previewImage.src = objectURL;
                                    $("#previewImage").css("display", "block");
                                }
                            })
                        },
                        error: function (xhr, status, error) {
                            console.error("AJAX Error:", error);
                            console.log("XHR:", xhr);
                            console.log("Status:", status);
                        }
                    });

                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", error);
                    console.log("XHR:", xhr);
                    console.log("Status:", status);
                }
            })

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
                <p>Bạn có chắc chắn muốn xóa sản phẩm này không? Hành động này không thể hoàn tác.</p>
             </div>
             `
            $(".modal__product").html(s);
            $(".delete-btn").on("click", function () {
                let id = $("tr.selected").attr("id");
                $.ajax({
                    url: "admin/XoaSanPham",
                    data: { id: id },
                    method: "POST",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        toast({ title: 'SUCCESS', message: 'Xóa thành công', type: 'success', duration: 3000 });
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
    location.reload();
}
function AddProduct() {
    let namesach = $("#name").val().trim();
    let tacgia = $("#tacgia").val().trim();
    let name_nxb = $("#name_nxb").val().trim();
    let namxb = $("#namxb").val().trim();
    let giaban = $("#giaban").val().trim();
    let giamgia = $("#giamgia").val().trim();
    let danhmuc = $("#danhmuc-select").val().trim();
    let theloai = $("#theloai-select").val().trim();
    let mota = $("#message").val().trim();
    const fileInput = document.getElementById("main-img");
    const file = fileInput.files[0];
    if (!namesach || !tacgia || !name_nxb || !namxb || !giaban || !giamgia || !danhmuc || !theloai || !mota) {
        alert("Vui lòng điền đầy đủ thông tin!");
        return;
    }
    if (Number(namxb) <= 0) {
        alert("Nam xuat ban không hợp lệ");
        return;
    }
    if (Number(giaban) <= 0) {
        alert("Giá bán không hợp lệ");
        return;
    }
    if (Number(giamgia) < 0 || Number(giamgia) > 100) {
        alert("Giảm giá không hợp lệ");
        return;
    }
    if (!file) {
        alert("Vui lòng chọn ảnh!");
        return;
    }
    const formData = new FormData();
    formData.append("image", file);
    formData.append("namesach", $("#name").val().trim());
    formData.append("tacgia", $("#tacgia").val().trim());
    formData.append("name_nxb", $("#name_nxb").val().trim());
    formData.append("namxb", $("#namxb").val().trim());
    formData.append("giaban", $("#giaban").val().trim());
    formData.append("giamgia", $("#giamgia").val().trim());
    formData.append("danhmuc", $("#danhmuc-select").val().trim());
    formData.append("theloai", $("#theloai-select").val().trim());
    formData.append("mota", $("#message").val().trim());
    console.log(file);
    $.ajax({
        url: "admin/uploadImage",
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            toast({ title: 'SUCCESS', message: 'Thêm thành công', type: 'success', duration: 3000 });
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", error);
            console.log("XHR:", xhr);
            console.log("Status:", status);
        }
    })
};
function UpdateProduct() {
    let namesach = $("#name").val().trim();
    let tacgia = $("#tacgia").val().trim();
    let name_nxb = $("#name_nxb").val().trim();
    let namxb = $("#namxb").val().trim();
    let giaban = $("#giaban").val().trim();
    let giamgia = $("#giamgia").val().trim();
    let danhmuc = $("#danhmuc-select").val().trim();
    let theloai = $("#theloai-select").val().trim();
    let mota = $("#message").val().trim();
    const fileInput = document.getElementById("main-img");
    const file = fileInput.files[0];
    if (!namesach || !tacgia || !name_nxb || !namxb || !giaban || !giamgia || !danhmuc || !theloai || !mota) {
        alert("Vui lòng điền đầy đủ thông tin!");
        return;
    }
    if (Number(namxb) <= 0) {
        alert("Nam xuat ban không hợp lệ");
        return;
    }
    if (Number(giaban) <= 0) {
        alert("Giá bán không hợp lệ");
        return;
    }
    if (Number(giamgia) < 0 || Number(giamgia) > 100) {
        alert("Giảm giá không hợp lệ");
        return;
    }
    const formData = new FormData();

    if (file) {
        formData.append("image", file);
    }
    else {
        formData.append("image", product[0].Images);
    }
    formData.append("idsach", product[0].ID_Sach);
    formData.append("namesach", $("#name").val().trim());
    formData.append("tacgia", $("#tacgia").val().trim());
    formData.append("name_nxb", $("#name_nxb").val().trim());
    formData.append("namxb", $("#namxb").val().trim());
    formData.append("giaban", $("#giaban").val().trim());
    formData.append("giamgia", $("#giamgia").val().trim());
    formData.append("danhmuc", $("#danhmuc-select").val().trim());
    formData.append("theloai", $("#theloai-select").val().trim());
    formData.append("mota", $("#message").val().trim());
    formData.append("soluong", $("#soluong").val().trim());
    $.ajax({
        url: "admin/UpdateProduct",
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data);
            toast({ title: 'SUCCESS', message: "Sửa thành công", type: 'success', duration: 3000 });


            closeModal();
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", error);
            console.log("XHR:", xhr);
            console.log("Status:", status);
        }
    })
}