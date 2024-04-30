<?php
$currentPage = get_query_var('paged') ?: 1;
$perPage = get_query_var('posts_per_page');
$total = $wp_query->found_posts;
$max = $perPage * $currentPage < $total ? $perPage * $currentPage : $total;
$min = $max - $perPage + 1 > 0 ? $max - $perPage + 1 : 1; // check for negative number to handle per-page settings greater than found posts
$perPageSetting = get_option('posts_per_page');
$perPageOptions = [$perPageSetting, $perPageSetting * 1.5, $perPageSetting * 2];
?>
<div class="paging">
	<span class="paging-num"><?= $min ?>-<?= $max ?> of <?= $total ?></span>
	<div class="dropdown">
		<button aria-expanded="false">
			Show <?= $perPage ?>
		</button>
		<ul>
			<?php foreach ($perPageOptions as $opt) : ?>
				<li>
					<a class="<?= $opt == $perPage ? 'active' : '' ?>" href="<?= get_post_type_archive_link(get_post_type()) ?>?per_page=<?= $opt ?>">Show <?= $opt ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php the_posts_pagination([
		'prev_text' => '<span class="visually-hidden">previous page</span>
					<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewbox="0 0 10 16" fill="none">
						<use href="#navigate-left" />
					</svg>',
		'next_text' => '<span class="visually-hidden">previous page</span>
					<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewbox="0 0 10 16" fill="none">
						<use href="#navigate-right" />
					</svg>'
	]); ?>
</div>