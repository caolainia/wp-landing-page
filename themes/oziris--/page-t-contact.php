<?php
/**
Template Name: Contact
 */

get_header();

$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');

?>

	<div id="primary" class="content-area content-contact-us">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();
			?>
      <div class="entry-content container">
         <?php the_content(); ?>
      </div><!-- .entry-content -->
			<?php

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer();
