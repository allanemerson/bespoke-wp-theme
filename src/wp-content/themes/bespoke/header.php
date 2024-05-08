<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php do_action('after_body_start'); ?>

    <header id="site-header" role="banner">
        <?php get_template_part('parts/element/logo'); ?>

        <nav id="primary-navigation" arial-label="primary navigation">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'nav',
                )
            );
            ?>
        </nav>
        <button id="site-navigation-toggle" aria-controls="primary-navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="toggle-text">Menu</span>
            <span class="open-icon">
                <svg aria-hidden="true" width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 5H1M19 1H1M19 9H1M15 13H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
            <span class="close-icon">
                <svg aria-hidden="true" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <use href="#close-icon" />
                </svg>
            </span>
        </button>
    </header>

    <main id="site-main">
