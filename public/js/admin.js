
$(document).ready(function () {
    $(".login-btn").on("click", function (event) {
        event.preventDefault();

        let valid = true;
        var username = $("#username").val();
        var password = $("#password").val();
        if (username === "") {
            $("#errol_user_disabled").html("Số điện thoại không được để trống");
            valid = false;
        }
        if (password === "") {
            $("#errol_pass_disabled").html("Mật khẩu không được để trống");
            valid = false;
        }
        if (valid == false) return;

        var data = { username: username, password: password };
        $.ajax({
            url: "checkLogin",
            method: "POST",
            data: data,
            dataType: "text",
            success: function (data) {
                console.log(data.trim() === "Fail", data);
                if (data.trim() === "Fail") {
                    $("#errol_pass_disabled").html("Số điện thoại hoặc mật khẩu không chính xác");

                }
                else {
                    window.location = "/Book_store/admin/product";
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", error);
                console.log("XHR:", xhr);
                console.log("Status:", status);
            }
        })
    })
    $("tbody tr").click(function () {
        // Bỏ chọn dòng cũ
        $("tbody tr").removeClass("selected");

        // Chọn dòng mới
        $(this).addClass("selected");
    });

})