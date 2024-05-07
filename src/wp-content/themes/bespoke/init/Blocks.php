<?php

namespace Bespoke;

class Blocks
{
	protected $custom_blocks;

	function __construct()
	{
		add_action('init', [$this, 'blocks_init']);
		add_filter('allowed_block_types_all', [$this, 'allowed_block_types'], 10, 2);
		$this->custom_blocks = [];
	}

	/**
	 * Registers blocks by finding the block.json files in our build directory
	 * @return void
	 */
	function blocks_init()
	{
		$block_directories = glob(get_theme_file_path('/blocks/build/*'), GLOB_ONLYDIR);
		foreach ($block_directories as $block) :
			register_block_type($block);
			$metadata = wp_json_file_decode($block . '/block.json', array('associative' => true));
			$this->custom_blocks[] = $metadata['name'];
		endforeach;
	}

	/**
	 * Creates allow-list of blocks for authors
	 * @return array 
	 */
	function allowed_block_types($allowed_block_types, $block_editor_context)
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
