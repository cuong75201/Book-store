function openModal(action) {

    const modal = document.getElementById('myModal');
    const title = document.getElementById('modalTitle');
    title.textContent = action + " quyền";
    if (action === "Thêm") {
        $(".Save-btn").on("click", function () {
            let name = $("#name").val();
            if (!name) {
                toast({ title: 'WARNING', message: "Vui lòng nhập tên quyền", type: 'warning', duration: 3000 });
                return;
            }
            let ids = [];

            // Lấy tất cả checkbox được chọn
            $('input[type="checkbox"]:checked').each(function () {
                ids.push($(this).attr('id'));
            });
            if (ids.length == 0) {
                toast({ title: 'WARNING', message: "Vui lòng chọn ít nhất 1 quyền", type: 'warning', duration: 3000 });

                return;
            }
            $.ajax({
                url: "nhomquyenController/addQuyen",
                method: "POST",
                data: { name: name, ids: ids },
                dataType: 'json',
                success: function (data) {
                    toast({ title: 'SUCCESS', message: 'Thêm thành công', type: 'success', duration: 3000 });

                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", error);
                    console.log("XHR:", xhr);
                    console.log("Status:", status);
                }

            })
        })
        modal.classList.add('active');
        $(".delete-btn").css("display", "none");
        $(".Save-btn").css("display", "inline-block");
        s = `
                    <div class="adding-content" >
                    <form>
                        <div class="inner-left">

                            <div class="adding-content-item">
                                <label for="name">Tên quyền:</label>
                                <input type="text" id="name" placeholder="Nhập tên quyền">
                                <br>
                            </div>
                        
                            <div class="adding-content-item" style="display:block">
                                <p style="font-size:16px;margin:10px 0;font-weight:bold">Cho phép truy cập:</p>
                                <div class="form-group">
                                    
                                    <input type="checkbox" id="1">
                                    <label for="1">Sản phẩm</label>
                                </div>
                                <div class="form-group">
                                    
                                    <input type="checkbox" id="2">
                                    <label for="2">nhà cung cấp</label>
                                </div>
                                <div class="form-group">
                                    
                                    <input type="checkbox" id="3">
                                    <label for="3">nhân viên</label>
                                </div>
                                <div class="form-group">
                                    
                                    <input type="checkbox" id="4">
                                    <label for="4">Khách hàng</label>
                                </div>
                                <div class="form-group">
                                    
                                    <input type="checkbox" id="5">
                                    <label for="5">Đơn hàng</label>
                                </div>
                                <div class="form-group">
                                    
                                    <input type="checkbox" id="6">
                                    <label for="6">Phiếu nhập</label>
                                </div>
                                <div class="form-group">
                                    
                                    <input type="checkbox" id="7">
                                    <label for="7">Thống kê</label>
                                </div>
                                <div class="form-group">
                                   
                                    <input type="checkbox" id="8">
                                     <label for="8">Phân quyền</label>
                                </div>
                            </div>
                        </div>
                        

                    </form>
                </div>


                    `;
        $(".modal__product").html(s);
    }
    else if (action === "Sửa") {
        if (!$("tr").hasClass("selected")) {
            toast({ title: 'WARNING', message: "Vui lòng chọn dòng cần sửa", type: 'warning', duration: 3000 });
        }
        else {
            let id = $("tr.selected").attr("id");
            $(".Save-btn").on("click", function () {
                let name = $("#name").val();
                if (!name) {
                    toast({ title: 'WARNING', message: "Vui lòng nhập tên quyền", type: 'warning', duration: 3000 });
                    return;
                }
                let ids = [];

                // Lấy tất cả checkbox được chọn
                $('input[type="checkbox"]:checked').each(function () {
                    ids.push($(this).attr('id'));
                });
                if (ids.length == 0) {
                    toast({ title: 'WARNING', message: "Vui lòng chọn ít nhất 1 quyền", type: 'warning', duration: 3000 });
                    return;
                }
                $.ajax({
                    url: "nhomquyenController/UpdateQuyen",
                    method: "POST",
                    data: { id: id, name: name, ids: ids },
                    dataType: 'json',
                    success: function (data) {
                        toast({ title: 'SUCCESS', message: "Sửa thành công", type: 'success', duration: 3000 });
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX Error:", error);
                        console.log("XHR:", xhr);
                        console.log("Status:", status);
                    }
                })
            })
            s = `
                    <div class="adding-content" >
                    <form>
                        <div class="inner-left">

                            <div class="adding-content-item">
                                <label for="name">Tên quyền:</label>
                                <input type="text" id="name" placeholder="Nhập tên quyền">
                                <br>
                            </div>
                        
                            <div class="adding-content-item" style="display:block">
                                <p style="font-size:16px;margin:10px 0;font-weight:bold">Cho phép truy cập:</p>
                                <div class="form-group">
                                    
                                    <input type="checkbox" id="1">
                                    <label for="1">Sản phẩm</label>
                                </div>
                                <div class="form-group">
                                    
                                    <input type="checkbox" id="2">
                                    <label for="2">nhà cung cấp</label>
                                </div>
                                <div class="form-group">
                                    
                                    <input type="checkbox" id="3">
                                    <label for="3">nhân viên</label>
                                </div>
                                <div class="form-group">
                                    
                                    <input type="checkbox" id="4">
                                    <label for="4">Khách hàng</label>
                                </div>
                                <div class="form-group">
                                    
                                    <input type="checkbox" id="5">
                                    <label for="5">Đơn hàng</label>
                                </div>
                                <div class="form-group">
                                    
                                    <input type="checkbox" id="6">
                                    <label for="6">Phiếu nhập</label>
                                </div>
                                <div class="form-group">
                                    
                                    <input type="checkbox" id="7">
                                    <label for="7">Thống kê</label>
                                </div>
                                <div class="form-group">
                                   
                                    <input type="checkbox" id="8">
                                     <label for="8">Phân quyền</label>
                                </div>
                            </div>
                        </div>
                        

                    </form>
                </div>


                    `;
            $(".modal__product").html(s);
            $.ajax({
                url: "nhomquyenController/getQuyen",
                method: "POST",
                data: { id: id },
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    $("#name").val(data.tenquyen);
                    for (let key in data.hanhdong) {
                        $("#" + data.hanhdong[key]).prop("checked", true);
                    }
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
                <p>Bạn có chắc chắn muốn xóa quyền này không? Hành động này không thể hoàn tác.</p>
             </div>
             `
            $(".modal__product").html(s);
            $(".delete-btn").on("click", function () {
                let id = $("tr.selected").attr("id");
                $.ajax({
                    url: "nhomquyenController/deleteQuyen",
                    method: "POST",
                    data: { id: id },
                    dataType: 'json',
                    success: function (data) {
                        toast({ title: 'SUCCESS', message: 'Xóa thành công"', type: 'success', duration: 3000 });

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