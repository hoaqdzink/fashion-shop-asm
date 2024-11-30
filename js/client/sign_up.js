function validateForm() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;

    if (password !== confirmPassword) {
        alert("Mật khẩu và xác nhận mật khẩu không khớp!");
        return false; // Ngừng form submit
    }
    return true; // Cho phép form submit
}

// Hàm hiển thị/ẩn mật khẩu
function togglePassword() {
    var passwordField = document.getElementById("password");
    var confirmPasswordField = document.getElementById("confirmPassword");
    if (passwordField.type === "password") {
        passwordField.type = "text";
        confirmPasswordField.type = "text"; // Hiển thị xác nhận mật khẩu
    } else {
        passwordField.type = "password";
        confirmPasswordField.type = "password"; // Ẩn xác nhận mật khẩu
    }
}