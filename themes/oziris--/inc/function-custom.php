<?php

add_filter( 'gform_confirmation', 'join_us_confirmation', 10, 4 );
function join_us_confirmation( $confirmation, $form, $entry, $ajax ) {
    if( $form['id'] == '3' ) {
			
			ob_start();
			?>
			
			<div class="thanks-join">
				<h2>Thank You</h2>
				<p class="teaser">and <strong>welcome</strong> to</p>
				<img src="<?php bloginfo('template_url')?>/img/oziris-snap.png" alt="" />
				<ul>
					<li><a href="#" class="apps-store">appstore</a></li>
					<li><a href="#" class="play-store">playstore</a></li>
				</ul>
				<p>The Oziris team will contact you within <br />3-5 business days to confirm entered details</p>
				<div class="button-home">
					<a href="<?php echo home_url('/')?>">Home</a>
				</div>
			</div>
			
			
			<?php
			$confirmation = ob_get_contents();
			ob_end_clean();
    } 
    return $confirmation;
}

add_filter( 'gform_confirmation_anchor', 'the_return_false' );
function the_return_false(){
	return 0;
}

// circle date
function dn_post_date($postid){
	
	echo '<div class="date-circle">';
	echo '<span class="date">'.get_the_time('d',$postid).'</span>';
	echo '<span class="month">'.get_the_time('M',$postid).'</span>';
	echo '<span class="year">'.get_the_time('Y',$postid).'</span>';
	echo '</div>';
	
}

// excerpt length
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


// The Facebook Comment //
function digitalnoir_facebook_commenting(){

	echo '<div class="fb-comment-container">
      	<div class="fb-comments" data-href="'.get_permalink(get_the_ID()).'" data-numposts="5" data-width="100%"></div>
      </div>';
}
function digitalnoir_facebook_commenting_scripts() {

	// facebook commenting are for single post right?	
	if ( is_single() ) {
		?>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=112332612200098";
          fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<?php
	} // endif singular
}

// IF WE DONT USE FACEBOOK COMMENT, JUST REMOVE THIS 2 LINE BELOW
add_action( 'wp_enqueue_scripts', 'digitalnoir_facebook_commenting_scripts' );
add_action( 'digitalnoir_facebook_commenting', 'digitalnoir_facebook_commenting' );



// get yourube id
function get_youtube_id_from_url($url)
{
    if (stristr($url,'youtu.be/'))
        {preg_match('/(https:|http:|)(\/\/www\.|\/\/|)(.*?)\/(.{11})/i', $url, $final_ID); return $final_ID[4]; }
    else 
        {@preg_match('/(https:|http:|):(\/\/www\.|\/\/|)(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $url, $IDD); return $IDD[5]; }
}



// LOAD MORE AJAX
function dn_load_more_ajax( $selected_company ) {
 
  // Verify nonce
  if( !isset( $_POST['security'] ) || !wp_verify_nonce( $_POST['security'], 'load_more_nonce' ) )
    die('Permission denied');
		
		$_paging = $_POST['paging'];
		$_posts_per_page = 4;
		
		if($_paging == 0){
			$_offset = 8;
		}else{
			$_offset = 8 + ($_paging * $_posts_per_page);
		}
	
		$loop_3 = new WP_Query(array(
													'post_type'=>'post',
													'posts_per_page'=> $_posts_per_page,
													'offset'=> $_offset
													));
		
		ob_start();
		$i=0;
		if($loop_3->have_posts()) :							
			while($loop_3->have_posts()) : $loop_3->the_post();
			$i++;
			$feat_bg_3 = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'news-thumb');
			
			
			?>
			
<div class="also-loop col-md-12">
	<div class="also-inner">
		<div class="also-latest row">
			<div class="thumb col-md-3 col-sm-3 col-xs-12"><a href="<?php the_permalink()?>"><img src="<?php echo $feat_bg_3[0]?>" width="<?php echo $feat_bg_3[1]?>" height="<?php echo $feat_bg_3[2]?>" alt="" /></a></div>
			<div class="desc-holder col-md-9 col-sm-9 col-xs-12">
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
										 
			<?php endwhile;
			
			$_not_found = $i < 4 ? true : false;
		else:
			$_not_found = true;
		endif;
		wp_reset_postdata();
		
		$content = ob_get_contents();
		ob_get_clean();
 
 
  echo json_encode(array(
	'content'		=> $content,
	'paging' 		=> $_paging + 1,
	'is_last'		=> $_not_found
	));
  
  
 
  die();
}
 
add_action('wp_ajax_dn_load_more_ajax', 'dn_load_more_ajax');
add_action('wp_ajax_nopriv_dn_load_more_ajax', 'dn_load_more_ajax');






// LOAD MORE AJAX ARCHIVE
function dn_load_more_ajax_archive( $selected_company ) {
 
  // Verify nonce
  if( !isset( $_POST['security'] ) || !wp_verify_nonce( $_POST['security'], 'load_more_nonce' ) )
    die('Permission denied');
		
		$_paging = $_POST['paging'];
		$_posts_per_page = $_POST['postperpage'];
		$_category = $_POST['cat'];
		

		$_offset = $_paging * $_posts_per_page;

	
		$loop_3 = new WP_Query(array(
													'post_type'=>'post',
													'posts_per_page'=> $_posts_per_page,
													'cat'	=> $_category,
													'offset'=> $_offset
													));
		
		ob_start();
		$i=0;
		if($loop_3->have_posts()) :							
			while($loop_3->have_posts()) : $loop_3->the_post();
			$i++;
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
										 
			<?php endwhile;
			
			$_not_found = $i < $_posts_per_page ? true : false;
		else:
			$_not_found = true;
		endif;
		wp_reset_postdata();
		
		$content = ob_get_contents();
		ob_get_clean();
 
 
  echo json_encode(array(
	'content'		=> $content,
	'paging' 		=> $_paging + 1,
	'is_last'		=> $_not_found
	));
  
  
 
  die();
}
 
add_action('wp_ajax_dn_load_more_ajax_archive', 'dn_load_more_ajax_archive');
add_action('wp_ajax_nopriv_dn_load_more_ajax_archive', 'dn_load_more_ajax_archive');
