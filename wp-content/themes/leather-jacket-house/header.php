<?php
/**
 * The header for Leather Jacket House theme
 *
 * @package Leather_Jacket_House
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Top Announcement Bar -->
<div class="announcement-bar" role="region" aria-label="Announcement">
    <div class="container">
        <span>COMPLIMENTARY WORLDWIDE DELIVERY</span> ON ALL LUXURY LEATHER JACKETS &bull; 30-DAY RETURNS
    </div>
</div>

<!-- Main Site Header -->
<header id="masthead" class="site-header" role="banner">
    <div class="container">
        <div class="header-inner">
            <!-- Mobile Toggle -->
            <button class="mobile-nav-toggle" aria-label="<?php esc_attr_e('Open Menu', 'leather-jacket-house'); ?>">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>

            <!-- Brand Logo -->
            <div class="site-branding">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" rel="home">
                    <!-- Gold Geometric Brand Mark -->
                    <svg class="logo-icon" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="5" y="5" width="30" height="30" rx="4" transform="rotate(45 20 20)" stroke="#D38C2F" stroke-width="2.5" fill="none"/>
                        <rect x="12" y="12" width="16" height="16" rx="2" transform="rotate(45 20 20)" fill="#D38C2F"/>
                    </svg>
                    <span>Leather jacket house</span>
                </a>
            </div>

            <!-- Desktop Navigation Menu -->
            <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Menu', 'leather-jacket-house'); ?>">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'container'      => false,
                    ]);
                } else {
                    ?>
                    <ul id="primary-menu">
                        <li class="<?php echo is_front_page() ? 'current-menu-item' : ''; ?>"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                        <li><a href="<?php echo esc_url(home_url('/about/')); ?>">About us</a></li>
                        <li><a href="<?php echo esc_url(home_url('/product-category/women/')); ?>">Women</a></li>
                        <li><a href="<?php echo esc_url(home_url('/product-category/men/')); ?>">Men</a></li>
                        <li><a href="<?php echo esc_url(function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/')); ?>">Shop</a></li>
                        <li><a href="<?php echo esc_url(home_url('/blog/')); ?>">Blog</a></li>
                        <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a></li>
                    </ul>
                    <?php
                }
                ?>
            </nav>

            <!-- Header Actions / Icons -->
            <div class="header-actions">
                <!-- Language Selector -->
                <div class="lang-selector" title="Language Selector">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="2" y1="12" x2="22" y2="12"></line>
                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                    </svg>
                    <span>English</span>
                </div>

                <!-- Account / Login -->
                <a href="<?php echo esc_url(function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/')); ?>" class="action-icon" aria-label="<?php esc_attr_e('My Account', 'leather-jacket-house'); ?>" title="My Account">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </a>

                <!-- Shopping Cart with Live Count Badge -->
                <a href="<?php echo esc_url(function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/')); ?>" class="action-icon cart-icon" aria-label="<?php esc_attr_e('Shopping Cart', 'leather-jacket-house'); ?>" title="Shopping Cart">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                    </svg>
                    <span class="cart-count-badge">
                        <?php echo (function_exists('WC') && WC()->cart) ? esc_html(WC()->cart->get_cart_contents_count()) : '0'; ?>
                    </span>
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Navigation Drawer -->
<div class="drawer-overlay"></div>
<div class="mobile-drawer" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e('Mobile Navigation', 'leather-jacket-house'); ?>">
    <button class="drawer-close-btn" aria-label="<?php esc_attr_e('Close Menu', 'leather-jacket-house'); ?>">&times;</button>
    <div class="site-branding" style="margin-bottom: 24px;">
        <span class="site-logo" style="font-size: 1.25rem;">Leather jacket house</span>
    </div>
    <ul class="mobile-nav-links">
        <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
        <li><a href="<?php echo esc_url(home_url('/about/')); ?>">About us</a></li>
        <li><a href="<?php echo esc_url(home_url('/product-category/women/')); ?>">Women</a></li>
        <li><a href="<?php echo esc_url(home_url('/product-category/men/')); ?>">Men</a></li>
        <li><a href="<?php echo esc_url(function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/')); ?>">Shop</a></li>
        <li><a href="<?php echo esc_url(home_url('/blog/')); ?>">Blog</a></li>
        <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a></li>
    </ul>
</div>
<main id="primary" class="site-main">
