<?php
/**
 * Plugin Name: Swiper Sliders
 * Plugin URI: https://urbanevent.md/
 * Description: Слайдеры на базе Swiper.js для WordPress
 * Version: 1.0.1
 * Author: Maxim Diacenko
 * Author URI: https://urbanevent.md/
 * Text Domain: urban-sliders
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Определяем константы плагина
define( 'URBAN_SLIDERS_VERSION', '1.0.1' );
define( 'URBAN_SLIDERS_PATH', plugin_dir_path( __FILE__ ) );
define( 'URBAN_SLIDERS_URL', plugin_dir_url( __FILE__ ) );

// Подключаем файлы слайдеров
require_once URBAN_SLIDERS_PATH . 'includes/team-slider.php';
require_once URBAN_SLIDERS_PATH . 'includes/pricing-slider.php';
require_once URBAN_SLIDERS_PATH . 'includes/burger-menu.php'; 
require_once URBAN_SLIDERS_PATH . 'includes/clients.php'; 

// Регистрация скриптов и стилей
function urban_sliders_enqueue_scripts() {
    // CSS библиотеки
    wp_enqueue_style( 
        'swiper-css', 
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', 
        [], 
        '11'
    );
    
    // JS библиотеки (в футере)
    wp_enqueue_script( 
        'swiper-js', 
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', 
        [], 
        '11', 
        true 
    );

    // Регистрируем скрипт инициализации
    wp_register_script(
        'urban-sliders-init',
        URBAN_SLIDERS_URL . 'assets/js/slider-init.js',
        [ 'swiper-js' ],
        URBAN_SLIDERS_VERSION,
        true
    );
    
    // Добавляем отдельный скрипт для бургер-меню
    wp_register_script(
        'urban-burger-menu',
        URBAN_SLIDERS_URL . 'assets/js/burger-menu.js',
        [],
        URBAN_SLIDERS_VERSION,
        true
    );
    
    // Стили плагина
    wp_enqueue_style(
        'urban-sliders-css',
        URBAN_SLIDERS_URL . 'assets/css/style.css',
        [ 'swiper-css' ],
        URBAN_SLIDERS_VERSION
    );
    
}
add_action( 'wp_enqueue_scripts', 'urban_sliders_enqueue_scripts' );

// Функция для создания директорий и файлов при активации плагина
function urban_sliders_activate() {
    // Создаем директории, если их нет
    if (!file_exists(URBAN_SLIDERS_PATH . 'assets')) {
        mkdir(URBAN_SLIDERS_PATH . 'assets', 0755);
    }
    if (!file_exists(URBAN_SLIDERS_PATH . 'assets/css')) {
        mkdir(URBAN_SLIDERS_PATH . 'assets/css', 0755);
    }
    if (!file_exists(URBAN_SLIDERS_PATH . 'assets/js')) {
        mkdir(URBAN_SLIDERS_PATH . 'assets/js', 0755);
    }
    if (!file_exists(URBAN_SLIDERS_PATH . 'includes')) {
        mkdir(URBAN_SLIDERS_PATH . 'includes', 0755);
    }
    
    // Создаем пустые файлы стилей и скриптов, если их нет
    if (!file_exists(URBAN_SLIDERS_PATH . 'assets/css/style.css')) {
        file_put_contents(URBAN_SLIDERS_PATH . 'assets/css/style.css', '/* Urban Sliders CSS */');
    }
    if (!file_exists(URBAN_SLIDERS_PATH . 'assets/css/style-fixes.css')) {
        file_put_contents(URBAN_SLIDERS_PATH . 'assets/css/style-fixes.css', '/* Urban Sliders CSS Fixes */');
    }
    if (!file_exists(URBAN_SLIDERS_PATH . 'assets/js/slider-init.js')) {
        file_put_contents(URBAN_SLIDERS_PATH . 'assets/js/slider-init.js', '// Urban Sliders JS');
    }
    if (!file_exists(URBAN_SLIDERS_PATH . 'assets/js/burger-menu.js')) {
        file_put_contents(URBAN_SLIDERS_PATH . 'assets/js/burger-menu.js', '// Urban Burger Menu JS');
    }
}
register_activation_hook( __FILE__, 'urban_sliders_activate' );