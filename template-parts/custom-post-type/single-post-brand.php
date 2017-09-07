<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 

	<div class="single-wrapper">

		<div class="brand-icon-wrapper">

			<?php

				$attachment_id = (int)get_field( "brand_icon" );

				$img = get_sed_attachment_image_html( $attachment_id , '' , 'full' );

				if ( ! $img ) {
					$img = array();
					$img['thumbnail'] = '<img class="sed-image-placeholder sed-image" src="' . sed_placeholder_img_src() . '" />';
				}

				echo $img['thumbnail'];

			?>

		</div>

		<div class="general-separator"> </div>

		<div class="single-content">
			<div class="single-content-inner">
				<div class="single-heading">
					<h4><?php the_title(); ?></h4>
				</div>
				<div>
					<?php
						/* translators: %s: Name of current post */
						the_content();
					?>
				</div><!-- the_content -->
			</div>
		</div>

	</div>

</div><!-- #post-## -->         