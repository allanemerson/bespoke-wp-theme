<?php

/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

use Bespoke\Template;

$columns = count($block->parsed_block['innerBlocks']);
$columns = $columns < 6 ? $columns : 5;
?>
<div <?php echo get_block_wrapper_attributes(Template::getBlockAtts($block)) ?>>
    <div class="container" style="--column-count: <?php echo $columns ?>">
        <div class="grid <?php echo Template::getAttribute($attributes, 'mobile_layout'); ?>">
            <?php echo $content ?>
        </div>
    </div>
</div>
