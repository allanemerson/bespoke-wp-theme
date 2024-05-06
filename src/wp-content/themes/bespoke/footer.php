</main>

<footer id="site-footer">
	<div id="footer-menus">
		<?php $i = 1;
		while ($i < 6) :
			$location = 'footer-' . $i;
		?>
			<nav class="footer-menu" aria-labelledby="#footer-menu-<?php echo $i ?>-title">
				<strong id="footer-menu-<?php echo $i ?>-title"><?php echo wp_get_nav_menu_name($location) ?></strong>
				<?php
				wp_nav_menu(array(
					'theme_location'  => $location,
					'container'       => false
				));
				?>
			</nav>
		<?php $i++;
		endwhile; ?>
	</div>
	<small id="copyright">&copy;<?php echo date('Y') . ' ' . get_bloginfo('name') ?>. All rights reserved.</small>
</footer>

<?php wp_footer(); ?>

</body>

</html>