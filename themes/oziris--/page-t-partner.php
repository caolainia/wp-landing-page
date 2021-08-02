<?php
/**
Template Name: Partner
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="page-header" style="background-image:url(<?php bloginfo('template_url')?>/img/default-page-banner.jpg)"></div>
		<div class="container">
			<div class="row">
				<?php
				while ( have_posts() ) : the_post();

				?>
				<div class="col-md-12">
					<div class="inner-featured">
					<div class="flexslider mainslider">
			<ul class="slides">
			
			<?php

			if( have_rows('partner_slider') ):
			$i=0;
					while ( have_rows('partner_slider') ) : the_row();
						$i++;
							$type = get_sub_field('slide_type');
							$slide_image = get_sub_field('slide_image');
							$slide_video = get_sub_field('slide_video');
							if($type == 'Image'){
								echo '<li><img src="'.$slide_image['url'].'" width="'.$slide_image['width'].'" height="'.$slide_image['height'].'" alt="" /></li>';
							}else{
								$video_id = get_youtube_id_from_url($slide_video);
								echo '<li><div class="embed-responsive embed-responsive-16by9">
												<iframe id="player_'.$i.'" class="embed-responsive-item" src="http://www.youtube.com/embed/'.$video_id.'?enablejsapi=1" width="500" height="200" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
											</div></li>';
							}
			
					endwhile;
			
			endif;
			
			?>
			
			</ul>
		</div>
					</div>
				</div>
				<?php endwhile; ?>
				<div class="col-md-12">
					<div class="partner-header row">
						<div class="partner-filter col-md-8 col-sm-12">
							<?php
							$get_cat_partner = get_terms('partner_cat',array('hide_empty'=>false));
							if(is_array($get_cat_partner)){
								echo '<ul>';
								echo '<li><a data-filter="*" class="active">All</a></li>';
								foreach($get_cat_partner as $partner_cat){
										echo '<li><a data-filter=".'.$partner_cat->slug.'">'.$partner_cat->name.'</a></li>';
								}
								echo '</ul>';
							}
						?>
						</div>
						<div class="partner-like col-md-4  col-sm-12">
							<?php if(function_exists('social_likes')){ social_likes(get_the_ID()); } ?>
						</div>
						<div class="col-md-12  col-sm-12">
							<div class="separator">&nbsp;</div>
						</div>
					</div>
					<div class="partner-list">
						<div class="row">
							<?php
							$partner_loop = new WP_Query(array('post_type'=>'partner','posts_per_page'=>-1));
						
								while($partner_loop->have_posts()) : $partner_loop->the_post();
						
								 $partner_loop_logo = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'partner-thumb');
								 if(!$partner_loop_logo){
										$partner_loop_logo = get_bloginfo('template_url').'/img/partner-thumb.png';
									}else{
										$partner_loop_logo = $partner_loop_logo[0];
									}
									 $partner_cat = wp_get_post_terms(get_the_ID(),'partner_cat');
								?>
							<div class="partner-loop col-md-3 col-sm-6 col-xs-12 <?php echo $partner_cat[0]->slug ?>">
								<div class="partner-inner">
									<div class="partner-image"><img src="<?php echo $partner_loop_logo ?>" width="265" height="150" alt="" /></div>
									<div class="partner-title">
										<h3>
											<?php the_title() ?>
										</h3>
									</div>
									<div class="partner-cat"><?php echo $partner_cat[0]->name; ?> </div>
									<div class="partner-desc">
										<?php the_content() ?>
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
	</main>
	<!-- #main --> 
</div>
<!-- #primary -->

<?php get_footer('with-phone');
