<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Oziris
 */

get_header();

$categ_id = get_query_var('cat');

?>

<div id="primary" class="content-area content-archive">
	<main id="main" class="site-main" role="main">
		<div class="page-header" style="background-image:url(<?php bloginfo('template_url')?>/img/default-page-banner.jpg)">
			<div class="container">
				<header class="page-header-head">
					<?php
					echo '<h1 class="page-title">'.get_category($categ_id)->name.'</h1>';
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
				</header>
				<!-- .page-header --> 
			</div>
		</div>
		<div class="container">
			<div class="row ajax-holder">
				<?php
		if ( have_posts() ) : ?>
				<div class="col-md-12">
					<div class="inner-featured" style="background-image:url(<?php echo $url ?>)">
						<div class="desc-holder"> </div>
					</div>
				</div>
				<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
			
	
								 $feat_bg_2 = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'news-thumb');
								 if($feat_bg_2){
										$img_url = $feat_bg_2[0];
								 }else{
										$img_url = get_bloginfo('template_url').'/img/default-thumb.jpg';
								 }
								
								?>
				<div class="col-md-4">
					<div class="inner-latest">
						<div class="thumb" style="background-image:url(<?php echo $img_url ?>)"><a href="<?php the_permalink()?>">
							<?php dn_post_date(get_the_ID()); ?>
							</a></div>
						<div class="title">
							<h3 class="loop-title"><a href="<?php the_permalink()?>">
								<?php the_title()?>
								</a></h3>
						</div>
						<div class="excerpt">
							<?php the_excerpt()?>
						</div>
					</div>
				</div>
				<?php

		
			endwhile;

			//the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
			</div>
			<div class="clearfix"></div>
			<div class="archive-pagination">
				<div class="archive-load-more"><a data-offset="200" data-paging="1" data-postperpage="<?php echo get_option('posts_per_page')?>" data-category="<?php echo $categ_id?>"></a></div>
				<div class="loader">
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
				</div>
			</div>
		</div>
	</main>
	<!-- #main --> 
</div>
<!-- #primary --> 
<br />
<?php get_footer('with-phone');


