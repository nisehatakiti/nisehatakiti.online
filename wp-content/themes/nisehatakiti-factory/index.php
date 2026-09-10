<?php
/**
 * Nisehatakiti Factory fallback template.
 */
get_header();
?>
<main class="nk-shell">
    <section class="nk-section">
        <div class="nk-container">
            <div class="nk-section__head">
                <div>
                    <p class="nk-kicker">WordPress Factory</p>
                    <h1><?php bloginfo('name'); ?></h1>
                </div>
                <p><?php bloginfo('description'); ?></p>
            </div>

            <?php if (have_posts()) : ?>
                <div class="nk-product-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <article <?php post_class('nk-product'); ?>>
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            <?php endif; ?>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p><?php echo esc_html(nisehatakiti_factory_excerpt()); ?></p>
                        </article>
                    <?php endwhile; ?>
                </div>
                <?php the_posts_pagination(); ?>
            <?php else : ?>
                <p><?php esc_html_e('No content found.', 'nisehatakiti-factory'); ?></p>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>
