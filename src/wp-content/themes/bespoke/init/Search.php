<?php

namespace Bespoke;

class Search
{

	private $db;
	private $query;

	function __construct()
	{
		global $wpdb, $wp_query;
		$this->db = (object) $wpdb;
		$this->query = (object) $wp_query;
		add_filter('posts_join', [$this, 'posts_join']);
		add_filter('posts_where', [$this, 'posts_where']);
		add_filter('posts_distinct', [$this, 'posts_distinct']);
		// add_action('get_header', [$this, 'get_header']);
	}

	/**
	 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
	 */
	function posts_join($join)
	{
		if (!empty($this->query->query_vars['s'])) {
			$join .= ' LEFT JOIN ' . $this->db->postmeta . ' ON ' . $this->db->posts . '.ID = ' . $this->db->postmeta . '.post_id ';
		}
		return $join;
	}

	/**
	 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
	 */
	function posts_where($where)
	{
		if (!empty($this->query->query_vars['s'])) {
			$where = preg_replace(
				"/\(\s*" . $this->db->posts . ".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
				"(" . $this->db->posts . ".post_title LIKE $1) OR (" . $this->db->postmeta . ".meta_value LIKE $1)",
				$where
			);
		}
		return $where;
	}

	/**
	 * Prevent duplicates
	 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
	 */
	function posts_distinct($where)
	{
		if (!empty($this->query->query_vars['s'])) {
			return "DISTINCT";
		}
		return $where;
	}

	/**
	 * Return a HTTP 404 for empty search results
	 */
	function get_header()
	{
		if (is_search() && !have_posts()) {
			$this->query->set_404();
			status_header(404);
		}
	}
}
