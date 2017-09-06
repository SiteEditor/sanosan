<?php
//
// Recommended way to include parent theme styles.
//  (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
//

function sanosan_enqueue_styles() {

    wp_enqueue_style( 'sanosan-parent-style', get_template_directory_uri() . '/style.css' );

    wp_enqueue_style( 'sanosan-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );

    /**
     * Theme Front end main js
     * 'jquery', 'carousel' , 'sed-livequery' , 'jquery-ui-accordion' , 'jquery-ui-tabs'
     */
    wp_enqueue_script( "sanosan-script-js" , get_stylesheet_directory_uri() . '/assets/js/script.js' , array( 'jquery', 'carousel' , 'sed-livequery' , 'jquery-ui-accordion' ) , "1.0.0" , true );

    //wp_enqueue_script('sed-masonry');

    //wp_enqueue_script('lightbox');

    //wp_enqueue_script('jquery-scrollbar');

    //wp_enqueue_style('custom-scrollbar');

    wp_enqueue_style("carousel");

    //wp_enqueue_style("lightbox");

}

add_action( 'wp_enqueue_scripts', 'sanosan_enqueue_styles' , 0 );

add_action( 'after_setup_theme', 'sed_sanosan_theme_setup' );

function sed_sanosan_theme_setup() {

    load_child_theme_textdomain( 'sanosan', get_stylesheet_directory() . '/languages' );

    remove_filter( 'excerpt_more', 'twentyseventeen_excerpt_more' );

    /**
     * Short Description (excerpt).
     */
    add_filter( 'sanosan_short_description', 'wptexturize' );
    add_filter( 'sanosan_short_description', 'convert_smilies' );
    add_filter( 'sanosan_short_description', 'convert_chars' );
    add_filter( 'sanosan_short_description', 'wpautop' );
    add_filter( 'sanosan_short_description', 'shortcode_unautop' );
    add_filter( 'sanosan_short_description', 'prepend_attachment' );
    add_filter( 'sanosan_short_description', 'do_shortcode', 11 ); // AFTER wpautop()

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus( array(
        'services'    => __( 'Services Menu', 'twentyseventeen' ),
    ) );

}

function sanosan_excerpt_more( $link ) {
    if ( is_admin() ) {
        return $link;
    }

    return ' &hellip; ';
}
add_filter( 'excerpt_more', 'sanosan_excerpt_more' );

function sanosan_excerpt_length( $length ) {
    return 650;
}

add_filter( 'excerpt_length', 'sanosan_excerpt_length', 999 );

/**
 * Add Site Editor Modules
 *
 * @param $modules
 * @return mixed
 */
function sed_sanosan_add_modules( $modules ){

    global $sed_pb_modules;

    //$module_name = "themes/sanosan/site-editor/modules/posts/posts.php";
    //$modules[$module_name] = $sed_pb_modules->get_module_data(get_stylesheet_directory() . '/site-editor/modules/posts/posts.php', true, true);

    return $modules;

}

add_filter("sed_modules" , "sed_sanosan_add_modules" );



function sanosan_register_theme_fields( $fields ){

   /* $fields['products_archive_description'] = array(
        'type'              => 'textarea',
        'label'             => __('Product Archive Description', 'site-editor'),
        //'description'       => '',
        'transport'         => 'postMessage' ,
        'setting_id'        => 'sanosan_products_archive_description',
        'default'           => '',
        "panel"             => "general_settings" ,
    );

    $fields['home_page_products_description'] = array(
        'type'              => 'textarea',
        'label'             => __('Home Page Product Description', 'site-editor'),
        //'description'       => '',
        'transport'         => 'postMessage' ,
        'setting_id'        => 'sanosan_home_page_products_description',
        'default'           => '',
        "panel"             => "general_settings" ,
    );

    $locale = get_locale();

    if( $locale == 'fa_IR' ) {

        $fields['english_site_url'] = array(
            'type' => 'text',
            'label' => __('English Site Url', 'site-editor'),
            //'description'       => '',
            'transport' => 'postMessage',
            'setting_id' => 'sanosan_english_site_url',
            'default' => 'http://eng.sanosan.com',
            "panel" => "general_settings",
        );

    }

    $fields[ 'intro_logo' ] = array(
        'setting_id'        => 'sanosan_intro_logo',
        'label'             => __('Intro Logo', 'translation_domain'),
        'type'              => 'image',
        //'priority'          => 10,
        'default'           => '',
        'transport'         => 'postMessage' ,
        'panel'             =>  'general_settings'
    );*/

    return $fields;

}

//add_filter( "sed_theme_options_fields_filter" , 'sanosan_register_theme_fields' , 10000 );


//add_action( 'pre_get_posts', 'sanosan_per_page_query' );
/**
 * Customize category query using pre_get_posts.
 *
 * @author     FAT Media <http://youneedfat.com>
 * @copyright  Copyright (c) 2013, FAT Media, LLC
 * @license    GPL-2.0+
 * @todo       Change prefix to theme or plugin prefix
 *
 */
function sanosan_per_page_query( $query ) {

    /*$is_blog = ( is_home() && is_front_page() ) || ( is_home() && !is_front_page() );

    if ( $query->is_main_query() && ! $query->is_feed() && ! is_admin() && ( is_category() || is_tag() || $is_blog )  ) {
        $query->set( 'posts_per_page', '2' ); //Change this number to anything you like.
    }*/

    if ( $query->is_main_query() && ! $query->is_feed() && ! is_admin() && ( is_tax('video_cat') || is_post_type_archive('omid_video') )  ) {
        $query->set( 'posts_per_page', '100' ); //Change this number to anything you like.
    }
}


function sanosan_product_wishlist( $atts ) {

    /*$atts = shortcode_atts( array(
        'foo' => 'no foo',
        'baz' => 'default baz'
    ), $atts, 'bartag' );*/

    $tg_el = The_Grid_Elements();

    return $tg_el->get_product_wishlist();

}

add_shortcode( 'sanosan_wishlist', 'sanosan_product_wishlist' );


/**
 * Site Editor Shop WooCommerce
 */
require dirname(__FILE__) . '/inc/woocommerce.php';


