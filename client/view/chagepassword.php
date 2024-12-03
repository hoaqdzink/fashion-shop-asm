<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Đổi Mật Khẩu</h4>
                </div>
                <div class="card-body">
                    <form action="index.php?act=submit-change-password" method="POST">
                        <div class="mb-3">
                            <label for="current-password" class="form-label">Mật khẩu hiện tại</label>
                            <input type="password" class="form-control" id="current-password" name="currentPassword" required>
                        </div>
                        <div class="mb-3">
                            <label for="new-password" class="form-label">Mật khẩu mới</label>
                            <input type="password" class="form-control" id="new-password" name="newPassword" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm-password" class="form-label">Xác nhận mật khẩu mới</label>
                            <input type="password" class="form-control" id="confirm-password" name="confirmPassword" required>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" value="submit" name="submit-change-password" class="btn btn-dark w-50">Đổi mật khẩu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>