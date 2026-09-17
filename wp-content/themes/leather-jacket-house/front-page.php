<?php
/**
 * The template for displaying the custom homepage
 *
 * @package Leather_Jacket_House
 */

get_header();

$theme_uri = get_template_directory_uri();
$img_path = $theme_uri . '/assets/images';
$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
?>

<!-- 1. Hero Section -->
<section class="hero-section" aria-label="<?php esc_attr_e('Hero Banner', 'leather-jacket-house'); ?>">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-content">
                <h1 class="hero-title">Leather Jackets<br>for Every Style</h1>
                <p class="hero-subtitle">
                    Explore premium leather jackets for men and women, including bomber, cafe racer, varsity, biker, and hooded styles crafted for everyday wear.
                </p>
                <div class="hero-buttons">
                    <a href="<?php echo esc_url(home_url('/product-category/men/')); ?>" class="btn btn-primary">Shop Men's Collection</a>
                    <a href="<?php echo esc_url(home_url('/product-category/women/')); ?>" class="btn btn-outline">Shop Women's Collection</a>
                </div>
            </div>
            <div class="hero-image-wrap">
                <img src="<?php echo esc_url($img_path . '/hero-bg.jpg'); ?>" alt="Premium Leather Jacket House Collection" loading="eager" width="800" height="950">
            </div>
        </div>
    </div>
</section>

<!-- 2. Dual Gender Split Banners -->
<section class="gender-banners-section" aria-label="<?php esc_attr_e('Gender Collections', 'leather-jacket-house'); ?>">
    <div class="container">
        <div class="gender-grid">
            <!-- Men's Banner -->
            <div class="gender-card">
                <img src="<?php echo esc_url($img_path . '/banner-men.jpg'); ?>" alt="Men's Leather Jackets Collection" class="gender-card-bg" loading="lazy">
                <div class="gender-card-content">
                    <h2 class="gender-card-title">MEN'S LEATHER<br>JACKETS</h2>
                    <a href="<?php echo esc_url(home_url('/product-category/men/')); ?>" class="btn btn-cognac">Shop Now</a>
                </div>
            </div>

            <!-- Women's Banner -->
            <div class="gender-card">
                <img src="<?php echo esc_url($img_path . '/banner-women.jpg'); ?>" alt="Women's Leather Jackets Collection" class="gender-card-bg" loading="lazy">
                <div class="gender-card-content">
                    <h2 class="gender-card-title">WOMEN'S<br>LEATHER JACKETS</h2>
                    <a href="<?php echo esc_url(home_url('/product-category/women/')); ?>" class="btn btn-cognac">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. Featured Categories -->
<section class="featured-categories-section" aria-label="<?php esc_attr_e('Featured Categories', 'leather-jacket-house'); ?>">
    <div class="container">
        <h2 class="section-title-spaced">F e a t u r e d C a t e g o r i e s</h2>
        <div class="categories-carousel-wrapper">
            <div class="categories-carousel">
                <!-- Bomber -->
                <a href="<?php echo esc_url(home_url('/product-category/bomber-jackets/')); ?>" class="category-card">
                    <div class="category-img-wrap">
                        <img src="<?php echo esc_url($img_path . '/cat-bomber.jpg'); ?>" alt="Bomber Jackets" loading="lazy">
                    </div>
                    <div class="category-card-name">Bomber Jackets</div>
                </a>
                <!-- Biker -->
                <a href="<?php echo esc_url(home_url('/product-category/biker-jackets/')); ?>" class="category-card">
                    <div class="category-img-wrap">
                        <img src="<?php echo esc_url($img_path . '/cat-biker.jpg'); ?>" alt="Biker Jackets" loading="lazy">
                    </div>
                    <div class="category-card-name">Biker Jackets</div>
                </a>
                <!-- Varsity -->
                <a href="<?php echo esc_url(home_url('/product-category/varsity-jackets/')); ?>" class="category-card">
                    <div class="category-img-wrap">
                        <img src="<?php echo esc_url($img_path . '/cat-varsity.jpg'); ?>" alt="Varsity Jackets" loading="lazy">
                    </div>
                    <div class="category-card-name">Varsity Jackets</div>
                </a>
                <!-- Leather Coats -->
                <a href="<?php echo esc_url(home_url('/product-category/leather-coats/')); ?>" class="category-card">
                    <div class="category-img-wrap">
                        <img src="<?php echo esc_url($img_path . '/cat-coat.jpg'); ?>" alt="Leather Coats" loading="lazy">
                    </div>
                    <div class="category-card-name">Leather Coats</div>
                </a>
                <!-- Aviator & Shearling -->
                <a href="<?php echo esc_url(home_url('/product-category/aviator-shearling/')); ?>" class="category-card">
                    <div class="category-img-wrap">
                        <img src="<?php echo esc_url($img_path . '/cat-aviator.jpg'); ?>" alt="Aviator & Shearling Jackets" loading="lazy">
                    </div>
                    <div class="category-card-name">Aviator Jackets</div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- 4. Just Landed (WooCommerce Products) -->
<section class="just-landed-section" aria-label="<?php esc_attr_e('Just Landed Products', 'leather-jacket-house'); ?>">
    <div class="container">
        <h2 class="section-title-spaced">J u s t L a n d e d</h2>
        <div class="products-grid">
            <?php
            // Query featured or latest WooCommerce products
            $args = [
                'post_type'      => 'product',
                'posts_per_page' => 8,
                'status'         => 'publish',
            ];
            $products_query = new WP_Query($args);

            if ($products_query->have_posts()) {
                $idx = 1;
                while ($products_query->have_posts()) {
                    $products_query->the_post();
                    global $product;
                    $fallback_img = $img_path . '/product-' . (($idx % 8) ?: 8) . '.jpg';
                    $product_img = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'ljh-card') : $fallback_img;
                    ?>
                    <article class="product-card">
                        <div class="product-thumbnail-wrap">
                            <span class="product-badge-tag">New</span>
                            <button class="product-wishlist-btn" aria-label="Add to Wishlist" title="Save to Wishlist">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                </svg>
                            </button>
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo esc_url($product_img); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                            </a>
                            <div class="product-actions-overlay">
                                <a href="<?php the_permalink(); ?>" class="btn btn-cognac" style="width: 100%; padding: 10px;">View Product</a>
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
                                <?php echo $product ? $product->get_price_html() : '$895.00 - $1295.00'; ?>
                            </div>
                        </div>
                    </article>
                    <?php
                    $idx++;
                }
                wp_reset_postdata();
            } else {
                // Fallback 8 static product cards matching design
                $static_products = [
                    ['title' => 'Vintage Distressed Brown Leather Bomber Jacket', 'img' => 'product-1.jpg', 'price' => '$895.00 - $1295.00'],
                    ['title' => 'Classic Asymmetrical Biker Motorcycle Leather Jacket', 'img' => 'product-2.jpg', 'price' => '$995.00 - $1395.00'],
                    ['title' => 'Cafe Racer Slim Fit Lambskin Leather Jacket', 'img' => 'product-3.jpg', 'price' => '$895.00 - $1195.00'],
                    ['title' => 'Heritage Wool & Leather Varsity Letterman Jacket', 'img' => 'product-4.jpg', 'price' => '$795.00 - $995.00'],
                    ['title' => 'Luxury Shearling Lined Aviator Flight Jacket', 'img' => 'product-5.jpg', 'price' => '$1295.00 - $1595.00'],
                    ['title' => 'Women\'s Tailored Belted Trench Leather Coat', 'img' => 'product-6.jpg', 'price' => '$1095.00 - $1495.00'],
                    ['title' => 'Modern Urban Hooded Leather Bomber Jacket', 'img' => 'product-7.jpg', 'price' => '$945.00 - $1245.00'],
                    ['title' => 'Signature Matte Black Motorcycle Rider Jacket', 'img' => 'product-8.jpg', 'price' => '$995.00 - $1350.00'],
                ];
                foreach ($static_products as $sp) {
                    ?>
                    <article class="product-card">
                        <div class="product-thumbnail-wrap">
                            <span class="product-badge-tag">New</span>
                            <button class="product-wishlist-btn" aria-label="Add to Wishlist">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                </svg>
                            </button>
                            <a href="<?php echo esc_url($shop_url); ?>">
                                <img src="<?php echo esc_url($img_path . '/' . $sp['img']); ?>" alt="<?php echo esc_attr($sp['title']); ?>" loading="lazy">
                            </a>
                            <div class="product-actions-overlay">
                                <a href="<?php echo esc_url($shop_url); ?>" class="btn btn-cognac" style="width: 100%; padding: 10px;">View Product</a>
                            </div>
                        </div>
                        <div class="product-details">
                            <h3 class="product-title">
                                <a href="<?php echo esc_url($shop_url); ?>"><?php echo esc_html($sp['title']); ?></a>
                            </h3>
                            <div class="product-rating">
                                <div class="star-icons">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                                <span class="review-count">(5) Review</span>
                            </div>
                            <div class="product-price"><?php echo esc_html($sp['price']); ?></div>
                        </div>
                    </article>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>

<!-- 5. Shop By Style -->
<section class="shop-by-style-section" aria-label="<?php esc_attr_e('Shop by Style', 'leather-jacket-house'); ?>">
    <div class="container">
        <h2 class="section-title-spaced">S h o p B y S t y l e</h2>
        <div class="styles-grid">
            <!-- Bomber -->
            <div class="style-card">
                <img src="<?php echo esc_url($img_path . '/style-bomber.jpg'); ?>" alt="Bomber Jackets" class="style-card-bg" loading="lazy">
                <div class="style-card-content">
                    <h3 class="style-card-title">Bomber Jackets</h3>
                    <a href="<?php echo esc_url(home_url('/product-category/bomber-jackets/')); ?>" class="style-card-link">Explore Style &rarr;</a>
                </div>
            </div>
            <!-- Cafe Racer -->
            <div class="style-card">
                <img src="<?php echo esc_url($img_path . '/style-caferacer.jpg'); ?>" alt="Cafe Racer Jackets" class="style-card-bg" loading="lazy">
                <div class="style-card-content">
                    <h3 class="style-card-title">Cafe Racer Jackets</h3>
                    <a href="<?php echo esc_url(home_url('/product-category/cafe-racer-jackets/')); ?>" class="style-card-link">Explore Style &rarr;</a>
                </div>
            </div>
            <!-- Varsity -->
            <div class="style-card">
                <img src="<?php echo esc_url($img_path . '/style-varsity.jpg'); ?>" alt="Varsity Jackets" class="style-card-bg" loading="lazy">
                <div class="style-card-content">
                    <h3 class="style-card-title">Varsity Jackets</h3>
                    <a href="<?php echo esc_url(home_url('/product-category/varsity-jackets/')); ?>" class="style-card-link">Explore Style &rarr;</a>
                </div>
            </div>
            <!-- Hooded -->
            <div class="style-card">
                <img src="<?php echo esc_url($img_path . '/style-hooded.jpg'); ?>" alt="Hooded Jackets" class="style-card-bg" loading="lazy">
                <div class="style-card-content">
                    <h3 class="style-card-title">Hooded Jackets</h3>
                    <a href="<?php echo esc_url(home_url('/product-category/hooded-jackets/')); ?>" class="style-card-link">Explore Style &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 6. Shop By Color -->
<section class="shop-by-color-section" aria-label="<?php esc_attr_e('Shop by Color', 'leather-jacket-house'); ?>">
    <div class="container">
        <h2 class="section-title-spaced">S h o p B y c o l o r</h2>
        <div class="color-grid">
            <a href="<?php echo esc_url($shop_url . '?filter_color=black'); ?>" class="color-card">
                <div class="color-swatch-wrap"><img src="<?php echo esc_url($img_path . '/color-black.jpg'); ?>" alt="Black Leather Jackets" loading="lazy"></div>
                <span class="color-name">Black</span>
            </a>
            <a href="<?php echo esc_url($shop_url . '?filter_color=brown'); ?>" class="color-card">
                <div class="color-swatch-wrap"><img src="<?php echo esc_url($img_path . '/color-brown.jpg'); ?>" alt="Brown Leather Jackets" loading="lazy"></div>
                <span class="color-name">Brown</span>
            </a>
            <a href="<?php echo esc_url($shop_url . '?filter_color=green'); ?>" class="color-card">
                <div class="color-swatch-wrap"><img src="<?php echo esc_url($img_path . '/color-green.jpg'); ?>" alt="Green Leather Jackets" loading="lazy"></div>
                <span class="color-name">Green</span>
            </a>
            <a href="<?php echo esc_url($shop_url . '?filter_color=blue'); ?>" class="color-card">
                <div class="color-swatch-wrap"><img src="<?php echo esc_url($img_path . '/color-blue.jpg'); ?>" alt="Blue Leather Jackets" loading="lazy"></div>
                <span class="color-name">Blue</span>
            </a>
            <a href="<?php echo esc_url($shop_url . '?filter_color=grey'); ?>" class="color-card">
                <div class="color-swatch-wrap"><img src="<?php echo esc_url($img_path . '/color-grey.jpg'); ?>" alt="Grey Leather Jackets" loading="lazy"></div>
                <span class="color-name">Grey</span>
            </a>
            <a href="<?php echo esc_url($shop_url . '?filter_color=white'); ?>" class="color-card">
                <div class="color-swatch-wrap"><img src="<?php echo esc_url($img_path . '/color-white.jpg'); ?>" alt="White Leather Jackets" loading="lazy"></div>
                <span class="color-name">White</span>
            </a>
        </div>
    </div>
</section>

<!-- 7. Shop by Material -->
<section class="shop-by-material-section" aria-label="<?php esc_attr_e('Shop by Material', 'leather-jacket-house'); ?>">
    <div class="container">
        <h2 class="section-title-spaced">S h o p b y M a t e r i a l</h2>
        <div class="material-grid">
            <a href="<?php echo esc_url($shop_url . '?filter_material=lambskin'); ?>" class="material-card">
                <div class="material-img-wrap"><img src="<?php echo esc_url($img_path . '/material-lambskin.jpg'); ?>" alt="Lambskin Leather" loading="lazy"></div>
                <div class="material-name">Lambskin</div>
            </a>
            <a href="<?php echo esc_url($shop_url . '?filter_material=cowhide'); ?>" class="material-card">
                <div class="material-img-wrap"><img src="<?php echo esc_url($img_path . '/material-cowhide.jpg'); ?>" alt="Cowhide Leather" loading="lazy"></div>
                <div class="material-name">Cowhide</div>
            </a>
            <a href="<?php echo esc_url($shop_url . '?filter_material=sheepskin'); ?>" class="material-card">
                <div class="material-img-wrap"><img src="<?php echo esc_url($img_path . '/material-sheepskin.jpg'); ?>" alt="Sheepskin Leather" loading="lazy"></div>
                <div class="material-name">Sheepskin</div>
            </a>
            <a href="<?php echo esc_url($shop_url . '?filter_material=goatskin'); ?>" class="material-card">
                <div class="material-img-wrap"><img src="<?php echo esc_url($img_path . '/material-goatskin.jpg'); ?>" alt="Goatskin Leather" loading="lazy"></div>
                <div class="material-name">Goatskin</div>
            </a>
            <a href="<?php echo esc_url($shop_url . '?filter_material=suede'); ?>" class="material-card">
                <div class="material-img-wrap"><img src="<?php echo esc_url($img_path . '/material-suede.jpg'); ?>" alt="Suede Leather" loading="lazy"></div>
                <div class="material-name">Suede</div>
            </a>
        </div>
    </div>
</section>

<!-- 8. Shop By Collection -->
<section class="shop-by-collection-section" aria-label="<?php esc_attr_e('Shop by Collection', 'leather-jacket-house'); ?>">
    <div class="container">
        <h2 class="section-title-spaced">S h o p B y c o l l e c t i o n</h2>
        <!-- Top 2 Large -->
        <div class="collection-top-grid">
            <div class="collection-card card-large">
                <img src="<?php echo esc_url($img_path . '/col-classic.jpg'); ?>" alt="Classic Collection" class="collection-card-bg" loading="lazy">
                <div class="collection-card-content">
                    <h3 class="collection-title">Classic Collection</h3>
                </div>
            </div>
            <div class="collection-card card-large">
                <img src="<?php echo esc_url($img_path . '/col-luxury.jpg'); ?>" alt="Luxury Collection" class="collection-card-bg" loading="lazy">
                <div class="collection-card-content">
                    <h3 class="collection-title">Luxury Collection</h3>
                </div>
            </div>
        </div>
        <!-- Bottom 4 Grid -->
        <div class="collection-bottom-grid">
            <div class="collection-card card-small">
                <img src="<?php echo esc_url($img_path . '/col-winter.jpg'); ?>" alt="Winter Collection" class="collection-card-bg" loading="lazy">
                <div class="collection-card-content"><h3 class="collection-title">Winter Collection</h3></div>
            </div>
            <div class="collection-card card-small">
                <img src="<?php echo esc_url($img_path . '/col-motorcycle.jpg'); ?>" alt="Motorcycle Collection" class="collection-card-bg" loading="lazy">
                <div class="collection-card-content"><h3 class="collection-title">Motorcycle Collection</h3></div>
            </div>
            <div class="collection-card card-small">
                <img src="<?php echo esc_url($img_path . '/col-celebrity.jpg'); ?>" alt="Celebrity Collection" class="collection-card-bg" loading="lazy">
                <div class="collection-card-content"><h3 class="collection-title">Celebrity Collection</h3></div>
            </div>
            <div class="collection-card card-small">
                <img src="<?php echo esc_url($img_path . '/col-bestsellers.jpg'); ?>" alt="Best Sellers" class="collection-card-bg" loading="lazy">
                <div class="collection-card-content"><h3 class="collection-title">Best Sellers</h3></div>
            </div>
        </div>
    </div>
</section>

<!-- 9. Shop by Occasion -->
<section class="shop-by-occasion-section" aria-label="<?php esc_attr_e('Shop by Occasion', 'leather-jacket-house'); ?>">
    <div class="container">
        <h2 class="section-title-spaced">S h o p b y O c c a s i o n</h2>
        <div class="occasion-grid">
            <div class="occasion-card">
                <img src="<?php echo esc_url($img_path . '/occ-everyday.jpg'); ?>" alt="Everyday Wear" class="occasion-card-bg" loading="lazy">
                <h3 class="occasion-title">Everyday Wear</h3>
            </div>
            <div class="occasion-card">
                <img src="<?php echo esc_url($img_path . '/occ-motorcycle.jpg'); ?>" alt="Motorcycle Riding" class="occasion-card-bg" loading="lazy">
                <h3 class="occasion-title">Motorcycle Riding</h3>
            </div>
            <div class="occasion-card">
                <img src="<?php echo esc_url($img_path . '/occ-travel.jpg'); ?>" alt="Travel" class="occasion-card-bg" loading="lazy">
                <h3 class="occasion-title">Travel</h3>
            </div>
            <div class="occasion-card">
                <img src="<?php echo esc_url($img_path . '/occ-office.jpg'); ?>" alt="Office Style" class="occasion-card-bg" loading="lazy">
                <h3 class="occasion-title">Office Style</h3>
            </div>
            <div class="occasion-card">
                <img src="<?php echo esc_url($img_path . '/occ-weekend.jpg'); ?>" alt="Weekend Outings" class="occasion-card-bg" loading="lazy">
                <h3 class="occasion-title">Weekend Outings</h3>
            </div>
        </div>
    </div>
</section>

<!-- 10. Why Choose Leather Jacket House -->
<section class="why-choose-section" aria-label="<?php esc_attr_e('Why Choose Us', 'leather-jacket-house'); ?>">
    <div class="container">
        <div class="why-header">
            <h2 class="why-title">Why Choose Leather Jacket House</h2>
            <p class="why-subtitle">
                Explore premium leather jackets for men and women, including bomber, cafe racer, varsity, biker, and hooded styles crafted for everyday wear.
            </p>
        </div>
        <div class="why-grid">
            <!-- 1. Premium Leather -->
            <div class="why-item">
                <svg class="why-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                </svg>
                <h3 class="why-item-title">Premium<br>Leather</h3>
                <p class="why-item-desc">Every jacket is crafted from carefully selected materials that deliver lasting comfort, durability, and timeless style.</p>
            </div>
            <!-- 2. Exceptional Craftsmanship -->
            <div class="why-item">
                <svg class="why-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                </svg>
                <h3 class="why-item-title">Exceptional<br>Craftsmanship</h3>
                <p class="why-item-desc">Attention to detail, precise stitching, and premium hardware create jackets designed to be worn for years.</p>
            </div>
            <!-- 3. Extensive Selection -->
            <div class="why-item">
                <svg class="why-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <rect x="3" y="3" width="7" height="7"></rect>
                    <rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect>
                    <rect x="3" y="14" width="7" height="7"></rect>
                </svg>
                <h3 class="why-item-title">Extensive<br>Selection</h3>
                <p class="why-item-desc">Explore thousands of leather jackets in a wide range of styles, colors, materials, and sizes.</p>
            </div>
            <!-- 4. Fast Delivery -->
            <div class="why-item">
                <svg class="why-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
                <h3 class="why-item-title">Fast<br>Delivery</h3>
                <p class="why-item-desc">Reliable shipping, secure checkout, and responsive customer support help make every purchase easy.</p>
            </div>
        </div>
    </div>
</section>

<!-- 11. Editorial Story Section -->
<section class="editorial-section" aria-label="<?php esc_attr_e('Brand Story', 'leather-jacket-house'); ?>">
    <div class="container">
        <div class="editorial-grid">
            <div class="editorial-img-wrap">
                <img src="<?php echo esc_url($img_path . '/editorial-banner.jpg'); ?>" alt="Premium Leather Jackets Designed for Everyday Style" loading="lazy">
            </div>
            <div class="editorial-content">
                <h2>Premium Leather Jackets Designed for Everyday Style</h2>
                <p>
                    A leather jacket is more than outerwear. It is a wardrobe essential that combines comfort, durability, and timeless fashion. Our collection includes thousands of leather jackets for men and women, featuring classic bomber jackets, biker jackets, cafe racer styles, aviator jackets, leather coats, and contemporary designs inspired by modern fashion.
                </p>
                <p>
                    Every collection is selected with attention to quality materials, craftsmanship, and fit. Whether you are looking for a lightweight jacket for everyday wear or a warm shearling coat for winter, you can explore a wide range of colors, styles, and sizes in one place.
                </p>
                <p>
                    We continue to expand our catalog with new arrivals, seasonal collections, and classic designs, making it easy to find a jacket that matches your personal style.
                </p>
                <a href="<?php echo esc_url($shop_url); ?>" class="btn btn-primary" style="margin-top: 12px;">Discover the Collection</a>
            </div>
        </div>
    </div>
</section>

<!-- 12. Leather Care Guide -->
<section class="leather-care-section" aria-label="<?php esc_attr_e('Leather Care Guide', 'leather-jacket-house'); ?>">
    <div class="container">
        <div class="care-header">
            <h2 class="care-title">Leather Care Guide</h2>
            <p class="care-desc">
                A premium leather jacket can last for many years when cared for properly. Store your jacket on a wide hanger to help maintain its shape. Avoid excessive moisture and direct heat sources. Clean the surface with a soft cloth and use leather conditioner periodically to preserve softness and prevent drying.
            </p>
            <p style="font-weight: 600; color: var(--color-black); font-size: 1.05rem;">
                Proper storage and regular maintenance help maintain both the appearance and durability of genuine leather.
            </p>
        </div>
        <div class="care-grid">
            <div class="care-card">
                <div class="care-card-img"><img src="<?php echo esc_url($img_path . '/care-hanger.jpg'); ?>" alt="Wide Contoured Hangers" loading="lazy"></div>
                <div class="care-card-title">Contoured Hanger Storage</div>
            </div>
            <div class="care-card">
                <div class="care-card-img"><img src="<?php echo esc_url($img_path . '/care-clean.jpg'); ?>" alt="Soft Cloth Surface Cleaning" loading="lazy"></div>
                <div class="care-card-title">Soft Cloth Cleaning</div>
            </div>
            <div class="care-card">
                <div class="care-card-img"><img src="<?php echo esc_url($img_path . '/care-condition.jpg'); ?>" alt="Natural Conditioner" loading="lazy"></div>
                <div class="care-card-title">Leather Conditioning</div>
            </div>
            <div class="care-card">
                <div class="care-card-img"><img src="<?php echo esc_url($img_path . '/care-store.jpg'); ?>" alt="Breathable Garment Storage" loading="lazy"></div>
                <div class="care-card-title">Breathable Protection</div>
            </div>
        </div>
    </div>
</section>

<!-- 13. The Leather Journal (Blog) -->
<section class="journal-section" aria-label="<?php esc_attr_e('The Leather Journal', 'leather-jacket-house'); ?>">
    <div class="container">
        <h2 class="section-title-spaced">T h e L e a t h e r J o u r n a l</h2>
        <div class="journal-grid">
            <!-- Article 1 -->
            <article class="journal-card">
                <div class="journal-img-wrap">
                    <img src="<?php echo esc_url($img_path . '/blog-1.jpg'); ?>" alt="Inside the Studio: Our Process for Crafting a Standout Identity" loading="lazy">
                </div>
                <div class="journal-body">
                    <h3 class="journal-title">
                        <a href="<?php echo esc_url(home_url('/blog/')); ?>">Inside the Studio: Our Process for Crafting a Standout Identity</a>
                    </h3>
                    <div class="journal-meta">5 min Read</div>
                </div>
            </article>

            <!-- Article 2 -->
            <article class="journal-card">
                <div class="journal-img-wrap">
                    <img src="<?php echo esc_url($img_path . '/blog-2.jpg'); ?>" alt="How to Style a Leather Biker Jacket for Any Occasion" loading="lazy">
                </div>
                <div class="journal-body">
                    <h3 class="journal-title">
                        <a href="<?php echo esc_url(home_url('/blog/')); ?>">How to Style a Leather Biker Jacket for Any Occasion</a>
                    </h3>
                    <div class="journal-meta">4 min Read</div>
                </div>
            </article>

            <!-- Article 3 -->
            <article class="journal-card">
                <div class="journal-img-wrap">
                    <img src="<?php echo esc_url($img_path . '/blog-3.jpg'); ?>" alt="The Definitive Guide to Leather Jacket Care & Conditioning" loading="lazy">
                </div>
                <div class="journal-body">
                    <h3 class="journal-title">
                        <a href="<?php echo esc_url(home_url('/blog/')); ?>">The Definitive Guide to Leather Jacket Care & Conditioning</a>
                    </h3>
                    <div class="journal-meta">6 min Read</div>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- 14. What Customers Are Saying (Reviews) -->
<section class="testimonials-section" aria-label="<?php esc_attr_e('Customer Testimonials', 'leather-jacket-house'); ?>">
    <div class="container">
        <h2 class="section-title-spaced">W h a t C u s t o m e r s A r e S a y i n g</h2>
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                <p class="testimonial-quote">"The quality of the lambskin is extraordinary. The stitching and hardware feel luxurious and built to last."</p>
                <div class="testimonial-author">Peter, <span>Belgium</span></div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                <p class="testimonial-quote">"Hands down the best leather jacket I've ever owned. The fit is perfect and the leather smells incredible."</p>
                <div class="testimonial-author">Marcus, <span>United Kingdom</span></div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                <p class="testimonial-quote">"Fast delivery and exceptional customer support. The biker jacket turned heads from day one!"</p>
                <div class="testimonial-author">Elena, <span>Germany</span></div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                <p class="testimonial-quote">"Incredible craftsmanship and attention to detail. Will definitely be buying another style soon."</p>
                <div class="testimonial-author">David, <span>United States</span></div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                <p class="testimonial-quote">"Warm, stylish, and premium in every way. The shearling lining is so plush and cozy."</p>
                <div class="testimonial-author">Sophie, <span>France</span></div>
            </div>
        </div>
    </div>
</section>

<!-- 15. Newsletter Subscription Banner -->
<section class="newsletter-section" aria-label="<?php esc_attr_e('Newsletter Signup', 'leather-jacket-house'); ?>">
    <div class="container">
        <div class="newsletter-box">
            <h2 class="newsletter-title">Join Leather<br>Jacket House</h2>
            <p class="newsletter-desc">Subscribe to receive private sale invitations, bespoke release alerts, and artisanal care guides.</p>
            <form class="newsletter-form" action="#" method="post">
                <input type="email" class="newsletter-input" placeholder="Enter your email" required aria-label="Email Address">
                <button type="submit" class="newsletter-submit">Subscribe</button>
            </form>
        </div>
    </div>
</section>

<?php
get_footer();
