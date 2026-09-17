<?php
/**
 * The main template file
 *
 * @package Leather_Jacket_House
 */

get_header();
?>

<div class="shop-page-hero">
    <div class="container">
        <h1><?php single_post_title(); ?></h1>
        <div class="shop-breadcrumbs">
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> / <span>The Leather Journal</span>
        </div>
    </div>
</div>

<div class="container" style="padding-top: 40px; padding-bottom: 80px;">
    <?php if (have_posts()) : ?>
        <div class="journal-grid">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('journal-card'); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="journal-img-wrap">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('ljh-card', ['loading' => 'lazy']); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="journal-body">
                        <h2 class="journal-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <div style="font-size: 0.95rem; color: var(--color-text-muted); margin-bottom: 16px;">
                            <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                        </div>
                        <div class="journal-meta">
                            <?php echo esc_html(get_the_date('M j, Y')); ?> &bull; 5 min Read
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
        
        <div style="margin-top: 40px; text-align: center;">
            <?php the_posts_pagination([
                'prev_text' => '&larr; Previous',
                'next_text' => 'Next &rarr;',
            ]); ?>
        </div>
    <?php else : ?>
        <p><?php esc_html_e('No articles found.', 'leather-jacket-house'); ?></p>
    <?php endif; ?>
</div>

<?php
get_footer();
