<?php
/**
 * Template Name: About Us Page
 *
 * @package Leather_Jacket_House
 */

get_header();

$theme_uri = get_template_directory_uri();
$img_path = $theme_uri . '/assets/images';
?>

<div class="shop-page-hero">
    <div class="container">
        <h1>About Leather Jacket House</h1>
        <div class="shop-breadcrumbs">
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> / <span>About Us</span>
        </div>
    </div>
</div>

<div class="container" style="padding: 70px 24px 100px; max-width: 1100px;">
    <!-- Story Grid -->
    <div style="display: grid; grid-template-columns: 1fr; gap: 48px; align-items: center; margin-bottom: 70px;">
        <div style="font-size: 1.15rem; line-height: 1.9; color: var(--color-text-main);">
            <h2 class="font-serif" style="font-size: 2.4rem; margin-bottom: 24px; color: var(--color-black);">The Art of Timeless Leather Craftsmanship</h2>
            <p style="margin-bottom: 20px;">
                Founded on an unwavering passion for heritage leatherwear, <strong>Leather Jacket House</strong> crafts garments that stand at the intersection of artisanal mastery, rugged durability, and modern luxury.
            </p>
            <p style="margin-bottom: 20px;">
                Every jacket begins with the careful selection of premium full-grain lambskin, cowhide, and sheepskin hides sourced from certified European tanneries. Our master tailors cut each individual pattern by hand, aligning the natural grain of the hide to ensure seamless drape and unparalleled comfort.
            </p>
            <p>
                From timeless bomber jackets and iconic asymmetrical bikers to tailored shearling coats and sleek cafe racers, we build jackets meant to be lived in, loved, and passed down through generations.
            </p>
        </div>
    </div>

    <!-- 3 Pillars -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 32px; text-align: center; margin-top: 50px;">
        <div style="background: var(--color-cream); padding: 40px 24px; border-radius: 8px;">
            <div style="color: var(--color-primary); font-size: 2rem; margin-bottom: 16px;">★ ★ ★</div>
            <h3 class="font-serif" style="font-size: 1.4rem; margin-bottom: 12px;">Full-Grain Leather</h3>
            <p style="color: var(--color-text-muted); font-size: 0.95rem;">We exclusively use 100% natural, uncorrected full-grain hides that breathe and develop a stunning patina over time.</p>
        </div>
        <div style="background: var(--color-cream); padding: 40px 24px; border-radius: 8px;">
            <div style="color: var(--color-primary); font-size: 2rem; margin-bottom: 16px;">✦ ✦ ✦</div>
            <h3 class="font-serif" style="font-size: 1.4rem; margin-bottom: 12px;">Artisan Tailoring</h3>
            <p style="color: var(--color-text-muted); font-size: 0.95rem;">Over 30 hours of meticulous hand-stitching, precision edge painting, and custom hardware fitment go into every jacket.</p>
        </div>
        <div style="background: var(--color-cream); padding: 40px 24px; border-radius: 8px;">
            <div style="color: var(--color-primary); font-size: 2rem; margin-bottom: 16px;">◆ ◆ ◆</div>
            <h3 class="font-serif" style="font-size: 1.4rem; margin-bottom: 12px;">Lifetime Guarantee</h3>
            <p style="color: var(--color-text-muted); font-size: 0.95rem;">We stand behind our outerwear with a comprehensive warranty covering hardware, zippers, and structural stitching.</p>
        </div>
    </div>
</div>

<?php
get_footer();
