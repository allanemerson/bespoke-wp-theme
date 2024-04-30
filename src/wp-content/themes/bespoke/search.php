<?php
get_header();
?>
<div class="container">
	<header>
		<h1>
			Search results for &ldquo;<?= get_search_query() ?>&rdquo;
		</h1>
	</header>
	<?php
	if (have_posts()) :
	?>
		<div class="article-grid">
			<?php
			while (have_posts()) :
				the_post();
				get_template_part('parts/loop/post');
			endwhile;
			?>
		</div>
		<?php get_template_part('parts/element/paging') ?>
	<?php
	else :
		get_template_part('parts/element/not-found', '', ['text' => 'Sorry, but nothing matched your search terms. Please try again with different keywords.']);
	endif;
	?>
</div>
<?php
get_footer();
