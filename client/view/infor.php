<div class="container mt-5">
    <h2 class="text-center mb-4">Chỉnh sửa tài khoản</h2>
    <div class="user-form">
        <form action="index.php?act=account_update" method="post" enctype="multipart/form-data">
            <div class="row">
                <!-- Email -->
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="hidden" name="user_id" value="<?= htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8') ?>">
                    <input type="hidden" name="password" value="<?=$user['password']?>" class="form-control" id="password" placeholder="*********">
                    <input type="email" name="email" value="<?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?>" class="form-control" id="email" placeholder="Nhập Email" required>
                </div>
                <!-- Full Name -->
                <div class="col-md-6 mb-3">
                    <label for="fullName" class="form-label">Họ và Tên</label>
                    <input type="text" class="form-control" value="<?= htmlspecialchars($user['full_name'], ENT_QUOTES, 'UTF-8') ?>" name="full_name" id="fullName" placeholder="Nhập Họ và Tên" required>
                </div>
            </div>
            <div class="row">
                <!-- Date of Birth -->
                <div class="col-md-6 mb-3">
                    <label for="dateOfBirth" class="form-label">Ngày sinh</label>
                    <input type="date" class="form-control" id="dateOfBirth" name="date_of_birth" value="<?= htmlspecialchars($user['date_of_birth'], ENT_QUOTES, 'UTF-8') ?>" required>
                </div>
                <!-- Avatar Upload -->
                <div class="col-md-6 mb-3">
                    <label for="avatar" class="form-label">Tải lên ảnh đại diện</label>
                    <input type="file" name="avatar" class="form-control" id="avatar" accept="image/*">
                </div>
            </div>
            <div class="row">
                <!-- Avatar Preview -->
                <div class="col-md-12 mb-3 text-center">
                    <label for="avatarPreview" class="form-label">Xem trước ảnh đại diện</label>
                    <div id="avatarPreview" style="width: 200px; height: 200px; margin: auto; border: 1px solid #ccc; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                        <img src="<?= isset($user['avatar']) && !empty($user['avatar']) ? htmlspecialchars($user['avatar'], ENT_QUOTES, 'UTF-8') : '../img/default_avatar.png' ?>" alt="avatar" id="previewImage" style="max-width: 100%; max-height: 100%;">
                    </div>
                </div>
            </div>
            <!-- Submit Button -->
            <div class="text-center mt-3">
                <button type="submit" name="account_update" value="submit" class="btn btn-dark">Sửa</button>
            </div>
        </form>
    </div>
</div>