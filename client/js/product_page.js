// Size selector
const sizeButtons = document.querySelectorAll('.size-btn');
sizeButtons.forEach(button => {
    button.classList.add('hover:bg-inherit', 'hover:text-inherit');
    
    button.addEventListener('click', () => {
        // First remove all special styling from all buttons
        sizeButtons.forEach(btn => {
            btn.classList.remove('bg-gray-900', 'text-white');
            btn.classList.add('bg-white', 'text-gray-900');
        });
        // Then add the selected styling to the clicked button
        button.classList.remove('bg-white', 'text-gray-900');
        button.classList.add('bg-gray-900', 'text-white');
    });
});

// Color selector
const colorButtons = document.querySelectorAll('.color-btn');
colorButtons.forEach(button => {
    button.addEventListener('click', () => {
        colorButtons.forEach(btn => btn.classList.remove('ring-2', 'ring-gray-900'));
        button.classList.add('ring-2', 'ring-gray-900');
    });
});

// Quantity selector
const quantityEl = document.getElementById('quantity');
const decreaseBtn = document.getElementById('decrease-quantity');
const increaseBtn = document.getElementById('increase-quantity');

decreaseBtn.addEventListener('click', () => {
    const current = parseInt(quantityEl.textContent);
    if (current > 1) quantityEl.textContent = current - 1;
});

increaseBtn.addEventListener('click', () => {
    const current = parseInt(quantityEl.textContent);
    if (current < 9) quantityEl.textContent = current + 1;
});

// Countdown timer
function updateTimer() {
    const timerEl = document.getElementById('timer');
    let [hours, minutes, seconds] = timerEl.textContent.split(':').map(Number);
    
    seconds--;
    if (seconds < 0) {
        seconds = 59;
        minutes--;
        if (minutes < 0) {
            minutes = 59;
            hours--;
            if (hours < 0) {
                timerEl.textContent = "SALE ENDED";
                return;
            }
        }
    }
    
    timerEl.textContent = `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
}

setInterval(updateTimer, 1000);

// Add to cart button
document.getElementById('add-to-cart').addEventListener('click', () => {
    const selectedSize = document.querySelector('.size-btn.bg-gray-900').dataset.size;
    const selectedColor = document.querySelector('.color-btn.ring-2').dataset.color;
    const quantity = document.getElementById('quantity').textContent;
    
    console.log(`Added to cart: ${quantity} Denim Jacket(s) - Size: ${selectedSize}, Color: ${selectedColor}`);
    // Here you would typically send this data to a cart management system or API
});


