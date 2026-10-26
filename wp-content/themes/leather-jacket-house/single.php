<?php
/**
 * The template for displaying all single posts
 *
 * @package Leather_Jacket_House
 */
return false;
get_header();
?>

<div class="shop-page-hero">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <div class="shop-breadcrumbs">
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> / <a href="<?php echo esc_url(home_url('/blog/')); ?>">The Leather Journal</a> / <span><?php the_title(); ?></span>
        </div>
    </div>
</div>

<div class="container" style="max-width: 900px; padding-top: 50px; padding-bottom: 90px;">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('single-post-article'); ?>>
            <?php if (has_post_thumbnail()) : ?>
                <div style="border-radius: 8px; overflow: hidden; margin-bottom: 36px; box-shadow: var(--shadow-md);">
                    <?php the_post_thumbnail('full'); ?>
                </div>
            <?php endif; ?>

            <div style="font-size: 0.9rem; color: var(--color-primary); font-weight: 600; text-transform: uppercase; margin-bottom: 16px;">
                Published <?php echo esc_html(get_the_date()); ?> &bull; By <?php the_author(); ?>
            </div>

            <div class="post-content" style="font-size: 1.1rem; line-height: 1.9; color: var(--color-text-main);">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
</div>

<?php
get_footer();
