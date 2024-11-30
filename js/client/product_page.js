let productsPerPage = 12; 
let currentLoaded = 0;
let allProducts = [];
let filteredProducts = []; 

// Lấy danh sách sản phẩm từ HTML
function loadProducts() {
    const productElements = document.querySelectorAll('.product');
    allProducts = Array.from(productElements).map(product => ({
        element: product,
        size: product.dataset.size.split(','), 
        color: product.dataset.color,
        category: product.dataset.category,
        price: parseInt(product.dataset.price), 
    }));

 
    filteredProducts = [...allProducts];


    allProducts.forEach(product => {
        product.element.style.display = 'none';
    });
}


function displayMoreProducts() {
    const startIndex = currentLoaded;
    const endIndex = currentLoaded + productsPerPage;

   
    filteredProducts.slice(startIndex, endIndex).forEach(product => {
        product.element.style.display = 'block'; 
        setTimeout(() => {
            product.element.style.opacity = '1'; 
            product.element.style.transform = 'translateY(0)'; 
        }, 50); 
    });

    currentLoaded = endIndex; 

    
    if (currentLoaded >= filteredProducts.length) {
        window.removeEventListener('scroll', handleScroll);
    }
}

// Xử lý sự kiện cuộn chuột
function handleScroll() {
    const scrollable = document.documentElement.scrollHeight - window.innerHeight;
    const scrolled = window.scrollY;

    
    if (scrolled >= scrollable - 100) {
        displayMoreProducts();
    }
}

// Lọc sản phẩm
function filterProducts() {
    const sizeFilters = Array.from(document.querySelectorAll('input[type="checkbox"]:checked')).map(cb => cb.id.replace('size-', ''));
    const selectedColor = document.querySelector('.color-box.selected')?.dataset.color || '';
    const selectedPrice = document.querySelector('input[name="price"]:checked')?.id || '';
    const selectedCategory = document.querySelector('input[name="category"]:checked')?.value || '';

    // Lọc sản phẩm dựa trên các tiêu chí
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

    // Reset hiển thị sau khi lọc
    currentLoaded = 0;
    allProducts.forEach(product => {
        product.element.style.display = 'none'; 
    });

    displayMoreProducts(); // Hiển thị sản phẩm đã lọc
    window.addEventListener('scroll', handleScroll); 
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

// Khởi tạo
document.addEventListener('DOMContentLoaded', () => {
    loadProducts(); // Lấy danh sách sản phẩm

    // Hiển thị 12 sản phẩm đầu tiên
    displayMoreProducts();

    // Lắng nghe sự kiện cuộn chuột để tải thêm sản phẩm
    window.addEventListener('scroll', handleScroll);

    // Gắn sự kiện lọc
    setupFilters();
});

function setGrid(columns) {
    const productGrid = document.getElementById('product-grid');
    productGrid.className = `row row-cols-1 row-cols-sm-2 row-cols-md-${columns} g-4`; // Thay đổi số cột
}

document.getElementById('grid-3').addEventListener('click', () => setGrid(3));
document.getElementById('grid-4').addEventListener('click', () => setGrid(4));
