<nav class="navbar navbar-expand px-3 border-bottom">
    <button class="btn" id="sidebar-toggle" type="button">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse navbar">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                    <img src="<?= isset($_SESSION['avatar']) && !empty($_SESSION['avatar']) ? htmlspecialchars($_SESSION['avatar'], ENT_QUOTES, 'UTF-8') : '../img/profile.jpg'; ?>" class="avatar img-fluid rounded" alt="">
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="../index.php" class="dropdown-item">Thông tin cá nhân</a>
                    <a href="../index.php?act=profile" class="dropdown-item">Đổi mật khẩu</a>
                    <a href="../index.php?act=logout" class="dropdown-item">Đăng xuất</a>
                </div>
            </li>
        </ul>
    </div>
</nav>