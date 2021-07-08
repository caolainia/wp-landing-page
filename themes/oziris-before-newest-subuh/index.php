<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Oziris
 */

get_header(); ?>

<div id="primary" class="content-area content-page content-blog">
	<main id="main" class="site-main" role="main">
		<div class="page-header" style="background-image:url(<?php bloginfo('template_url')?>/img/default-page-banner.jpg)"></div>
		<?php
			$loop_1 = new WP_Query(array('post_type'=>'post','posts_per_page'=>1,'offset'=>0));
		?>
		<div class="container">
			<div class="row">
				<div class="first-section">
					<div class="col-md-12">
						<div class="featured-post">
							<?php
						while($loop_1->have_posts()) : $loop_1->the_post(); ?>
							<?php
						 $feat_bg = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'full');
						 if($feat_bg){
								$url = $feat_bg[0];
						 }else{
						 		$url = get_bloginfo('template_url').'/img/default-thumb.jpg';
						 }
						
						?>
							<div class="inner-featured" style="background-image:url(<?php echo $url ?>)">
								<div class="desc-holder">
									<div class="title-holder inline">
										<h2>
											<a href="<?php the_permalink()?>"><?php the_title() ?></a>
										</h2>
									</div>
									<div class="feat-excerpt inline">
									<a href="<?php the_permalink()?>">
										<div class="feat-excerpt-holder">
											<div class="date">
												<?php dn_post_date(get_the_ID()); ?>
											</div>
											<div class="the-excerpt">
												<?php the_excerpt() ?>
											</div>
										</div>
										</a>
									</div>
								</div>
							</div>
							<?php endwhile; ?>
							<?php wp_reset_postdata();?>
						</div>
					</div>
				</div>
				<!-- first-section -->
				
				<div class="second-section clearfix section-blog">
					<div class="col-md-3">
						<div class="inner-sidebar">
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
					</div>
					<div class="col-md-9">
						<div class="inner-loop">
							<h3 class="underline">Latest News</h3>
							<div class="row">
								<?php
								$loop_2 = new WP_Query(array('post_type'=>'post','posts_per_page'=>3,'offset'=>1));
							?>
								<?php
								while($loop_2->have_posts()) : $loop_2->the_post(); ?>
								<?php
								 $feat_bg_2 = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'full');
								 if($feat_bg){
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
								<?php endwhile; ?>
								<?php wp_reset_postdata();?>
							</div>
						</div>
					</div>
				</div>
				<!-- second-section -->
				
				<div class="third-section clearfix section-blog">
					<div class="col-md-3"><img src="<?php bloginfo('template_url')?>/img/promo-signup.png" alt="" /> </div>
					<div class="col-md-9"><img src="<?php bloginfo('template_url')?>/img/promo-download.png" alt="" /> </div>
				</div>
				<!-- third-section -->
				
				<div class="fourth-section clearfix section-blog">
					<div class="col-md-3">
						<div class="inner-instagram">
							<h3 class="underline">Instagram</h3>
							<?php
					$instagram_url = 'https://www.instagram.com/ozirisfoodtrace/media/';
					$instagram_feed = json_decode(file_get_contents($instagram_url));
					
					$items = $instagram_feed->items;
				
					if(is_array($items) && sizeof($items) > 0) :
					echo '<ul class="row">';
					$i=0;
					foreach($items as $item => $val){
						$insta_img_url = $val->images->thumbnail->url;
						$insta_img_link = $val->link;
						
						$i++;
						
						if($insta_img_url){
							echo '<li class="col-md-6 col-sm-12"><a href="'.$insta_img_link.'" target="_blank"><img src="'.$insta_img_url.'" width="150" height="150" alt="" /></a></li>';
						}
						
						if($i == 10) break;
					
					}
					echo '</ul>';
					endif;
					
					?>
						</div>
					</div>
					<div class="col-md-9">
						<div class="inner-see-also">
							<h3 class="underline">See Also</h3>
							<div class="also-post">
								<div class="row">
									<?php
								$loop_3 = new WP_Query(array('post_type'=>'post','posts_per_page'=>4,'offset'=>4));
									?>
									<?php
								while($loop_3->have_posts()) : $loop_3->the_post(); ?>
									<?php
								 $feat_bg_3 = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'news-thumb');
								
								
								?>
									<div class="also-loop col-md-12">
										<div class="also-inner">
											<div class="also-latest row">
												<div class="thumb col-md-3"><a href="<?php the_permalink()?>"><img src="<?php echo $feat_bg_3[0]?>" width="<?php echo $feat_bg_3[1]?>" height="<?php echo $feat_bg_3[2]?>" alt="" /></a></div>
												<div class="desc-holder col-md-9">
													<div class="date-con inline-cell">
														<?php dn_post_date(get_the_ID()); ?>
													</div>
													<div class="desc-con inline-cell">
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
											</div>
										</div>
									</div>
									<?php endwhile; ?>
									<?php wp_reset_postdata();?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- fourth-section --> 
				
			</div>
		</div>
	</main>
	<!-- #main --> 
</div>
<!-- #primary -->

<div class="cta-footer">
	<div class="container">
		<h2>Download <strong>Oziris</strong> Now</h2>
		<div class="row">
			<div class="col-md-6 app-link"> <a href="#"><img src="<?php bloginfo('template_url')?>/img/app-store-icon-black.png" width="200" height="61" alt="" /></a> </div>
			<div class="col-md-6 play-link"> <a href="#"><img src="<?php bloginfo('template_url')?>/img/google-play-icon-black.png" width="200" height="61" alt="" /></a> </div>
		</div>
		<div class="iphone-holder"><img src="<?php bloginfo('template_url')?>/img/footer-iphone.png" width="700" height="150" alt="" /></div>
	</div>
</div>
<?php get_footer();


