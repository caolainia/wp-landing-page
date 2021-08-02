<?php
	$homepage_id = get_option('page_on_front');
?>

<div class="footer-desc">
	<div class="footer-inner">
		<div class="the-hand-footer">
			<div class="success-heading show-mobile"><?php echo get_post_meta($homepage_id,'scene_7_heading',true); ?></div>
			<div class="inner-hand"><img src="<?php bloginfo('template_url') ?>/img/hand-s.png" width="650" height="736" alt="" />
				<div class="content">
					<div class="success-heading hide-mobile"><?php echo get_post_meta($homepage_id,'scene_7_heading',true); ?></div>
					<div class="left-content"> <?php echo wpautop(get_post_meta($homepage_id,'scene_7_description',true)); ?> </div>
					<div class="right-content">
						<h2><?php echo get_post_meta($homepage_id,'get_now_heading',true); ?></h2>
						<ul>
							<li><a class="apps-store" href="<?php echo get_post_meta($homepage_id,'app_store_link',true); ?>"></a></li>
							<li><a class="play-store" href="<?php echo get_post_meta($homepage_id,'play_store_link',true); ?>"></a></li>
						</ul>
					</div>
					<div class="cta"> <a class="signup" href="<?php echo get_post_meta($homepage_id,'sign_up_link',true); ?>" class="ease"><?php echo get_post_meta($homepage_id,'sign_up_text',true); ?></a> <a class="signup2" href="<?php echo get_post_meta($homepage_id,'sign_up_link_2',true); ?>" class="ease"><?php echo get_post_meta($homepage_id,'sign_up_text_2',true); ?></a> </div>
				</div>
				<div class="thumb-container">
					<div class="thumb-holder">
						<div class="scene-6-thumb thumb"><img src="<?php bloginfo('template_url') ?>/img/thumb-6.png" width="650" height="391" alt="" /></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- footer-inner -->
</div>
<!-- footer-desc -->

</div>
<!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="site-info"> &copy; <?php echo date('Y') ?> oziris Beston Global Food Company Ltd<br>
		ACN 603 023 383
		<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?>
	</div>
	<!-- .site-info --> 
</footer>
<!-- #colophon -->
</div>
<!-- #page --> 
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
</body></html>