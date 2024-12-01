<div class="container mb-5 pb-4">
    <div class="row login-container align-items-center justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="login-form">
                <h2 class="text-center mb-4">Đăng nhập</h2>
                <form id="loginForm" action="index.php?act=signin" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập đúng định dạng email
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" name="pass" class="form-control" id="password" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập mật khẩu.
                        </div>
                    </div>
                    <button type="submit" name="signin" value="submit" class="btn btn-dark w-100">Login</button>
                    <a href="forgot-password.html" style="color: black; text-decoration: none; display: block; text-align: center; margin-top: 10px;">Quên mật khẩu?</a>
                </form>
            </div>
        </div>
    </div>
</div>

