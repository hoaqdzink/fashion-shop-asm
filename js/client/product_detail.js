const quantityInput = document.getElementById('quantity-cart');
const hiddenQuantity = document.getElementById('hidden_quantity');
const increaseButton = document.getElementById('increase');
const decreaseButton = document.getElementById('decrease');

increaseButton?.addEventListener('click', function() {
    let quantity = parseInt(quantityInput.value);
    quantity++;
    quantityInput.value = quantity;
    hiddenQuantity.value = quantity; 
});

decreaseButton?.addEventListener('click', function() {
    let quantity = parseInt(quantityInput.value);
    if (quantity > 1) {
        quantity--;
        quantityInput.value = quantity;
        hiddenQuantity.value = quantity;
    }
});