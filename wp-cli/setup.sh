#!/usr/bin/env bash
# ==============================================================================
# Leather Jacket House - WP-CLI Automated Setup & Provisioning Script
# ==============================================================================
set -euo pipefail

echo "=========================================================="
echo " Starting Leather Jacket House Automated Setup..."
echo "=========================================================="

# Path settings
WP_PATH="/var/www/html"
WP_CLI="wp --path=${WP_PATH} --allow-root"

# Load environment variables if available
if [ -f "/var/www/html/.env" ]; then
    export $(grep -v '^#' /var/www/html/.env | xargs)
fi

WP_SITE_URL="${WP_SITE_URL:-http://localhost:8080}"
WP_ADMIN_USER="${WP_ADMIN_USER:-admin}"
WP_ADMIN_PASSWORD="${WP_ADMIN_PASSWORD:-AdminPassword2026!}"
WP_ADMIN_EMAIL="${WP_ADMIN_EMAIL:-admin@leatherjackethouse.com}"
WP_SITE_TITLE="${WP_SITE_TITLE:-Leather Jacket House}"
WP_TAGLINE="${WP_TAGLINE:-Premium Leather Jackets for Every Style}"
MYSQL_HOST="${WORDPRESS_DB_HOST:-mysql:3306}"
MYSQL_USER="${WORDPRESS_DB_USER:-wordpress}"
MYSQL_PASS="${WORDPRESS_DB_PASSWORD:-wordpress_secure_pass_2026}"
MYSQL_DB="${WORDPRESS_DB_NAME:-wordpress}"

# 1. Wait for MySQL to become ready
echo "--> Step 1: Waiting for MySQL database at ${MYSQL_HOST}..."
max_retries=30
counter=0
# --skip-ssl avoids a TLS certificate verification failure between the
# MariaDB client (bundled in default-mysql-client) and MySQL 8.0's
# self-signed server certificate.
until mysqladmin ping -h "${MYSQL_HOST%%:*}" -u "${MYSQL_USER}" -p"${MYSQL_PASS}" --skip-ssl --silent; do
    counter=$((counter + 1))
    if [ $counter -gt $max_retries ]; then
        echo "Error: MySQL timed out after 60 seconds."
        exit 1
    fi
    echo "    MySQL is warming up... (attempt $counter/$max_retries)"
    sleep 2
done
echo "    MySQL is ready!"

# 2. Check if WordPress core is installed
echo "--> Step 2: Checking WordPress core installation..."
if ! ${WP_CLI} core is-installed; then
    echo "    Installing WordPress core..."
    ${WP_CLI} core install \
        --url="${WP_SITE_URL}" \
        --title="${WP_SITE_TITLE}" \
        --admin_user="${WP_ADMIN_USER}" \
        --admin_password="${WP_ADMIN_PASSWORD}" \
        --admin_email="${WP_ADMIN_EMAIL}" \
        --skip-email
    echo "    WordPress core installed successfully!"
else
    echo "    WordPress is already installed."
fi

# 3. Configure site settings & permalinks
echo "--> Step 3: Configuring Site Options & Permalinks..."
${WP_CLI} option update blogname "${WP_SITE_TITLE}"
${WP_CLI} option update blogdescription "${WP_TAGLINE}"
${WP_CLI} rewrite structure '/%postname%/' --hard

# 4. Install & Activate Plugins (WooCommerce, Yoast SEO, WP Super Cache)
echo "--> Step 4: Installing and Activating E-Commerce & SEO Plugins..."
${WP_CLI} plugin install woocommerce --activate || true
${WP_CLI} plugin install wordpress-seo --activate || true
${WP_CLI} plugin install wp-super-cache --activate || true

# 5. Activate Custom Theme
echo "--> Step 5: Activating Leather Jacket House Custom Theme..."
${WP_CLI} theme activate leather-jacket-house

# 6. Configure WooCommerce Store Settings
echo "--> Step 6: Configuring WooCommerce Store & Payment Gateways..."
${WP_CLI} option update woocommerce_currency "${WC_CURRENCY:-USD}"
${WP_CLI} option update woocommerce_currency_pos "left"
${WP_CLI} option update woocommerce_price_thousand_sep ","
${WP_CLI} option update woocommerce_price_decimal_sep "."
${WP_CLI} option update woocommerce_price_num_decimals "2"
${WP_CLI} option update woocommerce_weight_unit "lbs"
${WP_CLI} option update woocommerce_dimension_unit "in"
${WP_CLI} option update woocommerce_enable_guest_checkout "yes"
${WP_CLI} option update woocommerce_enable_signup_and_login_from_checkout "yes"
${WP_CLI} option update woocommerce_enable_reviews "yes"
${WP_CLI} option update woocommerce_review_rating_verification_required "no"

# Configure Stripe & PayPal Demo Payment Gateways
${WP_CLI} option update woocommerce_bacs_settings '{"enabled":"yes","title":"Direct Bank / Wire Transfer","description":"Make your payment directly into our bank account."}' --format=json || true
${WP_CLI} option update woocommerce_cod_settings '{"enabled":"yes","title":"Cash / Card on Delivery (Select Regions)","description":"Pay upon delivery."}' --format=json || true
${WP_CLI} option update woocommerce_cheque_settings '{"enabled":"yes","title":"Stripe Credit Card (Test Mode)","description":"Pay securely via Visa, MasterCard, AMEX or Apple Pay."}' --format=json || true

# 7. Create Core E-Commerce & Content Pages
echo "--> Step 7: Creating Essential Pages..."

# Home Page
HOME_PAGE_ID=$(${WP_CLI} post list --post_type=page --name=home --field=ID --posts_per_page=1 || echo "")
if [ -z "$HOME_PAGE_ID" ]; then
    HOME_PAGE_ID=$(${WP_CLI} post create --post_type=page --post_title='Home' --post_name='home' --post_status='publish' --porcelain)
fi

# About Page
ABOUT_PAGE_ID=$(${WP_CLI} post list --post_type=page --name=about --field=ID --posts_per_page=1 || echo "")
if [ -z "$ABOUT_PAGE_ID" ]; then
    ABOUT_PAGE_ID=$(${WP_CLI} post create --post_type=page --post_title='About Us' --post_name='about' --post_content='Leather Jacket House is an artisan luxury atelier dedicated to handcrafting genuine leather jackets of exceptional durability and style.' --post_status='publish' --porcelain)
fi

# Contact Page
CONTACT_PAGE_ID=$(${WP_CLI} post list --post_type=page --name=contact --field=ID --posts_per_page=1 || echo "")
if [ -z "$CONTACT_PAGE_ID" ]; then
    CONTACT_PAGE_ID=$(${WP_CLI} post create --post_type=page --post_title='Contact Us' --post_name='contact' --post_content='We are here to assist with custom sizing, bespoke tailoring inquiries, and order tracking. Email: support@leatherjackethouse.com' --post_status='publish' --porcelain)
fi

# Blog / Journal Page
BLOG_PAGE_ID=$(${WP_CLI} post list --post_type=page --name=blog --field=ID --posts_per_page=1 || echo "")
if [ -z "$BLOG_PAGE_ID" ]; then
    BLOG_PAGE_ID=$(${WP_CLI} post create --post_type=page --post_title='The Leather Journal' --post_name='blog' --post_status='publish' --porcelain)
fi

# Set Static Front Page
${WP_CLI} option update show_on_front 'page'
${WP_CLI} option update page_on_front "$HOME_PAGE_ID"
${WP_CLI} option update page_for_posts "$BLOG_PAGE_ID"

# 8. Setup Primary & Footer Menus
echo "--> Step 8: Creating Navigation Menus..."
if ! ${WP_CLI} menu list | grep -q "Primary Menu"; then
    MENU_ID=$(${WP_CLI} menu create "Primary Menu" --porcelain)
    ${WP_CLI} menu item add-post "$MENU_ID" "$HOME_PAGE_ID" --title="Home"
    ${WP_CLI} menu item add-post "$MENU_ID" "$ABOUT_PAGE_ID" --title="About us"
    ${WP_CLI} menu item add-custom "$MENU_ID" "Women" "${WP_SITE_URL}/product-category/women/"
    ${WP_CLI} menu item add-custom "$MENU_ID" "Men" "${WP_SITE_URL}/product-category/men/"
    ${WP_CLI} menu item add-custom "$MENU_ID" "Shop" "${WP_SITE_URL}/shop/"
    ${WP_CLI} menu item add-post "$MENU_ID" "$BLOG_PAGE_ID" --title="Blog"
    ${WP_CLI} menu item add-post "$MENU_ID" "$CONTACT_PAGE_ID" --title="Contact"
    ${WP_CLI} menu location assign "$MENU_ID" primary
fi

# 9. Trigger Sample Data Import & Flush Cache
echo "--> Step 9: Finalizing Configuration & Permalinks..."
${WP_CLI} rewrite flush --hard

echo "=========================================================="
echo " Leather Jacket House Setup Complete!"
echo " Site URL:       ${WP_SITE_URL}"
echo " Admin User:     ${WP_ADMIN_USER}"
echo " Admin Password: ${WP_ADMIN_PASSWORD}"
echo " Admin Email:    ${WP_ADMIN_EMAIL}"
echo " phpMyAdmin:     http://localhost:8081"
echo "=========================================================="
