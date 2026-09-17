<?php
/**
 * Template Name: Contact Us Page
 *
 * @package Leather_Jacket_House
 */

get_header();
?>

<div class="shop-page-hero">
    <div class="container">
        <h1>Contact Leather Jacket House</h1>
        <div class="shop-breadcrumbs">
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> / <span>Contact Us</span>
        </div>
    </div>
</div>

<div class="container" style="padding: 70px 24px 100px; max-width: 1100px;">
    <div style="display: grid; grid-template-columns: 1fr; gap: 48px;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 32px; margin-bottom: 40px;">
            <div style="background: var(--color-cream); padding: 32px 24px; border-radius: 8px;">
                <h3 class="font-serif" style="font-size: 1.3rem; margin-bottom: 12px; color: var(--color-black);">Bespoke &amp; Sizing Inquiries</h3>
                <p style="color: var(--color-text-muted); font-size: 0.95rem; line-height: 1.7;">
                    Need assistance choosing your size or looking for bespoke custom tailoring?<br>
                    <strong>Email:</strong> concierge@leatherjackethouse.com<br>
                    <strong>Phone:</strong> +1 (800) 555-JACKET
                </p>
            </div>
            <div style="background: var(--color-cream); padding: 32px 24px; border-radius: 8px;">
                <h3 class="font-serif" style="font-size: 1.3rem; margin-bottom: 12px; color: var(--color-black);">Order Tracking &amp; Returns</h3>
                <p style="color: var(--color-text-muted); font-size: 0.95rem; line-height: 1.7;">
                    Track an active shipment or initiate a 30-day return.<br>
                    <strong>Email:</strong> support@leatherjackethouse.com<br>
                    <strong>Hours:</strong> Mon - Sat, 9:00 AM - 8:00 PM EST
                </p>
            </div>
        </div>

        <!-- Contact Form -->
        <div style="background: var(--color-white); border: 1px solid var(--color-border); padding: 40px; border-radius: 8px; box-shadow: var(--shadow-sm);">
            <h2 class="font-serif" style="font-size: 2rem; margin-bottom: 24px;">Send Us a Message</h2>
            <form action="#" method="post" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div>
                    <label style="display: block; font-weight: 600; font-size: 0.9rem; margin-bottom: 8px;">Your Name *</label>
                    <input type="text" required style="width: 100%; padding: 12px 16px; border: 1px solid var(--color-border); border-radius: 4px; font-size: 0.95rem;">
                </div>
                <div>
                    <label style="display: block; font-weight: 600; font-size: 0.9rem; margin-bottom: 8px;">Your Email *</label>
                    <input type="email" required style="width: 100%; padding: 12px 16px; border: 1px solid var(--color-border); border-radius: 4px; font-size: 0.95rem;">
                </div>
                <div style="grid-column: 1 / -1;">
                    <label style="display: block; font-weight: 600; font-size: 0.9rem; margin-bottom: 8px;">Subject</label>
                    <input type="text" style="width: 100%; padding: 12px 16px; border: 1px solid var(--color-border); border-radius: 4px; font-size: 0.95rem;">
                </div>
                <div style="grid-column: 1 / -1;">
                    <label style="display: block; font-weight: 600; font-size: 0.9rem; margin-bottom: 8px;">Message *</label>
                    <textarea rows="5" required style="width: 100%; padding: 12px 16px; border: 1px solid var(--color-border); border-radius: 4px; font-size: 0.95rem;"></textarea>
                </div>
                <div style="grid-column: 1 / -1;">
                    <button type="submit" class="btn btn-cognac" style="padding: 14px 40px;">Send Message</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
get_footer();
