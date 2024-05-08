<a href="<?php the_permalink(); ?>">
    <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('loop'); ?>
    <?php endif; ?>
    <h3>
        <?php the_title(); ?>
    </h3>
    <?php the_excerpt(); ?>
    <?php echo get_the_date(); ?>
</a>
