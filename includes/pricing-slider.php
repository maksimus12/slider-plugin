<?php
/**
 * Pricing Slider Shortcode
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

add_shortcode( 'pricing_slider', function( $atts ) {
    // Подключаем скрипт инициализации
    wp_enqueue_script( 'urban-sliders-init' );
    
    // Массив тарифных планов
    $plans = [
        [
            'name' => 'MINI',
            'class' => 'normal',
            'price' => '18 999',
            'color' => '#fff',
            'border' => '#333',
            'button_color' => '#c2f24c',
            'features' => [
                'Elaborarea strategiei de promovare pe TikTok',
                'Elaborarea planului de conținut',
                'Filmarea și montarea a 10 videoclipuri creative pe smartphone',
                'Postarea pe alte rețele sociale'
            ]
        ],
        [
            'name' => 'STANDART',
            'class' => 'normal',
            'price' => '23 799',
            'color' => '#fff',
            'border' => '#333',
            'button_color' => '#c2f24c',
            'features' => [
                'Elaborarea strategiei de promovare pe TikTok',
                'Elaborarea planului de conținut',
                'Filmarea și montarea a 14 videoclipuri creative cu camera video',
                'Realizarea aspectului vizual al paginii',
                'Postarea pe alte rețele sociale'
            ]
        ],
        [
            'name' => 'PREMIUM',
            'class' => 'premium',
            'container' => 'premium-border',
            'price' => '23 799',
            'color' => 'linear-gradient(144deg, rgb(231, 255, 165) 0%, rgb(255, 8, 12) 100%););',
            'border' => 'linear-gradient(135deg, #f7ce1e 0%, #ff8900 100%)',
            'button_color' => 'linear-gradient(144deg, rgb(231, 255, 165) 0%, rgb(255, 8, 12) 100%);)',
            'features' => [
                'Elaborarea strategiei de promovare pe TikTok',
                'Elaborarea planului de conținut',
                'Filmarea și montarea a 14 videoclipuri creative cu camera video',
                'Realizarea aspectului vizual al paginii',
                'Postarea pe alte rețele sociale'
            ]
        ],
        [
            'name' => 'EXCLUSIVE',
            'class' => 'exlusive',
            'container' => 'exlusive-border',
            'price' => '31 999',
            'color' => 'linear-gradient(126deg, #AE00FF 0%, #f2295b 100%);',
            'border' => 'linear-gradient(135deg, #ff77b9 0%, #ae4ae2 100%)',
            'button_color' => 'linear-gradient(126deg, #AE00FF 0%, #f2295b 100%)',
            'features' => [
                'Elaborarea strategiei de promovare pe TikTok',
                'Elaborarea planului de conținut',
                'Filmarea și montarea a 14 videoclipuri creative cu camera video',
                'Realizarea aspectului vizual al paginii',
                'Postarea pe alte rețele sociale'
            ]
        ],
    ];

    ob_start(); ?>
    <div class="swiper pricingSwiper">
        <div class="swiper-wrapper">
            <?php foreach($plans as $plan): ?>
            <div class="swiper-slide">
                <div class="pricing-card <?= $plan['container'] ?>" style="border-color: <?= $plan['border'] ?>; background-color: #1D1F27;">
                    <div class="pricing-card-inner ">
                        <div class="pricing-header">
                            <h3><?= esc_html($plan['name']) ?></h3>
                            <div class="pricing-price" style="<?= strpos($plan['color'], 'gradient') ? 'background: ' . $plan['color'] . '; -webkit-background-clip: text; -webkit-text-fill-color: transparent;' : 'color: ' . $plan['color'] . ';' ?>"><?= esc_html($plan['price']) ?></div>
                        </div>
                    
                        <div class="pricing-features">
                            <ul>
                                <?php foreach($plan['features'] as $feature): ?>
                                <li>
                                    <svg class="features__icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                                        <circle cx="12" cy="12" r="9" fill="#C7FF2E" />
                                        <path d="M9 12.75L11.25 15L15 9.75"
                                              fill="none"
                                              stroke="#000"
                                              stroke-width="1.6"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"
                                              vector-effect="non-scaling-stroke" />
                                      </svg>
                                    <?= esc_html($feature) ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        
                        <div class="pricing-footer">
                            <a href="#contact" class="pricing-button <?= $plan['class'] ?>" style="<?= strpos($plan['button_color'], 'gradient') ? 'background: ' . $plan['button_color'] . ';' : 'background-color: ' . $plan['button_color'] . ';' ?>">ÎNCEPE</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
    </div>
    <?php
    return ob_get_clean();
} );