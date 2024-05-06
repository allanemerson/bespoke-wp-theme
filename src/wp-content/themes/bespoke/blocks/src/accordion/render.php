<?php

/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<div <?php echo get_block_wrapper_attributes(Bespoke\Template::get_block_atts($block)) ?>>
	<div class="container-large">
		<?php
		if ($attributes['contentType'] != 'custom') :
			$term = Bespoke\Template::get_attribute($attributes, 'category');
			$heading = 'All Positions';
			$args = [
				'post_type' => $attributes['contentType'],
				'post_status' => 'publish',
				'posts_per_page' => -1
			];
			if ($term && $attributes['contentType'] == 'career') {
				$args['tax_query'] = [
					[
						'taxonomy' => 'career-category',
						'field' => 'term_id',
						'terms' => $t
					]
				];
				$term = get_term($term, 'career-category');
				$heading = $term->name;
			}

			$posts = new WP_Query($args);

			if ($posts->have_posts()) :
				while ($posts->have_posts()) : $posts->the_post();
					$accordionId = get_the_ID();
					$shareUrl = urlencode(esc_url(get_the_permalink()));
					$meta = [];
					if ($location = get_field('location')) $meta[] = $location;
					if ($company = get_field('company')) {
						$meta[] = $company['name'];
					}
					if ($closing = get_field('closing_date')) $meta[] = 'Closing ' . $closing;
		?>
					<div class="wp-block-bespoke-accordion-item">
						<h3 class="accordion-header">
							<button id="accordion-<?php echo $accordionId ?>-title" type="button" class="accordion-toggle" aria-expanded="false" aria-controls="accordion-<?php echo $accordionId ?>-body">
								<?php the_title() ?>
								<?php if (!empty($meta)) : ?>
									<span class="title-sub"><?php echo implode(' — ', $meta) ?></span>
								<?php endif; ?>
								<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="10" height="16" fill="none">
									<use href="#navigate-right" />
								</svg>
							</button>
						</h3>
						<div class="accordion-body" role="region" aria-labelledby="accordion-<?php echo $accordionId ?>-title" id="accordion-<?php echo $accordionId ?>-body" hidden>
							<?php the_excerpt() ?>
							<div class="item-footer">
								<div class="btn-row">
									<a href="<?php the_permalink() ?>" class="btn">Learn More</a>
									<?php if ($link = get_field('apply_link')) : ?>
										<a href="<?php echo esc_url($link) ?>" target="_blank" class="btn">Apply</a>
									<?php endif; ?>
								</div>
								<?php get_template_part('parts/element/sharing', 'professional') ?>
							</div>
						</div>
					</div>
				<?php
				endwhile;
				wp_reset_postdata();
			else :
				?>
				<div class="not-found">No openings are currently available.</div>
		<?php
			endif;
		else :
			echo $content;
		endif;
		?>
	</div>
</div>