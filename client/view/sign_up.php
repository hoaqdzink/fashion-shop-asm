<div class="container-fluid">
    <div class="row signup-container">
        <!-- Decorative Image on the left -->
        <div class="col-md-6">
            <div class="decorative-image">
                <img src="./img/sign-up-page.png" class="img-fluid" />
            </div>
        </div>
        <!-- Sign up form on the right -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="signup-form w-100">
                <h2 class="text-center mb-4">Đăng ký</h2>
                <form id="signupForm" onsubmit="return validateForm()" action="index.php?act=register" method="post">
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" name="full_name" id="fullName" required>
                    </div>
                    <div class="mb-3">
                        <label for="dateOfBirth" class="form-label">Ngày sinh</label>
                        <input type="date" class="form-control" name="date_of_birth" id="dateOfBirth" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <input type="checkbox" onclick="togglePassword()"> Hiển thị mật khẩu
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Xác nhận mật khẩu</label>
                        <input type="password" class="form-control" id="confirmPassword" required>
                    </div>
                    <button type="submit" name="register" value="submit" class="btn btn-dark w-100">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>