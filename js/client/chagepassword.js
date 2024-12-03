    document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector("form");
        const currentPassword = document.getElementById("current-password");
        const newPassword = document.getElementById("new-password");
        const confirmPassword = document.getElementById("confirm-password");

        form.addEventListener("submit", function (event) {
            // Xóa thông báo lỗi cũ
            document.querySelectorAll(".text-danger").forEach(el => el.remove());

            let isValid = true;

            // Kiểm tra mật khẩu hiện tại (không để trống)
            if (currentPassword.value.trim() === "") {
                displayError(currentPassword, "Mật khẩu hiện tại không được để trống.");
                isValid = false;
            }

            // Kiểm tra mật khẩu mới
            if (newPassword.value.trim().length < 8) {
                displayError(newPassword, "Mật khẩu mới phải có ít nhất 8 ký tự.");
                isValid = false;
            } else if (!/[A-Z]/.test(newPassword.value)) {
                displayError(newPassword, "Mật khẩu mới phải chứa ít nhất 1 ký tự viết hoa.");
                isValid = false;
            } else if (!/[0-9]/.test(newPassword.value)) {
                displayError(newPassword, "Mật khẩu mới phải chứa ít nhất 1 chữ số.");
                isValid = false;
            }

            // Kiểm tra xác nhận mật khẩu
            if (confirmPassword.value !== newPassword.value) {
                displayError(confirmPassword, "Xác nhận mật khẩu không khớp với mật khẩu mới.");
                isValid = false;
            }

            // Ngăn gửi form nếu không hợp lệ
            if (!isValid) {
                event.preventDefault();
            }
        });

        // Hàm hiển thị thông báo lỗi
        function displayError(input, message) {
            const error = document.createElement("div");
            error.className = "text-danger mt-1";
            error.innerText = message;
            input.parentElement.appendChild(error);
        }
    });
