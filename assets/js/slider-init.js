// Urban Sliders Initialization

document.addEventListener('DOMContentLoaded', function() {
    // Initialize Team Slider
    if (document.querySelector('.teamSwiper')) {
        const teamSwiper = new Swiper('.teamSwiper', {
            effect: 'cards',
            cardsEffect: {
                perSlideOffset: 50,
                perSlideRotate: 2,
                rotate: false,
                slideShadows: true,
            },
            loop: true,
            navigation: {
                nextEl: '.nav-next-team',
                prevEl: '.nav-prev-team',
            }
        });
    }
    
    // Initialize Pricing Slider
    if (document.querySelector('.pricingSwiper')) {
        const pricingSwiper = new Swiper('.pricingSwiper', {
            slidesPerView: 'auto',
            centeredSlides: true,
            spaceBetween: 20,
            loop: false,
            grabCursor: true,
            breakpoints: {
                // Для мобильных устройств
                320: {
                    slidesPerView: 1.5,
                    spaceBetween: 10
                },
                // Для планшетов
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                // Для десктопов
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30
                }
            }
        });
    }
    
    // Initialize Burger Menu Slider
    if (document.querySelector('.burgerMenuSwiper')) {
        const burgerMenuSwiper = new Swiper('.burgerMenuSwiper', {
            direction: 'vertical',
            slidesPerView: 1,
            allowTouchMove: false, // Disable swiping
        });
        
        // Burger Menu functionality
        const burgerButton = document.querySelector('.burger-button');
        const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');
        const mobileMenuClose = document.querySelector('.mobile-menu-close');
        const menuLinks = document.querySelectorAll('.mobile-menu-nav a');
        
        if (burgerButton && mobileMenuOverlay) {
            // Open menu when burger is clicked
            burgerButton.addEventListener('click', function() {
                burgerButton.classList.toggle('active');
                mobileMenuOverlay.classList.toggle('active');
                document.body.style.overflow = 'hidden'; // Prevent body scrolling when menu is open
            });
            
            // Close menu when X is clicked
            if (mobileMenuClose) {
                mobileMenuClose.addEventListener('click', function() {
                    burgerButton.classList.remove('active');
                    mobileMenuOverlay.classList.remove('active');
                    document.body.style.overflow = '';
                });
            }
            
            // Close menu when clicking outside or on menu links
            document.addEventListener('click', function(e) {
                if (mobileMenuOverlay.classList.contains('active') &&
                    !e.target.closest('.mobile-menu-container') &&
                    !e.target.closest('.burger-button')) {
                    burgerButton.classList.remove('active');
                    mobileMenuOverlay.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });
            
            // Handle menu links clicks
            if (menuLinks.length > 0) {
                menuLinks.forEach(function(link) {
                    link.addEventListener('click', function() {
                        burgerButton.classList.remove('active');
                        mobileMenuOverlay.classList.remove('active');
                        document.body.style.overflow = '';
                        // Allow the navigation to happen
                        setTimeout(function() {
                            window.location.href = link.getAttribute('href');
                        }, 300);
                    });
                });
            }
        }
    }
    
});