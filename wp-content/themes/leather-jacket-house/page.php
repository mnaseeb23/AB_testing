<?php
/**
 * The template for displaying all pages
 *
 * @package Leather_Jacket_House
 */

get_header();
?>

<div class="shop-page-hero">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <div class="shop-breadcrumbs">
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> / <span><?php the_title(); ?></span>
        </div>
    </div>
</div>

<div class="container" style="padding-top: 50px; padding-bottom: 90px;">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
</div>

<?php
get_footer();
