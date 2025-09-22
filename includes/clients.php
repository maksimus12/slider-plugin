<?php
/**
 * Team Slider Shortcode
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

add_shortcode( 'clients_slider', function( $atts ) {
    // Подключаем скрипт инициализации
    wp_enqueue_script( 'urban-sliders-init' );
    
    // Массив участников команды
    $clients = [
            [
              'name' => 'mozza',
              'start' => 'https://test.paracletosmission.org/wp-content/uploads/2025/09/Mozza-Header-1.png',
              'current' => 'https://test.paracletosmission.org/wp-content/uploads/2025/09/Mozza-After-1.png',
              'grid' => 'https://test.paracletosmission.org/wp-content/uploads/2025/09/Mozza-InstGrid-1-1.png',
              'link' => '#'
            ],
            [
              'name' => 'mozza',
              'start' => 'https://test.paracletosmission.org/wp-content/uploads/2025/09/Mozza-Header-1.png',
              'current' => 'https://test.paracletosmission.org/wp-content/uploads/2025/09/Mozza-After-1.png',
              'grid' => 'https://test.paracletosmission.org/wp-content/uploads/2025/09/Mozza-InstGrid-1-1.png',
              'link' => '#'
            ],
            [
              'name' => 'mozza',
              'start' => 'https://test.paracletosmission.org/wp-content/uploads/2025/09/Mozza-Header-1.png',
              'current' => 'https://test.paracletosmission.org/wp-content/uploads/2025/09/Mozza-After-1.png',
              'grid' => 'https://test.paracletosmission.org/wp-content/uploads/2025/09/Mozza-InstGrid-1-1.png',
              'link' => '#'
            ],
            [
              'name' => 'mozza',
              'start' => 'https://test.paracletosmission.org/wp-content/uploads/2025/09/Mozza-Header-1.png',
              'current' => 'https://test.paracletosmission.org/wp-content/uploads/2025/09/Mozza-After-1.png',
              'grid' => 'https://test.paracletosmission.org/wp-content/uploads/2025/09/Mozza-InstGrid-1-1.png',
              'link' => '#'
            ],
            [
              'name' => 'mozza',
              'start' => 'https://test.paracletosmission.org/wp-content/uploads/2025/09/Mozza-Header-1.png',
              'current' => 'https://test.paracletosmission.org/wp-content/uploads/2025/09/Mozza-After-1.png',
              'grid' => 'https://test.paracletosmission.org/wp-content/uploads/2025/09/Mozza-InstGrid-1-1.png',
              'link' => '#'
            ],
            [
              'name' => 'mozza',
              'start' => 'https://test.paracletosmission.org/wp-content/uploads/2025/09/Mozza-Header-1.png',
              'current' => 'https://test.paracletosmission.org/wp-content/uploads/2025/09/Mozza-After-1.png',
              'grid' => 'https://test.paracletosmission.org/wp-content/uploads/2025/09/Mozza-InstGrid-1-1.png',
              'link' => '#'
            ],
            [
              'name' => 'mozza',
              'start' => 'https://test.paracletosmission.org/wp-content/uploads/2025/09/Mozza-Header-1.png',
              'current' => 'https://test.paracletosmission.org/wp-content/uploads/2025/09/Mozza-After-1.png',
              'grid' => 'https://test.paracletosmission.org/wp-content/uploads/2025/09/Mozza-InstGrid-1-1.png',
              'link' => '#'
            ],
            [
              'name' => 'mozza',
              'start' => 'https://test.paracletosmission.org/wp-content/uploads/2025/09/Mozza-Header-1.png',
              'current' => 'https://test.paracletosmission.org/wp-content/uploads/2025/09/Mozza-After-1.png',
              'grid' => 'https://test.paracletosmission.org/wp-content/uploads/2025/09/Mozza-InstGrid-1-1.png',
              'link' => '#'
            ],
            [
              'name' => 'mozza',
              'start' => 'https://test.paracletosmission.org/wp-content/uploads/2025/09/Mozza-Header-1.png',
              'current' => 'https://test.paracletosmission.org/wp-content/uploads/2025/09/Mozza-After-1.png',
              'grid' => 'https://test.paracletosmission.org/wp-content/uploads/2025/09/Mozza-InstGrid-1-1.png',
              'link' => '#'
            ],
    ];

    ob_start(); ?>
    <div class="swiper clientsSwiper">
        <div class="swiper-client-wrapper">
            <?php foreach($clients as $c): ?>
            <div class="swiper-client-slide">
                <img 
                    src="<?= $c['start'] ?>" 
                    alt="<?= esc_attr($c['name']) ?>" 
                    class="small-photo"
                    loading="lazy"
                />
                <img 
                    src="<?= $c['current'] ?>" 
                    alt="<?= esc_attr($c['name']) ?>" 
                    class="progress-photo"
                    loading="lazy"
                />
                <img 
                    src="<?= $c['grid'] ?>" 
                    alt="<?= esc_attr($c['name']) ?>" 
                    class="grid-photo"
                    loading="lazy"
                />
                <a href="#contact" class="pricing-button normal">
                    ÎNCEPE
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
} );