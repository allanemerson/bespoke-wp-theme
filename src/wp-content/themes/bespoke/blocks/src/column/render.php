<?php

/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<div <?= get_block_wrapper_attributes(Bespoke\Template::get_block_atts($block)) ?>>
	<div class="body"><?= $content ?></div>
</div>