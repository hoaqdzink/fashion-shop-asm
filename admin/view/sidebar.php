<aside id="sidebar" class="js-sidebar">
    <!-- Content For Sidebar -->
    <div class="h-100">
        <div class="sidebar-logo">
            <a href="index.php">FashionBK</a>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Quản lý FashionBK
            </li>
            <li class="sidebar-item">
                <a href="index.php?act=statistical" class="sidebar-link">
                    <i class="fa-solid fa-list pe-2"></i>
                    Thống kê các sản phẩm
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse"
                    aria-expanded="false"><i class="fa-solid fa-file-lines pe-2"></i>
                    Quản lý sản phẩm
                </a>
                <ul id="pages" class="sidebar-dropdown collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="index.php?act=update_product" class="sidebar-link">Cập nhật sản phẩm</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="index.php?act=list_product" class="sidebar-link">Danh sách các sản phẩm</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse"
                    aria-expanded="false"><i class="fa-solid fa-sliders pe-2"></i>
                    Quản lý danh mục và size
                </a>
                <ul id="posts" class="sidebar-dropdown collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="index.php?act=list_size" class="sidebar-link">Danh sách size sản phẩm</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="index.php?act=list_category" class="sidebar-link">Danh sách các danh mục</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#auth" data-bs-toggle="collapse"
                    aria-expanded="false"><i class="fa-regular fa-user pe-2"></i>
                    Quản lý tài khoản
                </a>
                <ul id="auth" class="sidebar-dropdown collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="index.php?act=list_role" class="sidebar-link">Danh sách vai trò</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="index.php?act=list_account" class="sidebar-link">Danh sách các tài khoản</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-header">
                Thông tin các đơn hàng
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#multi" data-bs-toggle="collapse"
                    aria-expanded="false"><i class="fa-solid fa-share-nodes pe-2"></i>
                    Thông tin các đơn hàng
                </a>
                <ul id="multi" class="sidebar-dropdown collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#level-1"
                            data-bs-toggle="collapse" aria-expanded="false">Đơn hàng chờ duyệt</a>
                        <ul id="level-1" class="sidebar-dropdown collapse">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Đơn hàng đang giao</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Đơn hàng đã được giao</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>