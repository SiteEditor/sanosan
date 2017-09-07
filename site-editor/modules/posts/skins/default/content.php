<div class="news-slider-item">

    <?php

    $post_link = apply_filters( "sed_posts_modules_post_permalink" , get_permalink() );

    $attachment_id   = get_post_thumbnail_id();

    $img = get_sed_attachment_image_html( $attachment_id , "", "300X200" );

    //$excerpt_length = 50;

    $content_post = apply_filters('the_excerpt', get_the_excerpt());

    # FILTER EXCERPT LENGTH
    if( strlen( $content_post ) > $excerpt_length )
        $content_post = mb_substr( $content_post , 0 , $excerpt_length - 3 ) . '...';

    ?>

    <div class="tme-wrapper">
        <div class="tme-img">

            <?php
            if ( $img ) {
                echo $img['thumbnail'];
            }
            ?>

            <div class="tme-info">
                <div class="tme-info-inner">
                    <div class="tme-info-content">
                        <h4  class="tme-heading"><?php the_title();?></h4>
                        <div class="tme-content"><?php echo $content_post; ?></div>
                        <div class="tme-date"><?php echo the_date("Y/m/d"); ?></div>
                        <div class="tme-btn"><a href="<?php esc_attr( esc_url( $post_link ) );?>" class="text-first-main"><?php echo __("Read More","sanosan");?></a></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
