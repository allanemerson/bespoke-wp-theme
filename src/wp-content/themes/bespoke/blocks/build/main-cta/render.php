<?php

/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<div <?= get_block_wrapper_attributes(['class' => 'is-style-global-bg']) ?>>
	<div class="container-large">
		<div class="body">
			<?= $content ?>
		</div>
	</div>
</div>