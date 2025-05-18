$(document).ready(function () {
    $(".btn-update").on("click", function () {
        let id = $(this).attr("id");
        console.log($(`.quantity[id="${id}"]`).val())
        $.ajax({
            url: "cart/KTSoluong",
            method: "POST",
            data: { quantity: $(`.quantity[id="${id}"]`).val(), id: id },
            dataType: "json",
            success: function (data) {
                console.log(data);
                if (data) {
                    toast({ title: 'SUCCESS', message: 'Cập nhật số lượng thành công!', type: 'success', duration: 3000 });
                    $(`.td-total[id="${id}"]`).html(data + "VNĐ");
                    let total = 0;
                    $(".td-total").each(function () {
                        let value = parseInt($(this).text().replace(/[^0-9]/g, '')) || 0;
                        total += value;
                    });

                    $(".total").text("Tổng tiền: " + total.toLocaleString() + " VNĐ");
                }
                else {
                    toast({ title: 'WARNING', message: 'Số lượng tồn kho không đủ', type: 'warning', duration: 3000 });
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", error);
                console.log("XHR:", xhr);
                console.log("Status:", status);
            }
        })
    })
    $(".delete-btn").on("click", function () {
        let id = $(this).attr("id");
        $.ajax({
            url: "cart/delItem",
            method: "POST",
            data: { id: id },
            dataType: "json",
            success: function (data) {
                console.log(data);
                toast({ title: 'SUCCESS', message: 'Xóa sản phẩm thành công!', type: 'success', duration: 3000 });
                $(`tr[id=${id}]`).remove();
                let total = 0;
                $(".td-total").each(function () {
                    let value = parseInt($(this).text().replace(/[^0-9]/g, '')) || 0;
                    total += value;
                });

                $(".total").text("Tổng tiền: " + total.toLocaleString() + " VNĐ");
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", error);
                console.log("XHR:", xhr);
                console.log("Status:", status);
            }
        })
    })
})