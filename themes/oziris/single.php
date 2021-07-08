<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Oziris
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="page-header" style="background-image:url(<?php bloginfo('template_url')?>/img/default-page-banner.jpg)"></div>
		<div class="container">
			<div class="row">
				<?php
				while ( have_posts() ) : the_post();

						 $feat_bg = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'full');
						 if($feat_bg){
								$url = $feat_bg[0];
						 }else{
						 		$url = get_bloginfo('template_url').'/img/default-thumb.jpg';
						 }
						
						?>
				<div class="col-md-12">
					<div class="inner-featured" style="background-image:url(<?php echo $url ?>)">
						<div class="desc-holder">
							<h1>
								<?php the_title() ?>
							</h1>
						</div>
					</div>
				</div>
				<div class="post-content col-md-12">
					<div class="row">
						<div class="left-sidebar col-md-3">
							<?php dn_post_date(get_the_ID()); ?>
							<div class="post-cat"> <?php echo get_the_category_list(); ?> </div>
							<div class="writer">
								<?php
							$writer = get_post_meta(get_the_ID(),'writer',true);
							if($writer){
								echo 'Writer : <span>'.$writer.'</span><br/>';
								echo get_post_meta(get_the_ID(),'writer_desc',true);
							}
							?>
							</div>
							
							<div class="post-like">
								<?php if(function_exists('social_likes')){ social_likes(get_the_ID()); } ?>
							</div>
							
						</div>
						<div class="main-content col-md-6">
							<?php the_content() ?>
							<div class="main-content-comment">
								<?php do_action('digitalnoir_facebook_commenting') ?>
							</div>
						</div>
						<div class="right-sidebar col-md-3">
							<div class="inner-sidebar">
								<div class="sidebar-item">
									<h3 class="underline">Browse</h3>
									<?php
										$category = get_terms('category');
										if(is_array($category) && sizeof($category) > 0):
										echo '<ul class="category-dropdown">';
										foreach($category as $cat){
											echo '<li><h4>'.$cat->name.'</h4>';
											echo '<div class="category-list">';
												$get_post = get_posts(array('cat'=>$cat->term_id,'posts_per_page'=>-1));
												if(is_array($get_post) && sizeof($get_post) > 0):
													echo '<ul>';
													foreach($get_post as $_post){
														echo '<li><a class="ease" href="'.get_permalink($_post->ID).'">'.get_the_title($_post->ID).'</a></li>';
													}
													echo '</ul>';
												endif;
											echo '</div>';								
											echo '</li>';
										}
										echo '</ul>';
										endif;
									?>
								</div>
								<div class="sidebar-item">
									<?php get_sidebar() ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
				endwhile; // End of the loop.
				?>
			</div>
		</div>
	</main>
	<!-- #main --> 
</div>
<!-- #primary -->

<div class="related-post">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				
				<div class="the-related">
					<?php
					

								$categories = get_the_category(get_the_ID() );
								if ($categories) {
								$category_ids = array();
								foreach($categories as $individual_category){
									$category_ids[] = $individual_category->term_id;
								}
								
								$args = array(
									'category__in' => $category_ids,
									'post__not_in' => array(get_the_ID()),
									'posts_per_page'=> 4,
									'caller_get_posts'=>1,
									'orderby'=>'rand'
								);
								
								$my_query = new wp_query( $args );
								if( $my_query->have_posts() ) {
								echo '<div id="related-news"><h3 class="underline">Related News</h3><div class="row">';
								while( $my_query->have_posts() ) {
								$my_query->the_post();
								
								 $feat_bg_2 = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'news-thumb');
								 if($feat_bg){
										$img_url = $feat_bg_2[0];
								 }else{
										$img_url = get_bloginfo('template_url').'/img/default-thumb.jpg';
								 }
								
								?>
								<div class="col-md-3">
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
								
								
								<?php }
								echo '</div></div>';
								} }
								
								wp_reset_query(); ?>
				</div>
				
			</div>
		</div>
	</div>
</div>



<?php get_footer('with-phone');