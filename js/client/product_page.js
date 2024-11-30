let productsPerPage = 12; // Số sản phẩm mỗi trang
let currentPage = 1; // Trang hiện tại
let allProducts = []; // Danh sách toàn bộ sản phẩm
let filteredProducts = []; // Danh sách sản phẩm đã lọc

// Lấy danh sách sản phẩm từ HTML
function loadProducts() {
    const productElements = document.querySelectorAll('.product');
    allProducts = Array.from(productElements).map(product => ({
        element: product,
        size: product.dataset.size.split(','), // Kích thước
        color: product.dataset.color, // Màu sắc
        category: product.dataset.category, // Danh mục
        price: parseInt(product.dataset.price), // Giá
    }));
}

// Hiển thị sản phẩm theo trang
function displayProducts(page = 1) {
    const startIndex = (page - 1) * productsPerPage;
    const endIndex = startIndex + productsPerPage;

    filteredProducts.forEach((product, index) => {
        if (index >= startIndex && index < endIndex) {
            product.element.style.display = 'block'; // Hiển thị sản phẩm trong phạm vi trang
        } else {
            product.element.style.display = 'none'; // Ẩn sản phẩm ngoài phạm vi trang
        }
    });

    renderPagination(page);
}

// Tạo nút phân trang
function renderPagination(currentPage) {
    const totalPages = Math.ceil(filteredProducts.length / productsPerPage);
    const pagination = document.getElementById('pagination');
    pagination.innerHTML = ''; // Xóa phân trang cũ

    // Nếu có nhiều hơn 1 trang, tạo nút phân trang
    if (totalPages > 1) {
        for (let i = 1; i <= totalPages; i++) {
            const li = document.createElement('li');
            li.classList.add('page-item', i === currentPage ? 'active' : '');
            li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
            li.addEventListener('click', () => {
                displayProducts(i); // Hiển thị trang mới
            });
            pagination.appendChild(li);
        }
    }
}


// Lọc sản phẩm
function filterProducts() {
    const sizeFilters = Array.from(document.querySelectorAll('input[type="checkbox"]:checked')).map(cb => cb.id.replace('size-', ''));
    const selectedColor = document.querySelector('.color-box.selected')?.dataset.color || '';
    const selectedPrice = document.querySelector('input[name="price"]:checked')?.id || '';
    const selectedCategory = document.querySelector('input[name="category"]:checked')?.value || '';

    // Lọc sản phẩm dựa trên các bộ lọc
    filteredProducts = allProducts.filter(product => {
        let matchesSize = sizeFilters.length === 0 || sizeFilters.some(size => product.size.includes(size));
        let matchesColor = !selectedColor || product.color === selectedColor;
        let matchesCategory = !selectedCategory || product.category === selectedCategory;

        let matchesPrice = true;
        if (selectedPrice) {
            const price = product.price;
            switch (selectedPrice) {
                case 'price1': // Dưới 500.000
                    matchesPrice = price < 500000;
                    break;
                case 'price2': // 500.000 - 1.000.000
                    matchesPrice = price >= 500000 && price <= 1000000;
                    break;
                case 'price3': // 1.000.000 - 3.000.000
                    matchesPrice = price > 1000000 && price <= 3000000;
                    break;
                case 'price4': // Trên 3.000.000
                    matchesPrice = price > 3000000;
                    break;
            }
        }

        return matchesSize && matchesColor && matchesPrice && matchesCategory;
    });

    // Sau khi lọc, hiển thị sản phẩm
    displayProducts(1); // Hiển thị trang đầu tiên
}
// Gắn sự kiện cho các bộ lọc
function setupFilters() {
    document.querySelectorAll('input[type="checkbox"], input[type="radio"]').forEach(input => {
        input.addEventListener('change', filterProducts);
    });

    document.querySelectorAll('.color-box').forEach(box => {
        box.addEventListener('click', function () {
            document.querySelectorAll('.color-box').forEach(b => b.classList.remove('selected'));
            this.classList.add('selected');
            filterProducts();
        });
    });
}

// Chuyển đổi số cột hiển thị sản phẩm
function setGrid(columns) {
    const productGrid = document.getElementById('product-grid');
    productGrid.className = `row row-cols-1 row-cols-sm-2 row-cols-md-${columns} g-4`;
}

// Khởi tạo
document.addEventListener('DOMContentLoaded', () => {
    loadProducts(); // Lấy danh sách sản phẩm
    filterProducts(); // Áp dụng bộ lọc ban đầu
    setupFilters(); // Gắn sự kiện lọc
    displayProducts(); // Hiển thị trang đầu tiên
    setGrid(3); // Mặc định hiển thị 3 cột
});
