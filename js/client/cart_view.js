document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".quantity-btn-cart");

    buttons.forEach(button => {
        button.addEventListener("click", function (e) {
            e.preventDefault(); // Ngăn chặn hành động mặc định

            const productId = this.dataset.productId;
            const action = this.dataset.action;

            // Gửi yêu cầu AJAX
            fetch(`${BASE_URL}/client/service/cartService.php`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: new URLSearchParams({
                    product_id: productId,
                    action: action,
                    update_quantity: true
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Cập nhật số lượng hiển thị trên giao diện
                    const quantitySpan = document.getElementById(`quantity-${productId}`);
                    quantitySpan.textContent = data.new_quantity;
                    
                    const totalAmountSpan = document.getElementById(`totalAmount-${productId}`);
                    totalAmountSpan.textContent = data.new_total;
                } else {
                    console.error("Cập nhật số lượng thất bại:", data.message);
                }
            })
            .catch(error => console.error("Lỗi:", error));
        });
    });
});
