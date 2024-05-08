<?php

namespace Bespoke;

class PostTypes
{
    public function __construct()
    {
        add_action('init', array( $this, 'examples' ));
    }

    /**
     * Generate labels
     */
    private function labels(string $single, string $plural = null): array
    {
        if (! $plural) {
            $plural = $single . 's';
        }
        return array(
            'name'               => $plural,
            'singular_name'      => $single,
            'menu_name'          => $plural,
            'parent_item_colon'  => 'Parent ' . $single,
            'all_items'          => 'All ' . $plural,
            'view_item'          => 'View ' . $single,
            'add_new_item'       => 'Add New ' . $single,
            'add_new'            => 'Add New',
            'edit_item'          => 'Edit ' . $single,
            'update_item'        => 'Update ' . $single,
            'search_items'       => 'Search ' . $plural,
            'not_found'          => 'Not Found',
            'not_found_in_trash' => 'Not found in Trash',
        );
    }

    /**
     * Generate taxonomy labels
     */
    private function taxLabels(string $single, string $plural = null): array
    {
        if (! $plural) {
            $plural = $single . 's';
        }
        return array(
            'name'                       => $plural,
            'singular_name'              => $single,
            'search_items'               => 'Search ' . $plural,
            'popular_items'              => 'Popular ' . $plural,
            'all_items'                  => 'All ' . $plural,
            'parent_item'                => 'Parent ' . $single,
            'edit_item'                  => 'Edit ' . $single,
            'view_item'                  => 'View ' . $single,
            'update_item'                => 'Update ' . $single,
            'add_new_item'               => 'Add New ' . $single,
            'new_item_name'              => 'New ' . $single . ' Name',
            'separate_items_with_commas' => 'Separate ' . $plural . ' with commas',
            'add_or_remove_items'        => 'Add or remove ' . $plural,
            'choose_from_most_used'      => 'Choose from the most used ' . $plural,
            'not_found'                  => 'No ' . $plural . ' found',
            'no_terms'                   => 'No ' . $plural,
            'filter_by_item'             => 'Filter by ' . $single,
            'item_link'                  => $single . ' Link',
            'item_link_description'      => 'A link to a ' . $single,
        );
    }

    /**
     * Register post type
     */
    public function examples()
    {
        register_post_type(
            'example',
            array(
                'labels'              => $this->labels('Example'), // Optionally pass in plural version for this word.
                'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'revisions' ),
                'hierarchical'        => false,
                'public'              => true,
                'show_ui'             => true,
                'show_in_menu'        => true,
                'show_in_nav_menus'   => false,
                'show_in_admin_bar'   => true,
                'menu_position'       => 20,
                'menu_icon'           => 'dashicons-smiley',
                'can_export'          => true,
                'has_archive'         => false,
                'exclude_from_search' => false,
                'publicly_queryable'  => true,
                'capability_type'     => 'post',
                'rewrite'             => array(
                    'with_front' => false,
                    'slug'       => '',
                ), // You can use slashes in this slug for organization.
                'taxonomies'          => array( 'example-taxonomy' ),
                'show_in_rest'        => true, // Set to false to disable Gutenberg-style editor.
            )
        );
        register_taxonomy(
            'example-taxonomy',
            'example',
            array(
                'labels'       => $this->taxLabels('Category', 'Categories'),
                'hierarchical' => true,
                'rewrite'      => array(
                    'with_front' => false,
                    'slug'       => 'example-taxonomy',
                ),
                'show_in_rest' => true, // Set to false to disable Gutenberg-style editor.
            )
        );
    }
}
