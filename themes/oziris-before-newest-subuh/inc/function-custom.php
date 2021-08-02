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