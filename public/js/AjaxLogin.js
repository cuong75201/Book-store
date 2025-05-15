
$(document).ready(function () {
    $("#create_customer").submit(function (event) {
        event.preventDefault();
        var last_name = $("#last_name").val();
        var first_name = $("#first_name").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var confirmpassword = $("#confirm_password").val();
        var data = { lastname: last_name, firstname: first_name, email: email, password: password, confirmpassword: confirmpassword };
        $.ajax({
            url: "account/Signup",
            method: "POST",
            data: data,
            dataType: "json",
            success: function (data) {
                console.log(data);
                $(".error").html("");
                if (data.status == "valid") {

                    for (var key in data.errors) {
                        console.log(data.errors[key]);
                        var error = ".error_" + key;
                        $(error).html(data.errors[key]);
                    }
                }
                else if (data.status == "same_email") {
                    $(".error_email").html("Email đã được đăng ký");
                }
                else {
                    window.location = "/Book-store";
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", error);
                console.log("XHR:", xhr);
                console.log("Status:", status);
            }
        })
    });
    $("#customer_login").submit(function (event) {
        event.preventDefault();
        var email = $("#login-form-username").val();
        var password = $("#login-form-password").val();
        var data = { email: email, password: password };
        console.log(data);
        $.ajax({
            url: "account/checkLogin",
            method: "POST",
            data: data,
            dataType: "json",
            success: function (data) {
                $(".error_login").html("");

                console.log(data);
                if (data.valid == "false") {
                    $(".error_login").html(data.message);
                }
                else {
                    window.location = "/Book-store";
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", error);
                console.log("XHR:", xhr);
                console.log("Status:", status);
            }
        })
    })
})