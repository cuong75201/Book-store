
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
            dataType: "json",
            success: function (data) {
                console.log(data);
                if (!data) {
                    $("#errol_pass_disabled").html("Số điện thoại hoặc mật khẩu không chính xác");

                }
                else {
                    window.location = "dashboard";
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
function toast({
    title = "",
    message = "",
    type = "success",
    duration = 3000,
}) {
    const main = document.getElementById("toast");
    if (main) {
        const toast = document.createElement("div");
        const autoremoveId = setTimeout(function () {
            main.removeChild(toast);
        }, duration + 1000);
        toast.onclick = function (e) {
            if (e.target.closest(".toast_close")) {
                main.removeChild(toast);
                clearTimeout(autoremoveId);
            }
        };
        const colors = {
            success: "#47d864",
            info: "#2f86eb",
            warning: "#ffc021",
            error: "#ff6243",
        };
        const icon = {
            success: "fa fa-check-circle",
            errol: "fa fa-times",
            warning: "fa fa-info",
        };
        toast.classList.add("toast", `toast--${type}`);
        toast.innerHTML = `
<div class="toast_icon">
    <i class="${icon[type]}"></i>
</div>
<div class="toast_body">
    <h3 class="toast_title">${title}</h3>
    <p class="toast_msg">${message}</p>
</div>
<div class="toast_close">
      <i class="fa fa-times"></i>
</div>
 <div class="toast__background"style="background-color: ${colors[type]};">
        `;
        delay = (duration / 1000).toFixed(2);
        toast.style.animation = `slideInLeft ease 0.3s,fadeOut linear 1s ${delay}s forwards`;
        main.appendChild(toast);
    }
}