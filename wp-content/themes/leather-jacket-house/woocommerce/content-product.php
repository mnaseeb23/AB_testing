<?php
/**
 * The template for displaying product content within loops
 *
 * @package Leather_Jacket_House
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}

$theme_uri = get_template_directory_uri();
$fallback_img = $theme_uri . '/assets/images/product-1.jpg';
$product_img = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'ljh-card') : $fallback_img;
?>

<article <?php wc_product_class('product-card', $product); ?>>
    <div class="product-thumbnail-wrap">
        <?php if ($product->is_on_sale()) : ?>
            <span class="product-badge-tag" style="background-color: var(--color-primary);">Sale</span>
        <?php else : ?>
            <span class="product-badge-tag">New</span>
        <?php endif; ?>

        <button class="product-wishlist-btn" aria-label="<?php esc_attr_e('Add to Wishlist', 'leather-jacket-house'); ?>" title="Save to Wishlist">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
            </svg>
        </button>

        <a href="<?php the_permalink(); ?>">
            <img src="<?php echo esc_url($product_img); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
        </a>

        <div class="product-actions-overlay">
            <a href="<?php the_permalink(); ?>" class="btn btn-cognac" style="width: 100%; padding: 10px;">
                <?php esc_html_e('View Product', 'leather-jacket-house'); ?>
            </a>
        </div>
    </div>

    <div class="product-details">
        <h3 class="product-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <div class="product-rating">
            <div class="star-icons">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
            <span class="review-count">(5) Review</span>
        </div>

        <div class="product-price">
            <?php echo $product->get_price_html(); ?>
        </div>
    </div>
</article>
