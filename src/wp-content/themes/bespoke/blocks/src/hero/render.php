<?php

/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
$mainImage = Bespoke\Template::get_attribute($attributes, 'main_image');
$secondaryImage = Bespoke\Template::get_attribute($attributes, 'secondary_image');
$atts = $mainImage['id'] ? ['class' => 'has-main-image'] : [];
?>
<header <?= get_block_wrapper_attributes($atts) ?>>
	<div class="container-large">
		<?php if ($mainImage['id']) : ?>
			<picture class="main-img">
				<source media="(min-width: 768px)" srcset="<?= wp_get_attachment_image_url($mainImage['id'], "hero") ?>">
				<?php echo wp_get_attachment_image($mainImage['id'], "square") ?>
				<!-- <img src="/assets/images/placeholders/heros/hero-1-sm.jpg" alt="" class="img-fluid" width="1410" height="700" decoding="async" loading="lazy"> -->
			</picture>
		<?php endif; ?>
		<div class="grid">
			<?php if ($secondaryImage['id']) : ?>
				<figure class="secondary-img">
					<?php echo wp_get_attachment_image($secondaryImage['id'], "square") ?>
				</figure>
			<?php endif; ?>
			<div class="body">
				<?= $content ?>
			</div>
		</div>
	</div>
</header>