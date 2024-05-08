<?php

namespace Bespoke;

class Admin extends Actions
{
    public function __construct()
    {
        add_action('login_head', array( $this, 'loginLogo' ));
        add_filter('login_headerurl', array( $this, 'loginLogoUrl' ));
        add_action('admin_enqueue_scripts', array( $this, 'adminEnqueueScripts' ));
        add_action('enqueue_block_assets', array( $this, 'enqueueBlockAssets' ));
        add_action('admin_menu', array( $this, 'frontPageInPagesMenu' ));
    }

    /**
     * Registers scripts for the admin
     */
    public function adminEnqueueScripts($hook)
    {
        wp_enqueue_script('theme-editor', parent::getAsset('/js/editor.js'), array( 'wp-blocks', 'wp-edit-post' ));
    }

    /**
     * Registers scripts for our blocks
     * Use is_admin() to isolate admin styles to the editor because these enqueue to the front too
     */
    public function enqueueBlockAssets()
    {
        if (is_admin()) {
            wp_enqueue_style('theme-editor', parent::getAsset('/css/editor.css'), array());
        }
    }

    /**
     * Replaces the WordPress logo on the login screen
     */
    public function loginLogo()
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
    public function loginLogoUrl()
    {
        return esc_url(home_url());
    }

    /*
    * Adds Front Page edit link to admin Pages menu
    */
    public function frontPageInPagesMenu()
    {
        global $submenu;
        if (get_option('page_on_front')) {
            $submenu['edit.php?post_type=page'][501] = array(
                __('Front Page', 'bespoke'),
                'manage_options',
                get_edit_post_link(get_option('page_on_front')),
            );
        }
    }
}
