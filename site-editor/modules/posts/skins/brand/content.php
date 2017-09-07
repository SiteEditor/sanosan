
<?php

$post_link = apply_filters( "sed_posts_modules_post_permalink" , get_permalink() );

$attachment_id   = (int)get_field( "brand_icon" );

$img = get_sed_attachment_image_html( $attachment_id , "full" );

//$excerpt_length = 50;

$content_post = apply_filters('the_excerpt', get_the_excerpt());

# FILTER EXCERPT LENGTH
if( strlen( $content_post ) > $excerpt_length )
    $content_post = mb_substr( $content_post , 0 , $excerpt_length - 3 ) . '...';

?>

<div class="brands-slider-item">
    <div class="tme-wrapper">
        <div class="tme-img">
            <a href="<?php echo esc_attr( esc_url( $post_link ) );?>">
                <?php
                if ( $img ) {
                    echo $img['thumbnail'];
                }
                ?>
            </a>
        </div>
        <div class="tme-heading">
            <h4><a href="<?php echo esc_attr( esc_url( $post_link ) );?>"><?php the_title();?></a></h4>
        </div>
        <div class="tme-content">
            <div class="tme-content-inner">
                <?php echo $content_post; ?>
            </div>
        </div>
    </div>
</div>
