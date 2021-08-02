<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Oziris
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			&copy; <?php echo date('Y') ?> oziris Beston Global Food Company Ltd<br>
						ACN 603 023 383
						<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<script type="text/javascript">
jQuery(document).ready(function($){
	$("button.menu-toggle").on("click", function(){
		if($(this).attr("aria-expanded") == 'true'){
			$("body").css("overflow","hidden");
		} else {
			$("body").css("overflow","auto");
		}
	});
});
</script>
<?php wp_footer(); ?>

</body>
</html>