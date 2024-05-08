<?php
$current_page      = get_query_var('paged') ?: 1;
$selected_per_page = get_query_var('posts_per_page');
$total             = $wp_query->found_posts;
$max               = $selected_per_page * $current_page < $total ? $selected_per_page * $current_page : $total;
$min               = $max - $selected_per_page + 1 > 0 ? $max - $selected_per_page + 1 : 1; // check for negative number to handle per-page settings greater than found posts.
$per_page_setting  = intval(get_option('posts_per_page'));
$per_page_options  = array( $per_page_setting, $per_page_setting * 1.5, $per_page_setting * 2 );
?>
<div class="paging">
    <span class="paging-num"><?php echo intval($min); ?>-<?php echo intval($max); ?> of <?php echo intval($total); ?></span>
    <div class="dropdown">
        <button aria-expanded="false">
            Show <?php echo intval($selected_per_page); ?>
        </button>
        <ul>
            <?php foreach ($per_page_options as $opt) : ?>
                <li>
                    <a class="<?php echo $opt === $selected_per_page ? 'active' : ''; ?>" href="<?php echo esc_url(get_post_type_archive_link(get_post_type())); ?>?per_page=<?php echo intval($opt); ?>">Show <?php echo intval($opt); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php
    the_posts_pagination(
        array(
            'prev_text' => '<span class="visually-hidden">previous page</span>
					<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewbox="0 0 10 16" fill="none">
						<use href="#navigate-left" />
					</svg>',
            'next_text' => '<span class="visually-hidden">previous page</span>
					<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewbox="0 0 10 16" fill="none">
						<use href="#navigate-right" />
					</svg>',
        )
    );
    ?>
</div>
