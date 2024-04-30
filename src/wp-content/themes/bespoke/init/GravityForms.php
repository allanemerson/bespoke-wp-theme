<?php

namespace Bespoke;

class GravityForms
{

	function __construct()
	{
		add_filter('gform_confirmation_anchor', '__return_true');
		add_filter('gform_disable_css', [$this, 'disable_form_css']);
		add_filter('gform_submit_button', [$this, 'add_custom_css_classes'], 10, 2);
	}

	function add_custom_css_classes($button, $form)
	{
		return str_replace('gform_button', 'gform_button btn', $button);
	}
	function disable_form_css()
	{
		return true;
	}
}
