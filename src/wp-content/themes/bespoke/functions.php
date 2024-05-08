<?php

/**
 * Functions
 *
 * Main entry point for theme
 *
 * @package Bespoke
 */

spl_autoload_register(
    function ($class_name) {
        if (strpos($class_name, 'Bespoke') !== false) :
            $class_name = str_replace('Bespoke\\', '', $class_name);
            require get_template_directory() . '/classes/' . $class_name . '.php';
        endif;
    }
);

/*
* Required
*/
new Bespoke\Actions();
new Bespoke\Admin();
new Bespoke\Blocks();
new Bespoke\Filters();
new Bespoke\Security();

/*
* Opt-in
new Bespoke\PostTypes;
new Bespoke\Search;
new Bespoke\GravityForms;
*/
