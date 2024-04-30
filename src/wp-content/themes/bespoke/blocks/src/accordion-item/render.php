<?php

/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
$accordionId = wp_unique_id();
?>
<div <?= get_block_wrapper_attributes() ?>>
	<?php if ($t = Bespoke\Template::get_attribute($attributes, 'title')) : ?>
		<h3 class="accordion-header">
			<button id="accordion-<?= $accordionId ?>-title" type="button" class="accordion-toggle" aria-expanded="false" aria-controls="accordion-<?= $accordionId ?>-body">
				<?= $t ?>
				<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="10" height="16" fill="none">
					<use href="#navigate-right" />
				</svg>
			</button>
		</h3>
		<div class="accordion-body" role="region" aria-labelledby="accordion-<?= $accordionId ?>-title" id="accordion-<?= $accordionId ?>-body" hidden>
			<?= $content ?>
		</div>
	<?php endif; ?>
</div>