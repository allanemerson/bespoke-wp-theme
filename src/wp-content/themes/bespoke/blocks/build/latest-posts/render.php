<?php
$args = [
	'post_type' => 'post',
	'post_status' => 'publish',
	'posts_per_page' => 9,
];

$posts = new WP_Query($args);
if ($posts->have_posts()) :
?>
	<section <?php echo get_block_wrapper_attributes(); ?>>
		<div class="container">
			<div class="slider-articles">
				<header class="block-header is-style-minimal">
					<?php if ($t = Bespoke\Template::get_attribute($attributes, 'heading')) : ?>
						<h2><?php echo $t ?></h2>
					<?php endif; ?>
					<div class="slider-controls">
						<a href="<?php echo get_post_type_archive_link('post') ?>" class="block-header-link">
							More Like This
						</a>
						<?php if ($posts->found_posts > 3) : ?>
							<div class="slider-paging">
								<button class="slider-btn slider-prev" aria-label="Previous">
									<svg xmlns="http://www.w3.org/2000/svg" width="10" height="16" fill="none">
										<use href="#navigate-left" />
									</svg>
								</button>
								<button class="slider-btn slider-next" aria-label="Next">
									<svg xmlns="http://www.w3.org/2000/svg" width="10" height="16" fill="none">
										<use href="#navigate-right" />
									</svg>
								</button>
							</div>
						<?php endif; ?>
					</div>
				</header>
				<div class="swiper-wrapper">
					<?php
					while ($posts->have_posts()) : $posts->the_post(); ?>
						<div class="swiper-slide">
							<?php get_template_part('parts/loop/post'); ?>
						</div>
					<?php endwhile;
					wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
	</section>
<?php
endif;
?>