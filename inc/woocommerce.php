<?php
/**
 * SiteEditor Shop WooCommerce class
 *
 * @package SiteEditor
 * @subpackage theme
 * @since 1.0.0
 */

/**
 * SiteEditor Shop WooCommerce class.
 *
 * SiteEditor Shop WooCommerce is for sync with WooCommerce Plugin & their Extensions
 *
 * @since 1.0.0
 */

class SedShopWooCommerce{

    /**
     * @since 1.0.0
     * @var array
     * @access protected
     */
    //protected $theme_options = array();

    /**
     * SedShopWooCommerce constructor.
     */
    public function __construct(  ) { 

        $this->remove_breadcrumb();

        add_shortcode( 'sano_featured_products'  , __CLASS__ . '::featured_products' );

    }

    public function remove_breadcrumb(){

        remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

    }

}

new SedShopWooCommerce();

/**
 * Woocommerce Single Product Module class.
 *
 * Add Options
 *
 * @since 1.0.0
 */

class SedShopWoocommerceSingleProductModule{

    /**
     * SedShopWoocommerceSingleProduct constructor.
     */
    public function __construct(){

        $this->remove_default_hooks();

        $this->add_heading_part();

        $this->remove_details_products();

        add_filter( "woocommerce_product_thumbnails_columns" , array( __CLASS__ , "get_thumbnails_columns" ) );

        add_filter( "woocommerce_product_tabs" , array( __CLASS__ , "woocommerce_product_tabs" ) );

        add_filter( "woocommerce_product_description_heading" , array( __CLASS__ , "tabs_remove_heading" ) );

        //add_filter( "woocommerce_product_description_heading" , array( __CLASS__ , "tabs_remove_heading" ) );

    }

    public static function woocommerce_product_tabs( $tabs ){

        unset( $tabs['additional_information'] );

        return $tabs;

    }

    public static function tabs_remove_heading( $heading ){

        return false;

    }

    /**
     * Remove WooCommerce Default Hooks
     */
    public function remove_default_hooks(){

        //remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
        //remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
        //remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

    }

    public function add_heading_part(){

        add_action( 'woocommerce_single_product_summary', array( __CLASS__ , 'start_heading' ), 4 );

        add_action( 'woocommerce_single_product_summary', array( __CLASS__ , 'sub_title' ), 7 );

        add_action( 'woocommerce_single_product_summary', array( __CLASS__ , 'end_heading' ), 11 );

        //add_action( 'sed_shop_single_product_heading_left', 'woocommerce_template_single_title', 5 );

        //add_action( 'sed_shop_single_product_heading_right', 'woocommerce_template_single_rating', 10 );

    }

    public static function start_heading(){
        ?>
            <div class="hide"><?php the_content();?></div>
            <div class="product-heading-wrap">
        <?php
    }

    public static function sub_title(){

        $second_title = get_field( 'product_sub_title' );

        $second_title = trim( $second_title );

        if( !empty( $second_title ) ) {
            ?>

            <span class="product-second-title"><?php echo $second_title; ?></span>

            <?php
        }

    }

    public static function end_heading(){
        ?>
            </div>
        <?php
    }


    public static function get_thumbnails_columns( $columns ){

        return 3;

    }

    public function remove_details_products(){

        remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

        remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );

    }

}

new SedShopWoocommerceSingleProductModule();

/**
 * Woocommerce Single Product Module class.
 *
 * Add Options
 *
 * @since 1.0.0
 */

class SedShopWoocommerceArchiveModule{

    /**
     * SedShopWoocommerceSingleProduct constructor.
     */
    public function __construct(){

        add_filter( 'loop_shop_per_page'                , array( __CLASS__ , 'loop_shop_per_page' ) , 9999 );

        add_filter( 'loop_shop_columns'                 , array( __CLASS__ , 'loop_columns' ) , 9999 );

        add_filter( 'woocommerce_show_page_title'       , array( __CLASS__ , 'remove_page_title' ) , 9999  );

        //remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count' , 20 );

        //remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering' , 30 );

        //add_filter( 'sed_shop_before_shop_loop'         , 'woocommerce_pagination' , 10  );

        $this->set_content_product();

    }

    public static function loop_shop_per_page( $per_page ) {

        $per_page = 8;

        return $per_page;
    }

    public static function loop_columns( $columns ) {

        $columns = 4;

        return $columns;
    }

    public static function remove_page_title( $show_title ){

        $show_title = !$show_title ? $show_title : false;

        return $show_title;

    }

    public function set_content_product(){

        //remove_action( 'woocommerce_after_shop_loop_item_title' , 'woocommerce_template_loop_rating' , 5 );

        //remove_action( 'woocommerce_after_shop_loop_item_title' , 'woocommerce_template_loop_price' , 10 );

        //remove_action( 'woocommerce_after_shop_loop_item' , 'woocommerce_template_loop_add_to_cart' , 10 );

        //add_action( 'woocommerce_after_shop_loop_item' , array( __CLASS__ , 'add_more_detail' ) , 10 );

        //add_action( 'woocommerce_after_subcategory' , array( __CLASS__ , 'enter_to_product' ) , 20 , 1 );

        //add_action( 'woocommerce_after_subcategory_title' , array( __CLASS__ , 'add_cat_sub_title' ) , 10 , 1 );



    }

}

new SedShopWoocommerceArchiveModule();






