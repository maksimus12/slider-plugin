// Burger Menu Functionality
document.addEventListener('DOMContentLoaded', function() {
    // Get burger menu elements
    const burgerButton = document.querySelector('.burger-button');
    const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');
    const mobileMenuClose = document.querySelector('.mobile-menu-close');
    const menuLinks = document.querySelectorAll('.mobile-menu-nav a');
    
    // Only proceed if burger button and menu overlay exist
    if (!burgerButton || !mobileMenuOverlay) return;
    
    console.log('Burger menu elements found and event listeners attached');
    
    // Toggle menu on burger button click
    burgerButton.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        console.log('Burger button clicked');
        burgerButton.classList.toggle('active');
        mobileMenuOverlay.classList.toggle('active');
        document.body.style.overflow = mobileMenuOverlay.classList.contains('active') ? 'hidden' : '';
    });
    
    // Close menu when X is clicked
    if (mobileMenuClose) {
        mobileMenuClose.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            console.log('Close button clicked');
            burgerButton.classList.remove('active');
            mobileMenuOverlay.classList.remove('active');
            document.body.style.overflow = '';
        });
    }
    
    // Close menu when clicking on menu links
    if (menuLinks.length > 0) {
        menuLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                console.log('Menu link clicked');
                burgerButton.classList.remove('active');
                mobileMenuOverlay.classList.remove('active');
                document.body.style.overflow = '';
            });
        });
    }
    
    // Close menu when clicking outside
    document.addEventListener('click', function(e) {
        if (mobileMenuOverlay.classList.contains('active') &&
            !e.target.closest('.mobile-menu-container') &&
            !e.target.closest('.burger-button')) {
            console.log('Clicked outside menu');
            burgerButton.classList.remove('active');
            mobileMenuOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }
    });
});