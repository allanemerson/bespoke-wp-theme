<?php

/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<div <?php echo get_block_wrapper_attributes(['class' => 'is-style-global-bg']) ?>>
	<div class="container">
		<div class="body">
			<?php echo $content ?>
		</div>
	</div>
</div>