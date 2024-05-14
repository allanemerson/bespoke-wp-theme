<?php

use Bespoke\Template;

/*
* Columns display will be the number of children up to 5 per row
*/
$columns = count($block->parsed_block['innerBlocks']);
$columns = $columns < 6 ? $columns : 5;
?>
<div <?php echo get_block_wrapper_attributes(Template::getBlockAtts($block)) ?>>
    <div class="container" style="--column-count: <?php echo $columns ?>">
        <div class="grid <?php echo esc_attr(Template::getAttribute($attributes, 'mobile_layout')); ?>">
            <?php echo wp_kses_post($content) ?>
        </div>
    </div>
</div>
