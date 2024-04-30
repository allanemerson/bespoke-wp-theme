<?php
get_header();
if (have_posts()) :  ?>
	<div class="article-grid">
		<?php
		while (have_posts()) :
			the_post();
			get_template_part('parts/loop/' . get_post_type());
		endwhile;
		?>
	</div>
<?php
	get_template_part('parts/element/paging');
else :
	get_template_part('parts/element/not-found', null, ['text' => 'Sorry, no articles found for this topic.']);
endif;
get_footer();
