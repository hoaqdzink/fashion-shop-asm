function updateQuantity(change) {
    const input = document.getElementById('quantity');
    let value = parseInt(input.value) + change;
    value = Math.max(1, value); // Ensure quantity doesn't go below 1
    input.value = value;
    updateTotal();
}

function updateTotal() {
    const quantity = parseInt(document.getElementById('quantity').value);
    const price = 14.90;
    const giftWrap = document.getElementById('gift-wrap').checked ? 10 : 0;
    const total = (quantity * price) + giftWrap;
    document.getElementById('subtotal-amount').textContent = `$${total.toFixed(2)}`;
}
