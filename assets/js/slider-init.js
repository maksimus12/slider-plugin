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
                    centeredSlides: false,
                    slidesPerView: 4,
                    spaceBetween: 17
                }
            }
        });
    }
    
    if (document.querySelector('.clientsSwiper')) {
        const clientsSwiper = new Swiper('.clientsSwiper', {
            effect: 'cards',
            grabCursor: true,
        });
    }
    
    // Pricing Modals and Accordions Functionality
    const modalOverlay = document.querySelector('.pricing-modal-overlay');
    const modals = document.querySelectorAll('.pricing-modal');
    const openModalButtons = document.querySelectorAll('.open-pricing-modal');
    const closeModalButtons = document.querySelectorAll('.pricing-modal-close');
    const accordions = document.querySelectorAll('.pricing-accordion-header');
    const contactButtons = document.querySelectorAll('.modal-contact-btn');
    
    // Open modal when clicking on "DETALII" button
    if (openModalButtons.length > 0) {
        openModalButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const serviceId = this.getAttribute('data-service');
                const targetModal = document.getElementById(`modal-${serviceId}`);
                
                // Hide all modals first
                modals.forEach(modal => {
                    modal.classList.remove('active');
                });
                
                // Show the selected modal
                if (targetModal) {
                    modalOverlay.classList.add('active');
                    targetModal.classList.add('active');
                    document.body.classList.add('modal-open');
                }
            });
        });
    }
    
    // Close modal when clicking on close button or overlay
    if (closeModalButtons.length > 0) {
        closeModalButtons.forEach(button => {
            button.addEventListener('click', closeModal);
        });
    }
    
    // Close modal when clicking on overlay (outside modal)
    if (modalOverlay) {
        modalOverlay.addEventListener('click', function(e) {
            if (e.target === modalOverlay) {
                closeModal();
            }
        });
    }
    
    // Toggle accordion content when clicking on accordion header
    if (accordions.length > 0) {
        accordions.forEach(header => {
            header.addEventListener('click', function() {
                const parent = this.parentElement;
                const isActive = parent.classList.contains('active');
                
                // Close all other accordions in the same group
                const siblings = parent.parentElement.querySelectorAll('.pricing-accordion');
                siblings.forEach(sibling => {
                    sibling.classList.remove('active');
                });
                
                // Toggle active state for clicked accordion
                if (!isActive) {
                    parent.classList.add('active');
                }
            });
        });
    }
    
    // Close modal and scroll to contact section when clicking contact button
    if (contactButtons.length > 0) {
        contactButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                closeModal();
                
                // Scroll to contact section with smooth animation
                const contactSection = document.getElementById('contact');
                if (contactSection) {
                    setTimeout(() => {
                        contactSection.scrollIntoView({ 
                            behavior: 'smooth' 
                        });
                    }, 300);
                }
            });
        });
    }
    
    // Function to close modal
    function closeModal() {
        modalOverlay.classList.remove('active');
        modals.forEach(modal => {
            modal.classList.remove('active');
        });
        document.body.classList.remove('modal-open');
    }
    
    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modalOverlay.classList.contains('active')) {
            closeModal();
        }
    });
});