var Validation = function () {
    this.kiemtraRong = function (value, selector) {
        if (value.trim() === '') {
            document.querySelector(selector).innerHTML = "Khong duoc de trong";
            document.querySelector(selector).style.dispaly = "block";
            return false;
        }
        document.querySelector(selector).style.display = "none";
        return true;

    }
    this.kiemtraSo = function (value, selector) {
        var regexnumber = /^[0-9]+$/;
        if (regexnumber.test(value)) {
            document.querySelector(selector).innerHTML = "";
            document.querySelector(selector).style.display = "none";
            return true;
        }
        document.querySelector(selector).innerHTML = "Tat ca ki tu phai la so";
        document.querySelector(selector).style.display = "block";
        return false;
    }
    this.kiemtraChuoi = function (value, selector, minlength, maxlength) {
        if (value.trim().length < minlength || value.trim().length > maxlength) {
            document.querySelector(selector).innerHTML = "Vui long nhap " + minlength + " den " + maxlength + " ky tu.";
            document.querySelector(selector).style.display = "block";
            return false;
        }
        document.querySelector(selector).style.display = "none";
        return true;
    }
    this.kiemtraGiaTri = function (value, selector, min, max) {
        if (Number(value) < min || Number(value) > max || value.trim() === '') {
            document.querySelector(selector).innerHTML = "Vui long nhap gia tri tu " + min + " den " + max;
            document.querySelector(selector).style.display = "block";
            return false;
        }
        document.querySelector(selector).style.display = "none";
        return true;
    }
    this.kiemtraChuoi = function (value, selector) {
        var regexletter = /^[A-Za-z]+$/;
        if (regexletter.test(value)) {
            document.querySelector(selector).style.display = "none";
            return true;
        }
        document.querySelector(selector).innerHTML = "Tat ca gia tri la chu";
        document.querySelector(selector).style.display = "block";
        return false;
    }
    this.kiemtraEmail= function(value,selector){
        var regexemail=/[^@]+@[^@]+\.[a-zA-Z]{2,6}/;
        if(regexemail.test(value)){
            document.querySelector(selector).style.display = "none";
            return true;
        }
        document.querySelector(selector).innerHTML = "Email khong hop le!";
        document.querySelector(selector).style.display = "block";
        return false;
    }
}