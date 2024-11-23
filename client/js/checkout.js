// Form validation
document.querySelector('.pay-now-btn').addEventListener('click', function(e) {
    e.preventDefault();
    const requiredFields = document.querySelectorAll('input[required], select[required]');
    let isValid = true;

    requiredFields.forEach(field => {
        if (!field.value) {
            field.style.borderColor = '#ff0000';
            isValid = false;
        } else {
            field.style.borderColor = '#ddd';
        }
    });

    if (isValid) {
        alert('Order placed successfully!');
    } else {
        alert('Please fill in all required fields.');
    }
});

// Discount code application
document.querySelector('.apply-btn').addEventListener('click', function() {
    const discountInput = document.querySelector('.discount-code input');
    if (discountInput.value) {
        alert('Discount code applied!');
        discountInput.value = '';
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const emailInput = document.getElementById('email-input');
    const emailError = document.getElementById('email-error');

    function validateEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    emailInput.addEventListener('input', function() {
        if (!validateEmail(this.value)) {
            emailError.textContent = 'Please enter a valid email address';
            emailError.classList.remove('hidden');
            this.classList.add('invalid');
        } else {
            emailError.classList.add('hidden');
            this.classList.remove('invalid');
        }
    });
});