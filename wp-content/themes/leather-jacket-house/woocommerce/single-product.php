<?php
/**
 * The Template for displaying single products
 *
 * @package Leather_Jacket_House
 */

defined('ABSPATH') || exit;

get_header('shop');

$theme_uri = get_template_directory_uri();
$fallback_img = $theme_uri . '/assets/images/product-1.jpg';
?>

<div class="container single-product-wrap">
    <?php woocommerce_breadcrumb(); ?>

    <?php while (have_posts()) : the_post(); ?>
        <?php
        global $product;
        $product_id = $product->get_id();
        $attachment_ids = $product->get_gallery_image_ids();
        $main_img_url = has_post_thumbnail() ? wp_get_attachment_image_url($product->get_image_id(), 'full') : $fallback_img;
        ?>

        <div class="product-summary-grid" style="margin-top: 30px;">
            <!-- Left: Gallery -->
            <div class="product-gallery-area">
                <div class="product-gallery-main">
                    <img src="<?php echo esc_url($main_img_url); ?>" alt="<?php the_title_attribute(); ?>" id="main-product-img">
                </div>
                <div class="product-gallery-thumbs">
                    <div class="gallery-thumb is-active" data-full="<?php echo esc_url($main_img_url); ?>">
                        <img src="<?php echo esc_url($main_img_url); ?>" alt="<?php the_title_attribute(); ?> thumbnail">
                    </div>
                    <?php if (!empty($attachment_ids)) : ?>
                        <?php foreach ($attachment_ids as $att_id) : ?>
                            <?php $thumb_url = wp_get_attachment_image_url($att_id, 'full'); ?>
                            <div class="gallery-thumb" data-full="<?php echo esc_url($thumb_url); ?>">
                                <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title_attribute(); ?> gallery">
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <!-- Fallback thumbnails from design assets -->
                        <div class="gallery-thumb" data-full="<?php echo esc_url($theme_uri . '/assets/images/product-3.jpg'); ?>">
                            <img src="<?php echo esc_url($theme_uri . '/assets/images/product-3.jpg'); ?>" alt="Detail View 1">
                        </div>
                        <div class="gallery-thumb" data-full="<?php echo esc_url($theme_uri . '/assets/images/care-condition.jpg'); ?>">
                            <img src="<?php echo esc_url($theme_uri . '/assets/images/care-condition.jpg'); ?>" alt="Leather Texture">
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Right: Product Summary & Purchasing -->
            <div class="product-summary-area">
                <span class="product-badge-tag" style="position: static; display: inline-block; margin-bottom: 12px; background: var(--color-primary);">In Stock - Ready to Ship</span>
                <h1 class="single-product-title"><?php the_title(); ?></h1>

                <div class="single-product-rating">
                    <div class="star-icons">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                    <span class="review-count">(5) Customer Reviews &bull; Verified Outerwear</span>
                </div>

                <div class="single-product-price">
                    <?php echo $product->get_price_html(); ?>
                </div>

                <div class="single-product-excerpt">
                    <?php echo wp_kses_post($product->get_short_description() ?: get_the_excerpt()); ?>
                </div>

                <!-- Size Selector -->
                <div class="product-options-box">
                    <div class="option-label">
                        <span>Select Size:</span>
                        <a href="#size-guide" class="size-guide-link">Size Guide &amp; Fit Advisor</a>
                    </div>
                    <div class="size-options-grid">
                        <button type="button" class="size-btn" data-size="XS">XS</button>
                        <button type="button" class="size-btn" data-size="S">S</button>
                        <button type="button" class="size-btn is-selected" data-size="M">M</button>
                        <button type="button" class="size-btn" data-size="L">L</button>
                        <button type="button" class="size-btn" data-size="XL">XL</button>
                        <button type="button" class="size-btn" data-size="XXL">XXL</button>
                    </div>
                </div>

                <!-- Add to Cart Form -->
                <form class="cart add-to-cart-form" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="selected-product-size" name="attribute_size" value="M">
                    
                    <div class="quantity-counter">
                        <button type="button" class="qty-btn minus">-</button>
                        <input type="number" class="qty-input" name="quantity" value="1" min="1" max="99" step="1">
                        <button type="button" class="qty-btn plus">+</button>
                    </div>

                    <button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="btn btn-cognac single-add-to-cart-btn">
                        Add to Cart &bull; <?php echo wc_price($product->get_price()); ?>
                    </button>
                </form>

                <!-- Trust Features -->
                <div class="product-trust-features">
                    <div class="trust-row">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>
                        <span><strong>Free Worldwide Express Shipping</strong> (Delivered in 2-4 business days)</span>
                    </div>
                    <div class="trust-row">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>
                        <span><strong>30-Day Hassle-Free Returns &amp; Exchanges</strong></span>
                    </div>
                    <div class="trust-row">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>
                        <span><strong>Guaranteed Genuine Leather</strong> with lifetime hardware warranty</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Tabs -->
        <div class="product-tabs-container">
            <div class="tabs-nav">
                <button type="button" class="tab-nav-btn is-active" data-tab="tab-desc">Description &amp; Craftsmanship</button>
                <button type="button" class="tab-nav-btn" data-tab="tab-specs">Specifications</button>
                <button type="button" class="tab-nav-btn" data-tab="tab-care">Leather Care</button>
                <button type="button" class="tab-nav-btn" data-tab="tab-reviews">Reviews (5)</button>
            </div>

            <!-- Description Pane -->
            <div id="tab-desc" class="tab-pane is-active">
                <p><?php the_content(); ?></p>
                <p style="margin-top: 16px;">Each garment is individually cut and hand-tailored by master leather artisans. We hand-select full-grain hides with unique natural grain character, ensuring every jacket is a unique masterpiece that molds to your silhouette and develops a rich patina over time.</p>
            </div>

            <!-- Specifications Pane -->
            <div id="tab-specs" class="tab-pane">
                <ul style="list-style: disc; margin-left: 20px; line-height: 2;">
                    <li><strong>Outer Material:</strong> 100% Full-grain Lambskin / Cowhide Leather</li>
                    <li><strong>Lining:</strong> Breathable Japanese silk satin &amp; diamond quilted thermal lining</li>
                    <li><strong>Hardware:</strong> Heavy-duty antique brass &amp; gunmetal YKK zippers</li>
                    <li><strong>Pockets:</strong> 2 zippered exterior waist pockets, 1 chest pocket, 2 interior security pockets</li>
                    <li><strong>Fit:</strong> Tailored slim fit with articulated bi-swing back for ergonomic mobility</li>
                </ul>
            </div>

            <!-- Care Instructions Pane -->
            <div id="tab-care" class="tab-pane">
                <p>To preserve the longevity and natural luster of your leather jacket:</p>
                <ul style="list-style: disc; margin-left: 20px; line-height: 2; margin-top: 10px;">
                    <li>Store on the provided contoured wide wooden hanger in a cool, dry place.</li>
                    <li>Avoid prolonged exposure to direct sunlight and heavy rainfall.</li>
                    <li>Wipe gently with a clean, soft cloth if exposed to dust or light moisture.</li>
                    <li>Apply natural leather wax or conditioner every 6 to 12 months.</li>
                </ul>
            </div>

            <!-- Reviews Pane -->
            <div id="tab-reviews" class="tab-pane">
                <div style="margin-bottom: 24px;">
                    <h3 style="font-size: 1.3rem; margin-bottom: 8px;">Customer Reviews (5.0 / 5.0)</h3>
                    <div style="color: var(--color-accent-gold); font-size: 1.1rem; margin-bottom: 16px;">&#9733;&#9733;&#9733;&#9733;&#9733; 100% of customers recommend this jacket</div>
                </div>
                <div style="border-top: 1px solid var(--color-border); padding-top: 16px;">
                    <div style="margin-bottom: 16px;">
                        <div style="font-weight: 700; color: var(--color-black);">Peter, Belgium <span style="font-weight: 400; color: #888; font-size: 0.85rem;">- Verified Buyer</span></div>
                        <div style="color: var(--color-accent-gold); font-size: 0.9rem;">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                        <p style="margin-top: 6px; color: var(--color-text-muted);">"The quality of the lambskin is extraordinary. The stitching and hardware feel luxurious and built to last."</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        <div style="margin-top: 70px; border-top: 1px solid var(--color-border); padding-top: 50px;">
            <h2 class="section-title-spaced">Y o u M a y A l s o L i k e</h2>
            <?php woocommerce_output_related_products(); ?>
        </div>
    <?php endwhile; ?>
</div>

<?php
get_footer('shop');
