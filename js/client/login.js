document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    event.stopPropagation();
    
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
    let isValid = true;

    if (!emailRegex.test(emailInput.value)) {
        emailInput.classList.add('is-invalid');
        isValid = false;
    } else {
        emailInput.classList.remove('is-invalid');
    }

    if (passwordInput.value.trim() === '') {
        passwordInput.classList.add('is-invalid');
        isValid = false;
    } else {
        passwordInput.classList.remove('is-invalid');
    }

    if (isValid) {
        console.log('Form is valid. Email:', emailInput.value, 'Password:', passwordInput.value);
        alert('Login successful!');
    }
});