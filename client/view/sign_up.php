<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .signup-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .signup-form {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .decorative-image {
            background-image: url('https://source.unsplash.com/random/1200x800?nature');
            background-size: cover;
            background-position: center;
            margin: auto;
            min-height: 100%;
            width: 100%;
        }

        @media (max-width: 767px) {
            .decorative-image {
                display: none;
                /* Ẩn hình ảnh ở các màn hình nhỏ */
            }

            .signup-form {
                width: 90%;
                /* Tạo khoảng cách hợp lý khi màn hình nhỏ */
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row signup-container">
            <!-- Decorative Image on the left -->
            <div class="col-md-6">
                <div class="decorative-image">
                    <img src="../../img/sign-up-page.png" class="img-fluid" />
                </div>
            </div>
            <!-- Sign up form on the right -->
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="signup-form w-100">
                    <h2 class="text-center mb-4">Đăng ký</h2>
                    <form id="signupForm" onsubmit="return validateForm()">
                        <div class="mb-3">
                            <label for="fullName" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="fullName" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" required>
                            <input type="checkbox" onclick="togglePassword()"> Hiển thị mật khẩu
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Xác nhận mật khẩu</label>
                            <input type="password" class="form-control" id="confirmPassword" required>
                        </div>
                        <div class="mb-3">
                            <label for="dateOfBirth" class="form-label">Ngày sinh</label>
                            <input type="date" class="form-control" id="dateOfBirth" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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
    </script>
</body>

</html>