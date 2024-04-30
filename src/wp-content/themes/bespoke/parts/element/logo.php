<?php
$before = '<a href="' . home_url() . '" rel="home" class="site-logo">';
$after = '</a>';
if (is_front_page()) :
	$before = '<div class="site-logo">';
	$after = '</div>';
endif;
?>
<?= $before ?><img src="/assets/images/branding/logo.svg" alt="<?= get_bloginfo('name') ?> logo" width="150" height="89"><?= $after ?>