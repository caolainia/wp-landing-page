<?php
/**
Template Name: Join Us
 */

get_header(); ?>

<div id="primary" class="content-area content-join">
	<main id="main" class="site-main" role="main">
		<div class="container">
			<?php
			while ( have_posts() ) : the_post();
			?>
			<div class="join-teaser ease">
				<h1>Join Oziris Today!</h1>
				<div class="content"> Let your customers trace their food to its source </div>
			</div>
			<?php
			endwhile; // End of the loop.
			?>
			<div id="join-form">
				<div id="join-header" class="join-header">
					<div class="steps">
						<div class="rail-container" style="position:relative"> <img src="<?php bloginfo('template_url')?>/img/steps-holder.png" width="843" height="171" alt="" />
						<div class="step-trail-holder ease">
							<div class="steps-trail"></div>
							</div>
						</div>
						<div class="anchor ease"><img src="<?php bloginfo('template_url')?>/img/anchor.png" alt="" /></div>
						<div class="circle-container ease">
							<div class="circle"><img src="<?php bloginfo('template_url')?>/img/circle-animate.png" alt="" /></div>
						</div>
					</div>
				</div>
				<div class="the-form">
					<?php gravity_form(3, false, false, false, '', true, 12); ?>
				</div>
				<div class="join-info ease">
					<h3>ALL MARKED * FIELDS ARE REQUIRED</h3>
					<ul>
						<li>Fill in information about your business</li>
						<li>The Oziris team will contact you within 3-5 business days</li>
						<li> Once you’ve joined we will send you a welcome pack </li>
						<li> Your products will now be successfully traced on Oziris</li>
					</ul>
				</div>
			</div>
		</div>
	</main>
	<!-- #main --> 
</div>
<!-- #primary -->

<?php get_footer(); ?>