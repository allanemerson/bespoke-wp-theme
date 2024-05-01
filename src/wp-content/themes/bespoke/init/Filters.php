<?php

namespace Bespoke;

class Filters
{

	function __construct()
	{
		add_filter('wp_sitemaps_enabled', '__return_false');
		add_filter('upload_mimes', [$this, 'upload_mimes'], 10);
		add_filter('wp_update_attachment_metadata', [$this, 'update_attachment_metadata'], 10, 2);
		add_filter('map_meta_cap', [$this, 'map_meta_cap'], 10, 4);
		add_filter('robots_txt', [$this, 'robots_txt'], 0, 2);
		add_filter('wpseo_title', [$this, 'wpseo_title'], 10);
		add_filter('wpseo_metadesc', [$this, 'wpseo_metadesc'], 10);
		add_filter('pre_wp_mail', [$this, 'pre_wp_mail'], 10, 2);
		add_filter('excerpt_more', [$this, 'excerpt_more'], 10);
		add_filter('excerpt_length', [$this, 'excerpt_length'], 10);
		add_filter('get_the_archive_title', [$this, 'get_the_archive_title'], 10, 3);
		// $this->deactivate_production_plugins();
	}


	// disable wp_mail sends from local environments by returning non-null 
	function pre_wp_mail($sent, $atts)
	{
		if (defined('WP_ENV')) {
			if (WP_ENV === 'local') {
				return true;
			}
		}
		return $sent;
	}

	function deactivate_production_plugins()
	{
		if (defined('DISABLED_LOCAL_PLUGINS')) :
			deactivate_plugins(DISABLED_LOCAL_PLUGINS);
		endif;
	}

	/**
	 * Image Type Support
	 * http://www.iana.org/assignments/media-types/media-types.xhtml
	 */
	function upload_mimes($mimes)
	{
		$mimes['webp'] = 'image/webp';
		$mimes['svg']  = 'image/svg+xml';
		return $mimes;
	}

	/**
	 * Fixes SVG uploads not properly having their height and width set
	 */
	function update_attachment_metadata($data, $id)
	{
		$attachment = get_post($id);
		$mime_type  = $attachment->post_mime_type;

		if ($mime_type == 'image/svg+xml') {
			if (empty($data) || empty($data['width']) || empty($data['height'])) {
				$url            = wp_make_link_relative(wp_get_attachment_url($id));
				$xml            = simplexml_load_file($_SERVER['DOCUMENT_ROOT'] . $url);
				$attr           = $xml->attributes();
				$viewbox        = explode(' ', $attr->viewBox);
				$data['width']  = isset($attr->width) && preg_match('/\d+/', $attr->width, $value) ? (int) $value[0] : (count($viewbox) == 4 ? (int) $viewbox[2] : null);
				$data['height'] = isset($attr->height) && preg_match('/\d+/', $attr->height, $value) ? (int) $value[0] : (count($viewbox) == 4 ? (int) $viewbox[3] : null);
			}
		}
		return $data;
	}

	/**
	 * Custom theme doesn't need customizer features
	 */
	function map_meta_cap($caps = array(), $cap = '', $user_id = 0, $args = array())
	{
		if ($cap == 'customize') {
			return array('nope'); // return an unknown capability
		}
		return $caps;
	}

	function robots_txt($output, $public)
	{
		$options = get_option('wpseo');
		if (class_exists('WPSEO_Sitemaps') && ($options['enable_xml_sitemap'] == true)) {
			$homeURL = get_home_url();
			$output .= "Sitemap: $homeURL/sitemap_index.xml\n";
		}
		return $output;
	}

	/**
	 * Make sure "Home" doesn't end up in the title
	 */
	function wpseo_title($title)
	{
		$title = str_replace('Home - ', '', $title);
		return $title;
	}

	function wpseo_metadesc($description)
	{
		if (empty($description)) {
			if (!empty(get_the_excerpt())) {
				$description = get_the_excerpt();
			} else if (!empty(get_the_content())) {
				$description = substr(get_the_content(), 0, 150);
			} else {
				$description = get_the_title();
			}
		}
		return $description;
	}

	function excerpt_more($more)
	{
		return '<span class="more"> &hellip;</span>';
	}

	function excerpt_length($length)
	{
		return 20;
	}

	function get_the_archive_title($title, $original_title, $prefix)
	{
		return $original_title;
	}
}