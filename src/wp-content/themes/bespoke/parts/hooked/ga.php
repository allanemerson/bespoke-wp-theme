<?php

if (defined('GA_ID') && GA_ID) :
    ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo GA_ID; // phpcs:ignore ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
		gtag('config', '<?php echo GA_ID; // phpcs:ignore ?>');
    </script>
    <?php
endif;
?>
