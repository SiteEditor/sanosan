<div <?php echo $sed_attrs; ?> class="module module-posts module-posts-skin2 <?php echo $class; ?> ">

    <?php
    if( $show_title ) {
        ?>
        <div class="element-heading-module"><?php echo $title;?></div>
        <?php
    }

    $custom_query = new WP_Query( $args );

    if ( $custom_query->have_posts() ){

        ?>

        <div class="advertise-posts-wrapper">

            <?php
            $num = 1;
            $total = $custom_query->post_count;
            // Start the Loop.
            while ( $custom_query->have_posts() ){
                $custom_query->the_post();

                if( $num % 2 == 1 ){

                    ?>
                    <div class="advertise-posts-wrapper-inner">
                    <?php

                }

                include dirname(__FILE__) . '/content.php';

                if( $num % 2 == 0 || $total == $num ){

                    ?>
                    </div>
                    <?php

                }

                $num++;
            }

            ?>

        </div>

        <?php

        wp_reset_postdata();

    }else{ ?>
        
        <div class="not-found-post">
            <p><?php echo __("Not found result" , "twentyseventeen" ); ?> </p>
        </div>
        
    <?php 
        
    }
    
    wp_reset_query();
    
    ?>
    
</div>