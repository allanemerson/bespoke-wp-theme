<?php

/**
 * Autoload our theme classes
 */
spl_autoload_register(function ($class_name) {
	if (strpos($class_name, 'Bespoke') !== false) :
		$class_name =  str_replace("Bespoke\\", '', $class_name);
		require get_template_directory() . '/init/' . $class_name . '.php';
	endif;
});

// required
new Bespoke\Actions;
new Bespoke\Admin;
new Bespoke\Blocks;
new Bespoke\Filters;
new Bespoke\Security;

// opt-in
// new Bespoke\CustomPostTypes;
// new Bespoke\Search;
// new Bespoke\GravityForms;
