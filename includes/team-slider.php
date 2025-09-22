<?php
/**
 * Team Slider Shortcode
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

add_shortcode( 'team_slider', function( $atts ) {
    // Подключаем скрипт инициализации
    wp_enqueue_script( 'urban-sliders-init' );
    
    // Массив участников команды
    $members = [
        [
              'photo' => 'https://test.paracletosmission.org/wp-content/uploads/2025/06/TEAM-MATE5-1.jpg',
              'name'  => 'Brad Pitt',
              'role'  => 'Regizor, Co-Fondator',
            ],
            [
              'photo' => 'https://test.paracletosmission.org/wp-content/uploads/2025/06/TEAM-MATE3.jpg',
              'name'  => 'Piter Pan',
              'role'  => 'Promovare SMM',
            ],
            [
              'photo' => 'https://test.paracletosmission.org/wp-content/uploads/2025/06/TEAM-MATE2.jpg',
              'name'  => 'Angelina Jolie',
              'role'  => 'Inginer de sunet',
            ],
            [
              'photo' => 'https://test.paracletosmission.org/wp-content/uploads/2025/06/TEAM-MATE1.jpg',
              'name'  => 'Robert Downey',
              'role'  => 'Coordinator, Co-Fondator',
            ],
            [
              'photo' => 'https://test.paracletosmission.org/wp-content/uploads/2025/06/TEAM-MATE4.jpg',
              'name'  => 'George Clooney',
              'role'  => 'Operator video',
            ],
            [
              'photo' => 'https://test.paracletosmission.org/wp-content/uploads/2025/06/TEAM-MATE5-1.jpg',
              'name'  => 'Brad Pitt',
              'role'  => 'Regizor, Co-Fondator',
            ],
            [
              'photo' => 'https://test.paracletosmission.org/wp-content/uploads/2025/06/TEAM-MATE3.jpg',
              'name'  => 'Piter Pan',
              'role'  => 'Promovare SMM',
            ],
            [
              'photo' => 'https://test.paracletosmission.org/wp-content/uploads/2025/06/TEAM-MATE2.jpg',
              'name'  => 'Angelina Jolie',
              'role'  => 'Inginer de sunet',
            ],
    ];

    ob_start(); ?>
    <div class="swiper teamSwiper">
        <div class="swiper-wrapper">
            <?php foreach($members as $m): ?>
            <div class="swiper-slide">
                <img 
                    src="<?= $m['photo'] ?>" 
                    alt="<?= esc_attr($m['name']) ?>" 
                    class="team-photo"
                    loading="lazy"
                />
                <div class="team-info">
                    <div class="name"><?= esc_html($m['name']) ?></div>
                    <div class="role"><?= esc_html($m['role']) ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="nav-prev-team">
            <svg viewBox="0 0 24 24"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/></svg>
        </div>
        <div class="nav-next-team">
            <svg viewBox="0 0 24 24"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg>
        </div>
    </div>
    <?php
    return ob_get_clean();
} );