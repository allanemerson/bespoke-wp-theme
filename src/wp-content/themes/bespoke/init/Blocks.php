<?php

namespace Bespoke;

class Blocks
{
	private $custom_blocks;

	function __construct()
	{
		add_action('init', [$this, 'blocks_init']);
		add_filter('allowed_block_types_all', [$this, 'allowed_block_types'], 10, 2);
		$this->custom_blocks = [];
	}

	function blocks_init()
	{
		$block_directories = glob(get_theme_file_path('/blocks/build/*'), GLOB_ONLYDIR);
		foreach ($block_directories as $block) :
			register_block_type($block);
			$metadata = wp_json_file_decode($block . '/block.json', array('associative' => true));
			$this->custom_blocks[] = $metadata['name'];
		endforeach;
	}

	function allowed_block_types($allowed_block_types, $block_editor_context)
	{
		$allowedBlocks = [
			'core/pullquote',
			'core/list',
			'core/list-item',
			'core/heading',
			'core/button',
			'core/buttons',
			'core/image',
			'core/table',
			'core/more',
			'core/video',
			'core/html',
			'core/shortcode',
			'core/group',
			'core/separator',
			'core/address',
			'gravityforms/form',
			'core/paragraph', // leave this so you can copy & past blocks into new lines
			'core/block', // DO NOT REMOVE THIS, OR REUSABLE BLOCKS WILL BE MISSING FROM YOUR OPTIONS
		];
		return array_merge($this->custom_blocks, $allowedBlocks);
	}
}
