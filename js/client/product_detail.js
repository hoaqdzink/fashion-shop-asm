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

function updateSize(sizeId, sizeName) {
    document.getElementById('selected_size_id').value = sizeId;
    document.getElementById('selected_size_name').value = sizeName;
}

document.addEventListener('DOMContentLoaded', function() {
    var selectedSize = document.querySelector('input[name="size"]:checked');
    if (selectedSize) {
        var sizeName = document.querySelector('label[for="size_' + selectedSize.value + '"]').textContent.trim();
        updateSize(selectedSize.value, sizeName);
    }
});
