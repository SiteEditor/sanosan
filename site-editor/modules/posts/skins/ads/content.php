<?php

    $advertise_type = get_field('advertise_type');

    $advertise_type = !$advertise_type ? "image" : $advertise_type;

    $type_class = "";

    switch ($advertise_type){

        case "image":

            $type_class = "img-advertise-posts-item";

            break;

        case "video":

            $type_class = "video-advertise-posts-item";

            break;

        case "text_image":

            $type_class = "desc-advertise-posts-item";

            break;

    }

?>

<div class="advertise-posts-item <?php echo esc_attr( $type_class );?>">
    <div class="tme-wrapper">

        <?php

        if( $advertise_type == "video" ) {

        ?>    
            <div id="sed-dialog-popup" class="sed-dialog-popup">

                <div class="sed-dialog-popup-inner">

                    <header class="sed-dialog-popup-header">

                        <div class="sed-dialog-popup-close"></div>
                        
                    </header>

                    <div class="sed-dialog-popup-content-wrap">

                        <?php

                        $self_hosted_video = get_field("ads_self_hosted_video");

                        $poster_url = get_the_post_thumbnail_url(get_the_ID(), "full");

                        if (!$poster_url) {
                            $poster_url = "";
                        }

                        if (!empty($self_hosted_video)) {

                            echo do_shortcode('[video src="' . $self_hosted_video["url"] . '" poster="' . $poster_url . '"]');

                        } else {

                            $external_video_code = get_field("ads_external_video");

                            echo $external_video_code;

                        }

                        ?>

                    </div>

                </div>
                
            </div>        


        <?php

        }
        
        ?>

        <div class="tme-img">

            <?php

            $attachment_id   = get_post_thumbnail_id();

            $custom_images_size = "";

            $images_size = "";

            if( $advertise_type == "text_image" ){

                $images_size = "full";

            }else if( $advertise_type == "image" ){

                $custom_images_size = "500X300";

            }

            $img = get_sed_attachment_image_html( $attachment_id , $images_size , $custom_images_size );

            if ( $img ) {
                echo $img['thumbnail'];
            }
            

            if( $advertise_type == "text_image" ) {

                /*$content_post = apply_filters('the_excerpt', get_the_excerpt());

                # FILTER EXCERPT LENGTH
                if( strlen( $content_post ) > $excerpt_length )
                    $content_post = mb_substr( $content_post , 0 , $excerpt_length - 3 );*/

                ?>

                <div class="tme-desc"><?php the_content(); ?></div>

                <?php
            }
            ?>

        </div>
    </div>
</div>