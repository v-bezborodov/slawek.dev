<?php
/*
Template Name: test
*/

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="main-page-wrapper">
				<?php
				if ( have_posts() ) {

					// Load posts loop.
					while ( have_posts() ) {
						the_post();
						//post_preview()
						get_template_part( 'template-parts/content/content' );
					}

					// Previous/next page navigation.
					twentynineteen_the_posts_navigation();

				} else {

					// If no content, include the "No posts found" template.
					get_template_part( 'template-parts/content/content', 'none' );
				}
				?>
			</div>
		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php
get_footer();