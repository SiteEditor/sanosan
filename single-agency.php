<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					?>
					<div id="post-<?php the_ID(); ?>" <?php post_class('single-agency'); ?>>

						<div class="single-content">
							<?php
							/* translators: %s: Name of current post */
							the_content( );
							?>
						</div>

						<div class="single-map">
							<?php
							$address = get_field( 'agancy_address' );

							echo do_shortcode( '[sed_google_map setting_height="350" setting_description="'.esc_attr( get_the_title() ).'" setting_address="'.esc_attr( $address ).'"][/sed_google_map]' );
							?>
						</div>

					</div><!-- #post-## -->
					<?php


				endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
