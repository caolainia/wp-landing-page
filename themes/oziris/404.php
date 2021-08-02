<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Oziris
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<section class="error-404 not-found" style="height:calc(100vh - 70px); background:url(<?php bloginfo('template_url')?>/img/preload-bg.jpg) no-repeat center center; background-size:cover;">
			<div class="container" style=" top:30vh;position:relative;color:#fff; text-align:center">
				<header class="page-header">
					<h1 class="page-title" style="font-weight:600; ">
						<?php esc_html_e( 'We are sorry that page appears to have gone missing', 'oziris' ); ?>
					</h1>
					<p>Please click here for the <a href="<?php echo home_url('/')?>" style="text-decoration:none;color:#fff;border-bottom:1px solid #fff">homepage</a></p>
				</header>
				<!-- .page-header --> 
			</div>
		</section>
		<!-- .error-404 --> 
		
	</main>
	<!-- #main --> 
</div>
<!-- #primary -->

<?php
get_footer();

