<?php
/**
 * Burger Menu Slider Shortcode
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

add_shortcode( 'burger_menu', function( $atts ) {
    // Parse attributes
    $atts = shortcode_atts(
        array(
            'logo' => 'Objectiv',
            'menu_items' => 'DESPRE NOI|#about,ECHIPA|#team,SERVICII|#service,PROIECTE|#work,PLANURI|#plans,CONTACTE|#contact',
        ),
        $atts,
        'burger_menu'
    );

    // Prepare menu items
    $menu_items = array();
    $items = explode(',', $atts['menu_items']);
    foreach ($items as $item) {
        $parts = explode('|', $item);
        $menu_items[] = array(
            'label' => $parts[0],
            'url' => isset($parts[1]) ? $parts[1] : '#'
        );
    }

    // Enqueue necessary scripts
    wp_enqueue_script( 'urban-burger-menu' );
    
    ob_start(); ?>
    
    <!-- Burger Button -->
    <div class="burger-button">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu-overlay">
        <div class="mobile-menu-container">
            <div class="mobile-menu-header">
                <div class="mobile-menu-logo"><img src="https://test.paracletosmission.org/wp-content/uploads/2025/05/Obiectiv-Logo-1.png" style="width: 150px"/></div>
                <div class="mobile-menu-close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                    </svg>
                </div>
            </div>
            <nav class="mobile-menu-nav">
                <ul>
                    <?php foreach ($menu_items as $item) : ?>
                    <li><a href="<?php echo esc_url($item['url']); ?>"><?php echo esc_html($item['label']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </div>
    
    <?php
    return ob_get_clean();
} );