<?php

namespace Bespoke;

class Admin extends Actions
{

	function __construct()
	{
		add_action('login_head', [$this, 'login_head']);
		add_filter('login_headerurl', [$this, 'login_headerurl']);
		add_action('admin_enqueue_scripts', [$this, 'admin_enqueue_scripts']);
		add_action('enqueue_block_assets', [$this, 'enqueue_block_assets']);
		add_action('admin_menu', [$this, 'front_page_on_pages_menu']);
	}

	/**
	 * Registers scripts for the admin
	 */
	function admin_enqueue_scripts($hook)
	{
		wp_enqueue_script('theme-editor', parent::getAsset('/js/editor.js'), ['wp-blocks', 'wp-edit-post']);
	}

	/**
	 * Registers scripts for our blocks
	 * Use is_admin() to isolate admin styles to the editor because these enqueue to the front too
	 */
	function enqueue_block_assets()
	{
		if (is_admin()) {
			wp_enqueue_style('theme-editor', parent::getAsset('/css/editor.css'), []);
		}
	}

	/**
	 * Replaces the Wordpress logo on the login screen
	 */
	function login_head()
	{
		echo '<style type="text/css">
			#login h1 a {
				background-image: url("/assets/images/branding/logo.svg");
				background-size: 100%;
				width: 200px;
				height: 92px;
			}
		</style>';
	}

	/**
	 * Links the login logo to the front
	 */
	function login_headerurl()
	{
		return esc_url(home_url());
	}

	/*
	* Adds Front Page edit link to admin Pages menu
	*/
	function front_page_on_pages_menu()
	{
		global $submenu;
		if (get_option('page_on_front')) {
			$submenu['edit.php?post_type=page'][501] = array(
				__('Front Page', 'bespoke'),
				'manage_options',
				get_edit_post_link(get_option('page_on_front'))
			);
		}
	}
}
