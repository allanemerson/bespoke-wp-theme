<?php

/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
$columns = count($block->parsed_block['innerBlocks']);
$columns = $columns < 6 ? $columns : 5;
?>
<div <?= get_block_wrapper_attributes(Bespoke\Template::get_block_atts($block)) ?>>
	<div class="container-large" style="--column-count: <?= $columns ?>">
		<div class="grid <?= Bespoke\Template::get_attribute($attributes, 'mobile_layout'); ?>">
			<?= $content ?>
		</div>
	</div>
</div>