<?php
/**
 * Checkout Form
 *
 * @package Leather_Jacket_House
 */

if (!defined('ABSPATH')) {
    exit;
}

do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
    echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
    return;
}
?>

<div class="container" style="padding-top: 40px; padding-bottom: 80px;">
    <h1 class="font-serif" style="font-size: 2.4rem; margin-bottom: 30px;">Secure Checkout</h1>

    <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

        <?php if ($checkout->get_checkout_fields()) : ?>

            <?php do_action('woocommerce_checkout_before_customer_details'); ?>

            <div class="col2-set" id="customer_details" style="display: grid; grid-template-columns: 1fr; gap: 40px; margin-bottom: 40px;">
                <div class="col-1">
                    <?php do_action('woocommerce_checkout_billing'); ?>
                </div>

                <div class="col-2">
                    <?php do_action('woocommerce_checkout_shipping'); ?>
                </div>
            </div>

            <?php do_action('woocommerce_checkout_after_customer_details'); ?>

        <?php endif; ?>
        
        <?php do_action('woocommerce_checkout_before_order_review_heading'); ?>
        
        <h3 id="order_review_heading" class="font-serif" style="font-size: 1.8rem; margin-bottom: 20px;"><?php esc_html_e('Your Order Summary', 'woocommerce'); ?></h3>
        
        <?php do_action('woocommerce_checkout_before_order_review'); ?>

        <div id="order_review" class="woocommerce-checkout-review-order" style="background: var(--color-cream-light); padding: 32px; border-radius: 8px; border: 1px solid var(--color-border);">
            <?php do_action('woocommerce_checkout_order_review'); ?>
        </div>

        <?php do_action('woocommerce_checkout_after_order_review'); ?>

    </form>
</div>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>
