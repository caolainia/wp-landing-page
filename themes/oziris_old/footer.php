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
			<p>&copy; 2016 Oziris Beston Global Food Company Ltd</p>
            <p>ACN 603 023 383 - <a>Terms and conditions</a> - <a>Privacy Policy</a>
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