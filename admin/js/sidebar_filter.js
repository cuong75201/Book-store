
    document.addEventListener('DOMContentLoaded', () => {
        // Lấy tất cả các mục menu
        const menuItems = document.querySelectorAll('#sidebar-menu ul li a');
        
        // Lấy tên file hiện tại từ URL (ví dụ: "trangchu.html")
        const currentPage = window.location.pathname.split('/').pop() || 'trangchu.html'; // Mặc định là trang chủ nếu không có

        // Duyệt qua từng mục menu
        menuItems.forEach(item => {
            // So sánh href của mục với trang hiện tại
            const href = item.getAttribute('href');
            if (href === currentPage) {
                item.classList.add('active'); // Thêm class active cho mục khớp
            }

            // Gắn sự kiện click (tùy chọn, nếu muốn hiệu ứng tức thì trước khi chuyển trang)
            item.addEventListener('click', function() {
                menuItems.forEach(i => i.classList.remove('active')); // Xóa active khỏi các mục khác
                this.classList.add('active'); // Thêm active vào mục được nhấp
            });
        });
    });