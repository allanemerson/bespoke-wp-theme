<?php
$before = '<a href="' . esc_url(home_url()) . '" rel="home" class="site-logo">';
$after = '</a>';
if (is_front_page()) :
	$before = '<div class="site-logo">';
	$after = '</div>';
endif;
?>
<?php echo $before ?><img src="/assets/images/branding/logo.svg" alt="<?php echo esc_attr(get_bloginfo('name')) ?> logo" width="150" height="89"><?php echo $after ?>