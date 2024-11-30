const usersPerPage = 10; // Số người dùng trên mỗi trang
let currentPage = 1; // Trang hiện tại
let rows = []; // Các hàng trong bảng

// Lấy danh sách hàng từ bảng HTML
function loadUsers() {
    rows = Array.from(document.querySelectorAll('.tr-product-list'));

    // Ẩn tất cả các hàng ban đầu
    rows.forEach(row => {
        row.style.display = 'none';
    });

    // Hiển thị sản phẩm của trang đầu tiên
    displayUsers(currentPage);
    renderPagination();
}

// Hiển thị người dùng trên một trang
function displayUsers(page) {
    const startIndex = (page - 1) * usersPerPage;
    const endIndex = startIndex + usersPerPage;

    // Ẩn tất cả các hàng
    rows.forEach(row => {
        row.style.display = 'none';
    });

    // Hiển thị người dùng trong khoảng [startIndex, endIndex]
    rows.slice(startIndex, endIndex).forEach(row => {
        row.style.display = '';
    });
}

// Tạo nút phân trang
function renderPagination() {
    const totalUsers = rows.length;
    const totalPages = Math.ceil(totalUsers / usersPerPage);
    const pagination = document.getElementById('pagination');

    pagination.innerHTML = ''; // Xóa các nút phân trang cũ

    for (let i = 1; i <= totalPages; i++) {
        const button = document.createElement('button');
        button.textContent = i;
        button.className = 'pagination-button';
        if (i === currentPage) {
            button.classList.add('active');
        }

        // Thêm sự kiện chuyển trang
        button.addEventListener('click', () => {
            currentPage = i;
            displayUsers(currentPage);
            renderPagination();
        });

        pagination.appendChild(button);
    }
}

// Khởi tạo
document.addEventListener('DOMContentLoaded', () => {
    loadUsers();
});
