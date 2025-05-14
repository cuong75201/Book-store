$(document).ready(function () {
    let list_kh = {};
    $.ajax({
        url: "donhangController/getNameKH",
        method: "POST",
        data: { khachhang: 1 },
        dataType: "json",
        success: function (data) {
            for (key of data) {
                list_kh[parseInt(key.ID_Khach_Hang)] = key.Ten_Khach_Hang;
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", error);
            console.log("XHR:", xhr);
            console.log("Status:", status);
        }
    })
    $(".search-btn").on("click", function () {
        let startdate = new Date($("#start-date").val().trim());
        let enddate = new Date($("#end-date").val().trim());
        if (!$("#end-date").val().trim() || !$("#start-date").val().trim()) {
            alert("Vui lòng chọn ngày bắt đầu và ngày kết thúc");
            return;
        }
        if (startdate > enddate) {
            alert("Ngày bắt đầu phải bé hơn ngày kết thúc");
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


        $.ajax({
            url: "donhangController/getphieunhap",
            method: "POST",
            data: { start: startDateString, end: endDateString },
            dataType: 'json',
            success: function (data) {
                let mergedData = data.reduce((acc, item) => {
                    let date = item.Ngay_Nhap;
                    let amount = parseInt(item.Tong_Tien) || 0;
                    let existingDate = acc.find(entry => entry.Ngay_Nhap === date);

                    if (existingDate) {
                        // Cộng dồn Tong_Tien nếu đã có
                        existingDate.Tong_Tien += amount;
                    } else {
                        // Thêm ngày mới nếu chưa có
                        acc.push({
                            Ngay_Nhap: date,
                            Tong_Tien: amount
                        });
                    }

                    return acc;
                }, []);

                console.log(mergedData);
                let Von = {};
                mergedData.forEach(item => {
                    Von[item.Ngay_Nhap] = item.Tong_Tien;
                });
                $.ajax({
                    url: "donhangController/locdonhang",
                    method: "POST",
                    data: { startdate: startDateString, enddate: endDateString, status: 0, city: "", district: "" },
                    dataType: 'json',
                    success: function (res) {
                        let mergeRes = res.reduce((acc, order) => {
                            // Lấy phần ngày từ Ngay_Dat_Hang
                            let date = order.Ngay_Dat_Hang.split(" ")[0];
                            let amount = parseInt(order.Tong_Tien) || 0;

                            // Kiểm tra ngày đã tồn tại trong acc
                            let existingDate = acc.find(entry => entry.Ngay_Dat_Hang === date);

                            if (existingDate) {
                                // Cộng dồn Tong_Tien nếu đã có
                                existingDate.Tong_Tien += amount;
                            } else {
                                // Thêm ngày mới nếu chưa có
                                acc.push({
                                    Ngay_Dat_Hang: date,
                                    Tong_Tien: amount
                                });
                            }

                            return acc;
                        }, []);

                        let DoanhThu = {};
                        mergeRes.forEach(item => {
                            DoanhThu[item.Ngay_Dat_Hang] = item.Tong_Tien;
                        });
                        console.log(Von);
                        console.log(DoanhThu);
                        let thongkedh = {};
                        let startDate = new Date(startDateString);
                        let endDate = new Date(endDateString);
                        for (; startDate <= endDate; startDate.setDate(startDate.getDate() + 1)) {
                            let month = (startDate.getMonth() + 1).toString();

                            // Thêm số 0 nếu có 1 chữ số
                            if (month.length === 1) {
                                month = "0" + month;
                            }
                            let currentDate = `${startDate.getFullYear()}-${month}-${startDate.getDate()}`;
                            von = currentDate in Von ? Von[currentDate] : 0;
                            doanhthu = currentDate in DoanhThu ? DoanhThu[currentDate] : 0;
                            thongkedh[currentDate] = [von, doanhthu];

                        }
                        console.log(thongkedh);
                        let rowtb = "";
                        let tong = 0;
                        for (let key in thongkedh) {
                            rowtb += `
                <tr>
                    <td> ${key}</td>
                    <td>${thongkedh[key][0]}</td>
                    <td>${thongkedh[key][1]}</td>
                    <td >${thongkedh[key][1] - thongkedh[key][0]}</td>

                </tr>
                `
                            tong += thongkedh[key][1] - thongkedh[key][0];
                        }
                        rowtb += `
                    <td> <b>Tổng lợi nhuận</b></td>
                    <td></td>
                    <td></td>
                    <td ><b>${tong}</b></td>
                    `
                        $(".tkdonhang").html(rowtb);


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
        })


        let query = `admin/thongke?start=${startDateString}?end=${endDateString}`;
        history.pushState(null, "", query);
        $.ajax({
            url: "donhangController/locdonhang",
            method: "POST",
            data: { startdate: startDateString, enddate: endDateString, status: 0, city: "", district: "" },
            dataType: 'json',
            success: function (data) {
                let mergedOrders = data.reduce((acc, order) => {
                    let existing = acc.find(o => o.ID_Khach_Hang === order.ID_Khach_Hang);

                    if (existing) {
                        existing.Tong_Tien += parseInt(order.Tong_Tien);
                    } else {
                        acc.push({
                            ID_Khach_Hang: order.ID_Khach_Hang,
                            Tong_Tien: parseInt(order.Tong_Tien)
                        });
                    }

                    return acc;
                }, []);
                mergedOrders.sort((a, b) => b.Tong_Tien - a.Tong_Tien);
                console.log(mergedOrders);
                let rowtb = "";

                for (key of mergedOrders) {
                    rowtb += `
                <tr id=${key.ID_Khach_Hang}>
                    <td> ${key.ID_Khach_Hang}</td>
                    <td>${list_kh[parseInt(key.ID_Khach_Hang)]}</td>
                    <td>${key.Tong_Tien}</td>
                    <td ><button class="detail-btn" id=${key.ID_Khach_Hang} onclick=detail(this)>Chi tiết</button></td>
                   

                </tr>
                `
                }
                $(".thongkekh").html(rowtb);
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", error);
                console.log("XHR:", xhr);
                console.log("Status:", status);
            }
        })
    })
    $(".reset-btn").on("click", function () {
        history.pushState(null, "", "admin/thongke");
        location.reload();
    })

})
function closeModal() {
    const modal = document.getElementById('myModal');
    modal.classList.remove('active');
}
function detail(button) {
    let id = button.id;
    const modal = document.getElementById('myModal');
    modal.classList.add('active');
    const title = document.getElementById('modalTitle');
    title.textContent = "Danh sách đơn hàng";
    let params = {};
    let query = window.location.href.split("?");
    for (let i = 1; i < query.length; i++) {
        let arr = query[i].split("=");
        params[arr[0]] = arr[1];
    }
    if (Object.keys(params).length === 0) {
        $.ajax({
            url: "donhangController/getDonhangbyIDKH",
            method: "POST",
            data: { id: id },
            dataType: 'json',
            success: function (data) {
                console.log(data);
                row = "";
                for (let key of data) {
                    row += `
                    <tr>
                        <td>${key.ID_Don_Hang}</td>
                        <td>${key.Ngay_Dat_Hang}</td>
                        <td>${key.Tong_Tien}</td>
                    </tr>
                    `;
                }
                s = `
                <div class="tblproduct">
                    <table>
                        <tHead>
                            <th>ID đơn hàng</th>
                            <th>Ngày đặt hàng</th>
                            <th>Tổng tiền</th>
                        </tHead>
                        <tBody>
                        ${row}
                        </tBody>
                    </table>
                </div>
                <hr>
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
    else {
        $.ajax({
            url: "donhangController/getDonhangbyIDKH",
            method: "POST",
            data: { id: id, start: params['start'], end: params['end'] },
            dataType: 'json',
            success: function (data) {
                console.log(data);
                row = "";
                for (let key of data) {
                    row += `
                    <tr>
                        <td>${key.ID_Don_Hang}</td>
                        <td>${key.Ngay_Dat_Hang}</td>
                        <td>${key.Tong_Tien}</td>
                    </tr>
                    `;
                }
                s = `
                <div class="tblproduct">
                    <table>
                        <tHead>
                            <th>ID đơn hàng</th>
                            <th>Ngày đặt hàng</th>
                            <th>Tổng tiền</th>
                        </tHead>
                        <tBody>
                        ${row}
                        </tBody>
                    </table>
                </div>
                <hr>
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

}
$(document).ready(function () {
    let list_kh = {};
    $.ajax({
        url: "donhangController/getNameKH",
        method: "POST",
        data: { khachhang: 1 },
        dataType: "json",
        success: function (data) {
            for (key of data) {
                list_kh[parseInt(key.ID_Khach_Hang)] = key.Ten_Khach_Hang;
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", error);
            console.log("XHR:", xhr);
            console.log("Status:", status);
        }
    })
    let params = {};
    let query = window.location.href.split("?");
    for (let i = 1; i < query.length; i++) {
        let arr = query[i].split("=");
        params[arr[0]] = arr[1];
    }
    if (!params.start && !params.end && !params.city && !params.district) {
        return;
    }
    $.ajax({
        url: "donhangController/locdonhang",
        method: "POST",
        data: { startdate: params['start'], enddate: params['end'], status: 0, city: "", district: "" },
        dataType: 'json',
        success: function (data) {
            let mergedOrders = data.reduce((acc, order) => {
                let existing = acc.find(o => o.ID_Khach_Hang === order.ID_Khach_Hang);

                if (existing) {
                    existing.Tong_Tien += parseInt(order.Tong_Tien);
                } else {
                    acc.push({
                        ID_Khach_Hang: order.ID_Khach_Hang,
                        Tong_Tien: parseInt(order.Tong_Tien)
                    });
                }

                return acc;
            }, []);
            mergedOrders.sort((a, b) => b.Tong_Tien - a.Tong_Tien);
            let rowtb = "";

            for (key of mergedOrders) {
                rowtb += `
                <tr id=${key.ID_Khach_Hang}>
                    <td> ${key.ID_Khach_Hang}</td>
                    <td>${list_kh[key.ID_Khach_Hang]}</td>
                    <td>${key.Tong_Tien}</td>
                    <td ><button class="detail-btn" id=${key.ID_Khach_Hang} onclick=detail(this)>Chi tiết</button></td>
                   

                </tr>
                `
            }
            $(".thongkekh").html(rowtb);
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", error);
            console.log("XHR:", xhr);
            console.log("Status:", status);
        }
    })
})
$(document).ready(function () {
    let params = {};
    let query = window.location.href.split("?");
    for (let i = 1; i < query.length; i++) {
        let arr = query[i].split("=");
        params[arr[0]] = arr[1];
    }
    if (!params.start && !params.end && !params.city && !params.district) {
        return;
    }
    $.ajax({
        url: "donhangController/getphieunhap",
        method: "POST",
        data: { start: params['start'], end: params['end'] },
        dataType: 'json',
        success: function (data) {
            let mergedData = data.reduce((acc, item) => {
                let date = item.Ngay_Nhap;
                let amount = parseInt(item.Tong_Tien) || 0; // Đổi sang số nguyên, nếu không chuyển được thì mặc định là 0

                // Tìm ngày đã tồn tại trong acc chưa
                let existingDate = acc.find(entry => entry.Ngay_Nhap === date);

                if (existingDate) {
                    // Cộng dồn Tong_Tien nếu đã có
                    existingDate.Tong_Tien += amount;
                } else {
                    // Thêm ngày mới nếu chưa có
                    acc.push({
                        Ngay_Nhap: date,
                        Tong_Tien: amount
                    });
                }

                return acc;
            }, []);

            console.log(mergedData);
            let Von = {};
            mergedData.forEach(item => {
                Von[item.Ngay_Nhap] = item.Tong_Tien;
            });
            $.ajax({
                url: "donhangController/locdonhang",
                method: "POST",
                data: { startdate: params['start'], enddate: params['end'], status: 0, city: "", district: "" },
                dataType: 'json',
                success: function (res) {
                    let mergeRes = res.reduce((acc, order) => {
                        // Lấy phần ngày từ Ngay_Dat_Hang
                        let date = order.Ngay_Dat_Hang.split(" ")[0];
                        let amount = parseInt(order.Tong_Tien) || 0;

                        // Kiểm tra ngày đã tồn tại trong acc
                        let existingDate = acc.find(entry => entry.Ngay_Dat_Hang === date);

                        if (existingDate) {
                            // Cộng dồn Tong_Tien nếu đã có
                            existingDate.Tong_Tien += amount;
                        } else {
                            // Thêm ngày mới nếu chưa có
                            acc.push({
                                Ngay_Dat_Hang: date,
                                Tong_Tien: amount
                            });
                        }

                        return acc;
                    }, []);

                    let DoanhThu = {};
                    mergeRes.forEach(item => {
                        DoanhThu[item.Ngay_Dat_Hang] = item.Tong_Tien;
                    });
                    console.log(Von);
                    console.log(DoanhThu);
                    let thongkedh = {};
                    let startDate = new Date(params['start']);
                    let endDate = new Date(params['end']);
                    for (; startDate <= endDate; startDate.setDate(startDate.getDate() + 1)) {
                        let month = (startDate.getMonth() + 1).toString();

                        // Thêm số 0 nếu có 1 chữ số
                        if (month.length === 1) {
                            month = "0" + month;
                        }
                        let currentDate = `${startDate.getFullYear()}-${month}-${startDate.getDate()}`;
                        von = currentDate in Von ? Von[currentDate] : 0;
                        doanhthu = currentDate in DoanhThu ? DoanhThu[currentDate] : 0;
                        thongkedh[currentDate] = [von, doanhthu];

                    }
                    console.log(thongkedh);
                    let rowtb = "";
                    let tong = 0;
                    for (let key in thongkedh) {
                        rowtb += `
                <tr>
                    <td> ${key}</td>
                    <td>${thongkedh[key][0]}</td>
                    <td>${thongkedh[key][1]}</td>
                    <td >${thongkedh[key][1] - thongkedh[key][0]}</td>

                </tr>
                `
                        tong += thongkedh[key][1] - thongkedh[key][0];
                    }
                    rowtb += `
                    <td> <b>Tổng lợi nhuận</b></td>
                    <td></td>
                    <td></td>
                    <td ><b>${tong}</b></td>
                    `
                    $(".tkdonhang").html(rowtb);


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
    })
})
$(".search-btn").click(function () {
    let params = {};
    let query = window.location.href.split("?");
    for (let i = 1; i < query.length; i++) {
        let arr = query[i].split("=");
        params[arr[0]] = arr[1];
    }
    if (!params.start && !params.end && !params.city && !params.district) {
        return;
    }
    $.ajax({
        url: "donhangController/getphieunhap",
        method: "POST",
        data: { start: params['start'], end: params['end'] },
        dataType: 'json',
        success: function (data) {
            let mergedData = data.reduce((acc, item) => {
                let date = item.Ngay_Nhap;
                let amount = parseInt(item.Tong_Tien) || 0; // Đổi sang số nguyên, nếu không chuyển được thì mặc định là 0

                // Tìm ngày đã tồn tại trong acc chưa
                let existingDate = acc.find(entry => entry.Ngay_Nhap === date);

                if (existingDate) {
                    // Cộng dồn Tong_Tien nếu đã có
                    existingDate.Tong_Tien += amount;
                } else {
                    // Thêm ngày mới nếu chưa có
                    acc.push({
                        Ngay_Nhap: date,
                        Tong_Tien: amount
                    });
                }

                return acc;
            }, []);

            console.log(mergedData);
            let Von = {};
            mergedData.forEach(item => {
                Von[item.Ngay_Nhap] = item.Tong_Tien;
            });
            $.ajax({
                url: "donhangController/locdonhang",
                method: "POST",
                data: { startdate: params['start'], enddate: params['end'], status: 0, city: "", district: "" },
                dataType: 'json',
                success: function (res) {
                    let mergeRes = res.reduce((acc, order) => {
                        // Lấy phần ngày từ Ngay_Dat_Hang
                        let date = order.Ngay_Dat_Hang.split(" ")[0];
                        let amount = parseInt(order.Tong_Tien) || 0;

                        // Kiểm tra ngày đã tồn tại trong acc
                        let existingDate = acc.find(entry => entry.Ngay_Dat_Hang === date);

                        if (existingDate) {
                            // Cộng dồn Tong_Tien nếu đã có
                            existingDate.Tong_Tien += amount;
                        } else {
                            // Thêm ngày mới nếu chưa có
                            acc.push({
                                Ngay_Dat_Hang: date,
                                Tong_Tien: amount
                            });
                        }

                        return acc;
                    }, []);

                    let DoanhThu = {};
                    mergeRes.forEach(item => {
                        DoanhThu[item.Ngay_Dat_Hang] = item.Tong_Tien;
                    });
                    console.log(Von);
                    console.log(DoanhThu);
                    let thongkedh = {};
                    let startDate = new Date(params['start']);
                    let endDate = new Date(params['end']);
                    for (; startDate <= endDate; startDate.setDate(startDate.getDate() + 1)) {
                        let month = (startDate.getMonth() + 1).toString();

                        // Thêm số 0 nếu có 1 chữ số
                        if (month.length === 1) {
                            month = "0" + month;
                        }
                        let currentDate = `${startDate.getFullYear()}-${month}-${startDate.getDate()}`;
                        von = currentDate in Von ? Von[currentDate] : 0;
                        doanhthu = currentDate in DoanhThu ? DoanhThu[currentDate] : 0;
                        thongkedh[currentDate] = [von, doanhthu];

                    }
                    console.log(thongkedh);
                    let rowtb = "";
                    let tong = 0;
                    for (let key in thongkedh) {
                        rowtb += `
                <tr>
                    <td> ${key}</td>
                    <td>${thongkedh[key][0]}</td>
                    <td>${thongkedh[key][1]}</td>
                    <td >${thongkedh[key][1] - thongkedh[key][0]}</td>

                </tr>
                `
                        tong += thongkedh[key][1] - thongkedh[key][0];
                    }
                    rowtb += `
                    <td> <b>Tổng lợi nhuận</b></td>
                    <td></td>
                    <td></td>
                    <td ><b>${tong}</b></td>
                    `
                    $(".tkdonhang").html(rowtb);


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
    })
})