<?php
/**
Template Name: Page with Header Image
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
				<div class="page-header" style="background-image:url(<?php bloginfo('template_url')?>/img/default-page-banner.jpg)"></div>

			<?php
			while ( have_posts() ) : the_post();

			?>
            
                <div class="entry-content container">
                    <?php
                        the_content();
                    ?>
                </div><!-- .entry-content -->

            
            <?php

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer('with-phone');
