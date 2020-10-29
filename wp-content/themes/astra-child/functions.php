<?php
/**
 * Astra Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Child
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_ASTRA_CHILD_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style('bootstrap-min-css', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', array());
	wp_enqueue_style( 'astra-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_VERSION, 'all' );
    wp_enqueue_style('font-awesome-min-css', get_stylesheet_directory_uri() . '/assets/css/font-awesome.min.css', array());
    wp_enqueue_style('style-css', get_stylesheet_directory_uri() . '/assets/css/style.css', array());
    wp_enqueue_script('jquery-slim-js', get_stylesheet_directory_uri() . '/assets/js/jquery-3.5.1.slim.min.js',
        array('jquery'),'',true);
    wp_enqueue_script('bootstrap-bundle-js', get_stylesheet_directory_uri() . '/assets/js/bootstrap.bundle.min.js',
        array('jquery'),'',true);

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );
// Remove "Sale" icon badge from product archive page
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );

// Remove "Sale" icon from product single page
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );