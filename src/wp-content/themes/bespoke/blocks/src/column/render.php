<?php

/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<div <?php echo get_block_wrapper_attributes(Bespoke\Template::get_block_atts($block)) ?>>
	<div class="body"><?php echo $content ?></div>
</div>