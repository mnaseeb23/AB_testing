<?php
/**
 * The template for displaying the footer
 *
 * @package Leather_Jacket_House
 */
?>
</main><!-- #primary -->

<!-- Trust Badges & Guarantees Section -->
<section class="trust-badges-section" aria-label="<?php esc_attr_e('Store Guarantees', 'leather-jacket-house'); ?>">
    <div class="container">
        <div class="trust-grid">
            <!-- Free Delivery -->
            <div class="trust-item">
                <svg class="trust-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="1" y="3" width="15" height="13"></rect>
                    <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                    <circle cx="5.5" cy="18.5" r="2.5"></circle>
                    <circle cx="18.5" cy="18.5" r="2.5"></circle>
                </svg>
                <h3>Free Delivery</h3>
                <p>Enjoy the convenience of free delivery on your purchases! Shop now and have your items delivered straight to your doorstep at no extra cost. Perfect for hassle-free shopping!</p>
            </div>

            <!-- 30 Days Returns -->
            <div class="trust-item">
                <svg class="trust-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="1 4 1 10 7 10"></polyline>
                    <polyline points="23 20 23 14 17 14"></polyline>
                    <path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path>
                </svg>
                <h3>30 days returns</h3>
                <p>Didn't fit? - No problem! You can always return or exchange. We offer a 30 days returns or exchange policy if you are not happy with your order for any reason.</p>
            </div>

            <!-- Secure Payments -->
            <div class="trust-item">
                <svg class="trust-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
                <h3>Secure payments</h3>
                <p>Shop with confidence! Our secure payment system ensures your personal and financial information is fully protected, providing a safe and worry-free checkout experience.</p>
            </div>
        </div>
    </div>
</section>

<!-- Main Site Footer -->
<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="container">
        <div class="footer-top-grid">
            <!-- Brand Info -->
            <div class="footer-brand">
                <div class="site-logo">
                    <svg class="logo-icon" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="5" y="5" width="30" height="30" rx="4" transform="rotate(45 20 20)" stroke="#D38C2F" stroke-width="2.5" fill="none"/>
                        <rect x="12" y="12" width="16" height="16" rx="2" transform="rotate(45 20 20)" fill="#D38C2F"/>
                    </svg>
                    <span>Leather jacket house</span>
                </div>
                <p>Explore premium leather jackets for men and women, including bomber, cafe racer, varsity, biker, and hooded styles crafted for everyday wear.</p>
                <div class="footer-social-links" aria-label="<?php esc_attr_e('Social Media Links', 'leather-jacket-house'); ?>">
                    <a href="https://instagram.com" class="social-btn" aria-label="Instagram" target="_blank" rel="noopener">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                        </svg>
                    </a>
                    <a href="https://facebook.com" class="social-btn" aria-label="Facebook" target="_blank" rel="noopener">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                        </svg>
                    </a>
                    <a href="https://pinterest.com" class="social-btn" aria-label="Pinterest" target="_blank" rel="noopener">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M8 12a4 4 0 1 1 8 0 4 4 0 0 1-8 0z"></path>
                            <path d="M10.5 17.5L9 22l3.5-3.5"></path>
                        </svg>
                    </a>
                    <a href="https://twitter.com" class="social-btn" aria-label="X (Twitter)" target="_blank" rel="noopener">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Column 2: Shop -->
            <div class="footer-col">
                <h4>Shop</h4>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                    <li><a href="<?php echo esc_url(home_url('/product-category/women/')); ?>">Women wear</a></li>
                    <li><a href="<?php echo esc_url(home_url('/product-category/men/')); ?>">Men wear</a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact US</a></li>
                </ul>
            </div>

            <!-- Column 3: The Company -->
            <div class="footer-col">
                <h4>The Company</h4>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url(home_url('/about/')); ?>">About US</a></li>
                    <li><a href="<?php echo esc_url(home_url('/terms-of-use/')); ?>">Terms of use</a></li>
                    <li><a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">Privacy Policy</a></li>
                    <li><a href="<?php echo esc_url(home_url('/size-guide/')); ?>">Size guide</a></li>
                </ul>
            </div>

            <!-- Column 4: Client Services -->
            <div class="footer-col">
                <h4>Client Services</h4>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url(home_url('/shipping-delivery/')); ?>">shipping & delivery</a></li>
                    <li><a href="<?php echo esc_url(home_url('/return-policy/')); ?>">Return policy</a></li>
                    <li><a href="<?php echo esc_url(home_url('/track-order/')); ?>">Track Order</a></li>
                    <li><a href="<?php echo esc_url(home_url('/faq/')); ?>">FAQ</a></li>
                </ul>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="footer-bottom-bar">
            <div class="copyright-text">
                Leather Jacket House &copy; <?php echo date('Y'); ?>. All Rights Reserved.
            </div>
            <div class="payment-gateways-badges">
                <span style="margin-right: 8px; color: #888;">We accept:</span>
                <span class="payment-badge">VISA</span>
                <span class="payment-badge">MasterCard</span>
                <span class="payment-badge">AMEX</span>
                <span class="payment-badge">PayPal</span>
                <span class="payment-badge">Apple Pay</span>
                <span class="payment-badge">Stripe</span>
            </div>
        </div>
    </div>
</footer>

<!-- Interactive Size Guide Modal -->
<div id="size-guide-modal" class="modal-overlay" role="dialog" aria-modal="true" aria-labelledby="size-guide-heading">
    <div class="modal-content">
        <button class="modal-close" aria-label="<?php esc_attr_e('Close Modal', 'leather-jacket-house'); ?>">&times;</button>
        <h3 id="size-guide-heading" class="font-serif" style="font-size: 1.8rem; margin-bottom: 16px;">Jacket Size Guide</h3>
        <p style="color: var(--color-text-muted); margin-bottom: 20px; font-size: 0.95rem;">All measurements are in inches. For a relaxed fit or layering over thick hoodies, we recommend sizing up.</p>
        <table style="width: 100%; border-collapse: collapse; font-size: 0.9rem; text-align: left;">
            <thead>
                <tr style="background: var(--color-cream); border-bottom: 2px solid var(--color-border);">
                    <th style="padding: 10px;">Size</th>
                    <th style="padding: 10px;">Chest</th>
                    <th style="padding: 10px;">Shoulder</th>
                    <th style="padding: 10px;">Length</th>
                    <th style="padding: 10px;">Sleeve</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border-bottom: 1px solid var(--color-border);"><td style="padding: 10px; font-weight: 600;">XS</td><td style="padding: 10px;">36 - 38"</td><td style="padding: 10px;">17.5"</td><td style="padding: 10px;">25.0"</td><td style="padding: 10px;">25.0"</td></tr>
                <tr style="border-bottom: 1px solid var(--color-border);"><td style="padding: 10px; font-weight: 600;">S</td><td style="padding: 10px;">38 - 40"</td><td style="padding: 10px;">18.0"</td><td style="padding: 10px;">25.5"</td><td style="padding: 10px;">25.5"</td></tr>
                <tr style="border-bottom: 1px solid var(--color-border);"><td style="padding: 10px; font-weight: 600;">M</td><td style="padding: 10px;">40 - 42"</td><td style="padding: 10px;">18.5"</td><td style="padding: 10px;">26.0"</td><td style="padding: 10px;">26.0"</td></tr>
                <tr style="border-bottom: 1px solid var(--color-border);"><td style="padding: 10px; font-weight: 600;">L</td><td style="padding: 10px;">42 - 44"</td><td style="padding: 10px;">19.0"</td><td style="padding: 10px;">26.5"</td><td style="padding: 10px;">26.5"</td></tr>
                <tr style="border-bottom: 1px solid var(--color-border);"><td style="padding: 10px; font-weight: 600;">XL</td><td style="padding: 10px;">44 - 46"</td><td style="padding: 10px;">19.5"</td><td style="padding: 10px;">27.0"</td><td style="padding: 10px;">27.0"</td></tr>
                <tr><td style="padding: 10px; font-weight: 600;">XXL</td><td style="padding: 10px;">46 - 48"</td><td style="padding: 10px;">20.0"</td><td style="padding: 10px;">27.5"</td><td style="padding: 10px;">27.5"</td></tr>
            </tbody>
        </table>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
