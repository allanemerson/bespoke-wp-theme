<?php

namespace Bespoke;

class GravityForms
{
    public function __construct()
    {
        add_filter('gform_confirmation_anchor', '__return_true');
        add_filter('gform_disable_css', array( $this, '__return_true' ));
        add_filter('gform_submit_button', array( $this, 'gformSubmitButton' ), 10, 2);
    }

    /**
     * Filters class attribute on submit buttons.
     */
    public function gformSubmitButton(string $button, object $form): string
    {
        return str_replace('gform_button', 'gform_button btn', $button);
    }
}
