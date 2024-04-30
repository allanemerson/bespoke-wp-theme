</main>

<footer id="site-footer">
	<div>
		<div id="footer-menus">
			<?php $i = 1;
			while ($i < 6) :
				$location = 'footer-' . $i;
			?>
				<nav class="footer-menu" aria-labelledby="#footer-menu-<?= $i ?>-title">
					<strong id="footer-menu-<?= $i ?>-title" class="heading-6 color-red"><?= wp_get_nav_menu_name($location) ?></strong>
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
		<small class="copyright">&copy;<?= date('Y') . ' ' . get_bloginfo('name') ?>. All rights reserved.</small>
	</div>
</footer>

<?php wp_footer(); ?>

</body>

</html>