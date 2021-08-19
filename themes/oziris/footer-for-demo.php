<?php
/**
 * The template for displaying the footer used on Demo page.
 *
 * @package Oziris
 */

?>

	</div><!-- #content -->

	<footer id="demo-footer" class="site-footer" role="contentinfo">
		<div class="site-info">
			&copy; <?php echo date('Y') ?> oziris Beston Global Food Company Ltd<br>
						ACN 603 023 383
						<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?>
		</div><!-- .site-info -->
	</footer><!-- #demo-footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>