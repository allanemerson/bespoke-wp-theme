<?php

namespace Bespoke;

class Actions
{

	public function __construct()
	{
		remove_action('wp_head', 'print_emoji_detection_script', 7);
		remove_action('admin_print_scripts', 'print_emoji_detection_script');
		remove_action('wp_print_styles', 'print_emoji_styles');
		remove_action('admin_print_styles', 'print_emoji_styles');
		add_action('wp_head', [$this, 'gtm_head'], 1);
		add_action('wp_head', [$this, 'favicons'], 5);
		add_action('wp_head', [$this, 'ga'], 10);
		add_action('wp_head', [$this, 'pingback'], 10);
		add_action('wp_head', [$this, 'noconflict'], 99);
		add_action('wp_head', [$this, 'external_assets'], 7);
		add_action('wp_head', [$this, 'yoast'], ~PHP_INT_MAX);
		add_action('wp_footer', [$this, 'footer_scripts'], 10);
		add_action('after_body_start', [$this, 'gtm_body'], 1);
		add_action('after_body_start', [$this, 'skip'], 5);
		add_action('after_body_start', [$this, 'symbols'], 10);
		add_action('wp_enqueue_scripts', [$this, 'assets'], 10);
		add_action('after_setup_theme', [$this, 'menus'], 10);
		add_action('after_setup_theme', [$this, 'theme_support'], 10);
		// add_action('pre_get_posts', [$this, 'pre_get_posts'], 10);
		$this->images();
	}

	/**
	 * Attemps to load versioned asset in mix-manifest or falls back to enqueued path
	 * @return string
	 */
	function getAsset(string $filename)
	{
		$assetsPath = get_stylesheet_directory() . '/assets/';
		$filePath = $assetsPath . $filename;
		$manifestPath = $assetsPath . 'mix-manifest.json';
		$manifest = (file_exists($manifestPath)) ? json_decode(file_get_contents($manifestPath), true) : [];
		$asset = (@array_key_exists($filename, $manifest)) ? $manifest[$filename] : $filePath;
		return get_stylesheet_directory_uri() . '/assets' . $asset; // $asset will already have a preceeding slash
	}

	/**
	 * Registers/Unregistered theme assets
	 */
	function assets()
	{
		wp_register_style('theme-base', get_template_directory_uri() . '/style.css'); // no versioning because this doesn't change
		wp_register_style('theme', $this->getAsset('/css/theme.css'), false, null);

		wp_register_script('theme', $this->getAsset('/js/theme.js'), ['jquery'], null, true);

		wp_enqueue_style('theme');
		wp_enqueue_script('theme');

		wp_localize_script('site-scripts', 'ajax_global', array(
			'url' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce('ajax-nonce')
		));
		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}

		wp_dequeue_style('wp-block-library');
		wp_dequeue_style('wp-block-library-theme');
		wp_dequeue_style('classic-theme-styles');
	}

	/**
	 * Declares theme support
	 */
	function theme_support()
	{
		remove_theme_support('core-block-patterns');
		add_theme_support('automatic-feed-links');
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
		add_theme_support('responsive-embeds');
		add_theme_support('align-wide');
	}

	/**
	 * Registers/Unregistered theme assets in the footer
	 */
	function footer_scripts()
	{
		wp_dequeue_style('core-block-supports');
	}

	/**
	 * Registers menu locations
	 */
	function menus()
	{
		register_nav_menus([
			'primary' => 'Primary',
			'secondary' => 'Secondary',
			'footer-1' => 'Footer 1',
			'footer-2' => 'Footer 2',
			'footer-3' => 'Footer 3',
			'footer-4' => 'Footer 4',
			'footer-5' => 'Footer 5',
		]);
	}

	/**
	 * Registers image sizes
	 * add_image_size('size', width, height, hard crop)
	 */
	function images()
	{
		add_image_size('hero', 1410, 700, true);
		add_image_size('loop', 450, 330, true);
	}

	/**
	 * Modifies the query before making db request
	 */
	function pre_get_posts($query)
	{
		if (!is_admin()) {
			if ($query->is_main_query()) {
			}
		}
	}

	/**
	 * The next several methods insert various static parts into the theme
	 */
	function external_assets()
	{
		get_template_part('parts/hooked/external-assets');
	}

	function noconflict()
	{
		get_template_part('parts/hooked/noconflict');
	}

	function favicons()
	{
		get_template_part('parts/hooked/favicons');
	}

	function symbols()
	{
		get_template_part('parts/hooked/symbols');
	}

	function skip()
	{
		get_template_part('parts/hooked/skip');
	}

	function ga()
	{
		get_template_part('parts/hooked/ga');
	}

	function gtm_head()
	{
		get_template_part('parts/hooked/gtm', null, ['head' => true]);
	}

	function gtm_body()
	{
		get_template_part('parts/hooked/gtm', null, ['head' => false]);
	}

	function pingback()
	{
		get_template_part('parts/hooked/pingback');
	}

	/**
	 * Removes the comment that Yoast drops in at the end of the page
	 */
	function yoast()
	{
		ob_start(function ($o) {
			return preg_replace('/^\n?<!--.*?[Y]oast.*?-->\n?$/mi', '', $o);
		});
	}
}
