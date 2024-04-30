<?php
get_header();
get_template_part('parts/element/page-header', null, ['title' => __('Oops! That page can&rsquo;t be found.', 'bespoke')]);
get_template_part('parts/element/not-found', null, ['text' => __('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'bespoke')]);
get_footer();
