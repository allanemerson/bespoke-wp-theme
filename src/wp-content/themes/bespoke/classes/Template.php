<?php

namespace Bespoke;

class Template
{
    /**
     * Get the primary term for the post, if it exists
     */
    public static function getPrimaryPostTerm(string $taxonomy, int $post_id = null): object|bool
    {
        // If no post ID is provided, set it to the current.
        if (! $post_id) {
            $post_id = get_the_ID();
        }

        // Make sure Yoast is active.
        if (class_exists('WPSEO_Primary_Term')) {
            // Get the primary term.
            $wpseo_primary_term = new \WPSEO_Primary_Term($taxonomy, $post_id);
            $wpseo_primary_term = $wpseo_primary_term->get_primary_term();

            // If we have one, return it.
            if ($wpseo_primary_term) {
                $term_object = get_term($wpseo_primary_term);

                if ('Uncategorized' === $term_object->name) {
                    return false;
                }

                return $term_object;
            }
        }

        // If no primary is found, get all the terms for the post.
        $terms = get_the_terms($post_id, $taxonomy);

        // If no terms are available for the post, fail.
        if (! $terms || is_wp_error($terms)) {
            return false;
        }

        if ('Uncategorized' === $terms[0]->name) {
            return false;
        }

        // Return the first term if terms are available.
        return $terms[0];
    }


    /**
     * Checks for existance of image ID within block attributes before output
     */
    public static function getImage(array $attributes, string $key, string $size = 'full'): array
    {
        if (! isset($attributes[ $key ])) {
            return [];
        }
        if (! $attributes[ $key ]['id']) {
            return [];
        }
        $img = wp_get_attachment_image_src($attributes[ $key ]['id'], $size);
        return array(
            'id'     => $attributes[ $key ]['id'],
            'width'  => $img[1],
            'height' => $img[2],
            'url'    => $img[0],
            'alt'    => get_post_meta($attributes[ $key ]['id'], '_wp_attachment_image_alt', true),
        );
    }


    /**
     * Checks for existance of key in block attributes before output
     */
    public static function getAttribute(array $attributes, string $key): string|bool
    {
        if (! isset($attributes[ $key ])) {
            return false;
        }
        return esc_html($attributes[ $key ]);
    }

    /**
     * Sets up addtional classes for get_block_wrapper_attributes
     */
    public static function getBlockAtts(\WP_Block $block): array
    {
        $atts = array( 'class' => [] );
        if (isset($block->parsed_block['attrs']['style']['background']['backgroundImage'])) {
            $atts['class'][] = 'has-background';
        }
        if (isset($block->parsed_block['attrs']['anchor'])) {
            $atts['id'] = $block->parsed_block['attrs']['anchor'];
        }

        /*
        // if (!empty($block->parsed_block['innerBlocks'])) {
        //  $blocks = $block->parsed_block['innerBlocks'];
        //  if (self::hasBlock($blocks, 'gravityforms/form')) {
        //      $atts['class'][] = 'has-form';
        //  };
        // }
        */
        if (! empty($atts['class'])) {
            $atts['class'] = implode(' ', $atts['class']);
        }

        return $atts;
    }


    /**
     *  Checks if child block exists within tree
     */
    public static function hasBlock(iterable $blocks, string $block_name): bool
    {
        foreach ($blocks as $block) {
            if ($block['blockName'] === $block_name) {
                return true;
            }
            if ($block['innerBlocks']) {
                // Capture the result and only return if it's true.
                // Otherwise we don't traverse other branches of the tree.
                $result = self::hasBlock($block['innerBlocks'], $block_name);
                if (false !== $result) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Checks for h1 tag anywhere in the post/page content
     */
    public static function hasHeading1(): bool
    {
        // Bypass the below check if we know some blocks hard code in the h1.
        if (has_block('bespoke/hero')) {
            return true;
        }

        $blocks = parse_blocks(get_the_content());
        return self::findHeading1($blocks);
    }

    /**
     * Checks for h1 tag anywhere in the post/page content
     */
    public static function findHeading1(iterable $blocks): bool
    {
        foreach ($blocks as $block) {
            if ('core/heading' === $block['blockName']) {
                if (1 === isset($block['attrs']['level']) && $block['attrs']['level']) {
                    return true;
                }
            }
            if ($block['innerBlocks']) {
                foreach ($block['innerBlocks'] as $blocks) {
                    $result = self::findHeading1($block['innerBlocks']);
                    if (false !== $result) {
                        return true;
                    }
                }
            }
        }
        return false;
    }
}
