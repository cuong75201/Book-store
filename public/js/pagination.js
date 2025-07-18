$(document).ready(function () {
    $(".page a").on('click', function (event) {
        event.preventDefault();
        $(".page a").removeClass("active");
        $(this).addClass("active");

        const href = $(this).attr('href');
        var id_tl = $(".category .active").data('tl');
        var id_dm = $(".content-list").data('dm');
        history.pushState(null, '', href);
        const urlObj = new URL(href, window.location.origin);
        const page = urlObj.searchParams.get('page');
        const path = urlObj.pathname.replace(/^\/+/, '');
        data = { page: page, id_tl: id_tl, id_dm: id_dm };

        $.ajax({
            url: "collections/pagination",
            method: "POST",
            data: data,
            dataType: "json",
            success: function (data) {
                console.log(data);
                var str = '';
                for (let product of data) {
                    let slug = product.slug;
                    let detailUrl = `product/detail/${slug}-${product.ID_Sach}`;
                    let GiaGiam = Number(product['Gia_Ban']) * (1 - Number(product["GiamGia(%)"]) / 100);
                    let GiaGoc = Number(product['Gia_Ban']);
                    GiaGiam = GiaGiam.toLocaleString('vi-VN') + "đ";
                    GiaGoc = GiaGoc.toLocaleString('vi-VN') + "đ";
                    str += `
                    <div class="item-product col-4">
                    <div class="chir_loop">
                        <div class="chir_img">
                            <a href="${detailUrl}">
                                <img src="media/img_product/${product['Images']}" alt="">
                            </a>
                            <div class="insActionloop">
                                <a href="${detailUrl}">
                                    <img src="media/logo-banner/eye.png" alt="">
                                </a>
                                <a href="#" class="add-to-cart" id=${product.ID_Sach}>
                                    <img src="media/logo-banner/cart.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="chir_content">
                            <h3>
                                <a href="#">
                                    ${product['Ten_Sach']}
                                </a>
                            </h3>
                            <p class="pro-price">
                                <del>' ${GiaGoc}</del>
                                ${GiaGiam} <span class="sale-price">
                                    <span>-${product['GiamGia(%)']}%</span>
                                </span>
                            </p>

                        </div>
                    </div>
                </div>
                    `
                }
                $('.content-list').html(str);
                $(".add-to-card").on("click", function (event) {
                    event.preventDefault();
                    console.log("aa");
                })

            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", error);
                console.log("XHR:", xhr);
                console.log("Status:", status);
            }
        })
    })
    // $(".col_tl").on("click", function (event) {
    //     var href = $(this).find("a").attr("href");
    //     var id_tl = $(".category .active").data('tl');
    //     var id_dm = $(".content-list").data('dm');
    //     data = { id_tl: id_tl, id_dm: id_dm };
    //     $.ajax({
    //         url: "collections",
    //         method: "POST",
    //         data: data,
    //         success: function () {
    //             // Không làm gì với response
    //             console.log('Request sent successfully!');

    //         },
    //         error: function (xhr, status, error) {
    //             console.log('Error:', error);
    //         }
    //     });
    // })
    $(".col_tl").each(function (index) {

        if ($(this).data("tl") !== 0) {
            const text = $(this).find("a").html();           // Lấy nội dung trong thẻ <a>
            const slug = toSlug(text);
            $(this).find("a").attr('href', 'collections/' + slug + "-" + $(this).data("tl"));
        }
    })

})
function toSlug(str) {
    return str
        .normalize('NFD')                // Tách dấu
        .replace(/[\u0300-\u036f]/g, '') // Xóa dấu
        .replace(/đ/g, 'd')              // Chuyển đ -> d
        .replace(/Đ/g, 'D')
        .toLowerCase()                   // Chuyển về chữ thường
        .replace(/[^a-z0-9\s-]/g, '')    // Xóa ký tự đặc biệt
        .trim()                          // Xóa khoảng trắng đầu/cuối
        .replace(/\s+/g, '-')            // Thay khoảng trắng bằng dấu gạch ngang
}

$(document).ready(function () {

    $(".col_tl").removeClass("active");
    var currentURL = window.location.href;
    currentURL = currentURL.split("/");
    const nametl = currentURL.filter(Boolean).pop();
    $('a[href="collections/' + nametl + '"]').parent().addClass('active');
    console.log(nametl);
    $(".page a").removeClass("active");
    const urlParams = new URLSearchParams(window.location.search);
    const page = urlParams.get('page') || 1;
    const id_tl = $(".category .active").data('tl');
    const id_dm = $(".content-list").data('dm');
    data = { page: page, id_tl: id_tl, id_dm: id_dm };
    $('.page a').filter(function () {
        return $(this).html().trim() == page;
    }).addClass('active');


    $.ajax({
        url: "collections/pagination",
        method: "POST",
        data: data,
        dataType: "json",
        success: function (data) {
            console.log(data);
            var str = '';
            for (let product of data) {
                let slug = product.slug;
                let detailUrl = `product/detail/${slug}-${product.ID_Sach}`;
                let GiaGiam = Number(product['Gia_Ban']) * (1 - Number(product["GiamGia(%)"]) / 100);
                let GiaGoc = Number(product['Gia_Ban']);
                GiaGiam = GiaGiam.toLocaleString('vi-VN') + "đ";
                GiaGoc = GiaGoc.toLocaleString('vi-VN') + "đ";
                str += `
                    <div class="item-product col-4">
                    <div class="chir_loop">
                        <div class="chir_img">
                            <a href="${detailUrl}">
                                <img src="media/img_product/${product['Images']}" alt="">
                            </a>
                            <div class="insActionloop">
                            <a href="${detailUrl}">
                                    <img src="media/logo-banner/eye.png" alt="">
                                </a>
                                <a href="#" class="add-to-card" id=${product.ID_Sach}>
                                    <img src="media/logo-banner/cart.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="chir_content">
                            <h3>
                                <a href="#">
                                    ${product['Ten_Sach']}
                                </a>
                            </h3>
                            <p class="pro-price">
                                <del>' ${GiaGoc}</del>
                                ${GiaGiam} <span class="sale-price">
                                    <span>-${product['GiamGia(%)']}%</span>
                                </span>
                            </p>

                        </div>
                    </div>
                </div>
                    `
            }
            $('.content-list').html(str);
            $(".add-to-card").on("click", function (event) {
                event.preventDefault();
                $.ajax({
                    url: "cart/add",
                    method: "POST",
                    data: { id: $(this).attr("id"), quantity: 1 },
                    dataType: "json",
                    success: function (data) {
                        if (data == true) {
                            toast({ title: 'SUCCESS', message: 'Thêm vào giỏ hàng thành công!', type: 'success', duration: 3000 });
                        }
                        else {
                            toast({ title: 'WARNING', message: 'Vui lòng đăng nhập để tiếp tục!', type: 'warning', duration: 3000 });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX Error:", error);
                        console.log("XHR:", xhr);
                        console.log("Status:", status);
                    }
                })
            })

        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", error);
            console.log("XHR:", xhr);
            console.log("Status:", status);
        }
    })

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