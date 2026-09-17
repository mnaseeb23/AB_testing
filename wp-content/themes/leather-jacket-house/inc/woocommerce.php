<?php
/**
 * Leather Jacket House - WooCommerce Integration & Enhancements
 *
 * @package Leather_Jacket_House
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Declare WooCommerce theme support features
 */
function ljh_woocommerce_setup() {
    add_theme_support('woocommerce', [
        'thumbnail_image_width' => 600,
        'single_image_width'    => 1200,
        'product_grid'          => [
            'default_rows'    => 2,
            'min_rows'        => 1,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 1,
            'max_columns'     => 6,
        ],
    ]);
    
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'ljh_woocommerce_setup');

/**
 * Customize WooCommerce breadcrumb delimiters and arguments
 */
function ljh_woocommerce_breadcrumbs() {
    return [
        'delimiter'   => ' <span class="breadcrumb-separator">/</span> ',
        'wrap_before' => '<nav class="shop-breadcrumbs" aria-label="Breadcrumb">',
        'wrap_after'  => '</nav>',
        'before'      => '<span class="breadcrumb-item">',
        'after'       => '</span>',
        'home'        => _x('Home', 'breadcrumb', 'leather-jacket-house'),
    ];
}
add_filter('woocommerce_breadcrumb_defaults', 'ljh_woocommerce_breadcrumbs');

/**
 * Update cart count via AJAX fragment
 */
function ljh_cart_count_fragments($fragments) {
    ob_start();
    ?>
    <span class="cart-count-badge">
        <?php echo WC()->cart ? esc_html(WC()->cart->get_cart_contents_count()) : '0'; ?>
    </span>
    <?php
    $fragments['.cart-count-badge'] = ob_get_clean();
    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'ljh_cart_count_fragments');

/**
 * Set products per page to 12
 */
function ljh_loop_shop_per_page() {
    return 12;
}
add_filter('loop_shop_per_page', 'ljh_loop_shop_per_page', 20);

/**
 * Add custom quick star rating renderer
 */
function ljh_render_star_rating($rating = 5, $review_count = 5) {
    $full_stars = floor($rating);
    $half_star = ($rating - $full_stars) >= 0.5;
    $empty_stars = 5 - $full_stars - ($half_star ? 1 : 0);
    
    $html = '<div class="product-rating">';
    $html .= '<div class="star-icons" aria-label="' . esc_attr($rating) . ' out of 5 stars">';
    for ($i = 0; $i < $full_stars; $i++) {
        $html .= '<span class="star-filled">&#9733;</span>';
    }
    if ($half_star) {
        $html .= '<span class="star-half">&#9733;</span>';
    }
    for ($i = 0; $i < $empty_stars; $i++) {
        $html .= '<span class="star-empty">&#9734;</span>';
    }
    $html .= '</div>';
    $html .= '<span class="review-count">(' . esc_html($review_count) . ') Review</span>';
    $html .= '</div>';
    
    return $html;
}
