<?php
get_header();
while (have_posts()) :
    the_post();
    ?>
    <article>
        <?php get_template_part('parts/element/page-header', null, array( 'title' => get_the_title() )); ?>
        <div class="article-content">
            <?php if (has_post_thumbnail()) : ?>
                <div class="featured-image"><?php the_post_thumbnail('featured'); ?></div>
            <?php endif; ?>
            <?php the_content(); ?>
        </div>
    </article>
    <?php
endwhile;
get_footer();
