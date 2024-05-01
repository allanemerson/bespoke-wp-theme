<?php
/*
Classes in /init/ modify the output without being called directly in the theme
*/
spl_autoload_register(function ($class_name) {
	if (strpos($class_name, 'Bespoke') !== false) :
		$class_name =  str_replace("Bespoke\\", '', $class_name);
		require get_template_directory() . '/init/' . $class_name . '.php';
	endif;
});

// required
// new Bespoke\Acf;
new Bespoke\Actions;
new Bespoke\Admin;
new Bespoke\Blocks;
new Bespoke\Filters;
new Bespoke\Security;
new Bespoke\Template;

// opt-in
// new Bespoke\CustomPostTypes;
// new Bespoke\Search;
// new Bespoke\GravityForms;