document.addEventListener('DOMContentLoaded', () => {
    const sizes = ['S', 'M', 'L', 'XL'];
    const colors = ['red', 'orange', 'yellow', 'green', 'blue', 'purple', 'pink'];
    const priceRanges = [
        '$0-$50',
        '$50-$100',
        '$100-$150',
        '$150-$200',
        '$200-$400'
    ];
    const brands = ['Minimog', 'ReRolle Brock', 'Leorts', 'Vegabond', 'Abby'];
    const collections = ['All products', 'Best sellers', 'New arrivals', 'Accessories'];
    const tags = ['Fashion', 'Help', 'Sandal', 'Belt', 'Bags', 'Sneaker', 'Denim', 'Minimog', 'Vagabond', 'Sunglasses', 'Beachwear'];

    const products = [
        {
            id: 1,
            name: 'Rounded Red Hat',
            price: 58.00,
            colors: ['red', 'black'],
            image: '/placeholder.svg?height=400&width=300',
        },
        {
            id: 2,
            name: 'Linen-blend Shirt',
            price: 17.00,
            colors: ['gray', 'pink'],
            image: '/placeholder.svg?height=400&width=300',
        },
        {
            id: 3,
            name: 'Long-sleeve Coat',
            price: 106.00,
            colors: ['white', 'mint'],
            image: '/placeholder.svg?height=400&width=300',
        },
    ];

    let selectedSize = [];
    let selectedColors = [];
    let selectedPriceRange = [];
    let currentPage = 1;
    let gridView = 'grid';
    let selectedTags = [];

    function renderSizes() {
        const sizeFilter = document.getElementById('size-filter');
        sizeFilter.innerHTML = sizes.map(size => `
            <label class="border rounded-md p-2 text-center cursor-pointer ${selectedSize.includes(size) ? 'bg-black text-white' : ''}">
                <input type="checkbox" class="hidden" value="${size}" ${selectedSize.includes(size) ? 'checked' : ''}>
                ${size}
            </label>
        `).join('');

        sizeFilter.addEventListener('change', (e) => {
            const size = e.target.value;
            if (e.target.checked) {
                selectedSize.push(size);
            } else {
                selectedSize = selectedSize.filter(s => s !== size);
            }
            renderSizes();
        });
    }

    function renderColors() {
        const colorFilter = document.getElementById('color-filter');
        colorFilter.innerHTML = colors.map(color => `
            <button class="w-6 h-6 rounded-full border ${selectedColors.includes(color) ? 'ring-2 ring-primary ring-offset-2' : ''}"
                    style="background-color: ${color};"
                    data-color="${color}">
            </button>
        `).join('');

        colorFilter.addEventListener('click', (e) => {
            if (e.target.dataset.color) {
                const color = e.target.dataset.color;
                if (selectedColors.includes(color)) {
                    selectedColors = selectedColors.filter(c => c !== color);
                } else {
                    selectedColors.push(color);
                }
                renderColors();
            }
        });
    }

    function renderPriceRanges() {
        const priceFilter = document.getElementById('price-filter');
        priceFilter.innerHTML = priceRanges.map(range => `
            <label class="flex items-center space-x-2 cursor-pointer">
                <input type="checkbox" class="form-checkbox" value="${range}" ${selectedPriceRange.includes(range) ? 'checked' : ''}>
                <span>${range}</span>
            </label>
        `).join('');

        priceFilter.addEventListener('change', (e) => {
            const range = e.target.value;
            if (e.target.checked) {
                selectedPriceRange.push(range);
            } else {
                selectedPriceRange = selectedPriceRange.filter(r => r !== range);
            }
        });
    }

    function renderBrands() {
        const brandFilter = document.getElementById('brand-filter');
        brandFilter.innerHTML = brands.map(brand => `
            <label class="flex items-center space-x-2 cursor-pointer">
                <input type="checkbox" class="form-checkbox" value="${brand}">
                <span>${brand}</span>
            </label>
        `).join('');
    }

    function renderCollections() {
        const collectionFilter = document.getElementById('collection-filter');
        collectionFilter.innerHTML = collections.map(collection => `
            <label class="flex items-center space-x-2 cursor-pointer">
                <input type="checkbox" class="form-checkbox" value="${collection}">
                <span>${collection}</span>
            </label>
        `).join('');
    }

    function renderTags() {
        const tagFilter = document.getElementById('tag-filter');
        tagFilter.innerHTML = tags.map(tag => `
            <button class="btn-outline rounded-md px-3 py-1 ${selectedTags.includes(tag) ? 'bg-black text-white' : ''}">${tag}</button>
        `).join('');

        tagFilter.addEventListener('click', (e) => {
            if (e.target.tagName === 'BUTTON') {
                const tag = e.target.textContent;
                if (selectedTags.includes(tag)) {
                    selectedTags = selectedTags.filter(t => t !== tag);
                } else {
                    selectedTags.push(tag);
                }
                renderTags();
            }
        });
    }

    function renderProducts() {
        const productGrid = document.getElementById('product-grid');
        productGrid.className = `grid ${gridView === 'grid' ? 'md:grid-cols-3' : 'md:grid-cols-2'} gap-6`;
        productGrid.innerHTML = products.map(product => `
            <div class="group">
                <div class="relative aspect-[3/4] mb-4">
                    <img src="${product.image}" alt="${product.name}" class="rounded-lg object-cover w-full h-full">
                </div>
                <h3 class="font-medium">${product.name}</h3>
                <div class="flex items-center justify-between mt-2">
                    <span class="text-lg font-bold">$${product.price.toFixed(2)}</span>
                    <div class="flex space-x-1">
                        ${product.colors.map(color => `
                            <div class="w-4 h-4 rounded-full border" style="background-color: ${color};"></div>
                        `).join('')}
                    </div>
                </div>
            </div>
        `).join('');
    }

    function renderPagination() {
        const pagination = document.getElementById('pagination');
        pagination.innerHTML = [1, 2, 3, '...'].map((page, index) => `
            <button class="${currentPage === page ? '' : 'outline'}" ${page === '...' ? 'disabled' : ''} data-page="${page}">
                ${page}
            </button>
        `).join('');

        pagination.addEventListener('click', (e) => {
            if (e.target.dataset.page && e.target.dataset.page !== '...') {
                currentPage = Number(e.target.dataset.page);
                renderPagination();
            }
        });
    }

    function setupCollapsibles() {
        const collapsibles = document.querySelectorAll('.collapsible');
        collapsibles.forEach(collapsible => {
            const trigger = collapsible.querySelector('.collapsible-trigger');
            const content = collapsible.querySelector('.collapsible-content');
            trigger.addEventListener('click', () => {
                content.classList.toggle('open');
            });
        });
    }

    function setupGridViewToggle() {
        const gridViewBtn = document.getElementById('grid-view');
        const compactViewBtn = document.getElementById('compact-view');

        gridViewBtn.addEventListener('click', () => {
            gridView = 'grid';
            gridViewBtn.classList.add('active');
            compactViewBtn.classList.remove('active');
            renderProducts();
        });

        compactViewBtn.addEventListener('click', () => {
            gridView = 'compact';
            compactViewBtn.classList.add('active');
            gridViewBtn.classList.remove('active');
            renderProducts();
        });
    }

    renderSizes();
    renderColors();
    renderPriceRanges();
    renderBrands();
    renderCollections();
    renderTags();
    renderProducts();
    renderPagination();
    setupCollapsibles();
    setupGridViewToggle();
});