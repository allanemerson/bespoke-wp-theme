<?php

namespace Bespoke;

class Blocks
{
    protected $custom_blocks;

    public function __construct()
    {
        add_action('init', array( $this, 'blocksInit' ));
        add_filter('allowed_block_types_all', array( $this, 'allowedBlockTypes' ), 10, 2);
        $this->custom_blocks = array();
    }

    /**
     * Registers blocks by finding the block.json files in our build directory
     */
    public function blocksInit()
    {
        $block_directories = glob(get_theme_file_path('/blocks/build/*'), GLOB_ONLYDIR);
        foreach ($block_directories as $block) :
            register_block_type($block);
            $metadata              = wp_json_file_decode($block . '/block.json', array( 'associative' => true ));
            $this->custom_blocks[] = $metadata['name'];
        endforeach;
    }

    /**
     * Creates allow-list of blocks for authors
     */
    public function allowedBlockTypes($allowed_block_types, $block_editor_context)
    {
        $allowedBlocks = [
            'core/address',
            'core/block', // necessary for patterns
            'core/button',
            'core/buttons',
            'core/group',
            'core/heading',
            'core/html',
            'core/image',
            'core/list-item',
            'core/list',
            'core/more',
            'core/paragraph',
            'core/pullquote',
            'core/separator',
            'core/shortcode',
            'core/table',
            'core/video',
            'gravityforms/form',
        ];
        return array_merge($this->custom_blocks, $allowedBlocks);
    }
}
