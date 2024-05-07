<?php

namespace Bespoke;

class GravityForms
{

	function __construct()
	{
		add_filter('gform_confirmation_anchor', '__return_true');
		add_filter('gform_disable_css', [$this, '__return_true']);
		add_filter('gform_submit_button', [$this, 'gform_submit_button'], 10, 2);
	}

	/**
	 * Filters class attribute on submit buttons.
	 */
	function gform_submit_button(string $button, object $form): string
	{
		return str_replace('gform_button', 'gform_button btn', $button);
	}
}
