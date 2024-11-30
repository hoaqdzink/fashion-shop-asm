const productsPerPage = 10; 
let currentPage = 1; 
let totalProducts = 0; 
let rows = []; 

// Lấy danh sách sản phẩm từ bảng HTML
function loadProducts() {
    rows = Array.from(document.querySelectorAll('.tr-product-list'));
    totalProducts = rows.length;

    // Ẩn tất cả các hàng ban đầu
    rows.forEach(row => {
        row.style.display = 'none';
    });

    // Hiển thị sản phẩm của trang đầu tiên
    displayProducts(currentPage);
    renderPagination();
}

// Hiển thị sản phẩm trên một trang
function displayProducts(page) {
    const startIndex = (page - 1) * productsPerPage;
    const endIndex = startIndex + productsPerPage;

    // Ẩn tất cả các hàng
    rows.forEach(row => {
        row.style.display = 'none';
    });

    // Hiển thị sản phẩm trong khoảng [startIndex, endIndex]
    rows.slice(startIndex, endIndex).forEach(row => {
        row.style.display = '';
    });
}

// Tạo nút phân trang
function renderPagination() {
    const totalPages = Math.ceil(totalProducts / productsPerPage);
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
            displayProducts(currentPage);
            renderPagination();
        });

        pagination.appendChild(button);
    }
}

// Khởi tạo
document.addEventListener('DOMContentLoaded', () => {
    loadProducts();
});
