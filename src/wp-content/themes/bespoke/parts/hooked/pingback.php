<?php
if ( is_singular() && pings_open() ):
	?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ) ?>">
	<?php
endif;