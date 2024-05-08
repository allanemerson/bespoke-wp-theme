<?php

/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

use Bespoke\Template;

$image = Template::getImage($attributes, 'image');
$atts = !empty($image) ? ['class' => 'has-image'] : [];
?>
<header <?php echo get_block_wrapper_attributes($atts) ?>>
    <div class="container">
        <?php if (!empty($image)) : ?>
            <picture>
                <source media="(min-width: 768px)" srcset="<?php echo wp_get_attachment_image_url($image['id'], "hero") ?>">
                <?php echo wp_get_attachment_image($image['id'], "square") ?>
            </picture>
        <?php endif; ?>
        <div class="body">
            <?php echo $content ?>
        </div>
    </div>
</header>
