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
    
    // Массив тарифных планов в соответствии с дизайном с картинки
    $plans = [
        [
            'name' => 'MEDIA',
            'description' => 'Perfect pentru brandurile care doresc să-și extindă acoperirea',
            'price' => '7900',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                  <path fill-rule="evenodd" d="M4.5 5.653c0-1.427 1.529-2.33 2.779-1.643l11.54 6.347c1.295.712 1.295 2.573 0 3.286L7.28 19.99c-1.25.687-2.779-.217-2.779-1.643V5.653Z" clip-rule="evenodd" />
                </svg>
                ',
            'button_text' => 'DETALII',
            'button_class' => 'normal',
            'service_id' => 'media-promovare',
            'features' => [
                ['text' => 'Strategie SMM completă și plan de conținut pentru o lună.', 'available' => true],
                
                ['text' => 'Filmare și editare Reels (smartphone/cameră) — video gata de publicare.', 'available' => true],
                
                ['text' => 'Postări foto cu copywriting și design.', 'available' => true],
                
                ['text' => 'Postări pe alte rețele sociale + analitic al acoperirii și adaptarea conținutului.', 'available' => true],
            ]
        ],
        [
            'name' => 'TARGET',
            'description' => 'Pentru afacerile care au nevoie de clienți potențiali stabili',
            'price' => '3900',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                  <path fill-rule="evenodd" d="M17.303 5.197A7.5 7.5 0 0 0 6.697 15.803a.75.75 0 0 1-1.061 1.061A9 9 0 1 1 21 10.5a.75.75 0 0 1-1.5 0c0-1.92-.732-3.839-2.197-5.303Zm-2.121 2.121a4.5 4.5 0 0 0-6.364 6.364.75.75 0 1 1-1.06 1.06A6 6 0 1 1 18 10.5a.75.75 0 0 1-1.5 0c0-1.153-.44-2.303-1.318-3.182Zm-3.634 1.314a.75.75 0 0 1 .82.311l5.228 7.917a.75.75 0 0 1-.777 1.148l-2.097-.43 1.045 3.9a.75.75 0 0 1-1.45.388l-1.044-3.899-1.601 1.42a.75.75 0 0 1-1.247-.606l.569-9.47a.75.75 0 0 1 .554-.68Z" clip-rule="evenodd" />
                </svg>
',
            'button_text' => 'DETALII',
            'button_class' => 'normal',
            'service_id' => 'target',
            'features' => [
                ['text' => 'Configurarea și lansarea campaniilor publicitare ', 'available' => true],
                
                ['text' => 'Targetarea pe segmente de audiență ', 'available' => true],
                
                ['text' => 'Teste A/B ale creativelor și audiențelor pentru optimizare.', 'available' => true],
                
                ['text' => 'Analitic săptămânal, rapoarte și optimizarea campaniilor', 'available' => true],
            ]
        ],
        [
            'name' => 'DESIGN',
            'description' => 'Pentru cei care doresc un aspect vizual profesional uniform',
            'price' => '3900',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                  <path fill-rule="evenodd" d="M20.599 1.5c-.376 0-.743.111-1.055.32l-5.08 3.385a18.747 18.747 0 0 0-3.471 2.987 10.04 10.04 0 0 1 4.815 4.815 18.748 18.748 0 0 0 2.987-3.472l3.386-5.079A1.902 1.902 0 0 0 20.599 1.5Zm-8.3 14.025a18.76 18.76 0 0 0 1.896-1.207 8.026 8.026 0 0 0-4.513-4.513A18.75 18.75 0 0 0 8.475 11.7l-.278.5a5.26 5.26 0 0 1 3.601 3.602l.502-.278ZM6.75 13.5A3.75 3.75 0 0 0 3 17.25a1.5 1.5 0 0 1-1.601 1.497.75.75 0 0 0-.7 1.123 5.25 5.25 0 0 0 9.8-2.62 3.75 3.75 0 0 0-3.75-3.75Z" clip-rule="evenodd" />
                </svg>
                ',
            'button_text' => 'DETALII',
            'button_class' => 'normal',
            'service_id' => 'design',
            'features' => [
                ['text' => 'Stil vizual uniform pentru fluxul de știri și șabloanele postărilor', 'available' => true],
                
                ['text' => 'Selectarea fonturilor și a paletei de culori', 'available' => true],
                
                ['text' => 'Pachete gata pregătite de postări și povești', 'available' => true],
                
                ['text' => 'Fișiere finale pentru utilizare', 'available' => true],
            ]
        ],
        [
            'name' => 'BRANDING',
            'description' => 'Pentru proiectele care creează sau actualizează un brand',
            'price' => '3900',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                  <path fill-rule="evenodd" d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 0 1 .75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 0 1 9.75 22.5a.75.75 0 0 1-.75-.75v-4.131A15.838 15.838 0 0 1 6.382 15H2.25a.75.75 0 0 1-.75-.75 6.75 6.75 0 0 1 7.815-6.666ZM15 6.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" clip-rule="evenodd" />
                  <path d="M5.26 17.242a.75.75 0 1 0-.897-1.203 5.243 5.243 0 0 0-2.05 5.022.75.75 0 0 0 .625.627 5.243 5.243 0 0 0 5.022-2.051.75.75 0 1 0-1.202-.897 3.744 3.744 0 0 1-3.008 1.51c0-1.23.592-2.323 1.51-3.008Z" />
                </svg>
                ',
            'button_text' => 'DETALII',
            'button_class' => 'normal',
            'service_id' => 'branding',
            'features' => [
                ['text' => 'Crearea logo-ului (mai multe variante la alegere)', 'available' => true],
                ['text' => 'Versiuni color + alb-negru și fișiere finale ', 'available' => true],
                ['text' => 'Mini-brandbook (ghid de utilizare) — sau brandbook complet în versiunea premium', 'available' => true],
                ['text' => 'Șabloane de postări și materiale de firmă (cărți de vizită etc.) pentru o imagine complexă.', 'available' => true],
            ]
        ],
    ];

    // Содержимое модальных окон для каждой услуги
    $modalContent = [
        'media-promovare' => [
            'title' => 'MEDIA',
            'plans' => [
                [
                    'name' => 'PROMOVARE INSTAGRAM',
                    'price' => 'Planuri',
                    'period' => '',
                    'description' => '',
                    'features' => [
                        'TARIF MINI 7.900 LEI / LUNĂ',
                        '3 REELS: СЪЁМКА + МОНТАЖ',
                        '4 ФОТО-ПОСТА (С ТЕКСТОМ И ОФОРМЛЕНИЕМ)',
                        '10 СТОРИС (КОПИРАЙТИНГ +ВИЗУАЛ)',
                        'TARIF Standart 7.900 LEI / LUNĂ'
                    ]
                ],
                [
                    'name' => 'Standard',
                    'price' => '7900',
                    'period' => 'per month',
                    'description' => 'Perfect pentru brandurile care doresc să-și extindă acoperirea.',
                    'features' => [
                        'Strategie SMM completă',
                        '10 postări pe lună',
                        '5 Reels pe lună',
                        'Copywriting profesional',
                        'Raport săptămânal'
                    ]
                ],
                [
                    'name' => 'Premium',
                    'price' => '12900',
                    'period' => 'per month',
                    'description' => 'Soluție completă pentru brandurile care doresc creștere rapidă.',
                    'features' => [
                        'Strategie SMM avansată',
                        '15 postări pe lună',
                        '8 Reels pe lună',
                        'Copywriting premium',
                        'Management comunitate',
                        'Planificare conținut lunar',
                        'Raport detaliat săptămânal'
                    ]
                ]
            ]
        ],
        'target' => [
            'title' => 'TARGET',
            'plans' => [
                [
                    'name' => 'Basic',
                    'price' => '2900',
                    'period' => 'per month',
                    'description' => 'Start pentru campaniile de targetare.',
                    'features' => [
                        'Configurare campanii de bază',
                        'Targeting pe 2 segmente',
                        'Buget recomandat 300€',
                        'Raport lunar'
                    ]
                ],
                [
                    'name' => 'Standard',
                    'price' => '3900',
                    'period' => 'per month',
                    'description' => 'Pentru afacerile care au nevoie de clienți potențiali stabili.',
                    'features' => [
                        'Configurare campanii complexe',
                        'Targeting pe 5 segmente',
                        'Teste A/B',
                        'Buget recomandat 500€',
                        'Raport săptămânal'
                    ]
                ],
                [
                    'name' => 'Premium',
                    'price' => '6900',
                    'period' => 'per month',
                    'description' => 'Pentru afaceri cu nevoi complexe de targetare.',
                    'features' => [
                        'Configurare campanii avansate',
                        'Targeting pe 10+ segmente',
                        'Teste A/B multiple',
                        'Optimizare continuă',
                        'Buget recomandat 1000€+',
                        'Raport detaliat săptămânal'
                    ]
                ]
            ]
        ],
        'design' => [
            'title' => 'DESIGN',
            'plans' => [
                [
                    'name' => 'Basic',
                    'price' => '2900',
                    'period' => 'per month',
                    'description' => 'Pentru cei care au nevoie de un design simplu și eficient.',
                    'features' => [
                        '5 șabloane de postări',
                        'Selecție paletă de culori',
                        'Selecție fonturi'
                    ]
                ],
                [
                    'name' => 'Standard',
                    'price' => '3900',
                    'period' => 'per month',
                    'description' => 'Pentru cei care doresc un aspect vizual profesional uniform.',
                    'features' => [
                        '10 șabloane de postări',
                        'Paletă de culori personalizată',
                        'Selecție fonturi premium',
                        'Design pentru Stories',
                        'Element grafice personalizate'
                    ]
                ],
                [
                    'name' => 'Premium',
                    'price' => '5900',
                    'period' => 'per month',
                    'description' => 'Design complex pentru branduri care vor să iasă în evidență.',
                    'features' => [
                        '15+ șabloane de postări',
                        'Design system complet',
                        'Elemente grafice animate',
                        'Design pentru toate platformele',
                        'Revizii nelimitate',
                        'Fisiere sursă incluse'
                    ]
                ]
            ]
        ],
        'branding' => [
            'title' => 'BRANDING',
            'plans' => [
                [
                    'name' => 'Basic',
                    'price' => '2900',
                    'period' => 'one-time',
                    'description' => 'Pentru start-up-uri și afaceri mici.',
                    'features' => [
                        'Logo (2 concepte)',
                        'Paletă de culori',
                        'Selecție fonturi',
                        'Mini-ghid de brand'
                    ]
                ],
                [
                    'name' => 'Standard',
                    'price' => '3900',
                    'period' => 'one-time',
                    'description' => 'Pentru proiectele care creează sau actualizează un brand.',
                    'features' => [
                        'Logo (3 concepte)',
                        'Paletă de culori extinsă',
                        'Selecție fonturi premium',
                        'Brand book complet',
                        'Elemente de identitate vizuală',
                        'Cărți de vizită și papetărie'
                    ]
                ],
                [
                    'name' => 'Premium',
                    'price' => '7900',
                    'period' => 'one-time',
                    'description' => 'Branding complet pentru afaceri care vor să devină lideri în industrie.',
                    'features' => [
                        'Logo (5+ concepte)',
                        'Sistem complet de identitate vizuală',
                        'Brand book extins',
                        'Strategie de brand',
                        'Materiale de marketing',
                        'Design pentru social media',
                        'Consultanță continuă 3 luni'
                    ]
                ]
            ]
        ]
    ];

    ob_start(); ?>
    <div class="swiper pricingSwiper">
        <div class="swiper-wrapper">
            <?php foreach($plans as $plan): ?>
            <div class="swiper-slide">
                <div class="pricing-card">
                    <div class="pricing-card-inner">
                        <div class="pricing-icon">
                            <?= $plan['icon'] ?>
                        </div>
                        
                        <div class="pricing-header">
                            <h3><?= esc_html($plan['name']) ?></h3>
                            <div class="pricing-description"><?= esc_html($plan['description']) ?></div>
                            <div class="pricing-price">L <?= esc_html($plan['price']) ?><span class="period">/lună</span></div>
                        </div>
                        
                        <div class="pricing-footer">
                            <a href="#" class="pricing-button <?= $plan['button_class'] ?> open-pricing-modal" data-service="<?= $plan['service_id'] ?>"><?= esc_html($plan['button_text']) ?></a>
                        </div>
                    
                        <div class="pricing-features">
                            <ul>
                                <?php foreach($plan['features'] as $feature): ?>
                                <li>
                                    <?php if($feature['available']): ?>
                                    <span class="feature-check">
                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                                            <circle cx="12" cy="12" r="9" fill="#C7FF2E" />
                                            <path d="M9 12.75L11.25 15L15 9.75"
                                                fill="none"
                                                stroke="#000"
                                                stroke-width="1.6"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                vector-effect="non-scaling-stroke" />
                                        </svg>
                                    </span>
                                    <?php else: ?>
                                    <span class="feature-cross">
                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="12" cy="12" r="9" fill="#333" />
                                            <path d="M15 9L9 15M9 9L15 15" stroke="#666" stroke-width="1.6" stroke-linecap="round" />
                                        </svg>
                                    </span>
                                    <?php endif; ?>
                                    <?= esc_html($feature['text']) ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Modal Overlay -->
    <div class="pricing-modal-overlay">
        <?php foreach($modalContent as $serviceId => $serviceData): ?>
        <div class="pricing-modal" id="modal-<?= $serviceId ?>">
            <div class="pricing-modal-header">
                <div class="pricing-modal-title"><?= esc_html($serviceData['title']) ?></div>
                <div class="pricing-modal-close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                    </svg>
                </div>
            </div>
            <div class="pricing-modal-body">
                <div class="pricing-accordion-container">
                    <?php foreach($serviceData['plans'] as $index => $plan): 
                        $isActive = ($index === 0) ? 'active' : '';
                        $gradientClass = '';
                        switch($plan['name']) {
                            case 'Basic':
                                $gradientClass = 'gradient-pink';
                                break;
                            case 'Standard':
                                $gradientClass = 'gradient-blue';
                                break;
                            case 'Premium':
                                $gradientClass = 'gradient-gold';
                                break;
                        }
                    ?>
                    <div class="pricing-accordion <?= $isActive ?> <?= $gradientClass ?>">
                        <div class="pricing-accordion-header">
                            <div class="pricing-accordion-title-container">
                                <h3 class="pricing-accordion-title"><?= esc_html($plan['name']) ?></h3>
                                <div class="pricing-accordion-price"><?= esc_html($plan['price']) ?><span>L</span> <span class="period"><?= esc_html($plan['period']) ?></span></div>
                                <div class="pricing-accordion-description"><?= esc_html($plan['description']) ?></div>
                            </div>
                            <div class="pricing-accordion-arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                    <path d="M7 10l5 5 5-5z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="pricing-accordion-content">
                            <ul class="pricing-accordion-features">
                                <?php foreach($plan['features'] as $feature): ?>
                                <li>
                                    <span class="feature-check">
                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="12" cy="12" r="9" fill="#C7FF2E" />
                                            <path d="M9 12.75L11.25 15L15 9.75"
                                                fill="none"
                                                stroke="#000"
                                                stroke-width="1.6"
                                                stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <?= esc_html($feature) ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="pricing-modal-footer">
                    <a href="#contact" class="pricing-button normal modal-contact-btn">CONTACTEAZĂ-NE</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    
    <?php
    return ob_get_clean();
} );