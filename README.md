# Leather Jacket House - Luxury E-Commerce WordPress & WooCommerce Platform

[![WordPress](https://img.shields.io/badge/WordPress-6.7%2B-blue.svg)](https://wordpress.org/)
[![WooCommerce](https://img.shields.io/badge/WooCommerce-9.x-purple.svg)](https://woocommerce.com/)
[![Docker](https://img.shields.io/badge/Docker-Containerized-blue.svg)](https://www.docker.com/)
[![PHP](https://img.shields.io/badge/PHP-8.2-indigo.svg)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-orange.svg)](https://www.mysql.com/)

A pixel-accurate, fully containerized WordPress & WooCommerce e-commerce platform custom-engineered for **Leather Jacket House**. Features an artisan luxury design, complete product catalog, responsive layouts, SEO schema markup, WP-CLI automated provisioning, and turnkey Docker deployment.

---

## 🌟 Key Features

- **100% Pixel-Accurate Luxury Design**: Recreated from the brand design specification with warm saddle cognac accents (`#D38C2F`), gold ratings (`#FFB700`), rich charcoal tones, and editorial typography (`Playfair Display` + `Plus Jakarta Sans`).
- **Fully Dockerized Stack**: Multi-container architecture with WordPress, MySQL 8.0, phpMyAdmin, and WP-CLI automation.
- **Automated Turnkey Provisioning**: WP-CLI entrypoint script automatically installs WordPress core, WooCommerce, Yoast SEO, WP Super Cache, imports catalog sample products, configures currencies, sets up navigation menus, and configures static pages.
- **Complete WooCommerce Store**:
  - Sample leather jackets across 8 categories (Bomber, Biker, Cafe Racer, Varsity, Aviator, Trench Coats, Hooded, Rider).
  - Variations, pricing ($895 - $1295), stock management, sizes (XS - XXL), and material specs.
  - Interactive Size Guide modal and swatch selectors.
  - Stripe and PayPal demo payment gateways configured.
- **Enterprise SEO & Structured Data**:
  - Full Schema.org JSON-LD markup (`Store`, `Product`, `Offer`, `AggregateRating`, `WebSite`, `BreadcrumbList`).
  - Pre-configured `robots.txt` and `sitemap.xml`.
  - OpenGraph and Twitter Card meta tags.
  - Native lazy loading and asset optimization.

---

## 🏗️ Architecture & Tech Stack

```
jackets/
├── .env.example             # Template for environment variables
├── .env                     # Active environment configuration
├── docker-compose.yml       # Multi-container orchestration
├── Dockerfile               # Custom PHP 8.2 + WP-CLI image
├── docker-entrypoint-custom.sh # Container startup & auto-provisioning hook
├── robots.txt               # SEO Crawler directives
├── sitemap.xml              # XML Sitemap
├── wp-cli/
│   ├── setup.sh             # POSIX automated setup script (WP-CLI)
│   └── setup.ps1            # Windows PowerShell launcher
├── sample-data/
│   └── products.json        # Structured product catalog definition
└── wp-content/
    └── themes/
        └── leather-jacket-house/
            ├── style.css    # Theme declaration & CSS variables
            ├── functions.php # Core theme functions & hooks
            ├── header.php   # Semantic header, nav, cart drawer
            ├── footer.php   # 4-column footer, trust badges, modals
            ├── front-page.php # Pixel-accurate homepage matching design
            ├── index.php    # Blog archive template
            ├── single.php   # Single blog post template
            ├── page.php     # Standard page template
            ├── page-about.php # About Us custom template
            ├── page-contact.php # Contact Us custom template
            ├── inc/
            │   ├── seo.php          # Schema.org JSON-LD & meta tags
            │   ├── woocommerce.php  # Store filters, hooks, fragments
            │   └── sample-data.php  # Auto-seeder for products & menus
            ├── assets/
            │   ├── css/
            │   │   ├── main.css     # Homepage & component styles
            │   │   └── woocommerce.css # Store, cart, checkout styles
            │   ├── js/
            │   │   └── main.js      # Navigation, gallery zoom, size selector
            │   └── images/          # High-resolution leather jacket assets
            └── woocommerce/         # Template overrides
                ├── archive-product.php # Shop & category archive
                ├── single-product.php  # Single product layout & tabs
                ├── content-product.php # Product loop card
                ├── cart/cart.php       # Shopping bag template
                └── checkout/form-checkout.php # Checkout template
```

---

## 🚀 Quick Start Guide

### Prerequisites
- [Docker Desktop](https://www.docker.com/products/docker-desktop/) (v20+ with Docker Compose v2+)

### Step 1: Clone / Navigate to Directory
```bash
cd jackets
```

### Step 2: Configure Environment Variables
Copy `.env.example` to `.env` (already pre-configured for local development):
```bash
cp .env.example .env
```

### Step 3: Launch Containers
Start all services in detached mode:
```bash
docker compose up -d --build
```

### Step 4: Access Applications
Once the containers start, the automated WP-CLI setup script runs in the background. Within ~30 seconds, your complete store will be accessible:

| Service | URL | Credentials |
| :--- | :--- | :--- |
| **Store Front** | [http://localhost:8080](http://localhost:8080) | *Public access* |
| **WordPress Admin** | [http://localhost:8080/wp-admin](http://localhost:8080/wp-admin) | **User:** `admin`<br>**Pass:** `AdminPassword2026!` |
| **phpMyAdmin** | [http://localhost:8081](http://localhost:8081) | **User:** `root`<br>**Pass:** `root_secure_pass_2026` |

---

## 🎨 Design Breakdown (Pixel-Accurate Sections)

The homepage (`front-page.php`) precisely implements all 15 sections from the design mockup:

1. **Top Announcement Bar**: "COMPLIMENTARY WORLDWIDE DELIVERY ON ALL LUXURY LEATHER JACKETS • 30-DAY RETURNS".
2. **Header & Navigation**: Geometric brand emblem, navigation links (`Home`, `About us`, `Women`, `Men`, `Shop`, `Blog`, `Contact`), language selector (`English`), user account, and AJAX live cart drawer counter.
3. **Hero Showcase**: Headline *"Leather Jackets for Every Style"*, descriptive copy, and dual CTAs (*"Shop Men's Collection"* & *"Shop Women's Collection"*).
4. **Dual Split Banners**: Side-by-side high-fashion cards for *"MEN'S LEATHER JACKETS"* and *"WOMEN'S LEATHER JACKETS"* with signature cognac CTA buttons.
5. **Featured Categories**: Letter-spaced *"F e a t u r e d   C a t e g o r i e s"* carousel (Bomber, Biker, Varsity, Leather Coats, Aviator).
6. **Just Landed Products**: 8 WooCommerce product cards with price ranges (`$895.00 - $1295.00`), 5-star ratings with `(5) Review` counts, wishlist buttons, and hover cards.
7. **Shop By Style**: 4 visual style blocks (Bomber, Cafe Racer, Varsity, Hooded).
8. **Shop By Color**: 6 circular leather swatches (Black, Brown, Green, Blue, Grey, White).
9. **Shop By Material**: 5 luxury material cards (Lambskin, Cowhide, Sheepskin, Goatskin, Suede).
10. **Shop By Collection**: 2 hero collections (*Classic* & *Luxury*) + 4 curated sub-collections (*Winter*, *Motorcycle*, *Celebrity*, *Best Sellers*).
11. **Shop By Occasion**: 5 lifestyle occasion cards (*Everyday Wear*, *Motorcycle Riding*, *Travel*, *Office Style*, *Weekend Outings*).
12. **Why Choose Leather Jacket House**: 4 value pillars (*Premium Leather*, *Exceptional Craftsmanship*, *Extensive Selection*, *Fast Delivery*).
13. **Editorial Story Showcase**: *"Premium Leather Jackets Designed for Everyday Style"* with full brand narrative and imagery.
14. **Leather Care Guide**: 4-step preservation guide (*Contoured Hanger*, *Soft Cloth Cleaning*, *Natural Conditioning*, *Breathable Storage*).
15. **The Leather Journal & Testimonials**: 3 editorial blog articles with reading times + 5 customer reviews with 5-star verified ratings.
16. **Newsletter Banner & Trust Badges**: *"Join Leather Jacket House"* email form + 3 guarantee pillars (*Free Delivery*, *30 Days Returns*, *Secure Payments*).
17. **4-Column Footer**: Brand biography, social icons, Shop links, Company policies, Client services, and payment badges (Visa, Mastercard, Amex, PayPal, Apple Pay, Stripe).

---

## 🛠️ WP-CLI Commands Reference

You can execute WP-CLI commands directly inside the container:

```bash
# Re-run full setup script
docker compose exec wordpress bash /wp-cli/setup.sh

# List installed plugins
docker compose exec wordpress wp plugin list --allow-root

# Regenerate product thumbnails
docker compose exec wordpress wp media regenerate --yes --allow-root

# Flush cache and rewrite rules
docker compose exec wordpress wp rewrite flush --hard --allow-root

# Export database backup
docker compose exec wordpress wp db export /sample-data/backup.sql --allow-root
```

---

## 🔍 SEO & Performance Optimization

- **Schema.org Structured Data**: Automatically injected via `inc/seo.php` for Google Rich Results (Star ratings, stock status, pricing, seller credentials).
- **Fast Page Speed**:
  - CSS custom variables with minimal runtime overhead.
  - Vanilla JS without heavy external dependencies.
  - Native browser lazy loading on all non-hero images (`loading="lazy"`).
  - Preconnected Google Fonts and optimized HTTP headers.
- **Clean Permalinks**: Configured as `/%postname%/` for human- and crawler-friendly URLs.
- **Robots & Sitemap**: Pre-configured `robots.txt` and `sitemap.xml` referencing all primary URLs and categories.

---

## 🛡️ License

This project is open-source and released under the [GPL-2.0 License](LICENSE). All leather photography and assets are prepared for Leather Jacket House store demonstrations.
