document.addEventListener('DOMContentLoaded', () => {
    // Xử lý nút giỏ hàng trong danh sách sản phẩm
    document.querySelectorAll('.insActionloop a img[alt="Add to Cart"]').forEach(cartIcon => {
        cartIcon.parentElement.addEventListener('click', async (e) => {
            e.preventDefault(); // Ngăn redirect mặc định
            console.log('Nút giỏ hàng được click:', cartIcon.parentElement);

            // Lấy book_id từ parent element
            const productItem = cartIcon.closest('.item-product');
            const bookId = productItem.dataset.bookId || productItem.querySelector('input[name="book_id"]')?.value;
            const quantity = 1; // Mặc định 1, có thể lấy từ input nếu có

            if (!bookId) {
                console.error('Không tìm thấy book_id');
                showNotification('error', 'Không tìm thấy sản phẩm.');
                return;
            }

            console.log('Thêm vào giỏ hàng:', { bookId, quantity });

            try {
                const response = await fetch('/Book_store/cart/add', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        book_id: bookId,
                        quantity: quantity,
                    }),
                });

                const data = await response.json();
                console.log('Phản hồi từ server:', data);

                if (data.success) {
                    showNotification('success', 'Thêm vào giỏ hàng thành công!');
                    // Có thể cập nhật số lượng giỏ hàng trên UI
                } else {
                    console.error('Lỗi từ server:', data.message);
                    showNotification('error', data.message || 'Thêm vào giỏ hàng thất bại.');
                }
            } catch (error) {
                console.error('Lỗi fetch:', error);
                showNotification('error', 'Lỗi kết nối server. Vui lòng thử lại.');
            }
        });
    });

    // Hàm hiển thị thông báo (tái sử dụng từ script.js)
    function showNotification(type, message) {
        if (typeof toastr !== 'undefined') {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                positionClass: 'toast-top-right',
                timeOut: 3000,
            };
            if (type === 'success') {
                toastr.success(message);
            } else {
                toastr.error(message);
            }
        } else {
            alert(message);
        }
    }
});