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