<?php
use Bespoke\Template;

get_header();
while (have_posts()) :
    the_post();
    ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php
        if (! Template::hasHeading1()) :
            get_template_part('parts/element/page-header', null, array( 'title' => get_the_title() ));
        endif;
        ?>
        <div class="page-content">
            <?php the_content(); ?>
        </div>
    </div>
    <?php
endwhile;
get_footer();
