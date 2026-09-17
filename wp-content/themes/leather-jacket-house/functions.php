<?php
/**
 * Leather Jacket House functions and definitions
 *
 * @package Leather_Jacket_House
 */

if (!defined('ABSPATH')) {
    exit;
}

define('LJH_THEME_VERSION', '1.0.0');
define('LJH_THEME_DIR', get_template_directory());
define('LJH_THEME_URI', get_template_directory_uri());

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function ljh_theme_setup() {
    // Make theme available for translation
    load_theme_textdomain('leather-jacket-house', LJH_THEME_DIR . '/languages');

    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(800, 1000, true);
    add_image_size('ljh-card', 600, 750, true);
    add_image_size('ljh-gallery', 1200, 1500, false);

    // Register navigation menus
    register_nav_menus([
        'primary'         => esc_html__('Primary Navigation', 'leather-jacket-house'),
        'footer_shop'     => esc_html__('Footer Shop Menu', 'leather-jacket-house'),
        'footer_company'  => esc_html__('Footer Company Menu', 'leather-jacket-house'),
        'footer_services' => esc_html__('Footer Services Menu', 'leather-jacket-house'),
        'mobile'          => esc_html__('Mobile Navigation', 'leather-jacket-house'),
    ]);

    // Switch default core markup for search form, comment form, and comments to output valid HTML5
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
        'navigation-widgets',
    ]);

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for core custom logo
    add_theme_support('custom-logo', [
        'height'      => 80,
        'width'       => 280,
        'flex-width'  => true,
        'flex-height' => true,
    ]);

    // Add support for responsive embedded content
    add_theme_support('responsive-embeds');

    // Add support for Gutenberg wide align images
    add_theme_support('align-wide');
}
add_action('after_setup_theme', 'ljh_theme_setup');

/**
 * Enqueue scripts and styles.
 */
function ljh_scripts_and_styles() {
    // Google Fonts (Playfair Display & Plus Jakarta Sans)
    wp_enqueue_style(
        'ljh-google-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap',
        [],
        null
    );

    // Theme main stylesheet
    wp_enqueue_style(
        'ljh-style',
        get_stylesheet_uri(),
        [],
        LJH_THEME_VERSION
    );

    // Main layout CSS
    wp_enqueue_style(
        'ljh-main-css',
        LJH_THEME_URI . '/assets/css/main.css',
        ['ljh-style'],
        LJH_THEME_VERSION
    );

    // WooCommerce custom styling
    if (class_exists('WooCommerce')) {
        wp_enqueue_style(
            'ljh-woocommerce-css',
            LJH_THEME_URI . '/assets/css/woocommerce.css',
            ['ljh-main-css'],
            LJH_THEME_VERSION
        );
    }

    // Main JavaScript
    wp_enqueue_script(
        'ljh-main-js',
        LJH_THEME_URI . '/assets/js/main.js',
        ['jquery'],
        LJH_THEME_VERSION,
        true
    );

    // Pass AJAX and localized variables to script
    wp_localize_script('ljh-main-js', 'ljhData', [
        'ajaxUrl'    => admin_url('admin-ajax.php'),
        'nonce'      => wp_create_nonce('ljh_nonce'),
        'siteUrl'    => home_url('/'),
        'themeUri'   => LJH_THEME_URI,
    ]);
}
add_action('wp_enqueue_scripts', 'ljh_scripts_and_styles');

/**
 * Performance optimization: remove emoji script and styles
 */
function ljh_disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'ljh_disable_emojis');

// Include SEO module
require_once LJH_THEME_DIR . '/inc/seo.php';

// Include WooCommerce integration module
require_once LJH_THEME_DIR . '/inc/woocommerce.php';

// Include Sample Data Seeder module
require_once LJH_THEME_DIR . '/inc/sample-data.php';
