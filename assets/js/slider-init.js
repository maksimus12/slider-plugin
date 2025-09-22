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
    
  
    
});