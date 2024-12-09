document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".quantity-btn-cart");

    buttons.forEach(button => {
        button.addEventListener("click", function (e) {
            e.preventDefault(); // Ngăn chặn hành động mặc định

            const cartId = this.dataset.cartId;
            const action = this.dataset.action;

            // Gửi yêu cầu AJAX
            fetch(`${BASE_URL}/client/service/cartService.php`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: new URLSearchParams({
                    cart_id: cartId,
                    action: action,
                    update_quantity: true
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if(action == 'increase' || action == 'decrease'){
                        const quantitySpan = document.getElementById(`quantity-${cartId}`);
                        quantitySpan.textContent = data.new_quantity;
                        
                        const totalAmountSpan = document.getElementById(`totalAmount-${cartId}`);
                        totalAmountSpan.textContent = data.new_total;
                    }
                    else{
                        const cartRow = document.getElementById(`cart-id-${cartId}`);
                        cartRow.remove();
                    }
                } else {
                    console.error("Cập nhật số lượng thất bại:", data.message);
                }
            })
            .catch(error => console.error("Lỗi:", error));
        });
    });
});
