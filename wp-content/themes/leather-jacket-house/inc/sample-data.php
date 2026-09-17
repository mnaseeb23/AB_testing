<?php
/**
 * Leather Jacket House - Sample Data Seeder
 *
 * @package Leather_Jacket_House
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Check and seed default store data if empty
 */
function ljh_seed_sample_content() {
    // Only run once when triggered or on theme activation
    if (get_option('ljh_sample_data_imported') === 'yes') {
        return;
    }

    // Set currency to USD
    update_option('woocommerce_currency', 'USD');
    update_option('woocommerce_currency_pos', 'left');
    update_option('woocommerce_price_thousand_sep', ',');
    update_option('woocommerce_price_decimal_sep', '.');
    update_option('woocommerce_price_num_decimals', '2');
    update_option('woocommerce_enable_guest_checkout', 'yes');
    update_option('woocommerce_enable_signup_and_login_from_checkout', 'yes');

    // Create primary categories
    $categories = [
        'men' => ['name' => "Men's Jackets", 'slug' => 'men'],
        'women' => ['name' => "Women's Jackets", 'slug' => 'women'],
        'bomber' => ['name' => 'Bomber Jackets', 'slug' => 'bomber-jackets'],
        'biker' => ['name' => 'Biker Jackets', 'slug' => 'biker-jackets'],
        'varsity' => ['name' => 'Varsity Jackets', 'slug' => 'varsity-jackets'],
        'cafe-racer' => ['name' => 'Cafe Racer Jackets', 'slug' => 'cafe-racer-jackets'],
        'coats' => ['name' => 'Leather Coats', 'slug' => 'leather-coats'],
        'hooded' => ['name' => 'Hooded Jackets', 'slug' => 'hooded-jackets'],
        'aviator' => ['name' => 'Aviator & Shearling', 'slug' => 'aviator-shearling'],
    ];

    $cat_ids = [];
    foreach ($categories as $key => $cat_data) {
        $term = get_term_by('slug', $cat_data['slug'], 'product_cat');
        if (!$term) {
            $inserted = wp_insert_term($cat_data['name'], 'product_cat', ['slug' => $cat_data['slug']]);
            if (!is_wp_error($inserted)) {
                $cat_ids[$key] = $inserted['term_id'];
            }
        } else {
            $cat_ids[$key] = $term->term_id;
        }
    }

    // Sample Products Data matching the exact design
    $products_data = [
        [
            'title' => 'Vintage Distressed Brown Leather Bomber Jacket',
            'slug' => 'vintage-distressed-brown-leather-bomber-jacket',
            'price' => '895.00',
            'regular_price' => '1295.00',
            'sale_price' => '895.00',
            'desc' => 'Crafted from supple, premium lambskin leather, this vintage distressed bomber jacket features ribbed cuffs, heavy-duty antique brass YKK zippers, and a silky quilted interior lining designed for timeless style and warmth.',
            'short_desc' => 'Handcrafted 100% full-grain distressed brown lambskin bomber jacket with antique brass hardware.',
            'sku' => 'LJH-BM-01',
            'image' => 'product-1.jpg',
            'categories' => ['men', 'bomber'],
            'stock' => 15,
        ],
        [
            'title' => 'Classic Asymmetrical Biker Motorcycle Leather Jacket',
            'slug' => 'classic-asymmetrical-biker-leather-jacket',
            'price' => '995.00',
            'regular_price' => '1395.00',
            'sale_price' => '995.00',
            'desc' => 'An iconic classic biker jacket tailored from top-grade heavyweight cowhide leather. Featuring snap-down lapels, waist belt with roller buckle, zippered sleeve gussets, and multiple exterior zipper pockets.',
            'short_desc' => 'Iconic asymmetrical biker jacket in midnight black premium cowhide leather.',
            'sku' => 'LJH-BK-02',
            'image' => 'product-2.jpg',
            'categories' => ['men', 'women', 'biker'],
            'stock' => 20,
        ],
        [
            'title' => 'Cafe Racer Slim Fit Lambskin Leather Jacket',
            'slug' => 'cafe-racer-slim-fit-lambskin-leather-jacket',
            'price' => '895.00',
            'regular_price' => '1195.00',
            'sale_price' => '895.00',
            'desc' => 'Streamlined and elegant, this Cafe Racer jacket features a snap tab mandarin collar, zippered chest pockets, and contoured stitching along the shoulders and back. Crafted from ultra-soft Italian lambskin.',
            'short_desc' => 'Minimalist cafe racer in supple Italian lambskin with snap collar and gunmetal zippers.',
            'sku' => 'LJH-CR-03',
            'image' => 'product-3.jpg',
            'categories' => ['men', 'cafe-racer'],
            'stock' => 18,
        ],
        [
            'title' => 'Heritage Wool & Leather Varsity Letterman Jacket',
            'slug' => 'heritage-wool-leather-varsity-letterman-jacket',
            'price' => '795.00',
            'regular_price' => '995.00',
            'sale_price' => '795.00',
            'desc' => 'Classic collegiate style meeting modern luxury. Heavyweight Melton wool body paired with 100% genuine full-grain leather sleeves and striped rib-knit trims.',
            'short_desc' => 'Premium Melton wool and full-grain leather sleeves varsity jacket.',
            'sku' => 'LJH-VR-04',
            'image' => 'product-4.jpg',
            'categories' => ['men', 'women', 'varsity'],
            'stock' => 12,
        ],
        [
            'title' => 'Luxury Shearling Lined Aviator Flight Jacket',
            'slug' => 'luxury-shearling-lined-aviator-flight-jacket',
            'price' => '1295.00',
            'regular_price' => '1595.00',
            'sale_price' => '1295.00',
            'desc' => 'Ultimate winter luxury. Genuine sheepskin leather with thick, plush merino shearling fleece lining throughout the interior, collar, and cuffs. Adjustable waist buckles and brass zippers.',
            'short_desc' => '100% authentic merino sheepskin shearling aviator jacket for sub-zero warmth.',
            'sku' => 'LJH-AV-05',
            'image' => 'product-5.jpg',
            'categories' => ['men', 'women', 'aviator', 'coats'],
            'stock' => 8,
        ],
        [
            'title' => 'Women\'s Tailored Belted Trench Leather Coat',
            'slug' => 'womens-tailored-belted-trench-leather-coat',
            'price' => '1095.00',
            'regular_price' => '1495.00',
            'sale_price' => '1095.00',
            'desc' => 'Sophisticated full-length leather trench coat crafted from buttery lambskin. Double-breasted button front, matching tie belt, shoulder epaulets, and storm flap.',
            'short_desc' => 'Elegant double-breasted belted trench coat in luxury buttery lambskin.',
            'sku' => 'LJH-CT-06',
            'image' => 'product-6.jpg',
            'categories' => ['women', 'coats'],
            'stock' => 10,
        ],
        [
            'title' => 'Modern Urban Hooded Leather Bomber Jacket',
            'slug' => 'modern-urban-hooded-leather-bomber-jacket',
            'price' => '945.00',
            'regular_price' => '1245.00',
            'sale_price' => '945.00',
            'desc' => 'Versatile streetwear essential featuring a detachable French terry fleece hood, premium lambskin outer shell, matte black hardware, and zippered utility arm pocket.',
            'short_desc' => 'Urban lambskin bomber with removable fleece hood and utility hardware.',
            'sku' => 'LJH-HD-07',
            'image' => 'product-7.jpg',
            'categories' => ['men', 'hooded', 'bomber'],
            'stock' => 25,
        ],
        [
            'title' => 'Signature Matte Black Motorcycle Rider Jacket',
            'slug' => 'signature-matte-black-motorcycle-rider-jacket',
            'price' => '995.00',
            'regular_price' => '1350.00',
            'sale_price' => '995.00',
            'desc' => 'Precision engineered motorcycle jacket with reinforced shoulder padding, abrasion-resistant 1.2mm top-grain leather, bi-swing action back, and waterproof inner security pockets.',
            'short_desc' => 'Reinforced 1.2mm top-grain leather motorcycle rider jacket.',
            'sku' => 'LJH-MR-08',
            'image' => 'product-8.jpg',
            'categories' => ['men', 'biker'],
            'stock' => 14,
        ]
    ];

    // Create products if WooCommerce is active
    if (class_exists('WC_Product_Simple')) {
        foreach ($products_data as $p) {
            $existing = get_page_by_path($p['slug'], OBJECT, 'product');
            if ($existing) {
                continue;
            }

            $product = new WC_Product_Simple();
            $product->set_name($p['title']);
            $product->set_slug($p['slug']);
            $product->set_status('publish');
            $product->set_featured(true);
            $product->set_catalog_visibility('visible');
            $product->set_description($p['desc']);
            $product->set_short_description($p['short_desc']);
            $product->set_sku($p['sku']);
            $product->set_price($p['sale_price']);
            $product->set_regular_price($p['regular_price']);
            $product->set_sale_price($p['sale_price']);
            $product->set_manage_stock(true);
            $product->set_stock_quantity($p['stock']);
            $product->set_stock_status('instock');
            $product->set_reviews_allowed(true);
            $product->set_average_rating('5.0');
            $product->set_rating_counts([5 => 5]);
            $product->set_review_count(5);

            // Assign Categories
            $term_ids = [];
            foreach ($p['categories'] as $ckey) {
                if (isset($cat_ids[$ckey])) {
                    $term_ids[] = $cat_ids[$ckey];
                }
            }
            if (!empty($term_ids)) {
                $product->set_category_ids($term_ids);
            }

            $product->save();
        }
    }

    // Create Sample Blog Posts for "The Leather Journal"
    $blog_posts = [
        [
            'title' => 'Inside the Studio: Our Process for Crafting a Standout Identity',
            'content' => 'From initial hide selection to hand-stitching each panel, discover the artisan philosophy behind Leather Jacket House. Every piece begins with premium full-grain hides sourced from sustainable European tanneries...',
            'image' => 'blog-1.jpg',
        ],
        [
            'title' => 'How to Style a Leather Biker Jacket for Any Occasion',
            'content' => 'The leather biker jacket is the ultimate chameleon in modern menswear and womenswear. Pair it with raw denim and Chelsea boots for an effortless weekend look, or throw it over a crisp button-down for evening sophistication...',
            'image' => 'blog-2.jpg',
        ],
        [
            'title' => 'The Definitive Guide to Leather Jacket Care & Conditioning',
            'content' => 'A well-maintained leather jacket will outlive trends and develop a gorgeous personal patina over decades. Learn how to store your jacket on contoured wooden hangers, apply natural beeswax conditioners, and protect it from moisture...',
            'image' => 'blog-3.jpg',
        ],
    ];

    foreach ($blog_posts as $post_data) {
        $existing = get_page_by_title($post_data['title'], OBJECT, 'post');
        if (!$existing) {
            wp_insert_post([
                'post_title' => $post_data['title'],
                'post_content' => $post_data['content'],
                'post_status' => 'publish',
                'post_author' => 1,
                'post_type' => 'post',
            ]);
        }
    }

    // Set static homepage
    $front_page = get_page_by_title('Home');
    if (!$front_page) {
        $front_page_id = wp_insert_post([
            'post_title' => 'Home',
            'post_status' => 'publish',
            'post_type' => 'page',
        ]);
    } else {
        $front_page_id = $front_page->ID;
    }

    if ($front_page_id) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $front_page_id);
    }

    update_option('ljh_sample_data_imported', 'yes');
}
add_action('init', 'ljh_seed_sample_content', 30);
