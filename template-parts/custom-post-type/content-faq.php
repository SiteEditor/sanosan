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


$classes = array(
    'faq-item-heading'
);

?>

<div id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
    <div class="faq-heading-inner">
        <h5><?php the_title(); ?></h5>
    </div>
</div>

<div class="faq-item-content">
    <div class="faq-content-inner">
        <?php the_content(); ?>
    </div>
</div><!-- #post-## -->