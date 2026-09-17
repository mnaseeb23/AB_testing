<?php
/**
 * The Template for displaying product archives, including the main shop page
 *
 * @package Leather_Jacket_House
 */

defined('ABSPATH') || exit;

get_header('shop');
?>

<div class="shop-page-hero">
    <div class="container">
        <h1>
            <?php if (is_product_category()) : ?>
                <?php single_cat_title(); ?>
            <?php else : ?>
                <?php woocommerce_page_title(); ?>
            <?php endif; ?>
        </h1>
        <?php woocommerce_breadcrumb(); ?>
    </div>
</div>

<div class="container">
    <div class="shop-layout">
        <!-- Sidebar Filters -->
        <aside class="shop-sidebar" aria-label="<?php esc_attr_e('Shop Filters', 'leather-jacket-house'); ?>">
            <!-- Categories Widget -->
            <div class="sidebar-widget">
                <h3 class="sidebar-widget-title">Categories</h3>
                <ul class="category-filter-list">
                    <li><a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>">All Jackets</a></li>
                    <li><a href="<?php echo esc_url(home_url('/product-category/men/')); ?>">Men's Jackets</a></li>
                    <li><a href="<?php echo esc_url(home_url('/product-category/women/')); ?>">Women's Jackets</a></li>
                    <li><a href="<?php echo esc_url(home_url('/product-category/bomber-jackets/')); ?>">Bomber Jackets</a></li>
                    <li><a href="<?php echo esc_url(home_url('/product-category/biker-jackets/')); ?>">Biker Jackets</a></li>
                    <li><a href="<?php echo esc_url(home_url('/product-category/cafe-racer-jackets/')); ?>">Cafe Racer</a></li>
                    <li><a href="<?php echo esc_url(home_url('/product-category/varsity-jackets/')); ?>">Varsity Jackets</a></li>
                    <li><a href="<?php echo esc_url(home_url('/product-category/aviator-shearling/')); ?>">Aviator & Shearling</a></li>
                    <li><a href="<?php echo esc_url(home_url('/product-category/leather-coats/')); ?>">Leather Coats</a></li>
                </ul>
            </div>

            <!-- Material Filter -->
            <div class="sidebar-widget">
                <h3 class="sidebar-widget-title">Shop By Material</h3>
                <ul class="category-filter-list">
                    <li><a href="<?php echo esc_url(wc_get_page_permalink('shop') . '?filter_material=lambskin'); ?>">Lambskin Leather</a></li>
                    <li><a href="<?php echo esc_url(wc_get_page_permalink('shop') . '?filter_material=cowhide'); ?>">Cowhide Leather</a></li>
                    <li><a href="<?php echo esc_url(wc_get_page_permalink('shop') . '?filter_material=sheepskin'); ?>">Sheepskin Leather</a></li>
                    <li><a href="<?php echo esc_url(wc_get_page_permalink('shop') . '?filter_material=goatskin'); ?>">Goatskin Leather</a></li>
                    <li><a href="<?php echo esc_url(wc_get_page_permalink('shop') . '?filter_material=suede'); ?>">Suede Leather</a></li>
                </ul>
            </div>

            <!-- Trust Banner in Sidebar -->
            <div style="background: var(--color-cream); padding: 20px; border-radius: 6px; font-size: 0.9rem;">
                <strong style="color: var(--color-black); display: block; margin-bottom: 8px;">Authentic Guarantee</strong>
                <p style="color: var(--color-text-muted); margin: 0;">100% Genuine Full-grain & Top-grain European hides with lifetime stitching warranty.</p>
            </div>
        </aside>

        <!-- Product Listing Area -->
        <main class="shop-main-content">
            <div class="shop-top-toolbar">
                <div class="results-count">
                    <?php woocommerce_result_count(); ?>
                </div>
                <div class="sorting-controls">
                    <?php woocommerce_catalog_ordering(); ?>
                </div>
            </div>

            <?php if (woocommerce_product_loop()) : ?>
                <?php woocommerce_product_loop_start(); ?>
                
                <div class="products-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php wc_get_template_part('content', 'product'); ?>
                    <?php endwhile; ?>
                </div>

                <?php woocommerce_product_loop_end(); ?>

                <div style="margin-top: 40px; text-align: center;">
                    <?php woocommerce_pagination(); ?>
                </div>
            <?php else : ?>
                <div style="text-align: center; padding: 60px 0;">
                    <h2>No leather jackets found matching your selection.</h2>
                    <p style="color: var(--color-text-muted); margin-top: 12px;">Try adjusting your search criteria or explore our complete collection.</p>
                    <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn btn-primary" style="margin-top: 24px;">View All Jackets</a>
                </div>
            <?php endif; ?>
        </main>
    </div>
</div>

<?php
get_footer('shop');
