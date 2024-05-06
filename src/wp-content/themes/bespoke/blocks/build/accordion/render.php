<?php

/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<div <?php echo get_block_wrapper_attributes(Bespoke\Template::get_block_atts($block)) ?>>
	<div class="container">
		<?php
		if ($attributes['contentType'] != 'custom') :
			$args = [
				'post_type' => $attributes['contentType'],
				'post_status' => 'publish',
				'posts_per_page' => 100
			];
			$posts = new WP_Query($args);
			if ($posts->have_posts()) :
				while ($posts->have_posts()) : $posts->the_post();
					$accordion_id = get_the_ID();
		?>
					<div class="wp-block-bespoke-accordion-item">
						<h3 class="accordion-header">
							<button id="accordion-<?php echo $accordion_id ?>-title" type="button" class="accordion-toggle" aria-expanded="false" aria-controls="accordion-<?php echo $accordion_id ?>-body">
								<?php the_title() ?>
								<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="10" height="16" fill="none">
									<use href="#navigate-right" />
								</svg>
							</button>
						</h3>
						<div class="accordion-body" role="region" aria-labelledby="accordion-<?php echo $accordion_id ?>-title" id="accordion-<?php echo $accordion_id ?>-body" hidden>
							<?php the_excerpt() ?>
						</div>
					</div>
		<?php
				endwhile;
				wp_reset_postdata();
			endif;
		else :
			echo $content;
		endif;
		?>
	</div>
</div>