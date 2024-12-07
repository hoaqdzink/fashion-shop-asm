function initializeNavigation() {
    const navToggle = document.querySelector('.nav-toggle');
    const nav = document.querySelector('.nav-menu');
    
    if (navToggle) {
        // Remove any existing event listeners
        navToggle.replaceWith(navToggle.cloneNode(true));
        const newNavToggle = document.querySelector('.nav-toggle');
        
        newNavToggle.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            document.body.classList.toggle('nav-open');
        });
    }

    // Đóng menu khi click vào link
    const menuLinks = document.querySelectorAll('.menu-list-item a');
    menuLinks.forEach(link => {
        link.addEventListener('click', () => {
            document.body.classList.remove('nav-open');
        });
    });
}

// Export the function
window.initializeNavigation = initializeNavigation; 