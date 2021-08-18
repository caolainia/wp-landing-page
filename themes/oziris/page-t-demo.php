<?php
/**
Template Name: Demo Page with Camera Scanner
*/

get_header(); ?>

	<div id="primary" class="demo-container">
		<div class="scanner-container">
            <?php echo do_shortcode("[qrcodescanner width=\"350px\" height=\"480px\"]"); ?>
        </div>
	</div><!-- #primary -->


<?php get_footer('for-demo'); ?>
